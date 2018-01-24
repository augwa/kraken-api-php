<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\Balance;

/**
 * Class BalanceCollection
 * @package Augwa\Kraken\Collection
 */
class BalanceCollection
    extends GenericCollection
{
    /**
     * @param Balance $item
     *
     * @return BalanceCollection
     */
    public function addBalance(
        Balance $item
    ) : BalanceCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param Balance $item
     *
     * @return BalanceCollection
     */
    public function setBalance(
        string $index,
        Balance $item
    ) : BalanceCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return Balance[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return Balance[]
     */
    public function getBalances()
    {
        return $this->getItems();
    }
}