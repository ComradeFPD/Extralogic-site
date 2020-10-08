<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex()
    {
        return response()->view('forms.index');
    }

    public function getShow($id)
    {
        return response()->view('forms.form', [
            'isCreate' => false,
            'id' => $id,
            'uid' => null,
        ]);
    }

    public function getCreate()
    {
        $faker = Factory::create('ru');
        return response()->view('forms.form', [
            'isCreate' => true,
            'uid' => $faker->unique()->uuid,
            'id' => null
        ]);
    }
}
