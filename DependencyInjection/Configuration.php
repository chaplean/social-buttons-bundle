<?php

namespace Chaplean\Bundle\SocialButtonsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('chaplean_social_buttons');

        $rootNode
            ->isRequired()
            ->children()
            ->arrayNode('buttons')
            ->isRequired()
            ->useAttributeAsKey('networks')
            ->prototype('array')
            ->children()
            ->scalarNode('url')
            ->defaultNull()
            ->validate()
            ->ifTrue(function ($s) {
                return is_null($s) ? false : 1 !== preg_match('/^((http:\/\/|https:\/\/)?(www.)?(([a-zA-Z0-9-]){2,}\.){1,4}([a-zA-Z]){2,6}(\/([a-zA-Z-_\/\.0-9#:?=&;,]*)?)?)/', $s);
            })
            ->thenInvalid('Invalid url format')
            ->end()
            ->end()
            ->scalarNode('locale')
            ->defaultValue('%locale%')
            ->end()
            // Facebook specific
            ->booleanNode('showFaces')
            ->defaultFalse()
            ->end()
            ->booleanNode('send')
            ->defaultTrue()
            ->end()
            ->booleanNode('share')
            ->defaultTrue()
            ->end()
            // Twitter specific
            ->scalarNode('layout')->end()
            ->scalarNode('message')->end()
            ->scalarNode('text')->end()
            ->scalarNode('via')->end()
            ->scalarNode('tag')->end()
            ->scalarNode('count')->end()
            // G+ specific
            // Linkedin specific
            ->end()
            ->end()
            ->end()
            ->arrayNode('links')
            ->useAttributeAsKey('network')
            ->prototype('scalar')
            ->isRequired()
            ->validate()
            ->ifTrue(function ($s) {
                return preg_match('/^((http:\/\/|https:\/\/)?(www.)?(([a-zA-Z0-9-]){2,}\.){1,4}([a-zA-Z]){2,6}(\/([a-zA-Z-_\/\.0-9#:?=&;,]*)?)?)/', $s) !== 1;
            })
            ->thenInvalid('Invalid url format')
            ->end()
            ->end()
            ->end()
            ->scalarNode('theme')
            ->defaultValue('default')
            ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
