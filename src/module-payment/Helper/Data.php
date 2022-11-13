<?php
/**
* 
* Payment Core para Magento 2
* 
* @category     elOOm
* @package      Modulo Payment Core
* @copyright    Copyright (c) 2022 elOOm (https://eloom.tech)
* @version      1.0.4
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Payment\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper {
	
	public function __construct(\Magento\Framework\App\Helper\Context $context) {
		parent::__construct($context);
	}
	
	public function getIp($xForwardedFor, $remoteIp) {
		$candidateIp = ($xForwardedFor ?? $remoteIp);
		$realIp = null;
		
		$offset = strrpos($candidateIp, ",");
		if ($offset) {
			$candidateIp = explode(',', $candidateIp)[0];
		}
		
		$isValid = filter_var($candidateIp, FILTER_VALIDATE_IP);
		if ($isValid) {
			$realIp = $candidateIp;
			
			//$isValid = filter_var($ip, FILTER_VALIDATE_IP,FILTER_FLAG_IPV4);
			//$isValid = filter_var($ip, FILTER_VALIDATE_IP,FILTER_FLAG_IPV6);
		} else {
			$isValid = filter_var($candidateIp, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
			if ($isValid) {
				$realIp = $candidateIp;
			}
		}
		
		return $realIp;
	}
}