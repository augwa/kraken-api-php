<?php

namespace Augwa\Kraken\Model;

use Augwa\Kraken\Collection\OHLCEntryCollection;

/**
 * Class OHLC
 * @package Augwa\Kraken\Model
 */
class OHLC
{
    /** @var OHLCEntryCollection */
    private $ohlcEntries;

    /** @var int */
    private $last;

    /**
     * @return OHLCEntryCollection
     */
    public function getOhlcEntries() : OHLCEntryCollection
    {
        if (null === $this->ohlcEntries) {
            $this->ohlcEntries = new OHLCEntryCollection;
        }
        return $this->ohlcEntries;
    }

    /**
     * @param OHLCEntryCollection $ohlcEntries
     *
     * @return OHLC
     */
    public function setOhlcEntries(
        OHLCEntryCollection $ohlcEntries
    ) : OHLC {
        $this->ohlcEntries = $ohlcEntries;

        return $this;
    }

    /**
     * @return int
     */
    public function getLast() : int
    {
        return $this->last;
    }

    /**
     * @param int $last
     *
     * @return OHLC
     */
    public function setLast(
        int $last
    ) : OHLC {
        $this->last = $last;

        return $this;
    }


    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('entries', $data)) {
            foreach($data['entries'] as $row) {
                $ohlc = new OHLCEntry;
                $ohlc->loadFromArray(
                    [
                        'time' => $row[0],
                        'open' => $row[1],
                        'high' => $row[2],
                        'low' => $row[3],
                        'close' => $row[4],
                        'vwap' => $row[5],
                        'volume' => $row[6],
                        'count' => $row[7],
                    ]
                );
                $this->getOhlcEntries()->addOHLCEntry($ohlc);
            }
        }

        if (array_key_exists('last', $data)) {
            $this->setLast($data['last']);
        }
    }
}