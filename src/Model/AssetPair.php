<?php

namespace Augwa\Kraken\Model;

use Augwa\Kraken\Collection\FeeVolumeCollection;

/**
 * Class AssetPair
 * @package Augwa\Kraken\Model
 */
class AssetPair
{
    /** @var string */
    private $alternateName;

    /** @var string */
    private $assetClassBase;

    /** @var string */
    private $base;

    /** @var string */
    private $assetClassQuote;

    /** @var string */
    private $quote;

    /** @var string */
    private $lot;

    /** @var int */
    private $pairPrecision;

    /** @var int */
    private $lotPrecision;

    /** @var int */
    private $lotMultiplier;

    /** @var int[] */
    private $leverageBuy = [];

    /** @var int[] */
    private $leverageSell = [];

    /** @var FeeVolumeCollection */
    private $fees;

    /** @var FeeVolumeCollection */
    private $feesMaker;

    /** @var string */
    private $feeVolumeCurrency;

    /** @var int */
    private $marginCall;

    /** @var int */
    private $marginStop;

    /**
     * @return string
     */
    public function getAlternateName() : string
    {
        return $this->alternateName;
    }

    /**
     * @param string $alternateName
     *
     * @return AssetPair
     */
    public function setAlternateName(
        string $alternateName
    ) : AssetPair {
        $this->alternateName = $alternateName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAssetClassBase() : string
    {
        return $this->assetClassBase;
    }

    /**
     * @param string $assetClassBase
     *
     * @return AssetPair
     */
    public function setAssetClassBase(
        string $assetClassBase
    ) : AssetPair {
        $this->assetClassBase = $assetClassBase;

        return $this;
    }

    /**
     * @return string
     */
    public function getBase() : string
    {
        return $this->base;
    }

    /**
     * @param string $base
     *
     * @return AssetPair
     */
    public function setBase(
        string $base
    ) : AssetPair {
        $this->base = $base;

        return $this;
    }

    /**
     * @return string
     */
    public function getAssetClassQuote() : string
    {
        return $this->assetClassQuote;
    }

    /**
     * @param string $assetClassQuote
     *
     * @return AssetPair
     */
    public function setAssetClassQuote(
        string $assetClassQuote
    ) : AssetPair {
        $this->assetClassQuote = $assetClassQuote;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuote() : string
    {
        return $this->quote;
    }

    /**
     * @param string $quote
     *
     * @return AssetPair
     */
    public function setQuote(
        string $quote
    ) : AssetPair {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return string
     */
    public function getLot() : string
    {
        return $this->lot;
    }

    /**
     * @param string $lot
     *
     * @return AssetPair
     */
    public function setLot(
        string $lot
    ) : AssetPair {
        $this->lot = $lot;

        return $this;
    }

    /**
     * @return int
     */
    public function getPairPrecision() : int
    {
        return $this->pairPrecision;
    }

    /**
     * @param int $pairPrecision
     *
     * @return AssetPair
     */
    public function setPairPrecision(
        int $pairPrecision
    ) : AssetPair {
        $this->pairPrecision = $pairPrecision;

        return $this;
    }

    /**
     * @return int
     */
    public function getLotPrecision() : int
    {
        return $this->lotPrecision;
    }

    /**
     * @param int $lotPrecision
     *
     * @return AssetPair
     */
    public function setLotPrecision(
        int $lotPrecision
    ) : AssetPair {
        $this->lotPrecision = $lotPrecision;

        return $this;
    }

    /**
     * @return int
     */
    public function getLotMultiplier() : int
    {
        return $this->lotMultiplier;
    }

    /**
     * @param int $lotMultiplier
     *
     * @return AssetPair
     */
    public function setLotMultiplier(
        int $lotMultiplier
    ) : AssetPair {
        $this->lotMultiplier = $lotMultiplier;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getLeverageBuy() : array
    {
        return $this->leverageBuy;
    }

    /**
     * @param int $leverageBuy
     *
     * @return AssetPair
     */
    public function addLeverageBuy(
        int $leverageBuy
    ) : AssetPair {
        $this->leverageBuy[] = $leverageBuy;

        return $this;
    }

    /**
     * @return int[]
     */
    public function getLeverageSell() : array
    {
        return $this->leverageSell;
    }

    /**
     * @param int $leverageSell
     *
     * @return AssetPair
     */
    public function addLeverageSell(
        int $leverageSell
    ) : AssetPair {
        $this->leverageSell[] = $leverageSell;

        return $this;
    }

    /**
     * @return FeeVolumeCollection
     */
    public function getFees() : FeeVolumeCollection
    {
        if (null === $this->fees) {
            $this->setFees(new FeeVolumeCollection);
        }
        return $this->fees;
    }

    /**
     * @param FeeVolumeCollection $fees
     *
     * @return AssetPair
     */
    public function setFees(
        FeeVolumeCollection $fees
    ) : AssetPair {
        $this->fees = $fees;

        return $this;
    }

    /**
     * @return FeeVolumeCollection
     */
    public function getFeesMaker() : FeeVolumeCollection
    {
        if (null === $this->feesMaker) {
            $this->setFeesMaker(new FeeVolumeCollection);
        }
        return $this->feesMaker;
    }

    /**
     * @param FeeVolumeCollection $feesMaker
     *
     * @return AssetPair
     */
    public function setFeesMaker(
        FeeVolumeCollection $feesMaker
    ) : AssetPair {
        $this->feesMaker = $feesMaker;

        return $this;
    }

    /**
     * @return string
     */
    public function getFeeVolumeCurrency() : string
    {
        return $this->feeVolumeCurrency;
    }

    /**
     * @param string $feeVolumeCurrency
     *
     * @return AssetPair
     */
    public function setFeeVolumeCurrency(
        string $feeVolumeCurrency
    ) : AssetPair {
        $this->feeVolumeCurrency = $feeVolumeCurrency;

        return $this;
    }

    /**
     * @return int
     */
    public function getMarginCall() : int
    {
        return $this->marginCall;
    }

    /**
     * @param int $marginCall
     *
     * @return AssetPair
     */
    public function setMarginCall(
        int $marginCall
    ) : AssetPair {
        $this->marginCall = $marginCall;

        return $this;
    }

    /**
     * @return int
     */
    public function getMarginStop() : int
    {
        return $this->marginStop;
    }

    /**
     * @param int $marginStop
     *
     * @return AssetPair
     */
    public function setMarginStop(
        int $marginStop
    ) : AssetPair {
        $this->marginStop = $marginStop;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('altname', $data)) {
            $this->setAlternateName($data['altname']);
        }

        if (array_key_exists('aclass_base', $data)) {
            $this->setAssetClassBase($data['aclass_base']);
        }

        if (array_key_exists('base', $data)) {
            $this->setBase($data['base']);
        }

        if (array_key_exists('aclass_quote', $data)) {
            $this->setAssetClassQuote($data['aclass_quote']);
        }

        if (array_key_exists('quote', $data)) {
            $this->setQuote($data['quote']);
        }

        if (array_key_exists('lot', $data)) {
            $this->setLot($data['lot']);
        }

        if (array_key_exists('pair_decimals', $data)) {
            $this->setPairPrecision($data['pair_decimals']);
        }

        if (array_key_exists('lot_decimals', $data)) {
            $this->setLotPrecision($data['lot_decimals']);
        }

        if (array_key_exists('lot_multiplier', $data)) {
            $this->setLotMultiplier($data['lot_multiplier']);
        }

        if (array_key_exists('leverage_buy', $data) &&
            is_array($data['leverage_buy'])
        ) {
            foreach($data['leverage_buy'] as $leverageBuy) {
                $this->addLeverageBuy($leverageBuy);
            }
        }

        if (array_key_exists('leverage_sell', $data) &&
            is_array($data['leverage_sell'])
        ) {
            foreach($data['leverage_sell'] as $leverageSell) {
                $this->addLeverageSell($leverageSell);
            }
        }

        if (array_key_exists('fees', $data) &&
            is_array($data['fees'])
        ) {
            foreach($data['fees'] as $fees) {
                if (!is_array($fees) ||
                    count($fees) !== 2
                ) {
                    $feeVolume = new FeeVolume;
                    $feeVolume
                        ->setVolume($fees[0])
                        ->setFee($fees[1]);
                    $this->getFees()->addFeeVolume($feeVolume);
                }
            }
        }

        if (array_key_exists('fees_maker', $data) &&
            is_array($data['fees_maker'])
        ) {
            foreach($data['fees_maker'] as $fees) {
                if (!is_array($fees) ||
                    count($fees) !== 2
                ) {
                    $feeVolume = new FeeVolume;
                    $feeVolume
                        ->setVolume($fees[0])
                        ->setFee($fees[1]);
                    $this->getFeesMaker()->addFeeVolume($feeVolume);
                }
            }
        }

        if (array_key_exists('fee_volume_currency', $data)) {
            $this->setFeeVolumeCurrency($data['fee_volume_currency']);
        }

        if (array_key_exists('margin_call', $data)) {
            $this->setMarginCall($data['margin_call']);
        }

        if (array_key_exists('margin_stop', $data)) {
            $this->setMarginStop($data['margin_stop']);
        }
    }
}