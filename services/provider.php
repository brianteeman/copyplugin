<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.copycode
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

declare(strict_types=1);

// no direct access
defined('_JEXEC') or die;


use Brian\Plugin\System\CopyCode\Extension\CopyCode;
use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class implements ServiceProviderInterface
{
	/**
	 * Registers the service provider with a DI container.
	 *
	 * @param   Container  $container  The DI container.
	 *
	 * @return  void
	 */
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {

                $plugin = new CopyCode(
                    (array) PluginHelper::getPlugin('system', 'copycode')
                );

                return $plugin;
            }
        );
    }
};
