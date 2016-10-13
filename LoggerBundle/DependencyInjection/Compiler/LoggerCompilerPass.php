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
            $reference = 'logger';
            if (($channel = $this->getChannel($tags)) !== null) {
                $reference = 'monolog.logger.'.$channel;
            }
            $container->getDefinition($id)->addMethodCall(
                'setLogger',
                array(new Reference($reference))
            );
        }

    }

    /**
     * returns the channel attribute if exists
     *
     * @param array $tags
     *
     * @return string|null
     */
    protected function getChannel(array $tags)
    {
        foreach ($tags as $tag) {
            if (isset($tag['channel'])) {
                return $tag['channel'];
            }
        }
    }
}
