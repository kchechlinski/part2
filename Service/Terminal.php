<?php declare(strict_types=1);

namespace Service;

use Model\CartInterface;
use Model\PricingInterface;
use Model\Cart;

class Terminal implements TerminalInterface
{
    private $pricing;

    /**
     * @var CartInterface
     */
    private $cart;

    /**
     * {@inheritDoc}
     */
    public function setCart(CartInterface $cart): void
    {
        $this->cart = $cart;
    }

    /**
     * {@inheritDoc}
     */
    public function clearCart(): void
    {
        $this->cart->clear();
    }

    /**
     * {@inheritDoc}
     */
    public function setPricing(PricingInterface $pricing)
    {
        $this->pricing = $pricing;
    }

    /**
     * {@inheritDoc}
     */
    public function scan(string $code): TerminalInterface
    {
        $this->cart->addItem($code);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getTotal(): float
    {
        $sum = 0;
        foreach ($this->cart->getItems() as $key => $qty) {
            $sum += $this->pricing->getPrice($key, $qty);
        }

        return $sum;
    }
}