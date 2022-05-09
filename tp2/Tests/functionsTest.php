<?php
require "includes/config.inc.php";
require_once "includes/functions.inc.php";

use PHPUnit\Framework\TestCase;

class functionsTest extends TestCase
{
    public function canParseOrderToArray(){
        $expectedResult = array(array('sku' => 20, 'amount' => 2), array('sku' => 30, 'amount' => 1));
        $post = array('sku0' => 20, 'amount0' => 2, 'sku1' => 30, 'amount1' => 1);

        $parsedPost = parseOrderToArray($post);

        $this->assertEquals($expectedResult, $parsedPost, 'Error while parsing to array');
    }

    public function canRemoveFromCart(){
        $expectedResult = array(array('sku' => 30, 'amount' => 1));
        $cart = array(array('sku' => 20, 'amount' => 2), array('sku' => 30, 'amount' => 1));

        $cartv2 = removeFromCart($cart, '20');

        $this->assertEquals($expectedResult, $cartv2 ,'Error while removing from cart');
    }

    public function canAddItemToCart(){
        $expectedResult = array(array('sku' => 20, 'amount' => 2), array('sku' => 30, 'amount' => 1));
        $cart = array(array('sku' => 30, 'amount' => 1));

        $cartv2 = addItemForCart(array('sku' => 20, 'amount' => 2), $cart);

        $this->assertEquals($expectedResult, $cartv2, 'Error while adding to cart');
    }
}