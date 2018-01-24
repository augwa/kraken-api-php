<?php

namespace Augwa\Kraken\Model;

/**
 * Class FeeVolume
 * @package Augwa\Kraken\Model
 */
class FeeVolume
{
    /** @var int */
    private $volume;

    /** @var float */
    private $fee;

    /**
     * @return int
     */
    public function getVolume() : int
    {
        return $this->volume;
    }

    /**
     * @param int $volume
     *
     * @return FeeVolume
     */
    public function setVolume(
        int $volume
    ) : FeeVolume {
        $this->volume = $volume;

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
     * @return FeeVolume
     */
    public function setFee(
        float $fee
    ) : FeeVolume {
        $this->fee = $fee;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('fee', $data)) {
            $this->setFee($data['fee']);
        }

        if (array_key_exists('volume', $data)) {
            $this->setVolume($data['volume']);
        }
    }
}