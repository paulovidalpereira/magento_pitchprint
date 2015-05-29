<?php

class Recurse_Pitchprint_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CATALOG_RECURSE_PITCHPRINT_APIKEY         = 'catalog/recurse_pitchprint_config/apikey';
    const CATALOG_RECURSE_PITCHPRINT_SECURITYKEY    = 'catalog/recurse_pitchprint_config/securitykey';
    const CATALOG_RECURSE_PITCHPRINT_APPURL         = 'catalog/recurse_pitchprint_config/appurl';
    const CATALOG_RECURSE_PITCHPRINT_APIURL         = 'catalog/recurse_pitchprint_config/apiurl';

    // private $_app_url = 'https://pitchprint.net/app/';
    // private $_api_url = 'https://pitchprint.net/runtime/';
    // private $_api_key = '572746a6e34757bbfce97d0846659763';
    // private $_security_key = 'Jgb0e%Vno77)yg)HSxR8]UzO0ZAivt';
    
    public function getSignature()
    {
        return md5($this->_api_key . $this->_security_key . time());
    }

    public function getAppUrl()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APPURL);
    }

    public function getApiUrl($method = '')
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APIURL).'/'.$method;
    }

    public function getApiKey()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_APIKEY);
    }

    public function getSecurityKey()
    {
        return Mage::getStoreConfig(self::CATALOG_RECURSE_PITCHPRINT_SECURITYKEY);
    }

}