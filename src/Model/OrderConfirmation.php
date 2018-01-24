<?php

namespace Augwa\Kraken\Model;

/**
 * Class OrderConfirmation
 * @package Augwa\Kraken\Model
 */
class OrderConfirmation
{
    /** @var string */
    private $orderDescription;

    /** @var string */
    private $closeDetails;

    /** @var string[] */
    private $transactionIds = [];

    /**
     * @return string
     */
    public function getOrderDescription() : string
    {
        return $this->orderDescription;
    }

    /**
     * @param string $orderDescription
     *
     * @return OrderConfirmation
     */
    public function setOrderDescription(
        string $orderDescription
    ) : OrderConfirmation {
        $this->orderDescription = $orderDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getCloseDetails() : string
    {
        return $this->closeDetails;
    }

    /**
     * @param string $closeDetails
     *
     * @return OrderConfirmation
     */
    public function setCloseDetails(
        string $closeDetails
    ) : OrderConfirmation {
        $this->closeDetails = $closeDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId() : ?string
    {
        return $this->transactionIds;
    }

    /**
     * @param string $transactionId
     *
     * @return OrderConfirmation
     */
    public function setTransactionId(
        string $transactionId
    ) : OrderConfirmation {
        $this->transactionIds = $transactionId;

        return $this;
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('descr', $data) &&
            array_key_exists('order', $data['descr'])
        ) {
            $this->setOrderDescription($data['descr']['order']);
        }

        if (array_key_exists('descr', $data) &&
            array_key_exists('close', $data['descr'])
        ) {
            $this->setCloseDetails($data['descr']['close']);
        }

        if (array_key_exists('txid', $data) &&
            is_array($data['txid'])
        ) {
            $this->setTransactionId($data['txid'][0]);
        }
    }
}