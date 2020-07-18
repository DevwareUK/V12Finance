<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class OrderLine
 *
 * This represents one order line. The collection of these objects should total
 * the cash price of the order so VAT and delivery charges should be included.
 * Beware of rounding issues and any offers such as free delivery, a percentage
 * off or coupons driving the total down. These can be adjusted with an
 * OrderLine showing a negative amount as a discount.
 *
 * @package V12Finance\Models
 */
class OrderLine {

  /**
   * Qty.
   *
   * Quantity of this item.
   *
   * @var int|NULL $Qty
   *   Integer Optional
   */
  protected $Qty;

  /**
   * SKU.
   *
   * Stock Keeping Unit identifier for this item.
   *
   * @var string|NULL $SKU
   *   String(50)	Optional
   */
  protected $SKU;

  /**
   * Item.
   *
   * Description of this item.
   *
   * @var string|NULL $Item
   *   String(100) Optional
   */
  protected $Item;

  /**
   * Price.
   *
   * The gross price of this item. NOTE: This is the unit price,
   * not price * quantity.
   *
   * @var float|NULL
   *   Decimal Optional
   */
  protected $Price;

  use JsonEncodeable;

  /**
   * OrderLine constructor.
   *
   * @param int|NULL $qty
   * @param string|NULL $sku
   * @param string|NULL $item
   * @param float|NULL $price
   */
  public function __construct(int $qty = NULL, string $sku = NULL, string $item = NULL, float $price = NULL) {
    $this->Qty = $qty;
    $this->SKU = $sku;
    $this->Item = $item;
    $this->Price = $price;
  }

  public static function newFromJSON($json) : OrderLine {
    $qty = isset($json->Qty) ? $json->Qty : NULL;
    $sku = isset($json->SKU) ? $json->SKU : NULL;
    $item = isset($json->Item) ? $json->Item : NULL;
    $price = isset($json->Price) ? $json->Price : NULL;
    return new OrderLine($qty, $sku, $item, $price);
  }
}