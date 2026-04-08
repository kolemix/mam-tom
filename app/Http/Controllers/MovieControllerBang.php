<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieControllerBang extends Controller
{
    public function index()
    {
        $movies = DB::table('movie')
            ->where('status', 1)
            ->get();

        $genre = DB::table('genre')->get();

        return view('movie_manager.index', [
            'movies' => $movies,
            'genre'  => $genre,
            'title'  => 'Trang quản lý phim'
        ]);
    }
    public function destroy($id)
{
    DB::table('movie')
        ->where('id', $id)
        ->update(['status' => 0]);

    return redirect()->route('movie-manager.index')
                     ->with('success', 'Phim đã được xóa mềm');
}

    public function show($id)
{
    return redirect('/movie/' . $id);
}

public function create()
{
    return view('movie_manager.create');
}

public function store(Request $request)
{
    // validate dữ liệu
    $validated = $request->validate([
        'movie_name_vn' => 'required|string|max:100',
        'overview_vn'   => 'required|string',
        'release_date'  => 'required|date',
        'vote_average'  => 'required|numeric',
        'image'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // lưu file ảnh vào storage/app/public
    $path = $request->file('image')->store('movies', 'public');

    // insert vào DB
    DB::table('movie')->insert([
        'movie_name_vn' => $validated['movie_name_vn'],
        'overview_vn'   => $validated['overview_vn'],
        'release_date'  => $validated['release_date'],
        'vote_average'  => $validated['vote_average'],
        'image'         => basename($path),
        'status'        => 1,
    ]);

    return redirect()->route('movie-manager.index')->with('success', 'Thêm phim thành công');
}


    
}

