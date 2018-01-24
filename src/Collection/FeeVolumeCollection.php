<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\FeeVolume;

/**
 * Class FeeVolumeCollection
 * @package Augwa\Kraken\Collection
 */
class FeeVolumeCollection
    extends GenericCollection
{
    /**
     * @param FeeVolume $item
     *
     * @return FeeVolumeCollection
     */
    public function addFeeVolume(
        FeeVolume $item
    ) : FeeVolumeCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param FeeVolume $item
     *
     * @return FeeVolumeCollection
     */
    public function setFeeVolume(
        string $index,
        FeeVolume $item
    ) : FeeVolumeCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return FeeVolume[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    public function getFeeVolumes()
    {
        return $this->getItems();
    }
}