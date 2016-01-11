<?php

/**
 * @Author: Phu Hoang
 * @Date:   2016-01-11 13:19:26
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-01-11 14:14:43
 */

namespace hmphu\payoneer;

use hmphu\payoneer\request\RequestInterface;

/**
 * Class ApiAbstract
 * @package hmphu\payoneer
 */
abstract class ApiAbstract
{
	const PAYOUT_CARD = 'PrepaidCard';
    const PAYOUT_DEPOSIT = 'DirectDeposit';
    const PAYOUT_ACH = 'iACH';
    const PAYOUT_CHECK = 'PaperCheck';
    const ACH_MODE_REGULAR = 'Regular';
    const ACH_MODE_EXPRESS = 'Express';
    
    protected $response;
    protected $config;
    
    /**
     * @param $config
     */
    function __construct(PayoneerConfig $config) {
        $this->config = $config;
    }
    
    /**
     * @param $methodName
     * @param RequestInterface $request
     * @return mixed
     */
    public function call($methodName, RequestInterface $request) {
        $client = new Client();
        $url = $this->config->apiEndpoint . '?mname=' . $methodName;
        $parameters = array_merge($this->config->getParameterArray(), $request->getParameterArray());
        $response = $client->post($url, ['form_params' => $parameters]);
        return $response;
    }

    /**
     * Convert XML string to array.
     *
     * @param String $xml_string
     * @return mixed
     */
    protected function xmlToArray($xml_string) {
    	return Verdant\XML2Array::createArray($xml_string);
    }
}
