<?php   
class Recurse_Pitchprint_Block_Js extends Mage_Core_Block_Abstract
{   
    public function _prepareLayout()
    {
        $product = Mage::registry('current_product');

        if( $product->getData('pitchprint_enable') )
        {
            // $head = $this->getLayout()->getBlock('head')->addItem('skin_js','recurse/js/jquery-1.10.2.min.js');
            // $head = $this->getLayout()->getBlock('head')->addItem('external_js','//dta8vnpq1ae34.cloudfront.net/javascripts/jquery-ui-1.10.4.custom.min.js');
            // $head = $this->getLayout()->getBlock('head')->addItem('skin_js','recurse/js/noConflict.js');
            // $head = $this->getLayout()->getBlock('head')->addItem('external_js','//dta8vnpq1ae34.cloudfront.net/javascripts/pitchprint.min.js');
            // $head = $this->getLayout()->getBlock('head')->addItem('skin_js','recurse/js/pitchprint.min.js');
        }

        return parent::_prepareLayout();
    }

}