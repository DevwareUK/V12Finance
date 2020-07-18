<?php

namespace DevwareUK\V12Finance\Models;

use DevwareUK\V12Finance\Traits\JsonEncodeable;

/**
 * Class Address.
 *
 * An address object used by Customer. Addresses as a list of addresses and
 * Employment. Address as a single address. Please note that the postcode must
 * be separated by a space rather than one complete string.
 *
 * @package V12Finance\Models
 */
class Address {

  /**
   * Flat Number.
   *
   * If applicable the flat or sub building number.
   *
   * @var string|NULL $FlatNumber
   *   String(30) Optional
   */
  protected $FlatNumber;

  /**
   * Building Name.
   *
   * If applicable the building name.
   *
   * @var string|NULL $BuildingName
   *   String(40)	Optional
   */
  protected $BuildingName;

  /**
   * Building Number.
   *
   * If applicable the building number.
   *
   * @var string|NULL $BuildingNumber
   *   String(30)	Optional
   */
  protected $BuildingNumber;

  /**
   * Street.
   *
   * The street name.
   *
   * @var string|NULL $Street
   *   String(40)	Optional
   */
  protected $Street;

  /**
   * Locality.
   *
   * The locality or district within a town or city.
   *
   * @var string|NULL $Locality
   *   String(40)	Optional
   */
  protected $Locality;

  /**
   * Town or City.
   *
   * The closest town or city.
   *
   * @var string|NULL $TownOrCity
   *   String(40)	Optional
   */
  protected $TownOrCity;

  /**
   * County.
   *
   * The county of the address.
   *
   * @var string|NULL $County
   *   String(40) Optional
   */
  protected $County;

  /**
   * Postcode.
   *
   * The postcode. Please note, this must be separated by a space, e.g.
   * CF24 5PJ, not CF245PJ.
   *
   * @var string|NULL $Postcode
   *   String(8) Optional
   */
  protected $Postcode;

  /**
   * Country.
   *
   * Leave blank.
   *
   * @var int|NULL $Country
   *   Integer Optional
   */
  protected $Country;

  use JsonEncodeable;

  /**
   * Address constructor.
   *
   * @param string|NULL $flat_number
   * @param string|NULL $building_name
   * @param string|NULL $building_number
   * @param string|NULL $street
   * @param string|NULL $locality
   * @param string|NULL $town_or_city
   * @param string|NULL $county
   * @param string|NULL $postcode
   * @param int|NULL $country
   */
  public function __construct(string $flat_number = NULL, string $building_name = NULL, string $building_number = NULL, string $street = NULL, string $locality = NULL, string $town_or_city = NULL, string $county = NULL, string $postcode = NULL, int $country = NULL) {
    $this->FlatNumber = $flat_number;
    $this->BuildingName = $building_name;
    $this->BuildingNumber = $building_number;
    $this->Street = $street;
    $this->Locality = $locality;
    $this->TownOrCity = $town_or_city;
    $this->County = $county;
    $this->Postcode = $postcode;
    $this->Country = $country;
  }

  public static function newFromJSON($json) : Address {
    return new Address($json->FlatNumber, $json->BuildingName, $json->BuildingNumber, $json->Street, $json->Locality, $json->TownOrCity, $json->County, $json->Postcode, $json->Country);
  }
}