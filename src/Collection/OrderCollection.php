<?php

namespace Augwa\Kraken\Collection;

use Augwa\Kraken\Model\Order;

/**
 * Class OrderCollection
 * @package Augwa\Kraken\Collection
 */
class OrderCollection
    extends GenericCollection
{
    /**
     * @param Order $item
     *
     * @return OrderCollection
     */
    public function addOrder(
        Order $item
    ) : OrderCollection {
        return $this->addItem($item);
    }

    /**
     * @param string $index
     * @param Order $item
     *
     * @return OrderCollection
     */
    public function setOrder(
        string $index,
        Order $item
    ) : OrderCollection {
        return $this->setItem($index, $item);
    }

    /**
     * @return Order[]
     */
    public function getItems()
    {
        return parent::getItems();
    }

    /**
     * @return Order[]
     */
    public function getOrders()
    {
        return $this->getItems();
    }
}