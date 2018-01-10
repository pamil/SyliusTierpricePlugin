<?php

/**
 * This file is part of the Brille24 tierprice plugin.
 *
 * (c) Brille24 GmbH
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Brille24\TierPriceBundle\Entity;


use Doctrine\Common\Collections\Collection;
use Sylius\Component\Channel\Model\Channel;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class ProductVariant
 *
 * Entity that stores a possible tier pricing for a product
 *
 * @package Brille24\TierPriceBundle\Entity
 */
class TierPrice implements ResourceInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $price;

    /**
     * @var int
     */
    private $qty;

    /** @var ChannelInterface|null */
    private $channel;

    /** @var ProductVariantInterface */
    private $productVariant;

    public function __construct(int $quantity = 0, int $price = 0)
    {
        $this->qty   = $quantity;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * This function does not allow negative values
     *
     * @param int $qty
     */
    public function setQty(int $qty): void
    {
        $this->qty = max($qty, 0);
    }

    /**
     * @return Collection
     */
    public function getProductVariant(): ProductVariantInterface
    {
        return $this->productVariant;
    }

    /**
     * @param Collection $productVariants
     */
    public function setProductVariant(ProductVariantInterface $productVariants): void
    {
        $this->productVariant = $productVariants;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Channel
     */
    public function getChannel(): ?ChannelInterface
    {
        return $this->channel;
    }

    /**
     * @param Channel $channel
     */
    public function setChannel(?ChannelInterface $channel): void
    {
        $this->channel = $channel;
    }
}