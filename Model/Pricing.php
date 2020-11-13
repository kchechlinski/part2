<?php declare(strict_types=1);

namespace Model;

use Model\PricingInterface;

class Pricing implements PricingInterface
{
    public const UNIT_PRICES = [
        'A' => 2,
        'B' => 12,
        'C' => 1.25,
        'D' => 0.15
    ];

    public const VOLUME_PRICES = [
        'A' => [
            4 => 7
        ],
        'C' => [
            6 => 6
        ]
    ];

    /**
     * {@inheritDoc}
     */
    public function getPrice(string $code, int $qty): ?float
    {
        if (isset(self::VOLUME_PRICES[$code])) {
            return $this->getVolumePrice($code, $qty, self::VOLUME_PRICES[$code]);
        }

        return ($this->getUnitPrice($code) * $qty);
    }

    /**
     * Get unit price by selected product code
     * @param string $code
     * @return float|null
     */
    private function getUnitPrice(string $code): ?float
    {
        if (isset(self::UNIT_PRICES[$code])) {
            return self::UNIT_PRICES[$code];
        }
    }

    /**
     * Get product price by its code, quantity and volume price
     * @param string $code
     * @param int $qty
     * @param array $volumePrice
     * @return float|null
     */
    private function getVolumePrice(string $code, int $qty, array $volumePrice): ?float
    {
        $volume = key($volumePrice);
        $price = current($volumePrice);

        $sumPrice = 0;
        $restQty = $qty % $volume;
        $volumesInQty = ($qty - $restQty) / $volume;

        if ($volumesInQty >= 1) {
            $sumPrice += $price * $volumesInQty;
        }

        if ($restQty > 0) {
            $sumPrice += $this->getUnitPrice($code) * $restQty;
        }

        return $sumPrice > 0 ? $sumPrice : null;
    }

}