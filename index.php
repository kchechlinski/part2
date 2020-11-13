<?php
require __DIR__ . '/vendor/autoload.php';

use Service\Terminal;
use Model\Pricing;
use Model\Cart;

$pricing = new Pricing();

$terminal = new Terminal();
$terminal->setPricing($pricing);
$terminal->setCart(new Cart());
$terminal->scan('A')
         ->scan('B')
         ->scan('C')
         ->scan('D')
         ->scan('A')
         ->scan('B')
         ->scan('A')
         ->scan('A')
;
echo 'case 1 (ABCDABAA): ' . number_format($terminal->getTotal(),2) . "$\n";

$terminal->clearCart();

$terminal->scan('C')
         ->scan('C')
         ->scan('C')
         ->scan('C')
         ->scan('C')
         ->scan('C')
         ->scan('C')
;
echo 'case 2 (CCCCCCC): ' . number_format($terminal->getTotal(), 2) . "$\n";

$terminal->clearCart();

$terminal->scan('A')
    ->scan('B')
    ->scan('C')
    ->scan('D')
;
echo 'case 3 (ABCD): ' . number_format($terminal->getTotal(), 2) . "$\n";
