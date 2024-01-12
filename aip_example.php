<?php

require_once 'aip_example.civix.php';

use CRM_AipExample_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function aip_example_civicrm_config(&$config): void {
  _aip_example_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function aip_example_civicrm_install(): void {
  _aip_example_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function aip_example_civicrm_enable(): void {
  _aip_example_civix_civicrm_enable();
}



/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
 */
function  aip_example_civicrm_navigationMenu(&$menu) {
  _aip_example_civix_insert_navigation_menu($menu, NULL, array(
    'label' => E::ts('AIP Example'),
    'icon' => 'crm-i fa-medkit',
    'name' => 'Support_Dashboard',
    'url' => 'civicrm/aip-example-page',
    'operator' => 'OR',
    'separator' => 0,
    'weight' => 70,
  ));
  _aip_example_civix_navigationMenu($menu);
}
