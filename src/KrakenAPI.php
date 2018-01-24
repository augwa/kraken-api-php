<?php

namespace Augwa\Kraken;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;

use Augwa\Kraken\Enum;
use Augwa\Kraken\Collection;
use Augwa\Kraken\Model;

/**
 * Class KrakenAPI
 * @package Augwa\Kraken
 */
class KrakenAPI
{
    /** @var GuzzleClient */
    private $client;

    /** @var string */
    private $baseUrl;

    /** @var string */
    private $apiKey;

    /** @var string */
    private $secretKey;

    /** @var string */
    private $version;

    /** @var bool */
    private $verifySsl;

    /** @var float */
    private $requestTimeout;

    /**
     * @return GuzzleClient
     */
    private function getClient() : GuzzleClient
    {
        if (null === $this->client) {
            $this->setClient(
                new GuzzleClient(
                    [
                        'base_uri' => $this->getBaseUrl(),
                        RequestOptions::VERIFY => $this->isVerifySsl(),
                        RequestOptions::TIMEOUT => $this->getRequestTimeout()
                    ]
                )
            );
        }

        return $this->client;
    }

    /**
     * @param GuzzleClient $client
     *
     * @return KrakenAPI
     */
    private function setClient(
        GuzzleClient $client
    ) : KrakenAPI {
        $this->client = $client;

        return $this;
    }

    /**
     * @return KrakenAPI
     */
    private function resetClient() {
        $this->client = null;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl() : string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     *
     * @return KrakenAPI
     */
    public function setBaseUrl(
        string $baseUrl
    ) : KrakenAPI {
        $this->baseUrl = $baseUrl;
        $this->resetClient();

        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey() : string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     *
     * @return KrakenAPI
     */
    public function setApiKey(
        string $apiKey
    ) : KrakenAPI {
        $this->apiKey = $apiKey;
        $this->resetClient();

        return $this;
    }

    /**
     * @return string
     */
    public function getSecretKey() : string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     *
     * @return KrakenAPI
     */
    public function setSecretKey(
        string $secretKey
    ) : KrakenAPI {
        $this->secretKey = $secretKey;
        $this->resetClient();

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion() : string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return KrakenAPI
     */
    public function setVersion(
        string $version
    ) : KrakenAPI {
        $this->version = $version;
        $this->resetClient();

        return $this;
    }

    /**
     * @return bool
     */
    public function isVerifySsl() : bool
    {
        return $this->verifySsl;
    }

    /**
     * @param bool $verifySsl
     *
     * @return KrakenAPI
     */
    public function setVerifySsl(
        bool $verifySsl
    ) : KrakenAPI {
        $this->verifySsl = $verifySsl;
        $this->resetClient();

        return $this;
    }

    /**
     * @return int
     */
    public function getRequestTimeout() : int
    {
        return $this->requestTimeout;
    }

    /**
     * @param int $requestTimeout
     *
     * @return KrakenAPI
     */
    public function setRequestTimeout(
        int $requestTimeout
    ) : KrakenAPI {
        $this->requestTimeout = $requestTimeout;

        return $this;
    }

    /**
     * KrakenAPI constructor.
     *
     * @param null|string $apiKey
     * @param null|string $secretKey
     * @param string $baseUrl
     * @param string $version
     * @param bool $verifySsl
     * @param float $requestTimeout
     */
    public function __construct(
        ?string $apiKey,
        ?string $secretKey,
        string $baseUrl = 'https://api.kraken.com',
        string $version = '0',
        bool $verifySsl = true,
        float $requestTimeout = 30.0
    ) {
        if ($apiKey) {
            $this->setApiKey($apiKey);
        }

        if ($secretKey) {
            $this->setSecretKey($secretKey);
        }

        $this
            ->setBaseUrl($baseUrl)
            ->setVersion($version)
            ->setVerifySsl($verifySsl)
            ->setRequestTimeout($requestTimeout);
    }

    /**
     * Get server timestamp
     *
     * @return \DateTime
     * @throws \Exception
     */
    public function time() : \DateTime
    {
        $response = $this->publicApi(
            '/Time'
        );

        if (!array_key_exists('unixtime', $response)
        ) {
            throw new \Exception('Unexpected response received');
        }

        return \DateTime::createFromFormat('U', $response['unixtime']);
    }

    /**
     * Get all asset info
     *
     * @return Collection\AssetCollection
     */
    public function allAssetInfo() : Collection\AssetCollection
    {
        $response = $this->publicApi('/Assets');

        $assetCollection = new Collection\AssetCollection;

        foreach($response as $currencyCode => $row) {
            $asset = new Model\Asset;
            $asset->loadFromArray(
                array_merge(
                    ['name' => $currencyCode],
                    $row
                )
            );
            $assetCollection->addAsset($asset);
        }

        return $assetCollection;
    }

    /**
     * Get asset info
     *
     * @param null|string $assetCode default (null) gives all assets
     *
     * @return Model\Asset
     */
    public function assetInfo(
        string $assetCode = null
    ) : ?Model\Asset {
        $response = $this->publicApi(
            '/Assets',
            ['asset' => $assetCode]
        );

        if (!array_key_exists($assetCode, $response)) {
            return null;
        }

        $asset = new Model\Asset;
        $asset->loadFromArray(
            array_merge(
                ['name' => $assetCode],
                $response[$assetCode]
            )
        );

        return $asset;
    }

    /**
     * @param string $pair
     * @param string $info
     *
     * @return Model\AssetPair
     */
    public function assetPair(
        string $pair,
        $info = Enum\AssetPairInfo::INFO
    ) : ?Model\AssetPair {
        $response = $this->publicApi(
            '/AssetPairs',
            [
                'info' => $info,
                'pair' => $pair
            ]
        );

        if (!is_array($response) ||
            count($response) === 0
        ) {
            return null;
        }

        $assetPair = new Model\AssetPair;
        $assetPair->loadFromArray(array_values($response)[0]);

        return $assetPair;
    }

    /**
     * @param string $pair
     *
     * @return Model\Ticker|null
     */
    public function ticker(
        string $pair
    ) : ?Model\Ticker {
        $response = $this->publicApi(
            '/Ticker',
            [
                'pair' => $pair
            ]
        );

        if (!is_array($response) ||
            count($response) === 0
        ) {
            return null;
        }

        $ticker = new Model\Ticker;
        $ticker->loadFromArray(array_values($response)[0]);

        return $ticker;
    }

    /**
     * @param string $pair
     * @param int|null $count
     *
     * @return Model\OrderBook|null
     */
    public function orderBook(
        string $pair,
        ?int $count = null
    ) : ?Model\OrderBook {
        $params = [
            'pair' => $pair
        ];

        if (null !== $count) {
            $params['count'] = $count;
        }

        $response = $this->publicApi('/Depth', $params);

        if (!is_array($response) ||
            count($response) === 0
        ) {
            return null;
        }

        $orderBook = new Model\OrderBook;
        $orderBook->loadFromArray(array_values($response)[0]);

        return $orderBook;
    }

    /**
     * @param string $pair
     * @param string $since
     *
     * @return Model\Trades
     */
    public function trades(
        string $pair,
        ?string $since = null
    ) : Model\Trades {
        $params = [
            'pair' => $pair
        ];

        if (null !== $since) {
            $params['since'] = $since;
        }

        $response = $this->publicApi('/Trades', $params);

        if (!is_array($response) ||
            count($response) === 0
        ) {
            return null;
        }

        $trades = new Model\Trades;
        $trades->loadFromArray(
            [
                'trades' => array_values($response)[0],
                'last' => $response['last']
            ]
        );

        return $trades;
    }

    /**
     * @param string $assetCode
     *
     * @return Model\TradeBalance
     */
    public function tradeBalance(
        string $assetCode = Enum\AssetBalance::US_DOLLAR
    ) : Model\TradeBalance {
        $response = $this->privateApi(
            '/TradeBalance',
            [
                'asset' => $assetCode
            ]
        );

        if (!is_array($response)) {
            return null;
        }

        $tradeBalance = new Model\TradeBalance;
        $tradeBalance->loadFromArray($response);

        return $tradeBalance;
    }

    /**
     * @return Collection\BalanceCollection
     */
    public function balance() : Collection\BalanceCollection
    {
        $response = $this->privateApi('/Balance', []);

        if (!is_array($response)) {
            return null;
        }

        $balanceCollection = new Collection\BalanceCollection;
        foreach($response as $currencyCode => $amount) {
            $balance = new Model\Balance;
            $balance
                ->loadFromArray(
                    [
                        'currencyCode' => $currencyCode,
                        'amount' => $amount
                    ]
                );
            $balanceCollection->setBalance($currencyCode, $balance);
        }

        return $balanceCollection;
    }

    /**
     * @param bool $includeTrades
     * @param string|null $userReferenceId
     *
     * @return null
     */
    public function openOrders(
        bool $includeTrades = false,
        string $userReferenceId = null
    ) {
        $params = [
            'trades' => $includeTrades
        ];

        if ($userReferenceId) {
            $params['userref'] = $userReferenceId;
        }

        $response = $this->privateApi('/OpenOrders', $params);

        if (!is_array($response)) {
            return null;
        }

        var_dump($response); exit;
    }

    /**
     * @param string $pair [required] asset currency pair
     * @param string $action [required] type of order @see \Augwa\Enum\Action
     * @param string $orderType [required] order type @see \Augwa\Enum\OrderType
     * @param float $volume [required] order volume in lots
     * @param float $price [conditionally required] price, meaning dependent on $orderType
     * @param float $price2 [conditionally required] price, meaning dependent on $orderType
     * @param int $leverage [optional] amount of leverage desired (default: none)
     * @param string[] $orderFlags [optional] list of order flags (default: none)
     * @param \DateTime $startTime [optional] earliest time order can be filled (default: now)
     * @param \DateTime $expireTime [optional] time order will expire (default: never)
     * @param int $referenceId [optional] user reference id, signed 32-bit integer
     * @param string $closeOrderType [optional] closing order type to add to system when order gets filled, order type @see \Augwa\Enum\Action
     * @param float $closePrice [conditionally required] meaning dependent on $closeOrderType
     * @param float $closePrice2 [conditionally required] meaning dependent on $closeOrderType
     * @param bool $validateOnly [optional] validate inputs only, do not submit order (default: false}
     *
     * @return Model\OrderConfirmation
     *
     * @throws \Exception
     */
    public function addOrder(
        string $pair,
        string $action,
        string $orderType,
        float $volume,
        ?float $price = null,
        ?float $price2 = null,
        ?int $leverage = null,
        ?array $orderFlags = [],
        \DateTime $startTime = null,
        \DateTime $expireTime = null,
        ?int $referenceId = null,
        ?string $closeOrderType = null,
        ?float $closePrice = null,
        ?float $closePrice2 = null,
        ?bool $validateOnly = false
    ) : Model\OrderConfirmation {
        $params = [];

        /**
         * PAIR
         */
        $params['pair'] = $pair;

        /**
         * TYPE
         */
        $validTypes = [
            Enum\Action::BUY,
            Enum\Action::SELL,
        ];

        $action = strtolower($action);
        if (!in_array($action, $validTypes)) {
            throw new \Exception(
                sprintf(
                    'Invalid type %s; valid values are: %s',
                    $action,
                    implode(', ', $validTypes)
                )
            );
        }
        $params['type'] = $action;

        /**
         * ORDER TYPE, PRICE, PRICE2
         */
        $this->processOrderType(
            $orderType,
            $price,
            $price2,
            'price',
            'price2',
            $params
        );
        $params['ordertype'] = $orderType;

        /**
         * VOLUME
         */
        $params['volume'] = $volume;

        /**
         * LEVERAGE
         */
        if (null !== $leverage) {
            $params['leverage'] = $leverage;
        }

        /**
         * ORDER FLAGS
         */
        $validOrderFlags = [
            Enum\OrderFlag::VOLUME_IN_QUOTE_CURRENCY,
            Enum\OrderFlag::PREFER_FEE_IN_BASE_CURRENCY,
            Enum\OrderFlag::PREFER_FEE_IN_QUOTE_CURRENCY,
            Enum\OrderFlag::NO_MARKET_PRICE_PROTECTION,
            Enum\OrderFlag::POST_ONLY_ORDER,
        ];

        if ($orderFlags) {
            foreach($orderFlags as $orderFlag) {
                if (!is_string($orderFlag)) {
                    throw new \Exception('Invalid data detected in order flags');
                }
                if (!in_array($orderFlag, $validOrderFlags)) {
                    throw new \Exception(
                        sprintf(
                            'Invalid order flag %s; valid values are: %s',
                            $orderFlag,
                            implode(', ', $validOrderFlags)
                        )
                    );
                }
            }
            $params['oflags'] = implode(',', $orderFlags);
        }

        /**
         * START TIME
         */
        if ($startTime) {
            if ($startTime->getTimestamp() < time()) {
                throw new \Exception('Start time must be a future date');
            }
// this might be bugged, need to investigate
//            $params['starttm'] = sprintf(
//                '+%d',
//                $startTime->getTimestamp() - time()
//            );
            $params['starttm'] = $startTime->getTimestamp();
        }

        /**
         * END TIME
         */
        if ($expireTime) {
            if ($expireTime->getTimestamp() < time()) {
                throw new \Exception('Expire time must be a future date');
            }
// this might be bugged, need to investigate
//            $params['expiretm'] = sprintf(
//                '+%d',
//                $expireTime->getTimestamp() - time()
//            );
            $params['expiretm'] = $expireTime->getTimestamp();
        }

        /**
         * USER REFERENCE ID
         */
        if ($referenceId) {
            if (abs($referenceId) > 2**31) {
                throw new \Exception('Reference Id must be a signed 32-bit integer');
            }
            $params['userref'] = $referenceId;
        }

        /**
         * CLOSING ORDER TYPE, PRICE, PRICE2
         */
        if ($closeOrderType) {
            $this->processOrderType(
                $closeOrderType,
                $closePrice,
                $closePrice2,
                'close[price]',
                'close[price2]',
                $params
            );
            $params['close[ordertype'] = $closeOrderType;
        }

        /**
         * VALIDATE
         */
        $params['validate'] = $validateOnly ? 1 : 0;

        $response =  $this->privateApi('/AddOrder', $params);

        $orderConfirmation = new Model\OrderConfirmation;
        $orderConfirmation->loadFromArray($response);

        return $orderConfirmation;
    }

    /**
     * @param string $transactionId
     *
     * @return array|null
     */
    public function orderCancel(
        string $transactionId
    ) {
        $params = [];

        $params['txid'] = $transactionId;

        $response = $this->privateApi(
            '/CancelOrder',
            $params
        );

        return $response;
    }

    /**
     * @param string $pair
     * @param int $interval
     * @param null|string $since
     *
     * @return Model\OHLC
     */
    public function OHLC(
        string $pair,
        int $interval = 1,
        ?string $since = null
    ) : Model\OHLC {
        $params = [];

        $params['pair'] = $pair;
        $params['interval'] = $interval;
        if ($since) {
            $params['since'] = $since;
        }

        $response = $this->publicApi('/OHLC', $params);

        $data = array_values($response);

        $ohlc = new Model\OHLC;
        $ohlc->loadFromArray(
            [
                'entries' => $data[0],
                'last' => $data[1]
            ]
        );

        return $ohlc;
    }

    /**
     * @param $orderType
     * @param float|null $price1
     * @param float|null $price2
     * @param null|string $priceField1
     * @param null|string $priceField2
     * @param array $params
     *
     * @throws \Exception
     */
    private function processOrderType(
        $orderType,
        ?float $price1 = null,
        ?float $price2 = null,
        ?string $priceField1 = '',
        ?string $priceField2 = '',
        array &$params
    ) {
        $validOrderTypes = [
            Enum\OrderType::MARKET,
            Enum\OrderType::LIMIT,
            Enum\OrderType::STOP_LOSS,
            Enum\OrderType::TAKE_PROFIT,
            Enum\OrderType::STOP_LOSS_PROFIT,
            Enum\OrderType::STOP_LOSS_PROFIT_LIMIT,
            Enum\OrderType::STOP_LOSS_LIMIT,
            Enum\OrderType::TAKE_PROFIT_LIMIT,
            Enum\OrderType::TRAILING_STOP,
            Enum\OrderType::TRAILING_STOP_LIMIT,
            Enum\OrderType::STOP_LOSS_AND_LIMIT,
            Enum\OrderType::SETTLE_POSITION,
        ];

        switch($orderType) {
            /**
             * Expects no $price or $price2
             */
            case Enum\OrderType::MARKET:
            case Enum\OrderType::SETTLE_POSITION:
                if (null !== $price1) {
                    throw new \Exception("$priceField1 must not be set");
                }
                if (null !== $price2) {
                    throw new \Exception("$priceField2 must not be set");
                }
                break;

            /**
             * Expects $price
             *
             * price = limit price
             * price = stop loss price
             * price = take profit price
             * price = trailing stop offset
             */
            case Enum\OrderType::LIMIT:
            case Enum\OrderType::STOP_LOSS: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::TAKE_PROFIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::TRAILING_STOP: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
                if (null === $price1) {
                    throw new \Exception("$priceField1 must be set");
                }
                if (null !== $price2) {
                    throw new \Exception("$priceField2 must not be set");
                }
                $params[$priceField1] = $price1;
                break;

            /**
             * Expects $price and $price2
             *
             * price = stop loss price, price2 = take profit price
             * price = stop loss price, price2 = take profit price
             * price = stop loss trigger price, price2 = triggered limit price
             * price = take profit trigger price, price2 = triggered limit price
             * price = trailing stop offset, price2 = triggered limit offset
             * price = stop loss price, price2 = limit price
             */
            case Enum\OrderType::STOP_LOSS_PROFIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::STOP_LOSS_PROFIT_LIMIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::STOP_LOSS_LIMIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::TAKE_PROFIT_LIMIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::TRAILING_STOP_LIMIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
            case Enum\OrderType::STOP_LOSS_AND_LIMIT: // unavailable, @see https://blog.kraken.com/post/1234/announcement-delisting-pairs-and-temporary-suspension-of-advanced-order-types/
                if (null === $price1) {
                    throw new \Exception("$priceField1 must be set");
                }
                if (null === $price2) {
                    throw new \Exception("$priceField2 must be set");
                }
                $params[$priceField1] = $price1;
                $params[$priceField2] = $price2;
                break;

            default:
                throw new \Exception(
                    sprintf(
                        'Invalid order type %s; valid values are: %s',
                        $orderType,
                        implode(', ', $validOrderTypes)
                    )
                );
        }
    }

    /**
     * @param array $transactionIds array of transaction ids to query info about (20 maximum)
     * @param int|null $referenceId restrict results to given user reference id (optional)
     * @param bool $includeTrades whether or not to include trades in output (default = false)
     *
     * @return Collection\OrderCollection
     *
     * @throws \Exception
     */
    public function orderInfo(
        array $transactionIds,
        ?int $referenceId = null,
        bool $includeTrades = false
    ) : Collection\OrderCollection {
        if (count($transactionIds) > 20) {
            throw new \Exception('Can only query 20 transactions at once');
        }

        if (!$transactionIds) {
            throw new \Exception('Must include at least once transaction');
        }

        foreach($transactionIds as $transactionId) {
            if (!is_string($transactionId)) {
                throw new \Exception('Transaction Id must be a string, usually in format of AAAAAA-BBBBB-CCCCCC');
            }
        }

        $params = [];

        $params['txid'] = implode(',', $transactionIds);
        if ($referenceId) {
            $params['userref'] = $referenceId;
        }

        $params['trades'] = $includeTrades ? 1 : 0;

        $response = $this->privateApi('/QueryOrders', $params);

        $orderCollection = new Collection\OrderCollection;

        foreach($response as $orderId => $orderRow) {
            $order = new Model\Order;
            $order->loadFromArray(
                array_merge(
                    ['orderid' => $orderId],
                    $orderRow
                )
            );
            $orderCollection->setOrder($orderId, $order);
        }

        return $orderCollection;
    }

    /**
     * @param string $path
     * @param array $params
     *
     * @return array
     */
    private function privateApi(
        string $path,
        array $params = []
    ) : ?array {

        $signedPath = sprintf(
            '/%s/private/%s',
            $this->getVersion(),
            ltrim($path, '/')
        );

        $nonce = explode(' ', microtime(false));
        $nonce = $nonce[1] . str_pad(substr($nonce[0], 2, 6), 6, '0');
        $params['nonce'] = $nonce;

        $sign = hash_hmac(
            'sha512',
            $signedPath . hash(
                'sha256',
                $nonce . http_build_query($params),
                true),
            base64_decode($this->getSecretKey()),
            true
        );

        $headers = [];
        $headers['API-Key'] = $this->getApiKey();
        $headers['API-Sign'] = base64_encode($sign);

        return $this->api(
            sprintf(
                '/private/%s',
                ltrim($path, '/')
            ),
            $params,
            $headers
        );
    }

    /**
     * @param string $path
     * @param array $params
     *
     * @return array
     */
    private function publicApi(
        string $path,
        array $params = []
    ) : ?array {
        return $this->api(
            sprintf(
                '/public/%s',
                ltrim($path, '/')
            ),
            $params
        );
    }

    /**
     * @param string $path
     * @param array $params
     * @param array $headers
     *
     * @return array|null
     */
    public function api(
        string $path,
        array $params = [],
        array $headers = []
    ) : ?array {
        $path = sprintf(
            '/%s/%s',
            $this->getVersion(),
            ltrim($path, '/')
        );

        $headers['User-Agent'] = 'Augwa Kraken API Client';

        $response = $this->getClient()->post(
            $path,
            [
                RequestOptions::FORM_PARAMS => $params,
                RequestOptions::HEADERS => $headers,
            ]
        );

        $data = (array) json_decode($response->getBody(), true);

        if (is_array($data) && array_key_exists('error', $data) && $data['error']) {
            $this->generateErrorFromErrorResponse($data, $response->getStatusCode());
        }

        if (!is_array($data) ||
            !array_key_exists('result', $data)
        ) {
            return null;
        }

        return $data['result'];
    }

    /**
     * @param array $data
     * @param int $code
     *
     * @throws \Exception
     */
    private function generateErrorFromErrorResponse(
        array $data,
        int $code
    ) {
        if (array_key_exists('error', $data)) {
            throw new \Exception(
                sprintf(
                    'Failed with code (%d), with error(s): %s',
                    $code,
                    implode("\n", $data['error'])
                )
            );
        }

        throw new \Exception('An unknown error has occurred');
    }
}