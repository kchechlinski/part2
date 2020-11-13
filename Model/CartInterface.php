<?php

namespace Model;

interface CartInterface
{
    /**
     * @param $code
     * @return mixed
     */
    public function addItem(string $code): void;

    /**
     * @param string $code
     * @return int
     */
    public function getItemsCount(string $code): int;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * Clear cart
     */
    public function clear(): void;
}