<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.copycode
 *
 * @copyright   (C) 2026 Brian Teeman. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
declare(strict_types=1);

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Extension\Service\Provider\PluginFactory;
use Joomla\CMS\Factory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Brian\Plugin\System\CopyCode\Extension\CopyCode;


return new class implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {

                $dispatcher = $container->get(DispatcherInterface::class);

                $plugin = new CopyCode(
                    $dispatcher,
                    (array) Factory::getApplication()->getConfig(),
                );

                return $plugin;
            }
        );
    }
};