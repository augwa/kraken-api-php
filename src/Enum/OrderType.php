<?php

namespace Augwa\Kraken\Enum;

/**
 * Class OrderType
 * @package Augwa\Kraken\Enum
 */
class OrderType
{
    public const MARKET = 'market';
    public const LIMIT = 'limit';
    public const STOP_LOSS = 'stop-loss';
    public const TAKE_PROFIT = 'take-profit';
    public const STOP_LOSS_PROFIT = 'stop-loss-profit';
    public const STOP_LOSS_PROFIT_LIMIT = 'stop-loss-profit-limit';
    public const STOP_LOSS_LIMIT = 'stop-loss-limit';
    public const TAKE_PROFIT_LIMIT = 'take-profit-limit';
    public const TRAILING_STOP = 'trailing-stop';
    public const TRAILING_STOP_LIMIT = 'trailing-stop-limit';
    public const STOP_LOSS_AND_LIMIT = 'stop-loss-and-limit';
    public const SETTLE_POSITION = 'settle-position';
}