<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieControllerDung extends Controller
{
    // Hiển thị form thêm phim mới
    public function create()
    {
        // Nếu cần truyền danh sách thể loại xuống view
        $genre = DB::table('genre')->get();

        return view('movie_manager.create', compact('genre'));
    }

    // Xử lý lưu phim mới vào DB
    public function store(Request $request)
    {
        // Validate dữ liệu nhập vào
        $validated = $request->validate([
            'movie_name_vn' => 'required|string|max:100',
            'overview_vn'   => 'required|string',
            'release_date'  => 'required|date',
            'vote_average'  => 'required|numeric',
            'image'         => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Lưu file ảnh vào storage/app/public/movies
        $path = $request->file('image')->store('movies', 'public');

        // Insert dữ liệu vào bảng movie
        DB::table('movie')->insert([
            'movie_name_vn' => $validated['movie_name_vn'],
            'overview_vn'   => $validated['overview_vn'],
            'release_date'  => $validated['release_date'],
            'vote_average'  => $validated['vote_average'],
            'image'         => basename($path),
            'status'        => 1,
        ]);

        // Quay lại trang danh sách phim
        return redirect()->route('movie-manager.index')->with('success', 'Thêm phim thành công');
    }
    public function index()
{
    // Chỉ lấy các phim có status = 1 (xóa mềm)
    $movies = DB::table('movie')->where('status', 1)->get();

    return view('movie_manager.index', compact('movies'));
}

}
