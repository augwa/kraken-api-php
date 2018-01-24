<?php

namespace Augwa\Kraken\Model;

/**
 * Class Ticker
 * @package Augwa\Kraken\Model
 */
class Ticker
{
    /** @var BasicTradeEntry */
    private $ask;

    /** @var BasicTradeEntry */
    private $bid;

    /** @var BasicTradeEntry */
    private $lastTrade;

    /** @var float */
    private $volumeToday;

    /** @var float */
    private $volume24Hours;

    /** @var float */
    private $volumeWeightAverageToday;

    /** @var float */
    private $volumeWeightAverage24Hours;

    /** @var int */
    private $tradesToday;

    /** @var int */
    private $trades24Hours;

    /** @var float */
    private $lowToday;

    /** @var float */
    private $low24Hours;

    /** @var float */
    private $highToday;

    /** @var float */
    private $high24Hours;

    /** @var float */
    private $openToday;

    /**
     * @return BasicTradeEntry
     */
    public function getAsk() : BasicTradeEntry
    {
        return $this->ask;
    }

    /**
     * @param BasicTradeEntry $ask
     *
     * @return Ticker
     */
    public function setAsk(
        BasicTradeEntry $ask
    ) : Ticker {
        $this->ask = $ask;

        return $this;
    }

    /**
     * @return BasicTradeEntry
     */
    public function getBid() : BasicTradeEntry
    {
        return $this->bid;
    }

    /**
     * @param BasicTradeEntry $bid
     *
     * @return Ticker
     */
    public function setBid(
        BasicTradeEntry $bid
    ) : Ticker {
        $this->bid = $bid;

        return $this;
    }

    /**
     * @return BasicTradeEntry
     */
    public function getLastTrade() : BasicTradeEntry
    {
        return $this->lastTrade;
    }

    /**
     * @param BasicTradeEntry $lastTrade
     *
     * @return Ticker
     */
    public function setLastTrade(
        BasicTradeEntry $lastTrade
    ) : Ticker {
        $this->lastTrade = $lastTrade;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolumeToday() : float
    {
        return $this->volumeToday;
    }

    /**
     * @param float $volumeToday
     *
     * @return Ticker
     */
    public function setVolumeToday(
        float $volumeToday
    ) : Ticker {
        $this->volumeToday = $volumeToday;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolume24Hours() : float
    {
        return $this->volume24Hours;
    }

    /**
     * @param float $volume24Hours
     *
     * @return Ticker
     */
    public function setVolume24Hours(
        float $volume24Hours
    ) : Ticker {
        $this->volume24Hours = $volume24Hours;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolumeWeightAverageToday() : float
    {
        return $this->volumeWeightAverageToday;
    }

    /**
     * @param float $volumeWeightAverageToday
     *
     * @return Ticker
     */
    public function setVolumeWeightAverageToday(
        float $volumeWeightAverageToday
    ) : Ticker {
        $this->volumeWeightAverageToday = $volumeWeightAverageToday;

        return $this;
    }

    /**
     * @return float
     */
    public function getVolumeWeightAverage24Hours() : float
    {
        return $this->volumeWeightAverage24Hours;
    }

    /**
     * @param float $volumeWeightAverage24Hours
     *
     * @return Ticker
     */
    public function setVolumeWeightAverage24Hours(
        float $volumeWeightAverage24Hours
    ) : Ticker {
        $this->volumeWeightAverage24Hours = $volumeWeightAverage24Hours;

        return $this;
    }

    /**
     * @return int
     */
    public function getTradesToday() : int
    {
        return $this->tradesToday;
    }

    /**
     * @param int $tradesToday
     *
     * @return Ticker
     */
    public function setTradesToday(
        int $tradesToday
    ) : Ticker {
        $this->tradesToday = $tradesToday;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrades24Hours() : int
    {
        return $this->trades24Hours;
    }

    /**
     * @param int $trades24Hours
     *
     * @return Ticker
     */
    public function setTrades24Hours(
        int $trades24Hours
    ) : Ticker {
        $this->trades24Hours = $trades24Hours;

        return $this;
    }

    /**
     * @return float
     */
    public function getLowToday() : float
    {
        return $this->lowToday;
    }

    /**
     * @param float $lowToday
     *
     * @return Ticker
     */
    public function setLowToday(
        float $lowToday
    ) : Ticker {
        $this->lowToday = $lowToday;

        return $this;
    }

    /**
     * @return float
     */
    public function getLow24Hours() : float
    {
        return $this->low24Hours;
    }

    /**
     * @param float $low24Hours
     *
     * @return Ticker
     */
    public function setLow24Hours(
        float $low24Hours
    ) : Ticker {
        $this->low24Hours = $low24Hours;

        return $this;
    }

    /**
     * @return float
     */
    public function getHighToday() : float
    {
        return $this->highToday;
    }

    /**
     * @param float $highToday
     *
     * @return Ticker
     */
    public function setHighToday(
        float $highToday
    ) : Ticker {
        $this->highToday = $highToday;

        return $this;
    }

    /**
     * @return float
     */
    public function getHigh24Hours() : float
    {
        return $this->high24Hours;
    }

    /**
     * @param float $high24Hours
     *
     * @return Ticker
     */
    public function setHigh24Hours(
        float $high24Hours
    ) : Ticker {
        $this->high24Hours = $high24Hours;

        return $this;
    }

    /**
     * @return float
     */
    public function getOpenToday() : float
    {
        return $this->openToday;
    }

    /**
     * @param float $openToday
     *
     * @return Ticker
     */
    public function setOpenToday(
        float $openToday
    ) : Ticker {
        $this->openToday = $openToday;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        // ask
        if (array_key_exists('a', $data) &&
            is_array($data['a']) &&
            count($data['a']) === 3
        ) {
            $ask = new BasicTradeEntry;
            $ask
                ->setPrice($data['a'][0])
                ->setWholeLotVolume($data['a'][1])
                ->setLotVolume($data['a'][2]);
            $this->setAsk($ask);
        }

        // bid
        if (array_key_exists('b', $data) &&
            is_array($data['b']) &&
            count($data['b']) === 3
        ) {
            $bid = new BasicTradeEntry;
            $bid
                ->setPrice($data['b'][0])
                ->setWholeLotVolume($data['b'][1])
                ->setLotVolume($data['b'][2]);
            $this->setBid($bid);
        }

        // last trade closed
        if (array_key_exists('c', $data) &&
            is_array($data['c']) &&
            count($data['c']) === 2
        ) {
            $lastTrade = new BasicTradeEntry;
            $lastTrade
                ->setPrice($data['c'][0])
                ->setLotVolume($data['c'][1]);
            $this->setLastTrade($lastTrade);
        }

        // volume
        if (array_key_exists('v', $data) &&
            is_array($data['v']) &&
            count($data['v']) === 2
        ) {
            $this->setVolumeToday($data['v'][0]);
            $this->setVolume24Hours($data['v'][1]);
        }

        // volume weighted average price
        if (array_key_exists('p', $data) &&
            is_array($data['p']) &&
            count($data['p']) === 2
        ) {
            $this->setVolumeWeightAverageToday($data['p'][0]);
            $this->setVolumeWeightAverage24Hours($data['p'][1]);
        }

        // number of trades today
        if (array_key_exists('t', $data) &&
            is_array($data['t']) &&
            count($data['t']) === 2
        ) {
            $this->setTradesToday($data['t'][0]);
            $this->setTrades24Hours($data['t'][1]);
        }

        // low
        if (array_key_exists('l', $data) &&
            is_array($data['l']) &&
            count($data['l']) === 2
        ) {
            $this->setLowToday($data['l'][0]);
            $this->setLow24Hours($data['l'][1]);
        }

        // high
        if (array_key_exists('h', $data) &&
            is_array($data['h']) &&
            count($data['h']) === 2
        ) {
            $this->setHighToday($data['h'][0]);
            $this->setHigh24Hours($data['h'][1]);
        }

        // today's opening price
        if (array_key_exists('o', $data)) {
            $this->setOpenToday($data['o']);
        }
    }
}