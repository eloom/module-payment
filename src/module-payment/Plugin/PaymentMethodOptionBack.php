<?php
/**
* 
* Payment Core para Magento 2
* 
* @category     elOOm
* @package      Modulo Payment Core
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.1
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Payment\Plugin;

use Magento\SalesRule\Model\Rule\Condition\Address;

class PaymentMethodOptionBack {

	/**
	 * @param Address $subject
	 * @param $result
	 * @return Address
	 */
	public function afterLoadAttributeOptions(Address $subject, $result) {
		$attributeOption = $subject->getAttributeOption();
		$attributeOption['payment_method'] = __('Payment Method');

		$subject->setAttributeOption($attributeOption);

		return $subject;
	}
}