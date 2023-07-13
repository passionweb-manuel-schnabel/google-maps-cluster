<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use Passionweb\GoogleMapsCluster\Controller\MapController;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void {
    $services = $containerConfigurator->services();
    $services->defaults()
        ->private()
        ->autowire()
        ->autoconfigure();

    $services->load('Passionweb\\GoogleMapsCluster\\', __DIR__ . '/../Classes/')
        ->exclude([
            __DIR__ . '/../Classes/Domain/Model',
        ]);

    $services->set('ExtConf.googleMapsCluster', 'array')
        ->factory([service(ExtensionConfiguration::class), 'get'])
        ->args([
            'google_maps_cluster'
        ]);

    $services->set(MapController::class)
        ->arg('$extConf', service('ExtConf.googleMapsCluster'));
};
