<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Controller1 extends Controller
{
    public function index()
    {
        $movies = DB::select("
            SELECT * FROM movie 
            WHERE popularity > 450 
            AND vote_average > 7
            ORDER BY release_date DESC
            LIMIT 12
        ");

        $genre = DB::table('genre')->get();

        return view('movie.home', compact('movies', 'genre'));
    }

    public function genre($id)
    {
        $movies = DB::select("
            SELECT m.* FROM movie m
            JOIN movie_genre mg ON m.id = mg.id_movie
            WHERE mg.id_genre = ?
            ORDER BY m.release_date DESC
            LIMIT 12
        ", [$id]);

        $genre = DB::table('genre')->get();

        return view('movie.home', compact('movies', 'genre'));
    }

    public function detail($id)
    {
        $movie = DB::table('movie')->where('id', $id)->first();

        $movieGenres = DB::select("
            SELECT g.* FROM genre g
            JOIN movie_genre mg ON g.id = mg.id_genre
            WHERE mg.id_movie = ?
        ", [$id]);

        $genre = DB::table('genre')->get();

        return view('movie.detail', compact('movie', 'genre', 'movieGenres'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $movies = DB::select(
            "select * from movie where movie_name_vn like ?",
            ["%".$keyword."%"]
        );

        $genre = DB::table('genre')->get();

        return view('movie.home', compact('movies', 'genre'));
    }
}
