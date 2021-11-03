<?php
/**
* 
* Payment Core para Magento 2
* 
* @category     elOOm
* @package      Modulo Payment Core
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.2
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Payment\Enumeration;

use Eloom\Core\Lib\Enumeration\AbstractMultiton;

class PaymentMethods extends AbstractMultiton {
	
	public function getModule(): string {
		return $this->module;
	}
	
	protected static function initializeMembers() {
		new static('eloom_payments_payu_cc', 'Eloom_PayU');
		new static('eloom_payments_payu_boleto', 'Eloom_PayU');
		new static('eloom_payments_payu_pix', 'Eloom_PayU');
		new static('eloom_payments_payu_baloto', 'Eloom_PayU');
		new static('eloom_payments_payu_efecty', 'Eloom_PayU');
		new static('eloom_payments_payu_pagoefectivo', 'Eloom_PayU');
		new static('eloom_payments_payu_pse', 'Eloom_PayU');
		new static('eloom_payments_payu_oxxo', 'Eloom_PayU');
		new static('eloom_payments_payu_seveneleven', 'Eloom_PayU');
		new static('eloom_payments_payu_multicaja', 'Eloom_PayU');
		new static('eloom_payments_payu_pagofacil', 'Eloom_PayU');
		new static('eloom_payments_payu_rapipago', 'Eloom_PayU');
	}
	
	protected function __construct($key, $module) {
		parent::__construct($key);
		$this->module = $module;
	}
	
	private $module;
}
