<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Envauto.CarData',
            'Cardataplugin',
            [
                'Manufacturer' => 'list, show, new, create, edit, update, delete',
                'Car' => 'list, show, new, create, edit, update, delete',
                'Emission' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Manufacturer' => 'create, update, delete',
                'Car' => 'create, update, delete',
                'Emission' => 'create, update, delete'
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    cardataplugin {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('car_data') . 'Resources/Public/Icons/user_plugin_cardataplugin.svg
                        title = LLL:EXT:car_data/Resources/Private/Language/locallang_db.xlf:tx_car_data_domain_model_cardataplugin
                        description = LLL:EXT:car_data/Resources/Private/Language/locallang_db.xlf:tx_car_data_domain_model_cardataplugin.description
                        tt_content_defValues {
                            CType = list
                            list_type = cardata_cardataplugin
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
