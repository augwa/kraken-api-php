<?php

namespace Augwa\Kraken\Model;

/**
 * Class BasicTradeEntry
 * @package Augwa\Kraken\Model
 */
class BasicTradeEntry
{
    /** @var float */
    private $price;

    /** @var float */
    private $wholeLotVolume;

    /** @var float */
    private $lotVolume;

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
     * @return BasicTradeEntry
     */
    public function setPrice(
        float $price
    ) : BasicTradeEntry {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float
     */
    public function getWholeLotVolume() : float
    {
        return $this->wholeLotVolume;
    }

    /**
     * @param float $wholeLotVolume
     *
     * @return BasicTradeEntry
     */
    public function setWholeLotVolume(
        float $wholeLotVolume
    ) : BasicTradeEntry {
        $this->wholeLotVolume = $wholeLotVolume;

        return $this;
    }

    /**
     * @return float
     */
    public function getLotVolume() : float
    {
        return $this->lotVolume;
    }

    /**
     * @param float $lotVolume
     *
     * @return BasicTradeEntry
     */
    public function setLotVolume(
        float $lotVolume
    ) : BasicTradeEntry {
        $this->lotVolume = $lotVolume;

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

        if (array_key_exists('whole_lot_volume', $data)) {
            $this->setWholeLotVolume($data['whole_lot_volume']);
        }

        if (array_key_exists('lot_volume', $data)) {
            $this->setLotVolume($data['lot_volume']);
        }
    }
}