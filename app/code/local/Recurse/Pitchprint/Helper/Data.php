<?php
class Recurse_Pitchprint_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CATALOG_RECURSE_PITCHPRINT_APIKEY         = 'catalog/recurse_pitchprint_config/apikey';
    const CATALOG_RECURSE_PITCHPRINT_SECURITYKEY    = 'catalog/recurse_pitchprint_config/securitykey';
    const CATALOG_RECURSE_PITCHPRINT_APPURL         = 'catalog/recurse_pitchprint_config/appurl';
    const CATALOG_RECURSE_PITCHPRINT_APIURL         = 'catalog/recurse_pitchprint_config/apiurl';
    const CATALOG_RECURSE_PITCHPRINT_BTNTITULO      = 'catalog/recurse_pitchprint_config/btntitulo';
    const CATALOG_RECURSE_PITCHPRINT_LANGUAGE       = 'catalog/recurse_pitchprint_config/language';
    const CATALOG_RECURSE_PITCHPRINT_JQUERY         = 'catalog/recurse_pitchprint_config/jquery';
    
    public function getSignature()
    {
        return md5($this->getApiKey() . $this->getSecurityKey() . time());
    }

    public function getAppUrl()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APPURL);
    }

    public function getApiUrl($method = '')
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APIURL).$method;
    }

    public function getApiKey()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APIKEY);
    }

    public function getSecurityKey()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_SECURITYKEY);
    }

    public function getBtntitulo()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_BTNTITULO);
    }

    public function getLanguage()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_LANGUAGE);
    }

    public function getJquery()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_JQUERY);
    }

}