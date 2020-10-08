<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display all forms
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return response()->view('forms.index');
    }

    /**
     * Display selected form
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        return response()->view('forms.form', [
            'isCreate' => false,
            'id' => $id,
            'uid' => null,
        ]);
    }

    /**
     * Display page for create form
     *
     * @return \Illuminate\Http\Response
     */
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
