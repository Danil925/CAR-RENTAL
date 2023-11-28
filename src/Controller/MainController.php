<?php

namespace Src\Controller;

use Laminas\Diactoros\ServerRequest;
use Laminas\Diactoros\Response\RedirectResponse;
use MiladRahimi\PhpRouter\View\View;
use ORM;

class MainController
{
    public function index(View $view)
    {
        return $view->make('index');
    }

//    public function list(ServerRequest $request ,View $view)
//    {
//        $items = ORM::for_table('cars')->find_many();
////        find_one($request->getQueryParams()['id'])
//        return $view->make('index',[ 'items' => $items]);
//    }
    public function list(ServerRequest $request, View $view)
    {
        $id = $request->getQueryParams()['id'];
        $items = ORM::for_table('cars')->find_one($id);

        if (!$items) {
            return [];
        }

        return $view->make('index', ['items' => [$items]]);
    }
    public function create(ServerRequest $request):RedirectResponse
    {
        $car_name = $request->getParsedBody()['car_id'];
        $location = $request->getParsedBody()['location'];
        $date_start = $request->getParsedBody()['date_start'];
        $date_end = $request->getParsedBody()['date_end'];
        $name = $request->getParsedBody()['name'];
        $surname = $request->getParsedBody()['surname'];
        $number = $request->getParsedBody()['number'];
        $age = $request->getParsedBody()['age'];
        $email = $request->getParsedBody()['email'];
        $address = $request->getParsedBody()['address'];
        $city = $request->getParsedBody()['city'];
        $zip_code = $request->getParsedBody()['zip_code'];

        $person = ORM::for_table('applications')->create();
        $person->car_name = $car_name;
        $person->location = $location;
        $person->date_start = $date_start;
        $person->date_end = $date_end;
        $person->name = $name;
        $person->surname = $surname;
        $person->number = $number;
        $person->age = $age;
        $person->email = $email;
        $person->address = $address;
        $person->city = $city;
        $person->zip_code = $zip_code;
        $person->save();

        return new RedirectResponse('/');
    }

}