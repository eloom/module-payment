<?php

namespace Eloom\Payment\Lib\CreditCard\Cards;

use Eloom\Payment\Lib\CreditCard\Contracts\CreditCard;

class Visa extends Card implements CreditCard {
	/**
	 * Regular expression for card number recognition.
	 *
	 * @var string
	 */
	public static $pattern = '/^4/';

	/**
	 * Credit card type.
	 *
	 * @var string
	 */
	protected $type = 'credit';

	/**
	 * Credit card name.
	 *
	 * @var string
	 */
	protected $name = 'visa';

	/**
	 * Brand name.
	 *
	 * @var string
	 */
	protected $brand = 'Visa';

	/**
	 * Card number length's.
	 *
	 * @var array
	 */
	protected $numberLength = [13, 16];

	/**
	 * CVC code length's.
	 *
	 * @var array
	 */
	protected $cvcLength = [3];

	/**
	 * Test cvc code checksum against Luhn algorithm.
	 *
	 * @var bool
	 */
	protected $checksumTest = true;
}
