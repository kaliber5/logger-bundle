<?php
namespace Kaliber5\LoggerBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Reference;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class LoggerCompilerPass
 * @package Kaliber5\LoggerBundle\DependencyInjection\Compiler
 */
class LoggerCompilerPass implements CompilerPassInterface
{

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('logger')) {
            return;
        }

        $taggedServices = $container->findTaggedServiceIds(
            'k5.logger.logging'
        );

        foreach ($taggedServices as $id => $tags) {
            $container->getDefinition($id)->addMethodCall(
                'setLogger',
                array(new Reference('logger'))
            );
        }

    }
}
