<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio1()
    {
        $movies = [];
        
        $language_name_array = [];
        $language_count_array = [];
        $genre_name_array = [];
        $genre_count_array = [];
        $year_number_array = [];
        $year_count_array = [];
        return view('relatorios.relatorio1', compact('movies', 'genre_name_array', 'genre_count_array', 'language_name_array', 'language_count_array', 'year_number_array', 'year_count_array'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio2()
    {
        $people = [];
        $department_name_array = [];
        $department_count_array = [];
        $gender_name_array = [];
        $gender_count_array = [];
        $year_number_array = [];
        $year_count_array = [];
        return view('relatorios.relatorio2', compact('people', 'gender_name_array', 'gender_count_array', 'department_name_array', 'department_count_array', 'year_number_array', 'year_count_array'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio3()
    {
        return view('relatorios.relatorio3');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio4()
    {
        return view('relatorios.relatorio4');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio5()
    {
        return view('relatorios.relatorio5');
    }
}
