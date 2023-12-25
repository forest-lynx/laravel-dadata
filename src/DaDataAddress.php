<?php

namespace ForestLynx\DaData;

use ForestLynx\DaData\Enums\Language;
use Spatie\LaravelData\DataCollection;
use ForestLynx\DaData\DTOs\Address\AddressDTO;

/**
 * Class DaDataAddress
 * @package ForestLynx\DaData
 */
class DaDataAddress extends DaDataService
{
    /**
     * Standardization address from string to FIAS address object
     *
     * Splits an address from a string into fields (region, city, street, house, apartment)
     * according to KLADR/FIAS. Determines the postal code, time zone, nearest subway stations,
     * coordinates, apartment cost and other information about the address.
     *
     * @param string $address
     * @return array
     * @throws \Exception
     */
    public function standardization(string $address): DataCollection|array
    {
        $data = $this->cleanerApi()->post('clean/address', [$address]);

        return $this->collection($data['suggestions']);
    }

    /**
     * Auto detection by part of address
     *
     * Helps the person quickly enter the correct address on a web form or app.
     * For Russian Federation and the whole world.
     *
     * @param string $query
     * @param int $count
     * @param int $language
     * @param array $locations
     * @param array $locations_geo
     * @param array $locations_boost
     * @param array $from_bound
     * @param array $to_bound
     * @return array
     * @throws \Exception
     */
    public function prompt(
        string $query,
        int $count = 10,
        int $language = Language::RU,
        array $locations = [],
        array $locations_geo = [],
        array $locations_boost = [],
        array $from_bound = [],
        array $to_bound = []
    ): DataCollection|array {

        $data = $this->suggestApi()->post('rs/suggest/address', [
            'query'             => $query,
            'count'             => $count,
            'language'          => Language::$map[$language] ?? Language::$map[Language::RU],
            'locations'         => $locations,
            'locations_geo'     => $locations_geo,
            'locations_boost'   => $locations_boost,
            'from_bound'        => $from_bound,
            'to_bound'          => $to_bound,
        ]);
        return $this->collection($data['suggestions']);
    }

    /**
     * Geolocation
     *
     * Returns all information about the address by coordinates.
     * Works for homes, streets and cities.
     * @param float $lat
     * @param float $lon
     * @param int $count
     * @param int $radius_meters
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function geolocate(
        float $lat,
        float $lon,
        int $count = 10,
        int $radius_meters = 100,
        int $language = Language::RU
    ): DataCollection|array {
        $data = $this->suggestApi()->get('rs/geolocate/address', [
            'lat'              => $lat,
            'lon'              => $lon,
            'count'            => $count,
            'radius_meters'    => $radius_meters,
            'language'         => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);
        return $this->collection($data['suggestions']);
    }

    /**
     * Define city by IPv4
     *
     * @param string $ip
     * @param int $count
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function iplocate(string $ip, int $count = 10, int $language = Language::RU): DataCollection|array
    {
        $data = $this->suggestApi()->get('rs/iplocate/address', [
            'ip'        => $ip,
            'count'     => $count,
            'language'  => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);
        return $this->collection($data['suggestions']);
    }

    /**
     * Define address by KLADR or FIAS id
     *
     * @param string $id
     * @param int $count
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function id(string $id, int $count = 10, int $language = Language::RU): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/findById/address', [
            'query'     => $id,
            'count'     => $count,
            'language'  => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);
        return $this->collection($data['suggestions']);
    }

    /**
     * Find postal unit by address
     *
     * @param string $address
     * @param int $count
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function postalUnitByAddress(string $address, int $count = 10, int $language = Language::RU): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/suggest/postal_unit', [
            'query'     => $address,
            'count'     => $count,
            'language'  => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);

        return $this->collection($data['suggestions']);
    }

    /**
     * Find postal unit by postal code
     *
     * @param string $code
     * @param int $count
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function postalUnitById(int $code, int $count = 10, int $language = Language::RU): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/findById/postal_unit', [
            'query'     => $code,
            'count'     => $count,
            'language'  => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);

        return $this->collection($data['suggestions']);
    }

    /**
     * Find by postal unit by GEO location
     *
     * @param float $lat
     * @param float $lon
     * @param int $radius_meters
     * @param int $count
     * @param int $language
     * @return array
     * @throws \Exception
     */
    public function postalUnitByGeoLocate(float $lat, float $lon, int $radius_meters = 1000, int $count = 10, int $language = Language::RU): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/geolocate/postal_unit', [
            'lat'           => $lat,
            'lon'           => $lon,
            'radius_meters' => $radius_meters,
            'count'         => $count,
            'language'      => Language::$map[$language] ?? Language::$map[Language::RU],
        ]);

        return $this->collection($data['suggestions']);
    }


    /**
     * City ID in the delivery companies
     *
     * @param string $code
     * @return array
     * @throws \Exception
     */
    public function delivery(string $code): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/findById/delivery', ['query' => $code]);

        return $this->collection($data['suggestions']);
    }

    /**
     * Get address by FIAS code
     *
     * @param string $code
     * @return array
     * @throws \Exception
     */
    public function fias(string $code): DataCollection|array
    {
        $data = $this->suggestApi()->post('rs/findById/fias', ['query' => $code]);

        return $this->collection($data['suggestions']);
    }

    protected function collection(array $data): DataCollection
    {
        return AddressDTO::collection($data)->wrap('suggestions');
    }
}
