<?php
namespace Shoptimal\Cart;

/**
 * Class Item
 * @package Shoptimal\Cart
 */
class Item
{
    protected $id;
    protected $name;
    protected $quantity;

    public function __construct($id, $name, $quantity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
}