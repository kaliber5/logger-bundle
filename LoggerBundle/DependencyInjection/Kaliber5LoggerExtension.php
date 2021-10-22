<?php

namespace Kaliber5\LoggerBundle\DependencyInjection;

use Kaliber5\LoggerBundle\LoggingInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class Kaliber5LoggerExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->registerForAutoconfiguration(LoggingInterface::class)
            ->addTag('k5.logger.logging');
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);
    }
}
