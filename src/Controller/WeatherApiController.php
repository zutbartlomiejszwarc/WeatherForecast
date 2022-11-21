<?php

namespace App\Controller;

use App\Service\WeatherUtil;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    #[Route('/weather/api', name: 'app_weather_api')]
    public function cityAction(Request $request, WeatherUtil $weatherUtil): Response
    {
        $payload = $request->getContent();
        $payload = json_decode($payload, true);

        $measurements = $weatherUtil->getWeatherForCountryAndCity($payload["country"], $payload["city"]);

        return $this->json($measurements);
    }
}
