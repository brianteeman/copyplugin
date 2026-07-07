<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.copycode
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

declare(strict_types=1);

namespace Brian\Plugin\System\CopyCode\Extension;

use Joomla\CMS\Event\Application\BeforeCompileHeadEvent;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\WebAsset\WebAssetManager;
use Joomla\Event\SubscriberInterface;

// no direct access
\defined('_JEXEC') or die;

/**
 * CopyCode System plugin.
 * Adds a button to copy code, when code is displayed in content.
 */
final class CopyCode extends CMSPlugin implements SubscriberInterface
{
	/**
	 *
	 * Load the language file on instantiation.
	 *
	 * @var bool
	 */
	protected $autoloadLanguage = true;

	/**
	 * Get the methods to be called on events
	 *
	 * @return string[], each item being an event => method
	 *
	 */
	public static function getSubscribedEvents(): array
	{
		return [
			'onBeforeCompileHead' => 'addCopyCodeButton'
                ];
    }

	/**
	 * Add the Javascript and CSS to copy displayed code
	 *
	 * @param   BeforeCompileHeadEvent  $event
	 *
	 * @return  void
	 */
	public function addCopyCodeButton(BeforeCompileHeadEvent $event): void
    {
        $app = $event->getApplication();

        if ($app->isClient('administrator')) {
            return;
        }

        /** @var WebAssetManager $wa */
        $wa = $app->getDocument()->getWebAssetManager();

        $wa->registerAndUseScript(
            'plg_system_copycode.copycode',
            'media/plg_system_copycode/js/copycode.js',
            [],
            ['type' => 'module']
        );

        $wa->registerAndUseStyle(
            'plg_system_copycode.copycode',
            'media/plg_system_copycode/css/copycode.css'
        );

        /* Load the language strings for the JavaScript */
        Text::script('PLG_SYSTEM_COPYCODE_COPY');
        Text::script('PLG_SYSTEM_COPYCODE_COPIED');
        Text::script('PLG_SYSTEM_COPYCODE_FAILED');
    }
}