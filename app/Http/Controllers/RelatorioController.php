<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Genre;
use App\Models\Movie;
use Carbon\Carbon;

class relatorioController extends Controller
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
    public function relatorio1(Request $request)
    {
        $input = $request->all();
        $genre_array = [];
        $language_array = [];
        $year_array = [];
        $start_date = Carbon::createFromFormat("Y", $input["year_start"]);
        $end_date = Carbon::createFromFormat("Y", $input["year_end"]);
        for($first_year = $input["year_start"]; $first_year <= $input["year_end"]; $first_year++){
            $year_array[$first_year] = 0;
        }
        $movies = Movie::where("release_date", ">", $start_date)->where("release_date", "<", $end_date)->get();
        if(!in_array("all", $request["language"])){
            $movies = $movies->whereIn("original_language", $request["language"]);
            foreach($request["language"]as $language){
                $language_array[$language] = 0;
            }
        }else{
            $language_array["es"] = 0;
            $language_array["en"] = 0;
            $language_array["fr"] = 0;
            $language_array["pt"] = 0;
            $language_array["jp"] = 0;
        }
        
        if(!in_array("all", $request["genre"])){
            $movies = $movies->whereIn("original_language", $request["language"]);
            foreach($request["genre"]as $genre){
                $genre_model = Genre::find($genre);
                $genre_array[$genre_model->name] = 0;
            }
        }else{
            $genres = Genre::all();
            foreach($genres as $genre){
                $genre_array[$genre->name] = 0;
            }
        }
        foreach($movies as $key => $movie){
            $has_genre = false;
            $genres = $movie->movieGenre;
            foreach($genres as $genre){
                if(in_array($genre->id_genre, $request["genre"])){
                    $genre_model = Genre::find($genre->id_genre);
                    $genre_array[$genre_model->name]++;
                    $has_genre = true;
                }
            }
            if($has_genre == false){
                $movies->forget($key);
            }else{
                $language_array[$movie->original_language]++;
                $release_year = intval(substr(strval($movie->release_date), 0, 4));
                $year_array[$release_year]++;
            }
        }
        $count_movies = count($movies);
        
        $language_name_array = [];
        $language_count_array = [];
        $genre_name_array = [];
        $genre_count_array = [];
        $year_number_array = [];
        $year_count_array = [];
        foreach($genre_array as $key => $value){
            array_push($genre_name_array, $key);
            array_push($genre_count_array, $value);
        }
        foreach($language_array as $key => $value){
            array_push($language_name_array, $key);
            array_push($language_count_array, $value);
        }
        foreach($year_array as $key => $value){
            array_push($year_number_array, $key);
            array_push($year_count_array, $value);
        }

        return view('relatorios.relatorio1', compact('count_movies', 'genre_name_array', 'genre_count_array', 'language_name_array', 'language_count_array', 'year_number_array', 'year_count_array'));
    }
}
