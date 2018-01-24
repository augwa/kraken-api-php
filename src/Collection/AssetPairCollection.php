<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\AssetPair;

/**
 * Class AssetPairCollection
 * @package Augwa\Kraken\Collection
 */
class AssetPairCollection
    extends GenericCollection
{
    /**
     * @param AssetPair $item
     *
     * @return AssetPairCollection
     */
    public function addAssetPair(
        AssetPair $item
    ) : AssetPairCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param AssetPair $item
     *
     * @return AssetPairCollection
     */
    public function setAssetPair(
        string $index,
        AssetPair $item
    ) : AssetPairCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return AssetPair[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return AssetPair[]
     */
    public function getAssetPairs()
    {
        return $this->getItems();
    }
}