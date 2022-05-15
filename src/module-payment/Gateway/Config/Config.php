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

namespace Eloom\Payment\Gateway\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Config extends \Magento\Payment\Gateway\Config\Config {

	public function __construct(ScopeConfigInterface $scopeConfig,
	                            $methodCode = null,
	                            $pathPattern = self::DEFAULT_PATH_PATTERN) {
		parent::__construct($scopeConfig, $methodCode, $pathPattern);
	}
}