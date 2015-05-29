<?php
class Recurse_Pitchprint_Block_Customize extends Mage_Catalog_Block_Product_View
{

    // public function descontoActive()
    // {
    //     return Mage::getStoreConfig('catalog/recurse_desconto/active');
    // }

    public function getDesign()
    {
        $_product = $this->getProduct();

        return $_product->getData('pitchprint_design');
    }

}