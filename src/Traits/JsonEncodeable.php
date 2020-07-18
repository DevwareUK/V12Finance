<?php

namespace DevwareUK\V12Finance\Traits;

trait JsonEncodeable {
  public function getJson() {
    $array = $this->getJsonEncodeableArray();
    return json_encode($array);
  }

  public function getJsonEncodeableArray() {
    $array = [];
    $vars = get_object_vars($this);

    foreach (array_keys($vars) as $var) {
      $value = $this->{$var};

      // @TODO we shouldn't need this when we have collections...
      if (is_array($value)) {
        $array[$var] = [];

        foreach ($value as $item) {
          $array[$var][] = static::getJsonEncodeableValue($item);
        }

        continue;
      }

      $array[$var] = static::getJsonEncodeableValue($value);
    }

    return $array;
  }

  public static function getJsonEncodeableValue($value) {
    if (is_object($value)) {
      $class = get_class($value);

      if (method_exists($class,'getJsonEncodeableArray')) {
        return $value->getJsonEncodeableArray();
      }
      else {
        throw new \Exception("Class: $class is missing the JsonEncodeable trait");
      }
    }

    return $value;
  }
}