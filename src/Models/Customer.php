<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

class Customer {
  protected $Title;
  protected $FirstName;
  protected $LastName;
  protected $EmailAddress;
  protected $Addresses;
  protected $MobileTelephone;
  protected $HomeTelephone;

  use JsonEncodeable;

  public function __construct($title = NULL, $first_name = NULL, $last_name = NULL, $email_address = NULL, array $addresses = NULL, TelephoneNumber $mobile_telephone = NULL, TelephoneNumber $home_telephone = NULL) {
    // @TODO validate the title against the title keys.
    $this->Title = $title;
    $this->FirstName = $first_name;
    $this->LastName = $last_name;
    $this->EmailAddress = $email_address;
    // @TODO this should be an array of CustomerAddresses.
    $this->Addresses = $addresses;
    $this->MobileTelephone = $mobile_telephone;
    $this->HomeTelephone = $home_telephone;
  }

  public static function newFromJSON($json) : Customer {
    $title = isset($json->Title) ? $json->Title : NULL;
    $first_name = isset($json->FirstName) ? $json->FirstName : NULL;
    $last_name = isset($json->LastName) ? $json->LastName : NULL;
    $email_address = isset($json->EmailAddress) ? $json->EmailAddress : NULL;

    $addresses = isset($json->Addresses) ? [] : NULL;
    if (!empty($json->Addresses)) {
      foreach ($json->Addresses as $address) {
        $addresses[] = Address::newFromJSON($address);
      }
    }

    $mobile_telephone = isset($json->MobileTelephone) ? TelephoneNumber::newFromJSON($json->MobileTelephone) : NULL;
    $home_telephone = isset($json->HomeTelephone) ? TelephoneNumber::newFromJSON($json->HomeTelephone) : NULL;

    return new Customer($title, $first_name, $last_name, $email_address, $addresses, $mobile_telephone, $home_telephone);
  }

  public function getLastName() {
    return $this->LastName;
  }

  public static function getTitles() {
    return [
      1 => 'Mr',
      2 => 'Ms',
      3 => 'Miss',
      4 => 'Mrs',
    ];
  }
}