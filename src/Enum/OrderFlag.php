<?php

namespace Augwa\Kraken\Enum;

/**
 * Class OrderFlag
 * @package Augwa\Kraken\Enum
 */
class OrderFlag
{
    public const VOLUME_IN_QUOTE_CURRENCY = 'viqc'; // volume in quote currency (not available for leveraged orders)
    public const PREFER_FEE_IN_BASE_CURRENCY = 'fcib'; // prefer fee in base currency
    public const PREFER_FEE_IN_QUOTE_CURRENCY = 'fciq'; // prefer fee in quote currency
    public const NO_MARKET_PRICE_PROTECTION = 'nompp'; // no market price protection
    public const POST_ONLY_ORDER = 'post'; // post only order (available when ordertype = limit)
}