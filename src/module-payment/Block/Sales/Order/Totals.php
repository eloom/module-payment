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

namespace Eloom\Payment\Block\Sales\Order;

class Totals extends \Magento\Framework\View\Element\Template {

	private $order;
	private $source;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context, array $data = []) {
		parent::__construct($context, $data);
	}

	public function getSource() {
		return $this->source;
	}

	public function getStore() {
		return $this->order->getStore();
	}

	public function getOrder() {
		return $this->order;
	}

	public function initTotals() {
		$parent = $this->getParentBlock();
		$this->order = $parent->getOrder();
		$this->source = $parent->getSource();

		/**
		 * Descontos
		 */
		$amount = $this->source->getPayuDiscountAmount();
		if ($amount < 0) {
			$custom = new \Magento\Framework\DataObject([
					'code' => 'eloom_discount',
					'strong' => false,
					'value' => $amount,
					'base_value' => $this->source->getPayuBaseDiscountAmount(),
					'label' => __('Discount'),
				]
			);

			$parent->addTotalBefore($custom, 'grand_total');
		}

		/**
		 * Juros
		 */
		$amount = $this->source->getPayuInterestAmount();
		if ($amount > 0) {
			$custom = new \Magento\Framework\DataObject([
					'code' => 'eloom_interest',
					'strong' => false,
					'value' => $amount,
					'base_value' => $this->source->getPayuBaseInterestAmount(),
					'label' => __('Interest'),
				]
			);

			$parent->addTotalBefore($custom, 'grand_total');
		}

		return $this;
	}

}