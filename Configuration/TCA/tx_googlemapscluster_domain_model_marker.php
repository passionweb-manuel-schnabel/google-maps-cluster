<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:tx_googlemapscluster_domain_model_marker',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'lat,lon,title,',
        'iconfile' => 'EXT:google_maps_cluster/Resources/Public/Icons/Extension.png'
    ],
    'types' => [
        '1' => ['showitem' => 'lat,lon,title, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden,'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_googlemapscluster_domain_model_marker',
                'foreign_table_where' => 'AND {#tx_googlemapscluster_domain_model_marker}.{#pid}=###CURRENT_PID### AND {#tx_googlemapscluster_domain_model_marker}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'lat' => [
            'exclude' => true,
            'label' => 'LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:tx_googlemapscluster_domain_model_marker.lat',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,double6',
                'default' => 0
            ],
        ],
        'lon' => [
            'exclude' => true,
            'label' => 'LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:tx_googlemapscluster_domain_model_marker.lon',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,double6',
                'default' => 0
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:google_maps_cluster/Resources/Private/Language/locallang_db.xlf:tx_googlemapscluster_domain_model_marker.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
    ],
];
