<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\OHLCEntry;

/**
 * Class OHLCEntryCollection
 * @package Augwa\Kraken\Collection
 */
class OHLCEntryCollection
    extends GenericCollection
{
    /**
     * @param OHLCEntry $item
     *
     * @return OHLCEntryCollection
     */
    public function addOHLCEntry(
        OHLCEntry $item
    ) : OHLCEntryCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param OHLCEntry $item
     *
     * @return OHLCEntryCollection
     */
    public function setOHLCEntry(
        string $index,
        OHLCEntry $item
    ) : OHLCEntryCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return OHLCEntry[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return OHLCEntry[]
     */
    public function getOHLCs()
    {
        return $this->getItems();
    }
}