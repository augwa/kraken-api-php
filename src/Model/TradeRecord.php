<?php

namespace Augwa\Kraken\Model;

/**
 * Class TradeRecord
 * @package Augwa\Kraken\Model
 */
class TradeRecord
{
    /** @var string */
    private $pair;

    /** @var string */
    private $tradeType;

    /** @var string */
    private $orderType;

    /** @var float */
    private $price;

    /** @var float */
    private $price2;

    /** @var string */
    private $leverage;

    /** @var string */
    private $orderString;

    /** @var string */
    private $closeString;

    /**
     * @return string
     */
    public function getPair() : string
    {
        return $this->pair;
    }

    /**
     * @param string $pair
     *
     * @return TradeRecord
     */
    public function setPair(
        string $pair
    ) : TradeRecord {
        $this->pair = $pair;

        return $this;
    }

    /**
     * @return string
     */
    public function getTradeType() : string
    {
        return $this->tradeType;
    }

    /**
     * @param string $tradeType
     *
     * @return TradeRecord
     */
    public function setTradeType(
        string $tradeType
    ) : TradeRecord {
        $this->tradeType = $tradeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderType() : string
    {
        return $this->orderType;
    }

    /**
     * @param string $orderType
     *
     * @return TradeRecord
     */
    public function setOrderType(
        string $orderType
    ) : TradeRecord {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice() : float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return TradeRecord
     */
    public function setPrice(
        float $price
    ) : TradeRecord {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice2() : float
    {
        return $this->price2;
    }

    /**
     * @param float $price2
     *
     * @return TradeRecord
     */
    public function setPrice2(
        float $price2
    ) : TradeRecord {
        $this->price2 = $price2;

        return $this;
    }

    /**
     * @return string
     */
    public function getLeverage() : string
    {
        return $this->leverage;
    }

    /**
     * @param string $leverage
     *
     * @return TradeRecord
     */
    public function setLeverage(
        string $leverage
    ) : TradeRecord {
        $this->leverage = $leverage;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrderString() : string
    {
        return $this->orderString;
    }

    /**
     * @param string $orderString
     *
     * @return TradeRecord
     */
    public function setOrderString(
        string $orderString
    ) : TradeRecord {
        $this->orderString = $orderString;

        return $this;
    }

    /**
     * @return string
     */
    public function getCloseString() : string
    {
        return $this->closeString;
    }

    /**
     * @param string $closeString
     *
     * @return TradeRecord
     */
    public function setCloseString(
        string $closeString
    ) : TradeRecord {
        $this->closeString = $closeString;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('pair', $data)) {
            $this->setPair($data['pair']);
        }

        if (array_key_exists('type', $data)) {
            $this->setTradeType($data['type']);
        }

        if (array_key_exists('ordertype', $data)) {
            $this->setOrderType($data['ordertype']);
        }

        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }

        if (array_key_exists('price2', $data)) {
            $this->setPrice2($data['price2']);
        }

        if (array_key_exists('leverage', $data)) {
            $this->setLeverage($data['leverage']);
        }

        if (array_key_exists('order', $data)) {
            $this->setOrderString($data['order']);
        }

        if (array_key_exists('close', $data)) {
            $this->setCloseString($data['close']);
        }
    }
}