<?php

namespace HotfixBundle;

use HotfixBundle\DependencyInjection\Compiler\ViewListenerPriorityPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HotfixBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ViewListenerPriorityPass());
    }
}
