<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;
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

        return view('relatorios.relatorio1', compact('movies', 'genre_name_array', 'genre_count_array', 'language_name_array', 'language_count_array', 'year_number_array', 'year_count_array'));
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatorio2(Request $request)
    {
        $input = $request->all();
        $gender_array = [];
        $department_array = [];
        $birth_array = [];
        $place_array = [];
        $start_date = Carbon::createFromFormat("Y", $input["birth_start"]);
        $end_date = Carbon::createFromFormat("Y", $input["birth_end"]);
        for($first_year = $input["birth_start"]; $first_year <= $input["birth_end"]; $first_year++){
            $birth_array[$first_year] = 0;
        }

        $people = Person::where("birthday", ">", $start_date)->where("birthday", "<", $end_date)->get();
        if(!in_array("all", $request["gender"])){
            $people = $people->whereIn("gender", $request["gender"]);
            foreach($request["gender"] as $gender){
                $gender_array[$gender] = 0;
            }
        }else{
            $gender_array["2"] = 0;
            $gender_array["1"] = 0;
        }

        if(!in_array("all", $request["department"])){
            if(!in_array("Acting", $request["department"])){
                $department_array["Produção"] = 0;
            }else{
                $department_array["Ator"] = 0;
            }
        }else{
            $department_array["Ator"] = 0;
            $department_array["Produção"] = 0;
        }

        foreach($people as $keyPerson => $person){
            if($person->know_for_department == "Acting"){
                if(!in_array("Acting", $request["department"]) && !in_array("all", $request["department"])){
                    $people->forget($keyPerson);
                    continue;
                }else{
                    $department_array["Ator"]++;
                }
            }else{
                if(!in_array("else", $request["department"]) && !in_array("all", $request["department"])){
                    $people->forget($keyPerson);
                    continue;
                }else{
                    $department_array["Produção"]++;
                }
            }
            $gender_array[$person->gender]++;
            $birth_year = intval(substr(strval($person->birthday), 0, 4));
            $birth_array[$birth_year]++;
        }

        $gender_name_array = [];
        $gender_count_array = [];
        $department_name_array = [];
        $department_count_array = [];
        $year_number_array = [];
        $year_count_array = [];
        foreach($gender_array as $key => $value){
            if($key == 1){
                array_push($gender_name_array, "Feminino");
            }else{
                array_push($gender_name_array, "Masculino");
            }
            array_push($gender_count_array, $value);
        }
        foreach($department_array as $key => $value){
            array_push($department_name_array, $key);
            array_push($department_count_array, $value);
        }
        foreach($birth_array as $key => $value){
            array_push($year_number_array, $key);
            array_push($year_count_array, $value);
        }

        return view('relatorios.relatorio2', compact('people', 'gender_name_array', 'gender_count_array', 'department_name_array', 'department_count_array', 'year_number_array', 'year_count_array'));
    }
}
