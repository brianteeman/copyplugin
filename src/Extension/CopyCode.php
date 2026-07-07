<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.copycode
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

declare(strict_types=1);

namespace Brian\Plugin\System\CopyCode\Extension;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\WebAsset\WebAssetManager;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;

final class CopyCode extends CMSPlugin
{
    protected $autoloadLanguage = true;

    public function onBeforeCompileHead(): void
    {
        $app = Factory::getApplication();

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