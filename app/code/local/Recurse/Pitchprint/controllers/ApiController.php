<?php
class Recurse_Pitchprint_ApiController extends Mage_Core_Controller_Front_Action
{
    private $_helper;

    public function _construct()
    {
        $this->_helper = Mage::helper('recurse_pitchprint');
    }

    public function fetchdesignsAction()
    {
        $url = $this->_helper->getApiUrl('fetch-designs');

        $pitch_apikey = $this->_helper->getApiKey();
        $signature = $this->_helper->getSignature();

        $data_string = json_encode(array('timestamp' => time(), 'apiKey' => $pitch_apikey, 'signature' => $signature));

        $ch = curl_init($url);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );                                                                                                                   
         
        echo $result = curl_exec($ch);
    }

    public function fetchpdfAction()
    {
        $projectid = $this->getRequest()->getParam('projectid');

        $url = $this->_helper->getApiUrl('fetch-pdf/'.$projectid);

        $data_string = array(
            'signature' => $this->_helper->getSignature(),
            'apiKey'    => $this->_helper->getApiKey(),
            'timestamp' => time()
        );

        $query = http_build_query($data_string);

        $redirect = $url.'?'.$query;

        header('location:'.$redirect);
        exit();
    }

}