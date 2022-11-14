<?php

namespace App\Service;

use App\Repository\LocationRepository;
use App\Repository\MeasurementRepository;

class WeatherUtil
{

    private MeasurementRepository $measurementRepository;
    private LocationRepository $locationRepository;

    public function __construct(MeasurementRepository $measurementRepository, LocationRepository $locationRepository)
    {
        $this->measurementRepository = $measurementRepository;
        $this->locationRepository = $locationRepository;
    }

    public function getWeatherForCountryAndCity($country, $city){
        $location = $this->locationRepository->findOneBy([
            'city' => $city,
            'country' => $country
        ]);
        return $this->getWeatherForLocation($location);
    }

    public function getWeatherForLocation($location){
        return $this->measurementRepository->findByLocation($location);
    }
}