<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\Asset;

/**
 * Class AssetCollection
 * @package Augwa\Kraken\Collection
 */
class AssetCollection
    extends GenericCollection
{
    /**
     * @param Asset $item
     *
     * @return AssetCollection
     */
    public function addAsset(
        Asset $item
    ) : AssetCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param Asset $item
     *
     * @return AssetCollection
     */
    public function setAsset(
        string $index,
        Asset $item
    ) : AssetCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return Asset[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return Asset[]
     */
    public function getAssets()
    {
        return $this->getItems();
    }
}