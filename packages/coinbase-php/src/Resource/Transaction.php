<?php

namespace Coinbase\Wallet\Resource;

use Coinbase\Wallet\ActiveRecord\TransactionActiveRecord;
use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Enum\ResourceType;
use Coinbase\Wallet\Enum\TransactionStatus;
use Coinbase\Wallet\Enum\TransactionType;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Value\Network;

class Transaction extends Resource
{
    use AccountResource;
    use TransactionActiveRecord;

    /**
     * @var string
     * @see TransactionType
     */
    private $type;

    /**
     * @var string
     * @see TransactionStatus
     */
    private $status;

    /** @var Money */
    private $amount;

    /** @var Money */
    private $nativeAmount;

    /** @var string */
    private $description;

    /** @var string */
    private $fee;

    /** @var Boolean */
    private $instantExchange;

    /** @var \DateTime */
    private $createdAt;

    /** @var \DateTime */
    private $updatedAt;

    /** @var Network */
    private $network;

    /** @var Resource */
    private $to;

    /** @var Resource */
    private $from;

    /** @var Address */
    private $address;

    /** @var Resource */
    private $application;

    /** @var Buy */
    private $buy;

    /** @var Sell */
    private $sell;

    /**
     * Creates a transaction reference.
     *
     * @param string $accountId     The account id
     * @param string $transactionId The transaction id
     *
     * @return Transaction A transaction reference
     */
    public static function reference(string $accountId, string $transactionId): Transaction
    {
        $resourcePath = sprintf('/v2/accounts/%s/transactions/%s', $accountId, $transactionId);

        return new static(null, $resourcePath);
    }

    /**
     * Creates a new send transaction.
     *
     * @param null $attrs
     * @return Transaction A new send transaction
     */
    public static function send($attrs = null): Transaction
    {
        return new static(TransactionType::SEND, $attrs);
    }

    /**
     * Creates a new transfer transaction.
     *
     * @param null $attrs
     * @return Transaction A new transfer transaction
     */
    public static function transfer($attrs = null): Transaction
    {
        return new static(TransactionType::TRANSFER, $attrs);
    }

    /**
     * Creates a new request transaction.
     *
     * @param null $attrs
     * @return Transaction A new request transaction
     */
    public static function request($attrs = null): Transaction
    {
        return new static(TransactionType::REQUEST, $attrs);
    }

    public function __construct($type = null, $resourcePath = null)
    {
        parent::__construct(ResourceType::TRANSACTION, $resourcePath);

        $this->type = $type;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function setAmount(Money $amount)
    {
        $this->amount = $amount;
    }

    public function setBitcoinAmount($amount)
    {
        $this->amount = new Money($amount, CurrencyCode::BTC);
    }

    public function getNativeAmount(): Money
    {
        return $this->nativeAmount;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getFee(): string
    {
        return $this->fee;
    }

    public function setFee($fee)
    {
        $this->fee = (string) $fee;
    }

    /**
     * @return bool
     * @deprecated Removed deprecated instant exchange feature.
     */
    public function isInstantExchange(): bool
    {
        return $this->instantExchange;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function getNetwork(): Network
    {
        return $this->network;
    }

    public function getTo(): Resource
    {
        return $this->to;
    }

    public function setTo(Resource $to)
    {
        $this->to = $to;
    }

    public function setToEmail($email)
    {
        $this->to = new Email($email);
    }

    public function setToBitcoinAddress($address)
    {
        $this->to = new BitcoinAddress($address);
    }

    public function setToAccountId($accountId)
    {
        $this->to = Account::reference($accountId);
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getApplication()
    {
        return $this->application;
    }

    public function getBuy()
    {
        return $this->buy;
    }

    public function getSell()
    {
        return $this->sell;
    }

    public function isSend()
    {
        return TransactionType::SEND === $this->type;
    }

    public function isTransfer()
    {
        return TransactionType::TRANSFER === $this->type;
    }

    public function isRequest()
    {
        return TransactionType::REQUEST === $this->type;
    }
}