<?php

namespace HotfixBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

class ViewListenerPriorityPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('oro_ui.view.listener')) {
            return;
        }

        $definition = $container->getDefinition('oro_ui.view.listener');
        $tags = $definition->getTags();

        if (array_key_exists('kernel.event_listener', $tags)) {
            foreach ($tags['kernel.event_listener'] as &$tag) {
                if (array_key_exists('event', $tag) && 'kernel.view' === $tag['event']) {
                    $tag['priority'] = 50;
                }
            }

            $definition->setTags($tags);
        }
    }
}
