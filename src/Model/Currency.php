<?php

namespace Augwa\Kraken\Model;

use Augwa\Kraken\Enum;

/**
 * Class Currency
 * @package Augwa\Kraken\Model
 */
class Currency
{
    /** @var string */
    private $name;

    /** @var string */
    private $code;

    /** @var string */
    private $tickerCode;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Currency
     */
    public function setName(
        string $name
    ) : Currency {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Currency
     */
    public function setCode(
        string $code
    ) : Currency {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getTickerCode() : string
    {
        return $this->tickerCode;
    }

    /**
     * @param string $tickerCode
     *
     * @return Currency
     */
    public function setTickerCode(
        string $tickerCode
    ) : Currency {
        $this->tickerCode = $tickerCode;

        return $this;
    }

    public function loadByCode(
        string $code
    ) {
        switch (strtoupper($code)) {
            case Enum\Asset::AUGUR:
            case Enum\AssetBalance::AUGUR:
                $this->setName('Augur');
                $this->setCode(Enum\AssetBalance::AUGUR);
                $this->setTickerCode(Enum\Asset::AUGUR);
                break;

            case Enum\Asset::BITCOIN:
            case Enum\AssetBalance::BITCOIN:
                $this->setName('Bitcoin');
                $this->setCode(Enum\AssetBalance::BITCOIN);
                $this->setTickerCode(Enum\Asset::BITCOIN);
                break;

            case Enum\Asset::BITCOIN_CASH:
            case Enum\AssetBalance::BITCOIN_CASH:
                $this->setName('Bitcoin Cash');
                $this->setCode(Enum\AssetBalance::BITCOIN_CASH);
                $this->setTickerCode(Enum\Asset::BITCOIN_CASH);
                break;

            case Enum\Asset::DASH:
            case Enum\AssetBalance::DASH:
                $this->setName('Dash');
                $this->setCode(Enum\AssetBalance::DASH);
                $this->setTickerCode(Enum\Asset::DASH);
                break;

            case Enum\Asset::DOGECOIN:
            case Enum\AssetBalance::DOGECOIN:
                $this->setName('Dogecoin');
                $this->setCode(Enum\AssetBalance::DOGECOIN);
                $this->setTickerCode(Enum\Asset::DOGECOIN);
                break;

            case Enum\Asset::EOS:
            case Enum\AssetBalance::EOS:
                $this->setName('EOS');
                $this->setCode(Enum\AssetBalance::EOS);
                $this->setTickerCode(Enum\Asset::EOS);
                break;

            case Enum\Asset::ETHER:
            case Enum\AssetBalance::ETHER:
                $this->setName('Ethereum');
                $this->setCode(Enum\AssetBalance::ETHER);
                $this->setTickerCode(Enum\Asset::ETHER);
                break;

            case Enum\Asset::ETHER_CLASSIC:
            case Enum\AssetBalance::ETHER_CLASSIC:
                $this->setName('Ethereum Classic');
                $this->setCode(Enum\AssetBalance::ETHER_CLASSIC);
                $this->setTickerCode(Enum\Asset::ETHER_CLASSIC);
                break;

            case Enum\Asset::GNOSIS:
            case Enum\AssetBalance::GNOSIS:
                $this->setName('Gnosis');
                $this->setCode(Enum\AssetBalance::GNOSIS);
                $this->setTickerCode(Enum\Asset::GNOSIS);
                break;

            case Enum\Asset::ICONOMI:
            case Enum\AssetBalance::ICONOMI:
                $this->setName('Iconomi');
                $this->setCode(Enum\AssetBalance::ICONOMI);
                $this->setTickerCode(Enum\Asset::ICONOMI);
                break;

            case Enum\Asset::LITECOIN:
            case Enum\AssetBalance::LITECOIN:
                $this->setName('Litecoin');
                $this->setCode(Enum\AssetBalance::LITECOIN);
                $this->setTickerCode(Enum\Asset::LITECOIN);
                break;

            case Enum\Asset::MELON:
            case Enum\AssetBalance::MELON:
                $this->setName('Melon');
                $this->setCode(Enum\AssetBalance::MELON);
                $this->setTickerCode(Enum\Asset::MELON);
                break;

            case Enum\Asset::MONERO:
            case Enum\AssetBalance::MONERO:
                $this->setName('Monero');
                $this->setCode(Enum\AssetBalance::MONERO);
                $this->setTickerCode(Enum\Asset::MONERO);
                break;

            case Enum\Asset::RIPPLE:
            case Enum\AssetBalance::RIPPLE:
                $this->setName('Ripple');
                $this->setCode(Enum\AssetBalance::RIPPLE);
                $this->setTickerCode(Enum\Asset::RIPPLE);
                break;

            case Enum\Asset::STELLAR_LUMEN:
            case Enum\AssetBalance::STELLAR_LUMEN:
                $this->setName('Stellar');
                $this->setCode(Enum\AssetBalance::STELLAR_LUMEN);
                $this->setTickerCode(Enum\Asset::STELLAR_LUMEN);
                break;

            case Enum\Asset::TETHER_USD:
            case Enum\AssetBalance::TETHER_USD:
                $this->setName('Tether USD');
                $this->setCode(Enum\AssetBalance::TETHER_USD);
                $this->setTickerCode(Enum\Asset::TETHER_USD);
                break;

            case Enum\Asset::ZCASH:
            case Enum\AssetBalance::ZCASH:
                $this->setName('ZCash');
                $this->setCode(Enum\AssetBalance::ZCASH);
                $this->setTickerCode(Enum\Asset::ZCASH);
                break;

            case Enum\Asset::CANADIAN_DOLLAR:
            case Enum\AssetBalance::CANADIAN_DOLLAR:
                $this->setName('Canadian Dollar');
                $this->setCode(Enum\AssetBalance::CANADIAN_DOLLAR);
                $this->setTickerCode(Enum\Asset::CANADIAN_DOLLAR);
                break;

            case Enum\Asset::EURO:
            case Enum\AssetBalance::EURO:
                $this->setName('Euro');
                $this->setCode(Enum\AssetBalance::EURO);
                $this->setTickerCode(Enum\Asset::EURO);
                break;

            case Enum\Asset::POUND_STERLING:
            case Enum\AssetBalance::POUND_STERLING:
                $this->setName('British Sterling Pound');
                $this->setCode(Enum\AssetBalance::POUND_STERLING);
                $this->setTickerCode(Enum\Asset::POUND_STERLING);
                break;

            case Enum\Asset::US_DOLLAR:
            case Enum\AssetBalance::US_DOLLAR:
                $this->setName('US Dollar');
                $this->setCode(Enum\AssetBalance::US_DOLLAR);
                $this->setTickerCode(Enum\Asset::US_DOLLAR);
                break;

            case Enum\Asset::YEN:
            case Enum\AssetBalance::YEN:
                $this->setName('Japanese Yen');
                $this->setCode(Enum\AssetBalance::YEN);
                $this->setTickerCode(Enum\Asset::YEN);
                break;
        }
    }
}