<?php

namespace Augwa\Kraken\Model;

use Augwa\Kraken\Collection\DetailedTradeEntryCollection;

/**
 * Class Trades
 * @package Augwa\Kraken\Model
 */
class Trades
{
    /** @var DetailedTradeEntryCollection */
    private $trades;

    /** @var string */
    private $lastId;

    /**
     * @return DetailedTradeEntryCollection
     */
    public function getTrades() : DetailedTradeEntryCollection
    {
        if (null === $this->trades) {
            $this->setTrades(new DetailedTradeEntryCollection);
        }
        return $this->trades;
    }

    /**
     * @param DetailedTradeEntryCollection $trades
     *
     * @return Trades
     */
    public function setTrades(
        DetailedTradeEntryCollection $trades
    ) : Trades {
        $this->trades = $trades;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastId() : string
    {
        return $this->lastId;
    }

    /**
     * @param string $lastId
     *
     * @return Trades
     */
    public function setLastId(
        string $lastId
    ) : Trades {
        $this->lastId = $lastId;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('trades', $data)) {
            foreach($data['trades'] as $trade) {
                $tradeEntry = new DetailedTradeEntry;
                $tradeEntry->loadFromArray(
                    [
                        'price' => $trade[0],
                        'volume' => $trade[1],
                        'timestamp' => $trade[2],
                        'action' => $trade[3] === 'b' ? 'buy' : 'sell',
                        'type' => $trade[4] === 'l' ? 'limit' : 'market',
                        'misc' => $trade[5],
                    ]
                );
                $this->getTrades()->addDetailedTradeEntry($tradeEntry);
            }
        }

        if (array_key_exists('last', $data)) {
            $this->setLastId($data['last']);
        }
    }
}