<?php

namespace Augwa\Kraken\Model;

use Augwa\Kraken\Collection\OrderBookEntryCollection;

/**
 * Class OrderBook
 * @package Augwa\Kraken\Model
 */
class OrderBook
{
    /** @var OrderBookEntryCollection */
    private $asks;

    /** @var OrderBookEntryCollection */
    private $bids;

    /**
     * @return OrderBookEntryCollection
     */
    public function getAsks() : OrderBookEntryCollection
    {
        if (null === $this->asks) {
            $this->setAsks(new OrderBookEntryCollection);
        }
        return $this->asks;
    }

    /**
     * @param OrderBookEntryCollection $asks
     *
     * @return OrderBook
     */
    public function setAsks(
        OrderBookEntryCollection $asks
    ) : OrderBook {
        $this->asks = $asks;

        return $this;
    }

    /**
     * @return OrderBookEntryCollection
     */
    public function getBids() : OrderBookEntryCollection
    {
        if (null === $this->bids) {
            $this->setBids(new OrderBookEntryCollection);
        }
        return $this->bids;
    }

    /**
     * @param OrderBookEntryCollection $bids
     *
     * @return OrderBook
     */
    public function setBids(
        OrderBookEntryCollection $bids
    ) : OrderBook {
        $this->bids = $bids;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('asks', $data) &&
            is_array($data['asks'])
        ) {
            foreach($data['asks'] as $ask) {
                $askEntry = new OrderBookEntry;
                $askEntry
                    ->setPrice($ask[0])
                    ->setVolume($ask[1])
                    ->setTimestamp($ask[2]);
                $this->getAsks()->addOrderBookEntry($askEntry);
            }
        }

        if (array_key_exists('bids', $data) &&
            is_array($data['bids'])
        ) {
            foreach($data['bids'] as $bid) {
                $bidEntry = new OrderBookEntry;
                $bidEntry
                    ->setPrice($bid[0])
                    ->setVolume($bid[1])
                    ->setTimestamp($bid[2]);
                $this->getBids()->addOrderBookEntry($bidEntry);
            }
        }
    }
}