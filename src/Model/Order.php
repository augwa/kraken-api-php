<?php

namespace Augwa\Kraken\Model;

/**
 * Class Order
 * @package Augwa\Model
 */
class Order
{
    /** @var string */
    private $orderId;

    /** @var null|string */
    private $referenceId;

    /** @var int */
    private $userReferenceId;

    /** @var string */
    private $status;

    /** @var null|string */
    private $reason;

    /** @var \DateTime */
    private $openTime;

    /** @var \DateTime */
    private $closeTime;

    /** @var null|\DateTime */
    private $startTime;

    /** @var null|\DateTime */
    private $expireTime;

    /** @var TradeRecord */
    private $tradeRecord;

    /** @var float */
    private $volume;

    /** @var float */
    private $volumeExecuted;

    /** @var float */
    private $cost;

    /** @var float */
    private $fee;

    /** @var float */
    private $price;

    /** @var float */
    private $stopPrice;

    /** @var float */
    private $limitPrice;

    /** @var string */
    private $misc;

    /** @var array */
    private $orderFlags;

    /** @var array */
    private $trades;

    /**
     * @return string
     */
    public function getOrderId() : string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     *
     * @return Order
     */
    public function setOrderId(
        string $orderId
    ) : Order {
        $this->orderId = $orderId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReferenceId() : ?string
    {
        return $this->referenceId;
    }

    /**
     * @param string $referenceId
     *
     * @return Order
     */
    public function setReferenceId(
        string $referenceId
    ) : Order {
        $this->referenceId = $referenceId;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserReferenceId() : int
    {
        return $this->userReferenceId;
    }

    /**
     * @param int $userReferenceId
     *
     * @return Order
     */
    public function setUserReferenceId(
        int $userReferenceId
    ) : Order {
        $this->userReferenceId = $userReferenceId;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Order
     */
    public function setStatus(
        string $status
    ) : Order {
        $this->status = $status;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getReason() : ?string
    {
        return $this->reason;
    }

    /**
     * @param string $reason
     *
     * @return Order
     */
    public function setReason(
        string $reason
    ) : Order {
        $this->reason = $reason;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getOpenTime() : \DateTime
    {
        return $this->openTime;
    }

    /**
     * @param \DateTime $openTime
     *
     * @return Order
     */
    public function setOpenTime(
        \DateTime $openTime
    ) : Order {
        $this->openTime = $openTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCloseTime() : \DateTime
    {
        return $this->closeTime;
    }

    /**
     * @param \DateTime $closeTime
     *
     * @return Order
     */
    public function setCloseTime(
        \DateTime $closeTime
    ) : Order {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * @return null|\DateTime
     */
    public function getStartTime() : ?\DateTime
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $startTime
     *
     * @return Order
     */
    public function setStartTime(
        \DateTime $startTime
    ) : Order {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return null|\DateTime
     */
    public function getExpireTime() : ?\DateTime
    {
        return $this->expireTime;
    }

    /**
     * @param \DateTime $expireTime
     *
     * @return Order
     */
    public function setExpireTime(
        \DateTime $expireTime
    ) : Order {
        $this->expireTime = $expireTime;

        return $this;
    }

    /**
     * @return TradeRecord
     */
    public function getTradeRecord() : TradeRecord
    {
        if (null === $this->tradeRecord) {
            $this->setTradeRecord(new TradeRecord);
        }
        return $this->tradeRecord;
    }

    /**
     * @param TradeRecord $tradeRecord
     *
     * @return Order
     */
    public function setTradeRecord(
        TradeRecord $tradeRecord
    ) : Order {
        $this->tradeRecord = $tradeRecord;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolume() : float
    {
        return $this->volume;
    }

    /**
     * @param float $volume
     *
     * @return Order
     */
    public function setVolume(
        float $volume
    ) : Order {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolumeExecuted() : float
    {
        return $this->volumeExecuted;
    }

    /**
     * @param float $volumeExecuted
     *
     * @return Order
     */
    public function setVolumeExecuted(
        float $volumeExecuted
    ) : Order {
        $this->volumeExecuted = $volumeExecuted;

        return $this;
    }

    /**
     * @return float
     */
    public function getCost() : float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     *
     * @return Order
     */
    public function setCost(
        float $cost
    ) : Order {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return float
     */
    public function getFee() : float
    {
        return $this->fee;
    }

    /**
     * @param float $fee
     *
     * @return Order
     */
    public function setFee(
        float $fee
    ) : Order {
        $this->fee = $fee;

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
     * @return Order
     */
    public function setPrice(
        float $price
    ) : Order {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getStopPrice() : float
    {
        return $this->stopPrice;
    }

    /**
     * @param float $stopPrice
     *
     * @return Order
     */
    public function setStopPrice(
        float $stopPrice
    ) : Order {
        $this->stopPrice = $stopPrice;

        return $this;
    }

    /**
     * @return float
     */
    public function getLimitPrice() : float
    {
        return $this->limitPrice;
    }

    /**
     * @param float $limitPrice
     *
     * @return Order
     */
    public function setLimitPrice(
        float $limitPrice
    ) : Order {
        $this->limitPrice = $limitPrice;

        return $this;
    }

    /**
     * @return string
     */
    public function getMisc() : string
    {
        return $this->misc;
    }

    /**
     * @param string $misc
     *
     * @return Order
     */
    public function setMisc(
        string $misc
    ) : Order {
        $this->misc = $misc;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getOrderFlags() : array
    {
        return $this->orderFlags;
    }

    /**
     * @param string $orderFlag
     *
     * @return Order
     */
    public function addOrderFlag(
        string $orderFlag
    ) : Order {
        $this->orderFlags[] = $orderFlag;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTrades() : array
    {
        return $this->trades;
    }

    /**
     * @param string $trade
     *
     * @return Order
     */
    public function addTrade(
        string $trade
    ) : Order {
        $this->trades[] = $trade;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('orderid', $data)) {
            $this->setOrderId($data['orderid']);
        }

        if (array_key_exists('refid', $data) &&
            $data['refid']
        ) {
            $this->setReferenceId($data['refid']);
        }

        if (array_key_exists('userref', $data)) {
            $this->setUserReferenceId($data['userref']);
        }

        if (array_key_exists('status', $data)) {
            $this->setStatus($data['status']);
        }

        if (array_key_exists('reason', $data) &&
            $data['reason']
        ) {
            $this->setReason($data['reason']);
        }

        if (array_key_exists('opentm', $data) &&
            $data['opentm']
        ) {
            $this->setOpenTime(\DateTime::createFromFormat('U.u', $data['opentm']));
        }

        if (array_key_exists('closetm', $data) &&
            $data['closetm']
        ) {
            $this->setCloseTime(\DateTime::createFromFormat('U.u', $data['closetm']));
        }

        if (array_key_exists('starttm', $data) &&
            $data['starttm']
        ) {
            $this->setStartTime(\DateTime::createFromFormat('U', $data['starttm']));
        }

        if (array_key_exists('expiretm', $data) &&
            $data['expiretm']
        ) {
            $this->setExpireTime(\DateTime::createFromFormat('U', $data['expiretm']));
        }

        if (array_key_exists('descr', $data)) {
            $this->getTradeRecord()->loadFromArray($data['descr']);
        }

        if (array_key_exists('vol', $data)) {
            $this->setVolume($data['vol']);
        }

        if (array_key_exists('vol_exec', $data)) {
            $this->setVolumeExecuted($data['vol_exec']);
        }

        if (array_key_exists('cost', $data)) {
            $this->setCost($data['cost']);
        }

        if (array_key_exists('fee', $data)) {
            $this->setFee($data['fee']);
        }

        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }

        if (array_key_exists('stopprice', $data)) {
            $this->setStopPrice($data['stopprice']);
        }

        if (array_key_exists('limitprice', $data)) {
            $this->setLimitPrice($data['limitprice']);
        }

        if (array_key_exists('misc', $data)) {
            $this->setMisc($data['misc']);
        }

        if (array_key_exists('oflags', $data)) {
            $orderFlags = explode(',', $data['oflags']);
            foreach($orderFlags as $orderFlag) {
                $this->addOrderFlag($orderFlag);
            }
        }

        if (array_key_exists('trades', $data) &&
            is_array($data['trades'])
        ) {
            foreach($data['trades'] as $trade) {
                $this->addTrade($trade);
            }
        }
    }
}