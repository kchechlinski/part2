<?php declare(strict_types=1);

namespace Model;

use Model\CartInterface;

class Cart implements CartInterface
{
    /**
     * @var int[]
     */
    private $items = [];

    public function addItem(string $code): void
    {
        if (isset($this->items[$code])) {
            $this->items[$code] ++;
        } else {
            $this->items[$code] = 1;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getItemsCount(string $code): int
    {
        return isset($this->items[$code]) ? $this->items[$code] : 0;
    }

    /**
     * {@inheritDoc}
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * {@inheritDoc}
     */
    public function clear(): void
    {
        $this->items = [];
    }
}