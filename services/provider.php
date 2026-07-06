<?php

declare(strict_types=1);

use Brian\Plugin\System\CopyCode\Extension\CopyCode;
use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;

return new class implements ServiceProviderInterface
{
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {

                $plugin = new CopyCode(
                    $container->get(DispatcherInterface::class),
                    (array) PluginHelper::getPlugin('system', 'copycode')
                );

                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
