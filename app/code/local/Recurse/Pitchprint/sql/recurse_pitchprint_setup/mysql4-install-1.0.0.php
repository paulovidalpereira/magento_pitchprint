<?php

$installer = $this;
$installer->startSetup();

$setup = new Mage_Eav_Model_Entity_Setup('core_setup');

$codigo = 'pitchprint_enable';
// $setup->removeAttribute('catalog_product', $codigo);
$config = array(
    'group'                     => 'Pitchprint',
    'position'                  => 10,
    'required'                  => 0,
    'label'                     => 'Enable',
    'type'                      => 'int',
    'input'                     => 'select',
    'source'                    => 'eav/entity_attribute_source_boolean',
    'backend'                   => '',
    'frontend'                  => '',
    'global'                    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'apply_to'                  => 'simple',
    'used_in_product_listing'   => false,
    'is_configurable'           => false
    // 'note'     => ''
);

$setup->addAttribute('catalog_product', $codigo, $config);


$codigo = 'pitchprint_design';
// $setup->removeAttribute('catalog_product', $codigo);
$config = array(
    'group'                     => 'Pitchprint',
    'position'                  => 20,
    'required'                  => 0,
    'label'                     => 'Design ID',
    'type'                      => 'varchar',
    // 'input'                     => 'select',
    'input'                     => 'text',
    // 'source'                    => 'recurse_pitchprint/attribute_source_designs',
    'backend'                   => '',
    'frontend'                  => '',
    'global'                    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_WEBSITE,
    'apply_to'                  => 'simple',
    'used_in_product_listing'   => true,
    'is_configurable'           => false
    // 'note'     => ''
);

$setup->addAttribute('catalog_product', $codigo, $config);

$installer->endSetup();