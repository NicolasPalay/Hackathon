<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $cityGet = array_map('trim', $_GET);

            $url = "http://api.openweathermap.org/data/2.5/weather?q=bordeaux&appid=53d5eeb820d6ab866a4ff4ae1e4d9b3f&units=metric&lang=fr";
            $data = file_get_contents($url);
            $data = json_decode($data, true);

            $temp = $data['main']['temp'];
            $name = $data['name'];
            $description = $data['weather'][0]['description'];
        }
        /*echo "Température : " . $temp . " degrés Celsius\n";
        echo "Nom : " . $name . "\n";
        echo "Description : " . $description . "\n";*/

        return $this->twig->render('Home/index.html.twig',['temp' => $temp,
        'name' => $name,'description' => $description

        ]);
    }
}
