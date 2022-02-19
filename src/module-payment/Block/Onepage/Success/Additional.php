<?php
/**
* 
* Payment Core para Magento 2
* 
* @category     elOOm
* @package      Modulo Payment Core
* @copyright    Copyright (c) 2021 Ã©lOOm (https://eloom.tech)
* @version      1.0.3
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Payment\Block\Onepage\Success;

use Eloom\Core\Lib\Enumeration\Exception\UndefinedMemberException;
use Eloom\Payment\Enumeration\PaymentMethods;
use Magento\Checkout\Model\Session;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\View\LayoutInterface;
use Magento\Sales\Model\Order\Config;

class Additional extends Template {

	private $paymentMethod = null;
	private $eloomMethod = false;

	private $checkoutSession;
	private $orderConfig;
	private $httpContext;
	private $layout;

	public function __construct(Context $context,
	                            LayoutInterface $layout,
	                            Session $checkoutSession,
	                            Config $orderConfig,
	                            \Magento\Framework\App\Http\Context $httpContext,
	                            array $data = []) {
		parent::__construct($context, $data);
		parent::__construct($context, $data);

		$this->layout = $layout;
		$this->checkoutSession = $checkoutSession;
		$this->orderConfig = $orderConfig;
		$this->httpContext = $httpContext;

		try {
			$this->eloomMethod = PaymentMethods::memberByKey($this->getPayment()->getCode());
			if ($this->eloomMethod) {
				$module = $this->eloomMethod->getModule();
				$this->setTemplate("{$module}::checkout/success/additional.phtml");
			}
		} catch (UndefinedMemberException $e) {

		}
	}

	public function getBlock() {
		$block = null;
		if ($this->eloomMethod) {
			$module = str_replace('_', '\\', $this->eloomMethod->getModule());
			$block = $this->layout->getBlockSingleton("\\{$module}\\Block\\Checkout\\Success\\Additional");
		}
		return $block;
	}

	private function getPayment() {
		if ($this->paymentMethod == null) {
			$order = $this->checkoutSession->getLastRealOrder();
			$this->paymentMethod = $order->getPayment()->getMethodInstance();
		}

		return $this->paymentMethod;
	}
}