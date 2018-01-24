<?php

namespace Augwa\Kraken\Model;

/**
 * Class TradeBalance
 * @package Augwa\Kraken\Model
 */
class TradeBalance
{
    /** @var float */
    private $equivalentBalance;

    /** @var float */
    private $tradeBalance;

    /** @var float */
    private $marginOpen;

    /** @var float */
    private $unrealizedPositions;

    /** @var float */
    private $costBasisOfPositions;

    /** @var float */
    private $currentFloatingValuationOfPositions;

    /** @var float */
    private $equity;

    /** @var float */
    private $freeMargin;

    /** @var float */
    private $marginLevel;

    /**
     * @return float
     */
    public function getEquivalentBalance() : float
    {
        return $this->equivalentBalance;
    }

    /**
     * @param float $equivalentBalance
     *
     * @return TradeBalance
     */
    public function setEquivalentBalance(
        float $equivalentBalance
    ) : TradeBalance {
        $this->equivalentBalance = $equivalentBalance;

        return $this;
    }

    /**
     * @return float
     */
    public function getTradeBalance() : float
    {
        return $this->tradeBalance;
    }

    /**
     * @param float $tradeBalance
     *
     * @return TradeBalance
     */
    public function setTradeBalance(
        float $tradeBalance
    ) : TradeBalance {
        $this->tradeBalance = $tradeBalance;

        return $this;
    }

    /**
     * @return float
     */
    public function getMarginOpen() : float
    {
        return $this->marginOpen;
    }

    /**
     * @param float $marginOpen
     *
     * @return TradeBalance
     */
    public function setMarginOpen(
        float $marginOpen
    ) : TradeBalance {
        $this->marginOpen = $marginOpen;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnrealizedPositions() : float
    {
        return $this->unrealizedPositions;
    }

    /**
     * @param float $unrealizedPositions
     *
     * @return TradeBalance
     */
    public function setUnrealizedPositions(
        float $unrealizedPositions
    ) : TradeBalance {
        $this->unrealizedPositions = $unrealizedPositions;

        return $this;
    }

    /**
     * @return float
     */
    public function getCostBasisOfPositions() : float
    {
        return $this->costBasisOfPositions;
    }

    /**
     * @param float $costBasisOfPositions
     *
     * @return TradeBalance
     */
    public function setCostBasisOfPositions(
        float $costBasisOfPositions
    ) : TradeBalance {
        $this->costBasisOfPositions = $costBasisOfPositions;

        return $this;
    }

    /**
     * @return float
     */
    public function getCurrentFloatingValuationOfPositions() : float
    {
        return $this->currentFloatingValuationOfPositions;
    }

    /**
     * @param float $currentFloatingValuationOfPositions
     *
     * @return TradeBalance
     */
    public function setCurrentFloatingValuationOfPositions(
        float $currentFloatingValuationOfPositions
    ) : TradeBalance {
        $this->currentFloatingValuationOfPositions = $currentFloatingValuationOfPositions;

        return $this;
    }

    /**
     * @return float
     */
    public function getEquity() : float
    {
        return $this->equity;
    }

    /**
     * @param float $equity
     *
     * @return TradeBalance
     */
    public function setEquity(
        float $equity
    ) : TradeBalance {
        $this->equity = $equity;

        return $this;
    }

    /**
     * @return float
     */
    public function getFreeMargin() : float
    {
        return $this->freeMargin;
    }

    /**
     * @param float $freeMargin
     *
     * @return TradeBalance
     */
    public function setFreeMargin(
        float $freeMargin
    ) : TradeBalance {
        $this->freeMargin = $freeMargin;

        return $this;
    }

    /**
     * @return float
     */
    public function getMarginLevel() : float
    {
        return $this->marginLevel;
    }

    /**
     * @param float $marginLevel
     *
     * @return TradeBalance
     */
    public function setMarginLevel(
        float $marginLevel
    ) : TradeBalance {
        $this->marginLevel = $marginLevel;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        // equivalent balance (combined balance of all currencies)
        if (array_key_exists('eb', $data)) {
            $this->setEquivalentBalance($data['eb']);
        }

        // trade balance (combined balance of all equity currencies)
        if (array_key_exists('tb', $data)) {
            $this->setTradeBalance($data['tb']);
        }

        // margin amount of open positions
        if (array_key_exists('m', $data)) {
            $this->setMarginOpen($data['m']);
        }

        // unrealized net profit/loss of open positions
        if (array_key_exists('n', $data)) {
            $this->setUnrealizedPositions($data['n']);
        }

        // cost basis of open positions
        if (array_key_exists('c', $data)) {
            $this->setCostBasisOfPositions($data['c']);
        }

        // current floating valuation of open positions
        if (array_key_exists('v', $data)) {
            $this->setCurrentFloatingValuationOfPositions($data['v']);
        }

        // equity = trade balance + unrealized net profit/loss
        if (array_key_exists('e', $data)) {
            $this->setEquity($data['e']);
        }

        // free margin = equity - initial margin (maximum margin available to open new positions)
        if (array_key_exists('mf', $data)) {
            $this->setFreeMargin($data['mf']);
        }

        // margin level = (equity / initial margin) * 100
        if (array_key_exists('ml', $data)) {
            $this->setMarginLevel($data['ml']);
        }
    }
}