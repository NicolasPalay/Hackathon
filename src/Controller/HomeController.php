<?php

namespace App\Controller;

use App\Model\CarsManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['city'])) {
                $cityGet = trim($_GET['city']);
            } else {
                $cityGet = 'bordeaux';
            }


            $url = "http://api.openweathermap.org/data/2.5/weather?q={$cityGet}&appid=53d5eeb820d6ab866a4ff4ae1e4d9b3f&units=metric&lang=fr";
            $data = file_get_contents($url);
            $data = json_decode($data, true);

            $temp = $data['main']['temp'];
            $name = $data['name'];
            $description = $data['weather'][0]['description'];
        }
        $carsManager = new CarsManager();
        $cars = $carsManager->selectAll('title');

        return $this->twig->render('Home/index.html.twig',[
            'temp' => $temp,
            'name' => $name,
            'description' => $description,
            'cars' => $cars,


        ]);
    }
}
