<?php

namespace Service;

use Model\CartInterface;
use Model\PricingInterface;

interface TerminalInterface
{
    /**
     * @param PricingInterface $pricing
     * @return mixed
     */
    public function setPricing(PricingInterface $pricing);

    /**
     * @param string $code
     * @return TerminalInterface
     */
    public function scan(string $code): TerminalInterface;

    /**
     * @return float
     */
    public function getTotal(): float;

    /**
     * Sets cart in terminal
     * @param CartInterface $cart
     */
    public function setCart(CartInterface $cart): void;

    /**
     * Clear cart in terminal
     */
    public function clearCart(): void;
}