<?php

defined('TYPO3') or die('Access denied.');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'GoogleMapsCluster',
    'ClusterMap',
    [
        \Passionweb\GoogleMapsCluster\Controller\MapController::class => 'cluster'
    ],
    // non-cacheable actions
    [
        \Passionweb\GoogleMapsCluster\Controller\MapController::class => 'cluster',
    ]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
                wizards.newContentElement.wizardItems.plugins {
                    elements {
                        clustermap {
                            iconIdentifier = plugin-clustermap
                            title = LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:plugin_google_maps_cluster_clustermap.name
                            description = LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:plugin_google_maps_cluster_clustermap.description
                            tt_content_defValues {
                                CType = list
                                list_type = googlemapscluster_clustermap
                            }
                        }
                    }
                    show = *
                }
           }'
);
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'plugin-clustermap',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:google_maps_cluster/Resources/Public/Icons/Extension.png']
);
