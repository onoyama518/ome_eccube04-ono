<?php

namespace Plugin\ContactManagement42;

use Eccube\Plugin\AbstractPluginManager;
use Psr\Container\ContainerInterface;

/**
 * Class PluginManager.
 */
class PluginManager extends AbstractPluginManager
{
    const VERSION = '1.0.0';
    /**
     * Install the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function install(array $meta, ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine')->getManager();
        dump('install '.self::VERSION);
        $this->migration($entityManager->getConnection(), $meta['code']);
    }

    /**
     * Update the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function update(array $meta, ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine')->getManager();
        dump('update ' . self::VERSION);
        $this->migration($entityManager->getConnection(), $meta['code']);
    }

    /**
     * Enable the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function enable(array $meta, ContainerInterface $container)
    {
        dump('enable '.self::VERSION);
    }

    /**
     * Disable the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function disable(array $meta, ContainerInterface $container)
    {
        $entityManager = $container->get('doctrine')->getManager();
        dump('disable '.self::VERSION);

    }

    /**
     * Uninstall the plugin.
     *
     * @param array $meta
     * @param ContainerInterface $container
     */
    public function uninstall(array $meta, ContainerInterface $container)
    {
        dump('uninstall '.self::VERSION);
        $entityManager = $container->get('doctrine')->getManager();
        $this->migration($entityManager->getConnection(), $meta['code'], '0');
    }
}
