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

namespace Eloom\Payment\Setup;

use Eloom\Payment\Api\Data\OrderPaymentInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface {

	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		$table = $setup->getTable('sales_order_payment');
		$connection = $setup->getConnection();

		if ($connection->tableColumnExists($table, OrderPaymentInterface::CANCEL_AT) === false) {
			$connection->addColumn($table,
				OrderPaymentInterface::CANCEL_AT,
				[
					'type' => \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
					'comment' => 'Cancel At'
				]
			);
		}

		$setup->startSetup();
	}
}
