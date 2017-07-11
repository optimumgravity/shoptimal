<?php
namespace Shoptimal\Cart;

/**
 * Class Cart
 *
 * @package Shoptimal\Cart
 */
class Cart
{
    protected $storage;
    protected $events;
    public $instanceName;

    public function __construct()
    {
        $this->instanceName = "cart";
    }

    public function getInstanceName()
    {
        return $this->instanceName;
    }

    public function setInstanceName($name)
    {
        $this->instanceName = $name;
    }

    public function count()
    {
        return 1;
    }
}