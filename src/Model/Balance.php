<?php

namespace Augwa\Kraken\Model;

/**
 * Class Balance
 * @package Augwa\Kraken\Model
 */
class Balance
{
    /** @var Currency */
    private $currency;

    /** @var float */
    private $amount;

    /**
     * @return Currency
     */
    public function getCurrency() : Currency
    {
        if (null === $this->currency) {
            $this->setCurrency(new Currency);
        }
        return $this->currency;
    }

    /**
     * @param Currency $currency
     *
     * @return Balance
     */
    public function setCurrency(
        Currency $currency
    ) : Balance {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount() : float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     *
     * @return Balance
     */
    public function setAmount(
        float $amount
    ) : Balance {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('currencyCode', $data)) {
            $this->getCurrency()->loadByCode($data['currencyCode']);
        }

        if (array_key_exists('amount', $data)) {
            $this->setAmount($data['amount']);
        }
    }
}