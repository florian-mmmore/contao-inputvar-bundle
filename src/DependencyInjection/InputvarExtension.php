<?php

declare(strict_types=1);

namespace Dreibein\InputvarBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class InputvarExtension
 * @package Dreibein\InputvarBundle\DependencyInjection
 */
class InputvarExtension extends Extension
{
    /**
     * loads the needed config files
     *
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        try {
            $loader->load('listener.yml');
        } catch (\Exception $e) {
            echo($e->getMessage());
        }
    }
}
