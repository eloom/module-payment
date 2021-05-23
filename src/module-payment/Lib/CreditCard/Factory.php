<?php

namespace Eloom\Payment\Lib\CreditCard;

use Eloom\Payment\Lib\CreditCard\Cards\AmericanExpress;
use Eloom\Payment\Lib\CreditCard\Cards\Card;
use Eloom\Payment\Lib\CreditCard\Cards\Dankort;
use Eloom\Payment\Lib\CreditCard\Cards\DinersClub;
use Eloom\Payment\Lib\CreditCard\Cards\Discovery;
use Eloom\Payment\Lib\CreditCard\Cards\Elo;
use Eloom\Payment\Lib\CreditCard\Cards\Forbrugsforeningen;
use Eloom\Payment\Lib\CreditCard\Cards\Hipercard;
use Eloom\Payment\Lib\CreditCard\Cards\Jcb;
use Eloom\Payment\Lib\CreditCard\Cards\Maestro;
use Eloom\Payment\Lib\CreditCard\Cards\Mastercard;
use Eloom\Payment\Lib\CreditCard\Cards\Mir;
use Eloom\Payment\Lib\CreditCard\Cards\UnionPay;
use Eloom\Payment\Lib\CreditCard\Cards\Visa;
use Eloom\Payment\Lib\CreditCard\Cards\VisaElectron;
use Eloom\Payment\Lib\CreditCard\Exceptions\CreditCardException;

class Factory {
	protected static $availableCards = [
		// Firs debit cards
		Dankort::class,
		Forbrugsforeningen::class,
		Maestro::class,
		VisaElectron::class,
		// Debit cards
		AmericanExpress::class,
		DinersClub::class,
		Discovery::class,
		Elo::class,
		Jcb::class,
		Hipercard::class,
		Mastercard::class,
		UnionPay::class,
		Visa::class,
		Mir::class,
	];

	/**
	 * @param string $cardNumber
	 *
	 * @return Card
	 * @throws CreditCardException
	 */
	public static function makeFromNumber(string $cardNumber) {
		return self::determineCardByNumber($cardNumber);
	}

	/**
	 * @param string $cardNumber
	 *
	 * @return mixed
	 * @throws CreditCardException
	 */
	protected static function determineCardByNumber(string $cardNumber) {
		foreach (self::$availableCards as $card) {
			if (preg_match($card::$pattern, $cardNumber)) {
				return new $card($cardNumber);
			}
		}

		throw new CreditCardException('Card not found.');
	}
}
