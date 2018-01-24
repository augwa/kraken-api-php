<?php

namespace Augwa\Kraken\Model;

/**
 * Class Asset
 * @package Augwa\Kraken\Model
 */
class Asset
{
    /** @var string */
    private $name;

    /** @var string */
    private $alternateName;

    /** @var string */
    private $assetClass;

    /** @var int */
    private $precision;

    /** @var int */
    private $displayPrecision;

    /**
     * @return string
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Asset
     */
    public function setName(
        string $name
    ) : Asset {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getAlternateName() : ?string
    {
        return $this->alternateName;
    }

    /**
     * @param string $alternateName
     *
     * @return Asset
     */
    public function setAlternateName(
        string $alternateName
    ) : Asset {
        $this->alternateName = $alternateName;

        return $this;
    }

    /**
     * @return string
     */
    public function getAssetClass() : ?string
    {
        return $this->assetClass;
    }

    /**
     * @param string $assetClass
     *
     * @return Asset
     */
    public function setAssetClass(
        string $assetClass
    ) : Asset {
        $this->assetClass = $assetClass;

        return $this;
    }

    /**
     * @return int
     */
    public function getPrecision() : ?int
    {
        return $this->precision;
    }

    /**
     * @param int $precision
     *
     * @return Asset
     */
    public function setPrecision(
        int $precision
    ) : Asset {
        $this->precision = $precision;

        return $this;
    }

    /**
     * @return int
     */
    public function getDisplayPrecision() : int
    {
        return $this->displayPrecision;
    }

    /**
     * @param int $displayPrecision
     *
     * @return Asset
     */
    public function setDisplayPrecision(
        int $displayPrecision
    ) : Asset {
        $this->displayPrecision = $displayPrecision;

        return $this;
    }

    /**
     * Asset constructor.
     *
     * @param array $data
     */
    public function __construct(
        array $data = []
    ) {
        $this->loadFromArray($data);
    }

    /**
     * @param array $data
     */
    public function loadFromArray(
        array $data
    ) {
        if (array_key_exists('name', $data)) {
            $this->setName($data['name']);
        }

        if (array_key_exists('altname', $data)) {
            $this->setAlternateName($data['altname']);
        }

        if (array_key_exists('aclass', $data)) {
            $this->setAssetClass($data['aclass']);
        }

        if (array_key_exists('decimals', $data)) {
            $this->setPrecision($data['decimals']);
        }

        if (array_key_exists('display_decimals', $data)) {
            $this->setDisplayPrecision($data['display_decimals']);
        }
    }
}