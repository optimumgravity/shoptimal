<?php
/**
 * Created 7/8/2017
 */
namespace App\Cart;

use App\Product;

class CartItem
{
    /**
     * @var mixed
     */
    public $id;

    /**
     * @var \App\Product
     */
    public $product;

    /**
     * The number
     *
     * @var int
     */
    public $quantity;

    /**
     * CartItem constructor.
     */
    public function __construct(Product $product, $quantity = 1)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->id = $product->id;
    }
}