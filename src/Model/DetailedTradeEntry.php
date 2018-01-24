<?php

namespace Augwa\Kraken\Model;

/**
 * Class DetailedTradeEntry
 * @package Augwa\Kraken\Model
 */
class DetailedTradeEntry
{
    /** @var float */
    private $price;

    /** @var float */
    private $volume;

    /** @var int */
    private $timestamp;

    /** @var string */
    private $action;

    /** @var string */
    private $type;

    /** @var string */
    private $miscellaneous;

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
     * @return DetailedTradeEntry
     */
    public function setPrice(
        float $price
    ) : DetailedTradeEntry {
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
     * @return DetailedTradeEntry
     */
    public function setVolume(
        float $volume
    ) : DetailedTradeEntry {
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
     * @return DetailedTradeEntry
     */
    public function setTimestamp(
        int $timestamp
    ) : DetailedTradeEntry {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @param string $action
     *
     * @return DetailedTradeEntry
     */
    public function setAction(
        string $action
    ) : DetailedTradeEntry {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return DetailedTradeEntry
     */
    public function setType(
        string $type
    ) : DetailedTradeEntry {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiscellaneous() : string
    {
        return $this->miscellaneous;
    }

    /**
     * @param string $miscellaneous
     *
     * @return DetailedTradeEntry
     */
    public function setMiscellaneous(
        string $miscellaneous
    ) : DetailedTradeEntry {
        $this->miscellaneous = $miscellaneous;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('price', $data)) {
            $this->setPrice($data['price']);
        }

        if (array_key_exists('volume', $data)) {
            $this->setVolume($data['volume']);
        }

        if (array_key_exists('timestamp', $data)) {
            $this->setTimestamp($data['timestamp']);
        }

        if (array_key_exists('action', $data)) {
            $this->setAction($data['action']);
        }

        if (array_key_exists('type', $data)) {
            $this->setType($data['type']);
        }

        if (array_key_exists('misc', $data)) {
            $this->setMiscellaneous($data['misc']);
        }
    }
}