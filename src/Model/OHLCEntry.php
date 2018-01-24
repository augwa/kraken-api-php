<?php

namespace Augwa\Kraken\Model;

/**
 * Class OHLCEntry
 * @package Augwa\Kraken\Model
 */
class OHLCEntry
{
    /** @var \DateTime */
    private $time;

    /** @var float */
    private $open;

    /** @var float */
    private $high;

    /** @var float */
    private $low;

    /** @var float */
    private $close;

    /** @var float */
    private $volumeWeightedAveragePrice;

    /** @var float */
    private $volume;

    /** @var int */
    private $count;

    /**
     * @return \DateTime
     */
    public function getTime() : \DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     *
     * @return OHLCEntry
     */
    public function setTime(
        \DateTime $time
    ) : OHLCEntry {
        $this->time = $time;

        return $this;
    }

    /**
     * @return float
     */
    public function getOpen() : float
    {
        return $this->open;
    }

    /**
     * @param float $open
     *
     * @return OHLCEntry
     */
    public function setOpen(
        float $open
    ) : OHLCEntry {
        $this->open = $open;

        return $this;
    }

    /**
     * @return float
     */
    public function getHigh() : float
    {
        return $this->high;
    }

    /**
     * @param float $high
     *
     * @return OHLCEntry
     */
    public function setHigh(
        float $high
    ) : OHLCEntry {
        $this->high = $high;

        return $this;
    }

    /**
     * @return float
     */
    public function getLow() : float
    {
        return $this->low;
    }

    /**
     * @param float $low
     *
     * @return OHLCEntry
     */
    public function setLow(
        float $low
    ) : OHLCEntry {
        $this->low = $low;

        return $this;
    }

    /**
     * @return float
     */
    public function getClose() : float
    {
        return $this->close;
    }

    /**
     * @param float $close
     *
     * @return OHLCEntry
     */
    public function setClose(
        float $close
    ) : OHLCEntry {
        $this->close = $close;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolumeWeightedAveragePrice() : float
    {
        return $this->volumeWeightedAveragePrice;
    }

    /**
     * @param float $volumeWeightedAveragePrice
     *
     * @return OHLCEntry
     */
    public function setVolumeWeightedAveragePrice(
        float $volumeWeightedAveragePrice
    ) : OHLCEntry {
        $this->volumeWeightedAveragePrice = $volumeWeightedAveragePrice;

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
     * @return OHLCEntry
     */
    public function setVolume(
        float $volume
    ) : OHLCEntry {
        $this->volume = $volume;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount() : int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return OHLCEntry
     */
    public function setCount(
        int $count
    ) : OHLCEntry {
        $this->count = $count;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('time', $data)) {
            $this->setTime(\DateTime::createFromFormat('U', $data['time']));
        }

        if (array_key_exists('open', $data)) {
            $this->setOpen($data['open']);
        }

        if (array_key_exists('high', $data)) {
            $this->setHigh($data['high']);
        }

        if (array_key_exists('low', $data)) {
            $this->setLow($data['low']);
        }

        if (array_key_exists('close', $data)) {
            $this->setClose($data['close']);
        }

        if (array_key_exists('vwap', $data)) {
            $this->setVolumeWeightedAveragePrice($data['vwap']);
        }

        if (array_key_exists('volume', $data)) {
            $this->setVolume($data['volume']);
        }

        if (array_key_exists('count', $data)) {
            $this->setCount($data['count']);
        }
    }
}