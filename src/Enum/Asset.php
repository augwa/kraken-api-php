<?php

namespace Augwa\Kraken\Enum;

/**
 * Class Asset
 * @package Augwa\Kraken\Enum
 */
class Asset
{
    /**
     * Crypto currencies
     */
    public const AUGUR = 'REP';
    public const BITCOIN = 'XBT';
    public const BITCOIN_CASH = 'BCH';
    public const DASH = 'DASH';
    public const DOGECOIN = 'XDG';
    public const EOS = 'EOS';
    public const ETHER = 'ETH';
    public const ETHER_CLASSIC = 'ETC';
    public const GNOSIS = 'GNO';
    public const ICONOMI = 'ICN';
    public const LITECOIN = 'LTC';
    public const MELON = 'MLN';
    public const MONERO = 'XMR';
    public const RIPPLE = 'XRP';
    public const STELLAR_LUMEN = 'XLM';
    public const TETHER_USD = 'USDT';
    public const ZCASH = 'ZEC';

    /**
     * Fiat currencies
     */
    public const CANADIAN_DOLLAR = 'CAD';
    public const EURO = 'EUR';
    public const POUND_STERLING = 'GBP';
    public const US_DOLLAR = 'USD';
    public const YEN = 'JPY';
}