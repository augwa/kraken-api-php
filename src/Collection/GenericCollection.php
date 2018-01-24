<?php

namespace Augwa\Kraken\Collection;

/**
 * Class GenericCollection
 * @package Augwa\Kraken\Collection
 */
class GenericCollection
{
    /** @var array */
    private $items = [];

    /**
     * @param string $index
     *
     * @return bool
     */
    public function hasIndex(
        string $index
    ) : bool {
        return array_key_exists($index, $this->items);
    }

    /**
     * @param string $index
     *
     * @return mixed
     * @throws \Exception
     */
    public function getItem(
        string $index
    ) {
        if (!array_key_exists($index, $this->items)) {
            throw new \Exception('Unknown index: ' . $index);
        }
        return $this->items[$index];
    }

    /**
     * @param mixed $item
     *
     * @return mixed
     */
    public function addItem(
        $item
    ) {
        $this->items[] = $item;

        return $this;
    }

    /**
     * @param string $index
     * @param mixed $item
     *
     * @return mixed
     */
    public function setItem(
        string $index,
        $item
    ) {
        $this->items[$index] = $item;

        return $this;
    }

    /**
     * @param string $index
     *
     * @return mixed
     */
    public function deleteItem(
        string $index
    ) {
        if (array_key_exists($index, $this->items)) {
            unset($this->items[$index]);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getItems() {
        return $this->items;
    }

    /**
     * @param GenericCollection[] ...$collections
     */
    public function merge(
        GenericCollection ...$collections
    ) {
        foreach($collections as $collection) {
            $this->items = array_merge(
                $this->items,
                $collection->getItems()
            );
        }
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->items);
    }
}