<?php

/**
 * @Author: Phu Hoang
 * @Date:   2016-01-11 13:50:21
 * @Last Modified by:   Phu Hoang
 * @Last Modified time: 2016-01-11 14:08:30
 */

namespace hmphu\payoneer\request;

/**
 * Class PerformPayoutPaymentRequest
 * @package hmphu\payoneer\request
 */
class PerformPayoutPaymentRequest extends RequestAbstract implements RequestInterface
{
    
    /**
     * @param      $programId
     * @param      $paymentId
     * @param      $payeeId
     * @param      $amount
     * @param      $description
     * @param      $paymentDate
     * @param null $groupId
     * @param null $currency
     */
    function __construct($programId, $paymentId, $payeeId, $amount, $description, $paymentDate, $groupId = null, $currency = null) {
        $this->parameters['p4'] = $programId;
        $this->parameters['p5'] = $paymentId;
        $this->parameters['p6'] = $payeeId;
        $this->parameters['p7'] = $amount;
        $this->parameters['p8'] = $description;
        $this->parameters['p9'] = $paymentDate;
        $this->parameters['p11'] = $groupId;
        $this->parameters['Currency'] = $currency;
    }
}
