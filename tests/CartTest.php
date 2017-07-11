<?php
use Shoptimal\Cart\Cart;

class CartTest extends PHPUnit_Framework_TestCase
{
    protected $cart;

    protected function setUp()
    {
    }

    public function test_instance_name()
    {
        $this->cart = new Cart('cart');
        $this->assertEquals('cart', $this->cart->getInstanceName());
    }
}