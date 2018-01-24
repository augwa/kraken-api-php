<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\OrderBookEntry;

/**
 * Class OrderBookEntryCollection
 * @package Augwa\Kraken\Collection
 */
class OrderBookEntryCollection
    extends GenericCollection
{
    /**
     * @param OrderBookEntry $item
     *
     * @return OrderBookEntryCollection
     */
    public function addOrderBookEntry(
        OrderBookEntry $item
    ) : OrderBookEntryCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param OrderBookEntry $item
     *
     * @return OrderBookEntryCollection
     */
    public function setOrderBookEntry(
        string $index,
        OrderBookEntry $item
    ) : OrderBookEntryCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return OrderBookEntry[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return OrderBookEntry[]
     */
    public function getOrderBookEntrys()
    {
        return $this->getItems();
    }
}