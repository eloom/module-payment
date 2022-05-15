<?php
/**
* 
* Payment Core para Magento 2
* 
* @category     elOOm
* @package      Modulo Payment Core
* @copyright    Copyright (c) 2022 Ã©lOOm (https://eloom.tech)
* @version      2.0.0
* @license      https://opensource.org/licenses/OSL-3.0
* @license      https://opensource.org/licenses/AFL-3.0
*
*/
declare(strict_types=1);

namespace Eloom\Payment\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\View\Asset\Repository;

class ConfigProvider implements ConfigProviderInterface {

	const CODE = 'eloom_payments';

	protected $assetRepo;

	public function __construct(Repository $assetRepo) {
		$this->assetRepo = $assetRepo;
	}

	public function getConfig() {
		return [
			'payment' => [
				self::CODE => []
			]
		];
	}
}