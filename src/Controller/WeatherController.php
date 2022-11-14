<?php

namespace App\Controller;

use App\Service\WeatherUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Location;
use App\Repository\MeasurementRepository;
use App\Repository\LocationRepository;



class WeatherController extends AbstractController
{
 public function cityAction($city, $country, WeatherUtil $weatherUtil): Response
 {
    $measurements = $weatherUtil->getWeatherForCountryAndCity($country, $city);
    return $this->render('weather/city.html.twig', [
        'city'=>$city,
        'measurements' => $measurements,
 ]);
 }
}
