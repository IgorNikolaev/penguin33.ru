<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Igor Nikolaev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * App extension
 */
class AppExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $this->injectConfiguration($this->processConfiguration(new Configuration(), $configs), $container, $this->getAlias());

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        foreach ([
            'penguin',
            'repository',
        ] as $resource) {
            $loader->load($resource.'.yml');
        }
    }

    /**
     * @param mixed[]                                                   $configuration Configuration
     * @param \Symfony\Component\DependencyInjection\ContainerInterface $container     DI container
     * @param string                                                    $prefix        Parameter name prefix
     */
    private function injectConfiguration(array $configuration, ContainerInterface $container, $prefix)
    {
        foreach ($configuration as $name => $value) {
            $prefixedName = $prefix.'.'.$name;
            $container->setParameter($prefixedName, $value);

            if (is_array($value)) {
                $this->injectConfiguration($value, $container, $prefixedName);
            }
        }
    }
}
