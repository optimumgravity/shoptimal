<?php
namespace Shoptimal\Cart;

use Illuminate\Support\Collection;
use Illuminate\Session\SessionManager;
use Closure;

/**
 * Class Cart
 *
 * @package Shoptimal\Cart
 */
class Cart
{
    private $instance;
    /**
     * Instance of the session manager.
     *
     * @var \Illuminate\Session\SessionManager
     */
    private $session;
    protected $events;
    protected $count;
    protected $instanceName;
    protected $items;

    /**
     * Cart constructor.
     * @param \Illuminate\Session\SessionManager $session
     */
    public function __construct()
    {
        $this->setInstanceName('cart');
        $this->instance =& $this;

        $this->items = $this->contents();

        $this->save();
    }

    public function &getInstance()
    {
        return $this->instance;
    }

    public function getInstanceName()
    {
        return $this->instanceName;
    }

    public function setInstanceName($name)
    {
        $this->instanceName = $name;
    }

    public function contents()
    {
        $content = \Session::has($this->instanceName)
            ? session($this->instanceName)
            : new Collection;

        return $content;
    }

    public function add($item)
    {
        $newItem = null;
        if (is_array($item)) {
            if ($this->has($item['id'])) {
                $cartItem = $this->get($item['id']);
                $cartItem->setQuantity($cartItem->getQuantity() + $item['quantity']);
                //$this->items->push($cartItem);
                $this->save();
            } else {
                $newItem = new Item(
                    $item['id'],
                    $item['name'],
                    $item['quantity']
                );
                $this->items->push($newItem);
                $this->save();
            }
        } else if ($item instanceof Item) {
            return $this->push($item);
        } else {
            if (null !== $newItem) {
                return $newItem;
            }
            return false;
        }
    }

    public function has($id)
    {
        foreach ($this->items as $item) {
            if ($id == $item->getId()) {
                return true;
            }
        }

        return false;
    }

    public function get($id, $default = null)
    {
        foreach ($this->items as $item) {
            if ($id == $item->getId()) {
                return $item;
            }
        }

        return false;
    }

    public function pull($id, $default = null)
    {
        foreach ($this->items as $item) {
            if ($id == $item->getId()) {
                return \Arr::pull($this->items, $id, $default);
            }
        }

        return false;
    }

    public function count()
    {
        $content = $this->contents();

        $count = 0;

        if (is_array($content)) {
            foreach ($content as $item) {
                $count += $item->getQuantity();
            }

            return $count;
        }

        //$count = $content->sum('quantity');

        //return $count;
        $this->count = 0;
        $count = $this->getInstance('cart');
        //dd($this->items);
        $this->items->each(function($item) use ($count) {
            $count->count = (null !== $item->getQuantity()) ? $count->count + $item->getQuantity() : 1;
        });

        return (null !== $count->count) ? $count->count : 0;
    }

    public function save()
    {
        session(['cart' => $this->contents()]);
        //$this->session->put('test', 'testing');
        //session([$this->instanceName => $this->contents()]);
    }
}