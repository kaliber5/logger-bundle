<?php

namespace Kaliber5\LoggerBundle;

use Kaliber5\LoggerBundle\DependencyInjection\Compiler\LoggerCompilerPass;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class Kaliber5LoggerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new LoggerCompilerPass(), PassConfig::TYPE_BEFORE_OPTIMIZATION, 10);
    }
}
