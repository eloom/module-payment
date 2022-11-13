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

namespace Eloom\Payment\Block\Adminhtml\Config\Source;

class PaymentAction implements \Magento\Framework\Option\ArrayInterface {

	const AUTHORIZE = 'authorize';
	const CAPTURE = 'authorize_capture';
	/**
	 * {@inheritdoc}
	 */
	public function toOptionArray() {
		return [
			['value' => self::AUTHORIZE, 'label' => __('Authorize')],
			['value' => self::CAPTURE, 'label' => __('Authorize + Capture')]
		];
	}

}