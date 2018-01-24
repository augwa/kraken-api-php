<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\DetailedTradeEntry;

/**
 * Class DetailedTradeEntryCollection
 * @package Augwa\Kraken\Collection
 */
class DetailedTradeEntryCollection
    extends GenericCollection
{
    /**
     * @param DetailedTradeEntry $item
     *
     * @return DetailedTradeEntryCollection
     */
    public function addDetailedTradeEntry(
        DetailedTradeEntry $item
    ) : DetailedTradeEntryCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param DetailedTradeEntry $item
     *
     * @return DetailedTradeEntryCollection
     */
    public function setDetailedTradeEntry(
        string $index,
        DetailedTradeEntry $item
    ) : DetailedTradeEntryCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return DetailedTradeEntry[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @param string $index
     *
     * @return DetailedTradeEntry
     */
    public function getItem(
        string $index
    ) : DetailedTradeEntry {
        return parent::getItem($index);
    }

    public function getDetailedTradeEntries()
    {
        return $this->getItems();
    }
}