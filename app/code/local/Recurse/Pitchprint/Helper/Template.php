<?php
class Recurse_Pitchprint_Helper_Template extends Mage_Core_Helper_Abstract
{

    public function isEnable()
    {
        $product = Mage::registry('current_product');
        return $product->getData('pitchprint_enable');
    }

}