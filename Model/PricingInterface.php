<?php

namespace Model;

interface PricingInterface
{
    /**
     * @param string $code
     * @param int $qty
     * @return float|null
     */
    public function getPrice(string $code, int $qty): ?float;
}