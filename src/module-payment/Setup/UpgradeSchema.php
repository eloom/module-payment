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

namespace Eloom\Payment\Setup;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Store\Model\StoreManagerInterface;

class UpgradeSchema implements UpgradeSchemaInterface {

	public function __construct(StoreManagerInterface $storeManager, ScopeConfigInterface $scopeConfig) {
		$this->_storeManager = $storeManager;
		$this->_scopeConfig = $scopeConfig;
	}

	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$setup->startSetup();

		$setup->endSetup();
	}
}
