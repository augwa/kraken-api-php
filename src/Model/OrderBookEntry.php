<?php

namespace Augwa\Kraken\Model;

/**
 * Class OrderBookEntry
 * @package Augwa\Kraken\Model
 */
class OrderBookEntry
{
    /** @var float */
    private $price;

    /** @var float */
    private $volume;

    /** @var int */
    private $timestamp;

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
     * @return OrderBookEntry
     */
    public function setPrice(
        float $price
    ) : OrderBookEntry {
        $this->price = $price;

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
     * @return OrderBookEntry
     */
    public function setVolume(
        float $volume
    ) : OrderBookEntry {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimestamp() : int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     *
     * @return OrderBookEntry
     */
    public function setTimestamp(
        int $timestamp
    ) : OrderBookEntry {
        $this->timestamp = $timestamp;

        return $this;
    }
}