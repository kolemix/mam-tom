<x-movie-layout :title="'Trang chủ'" :genre="$genre">

<div class="list-movie">
    @foreach($movies as $movie)
    <div class="movie">
        <a href="{{url('/movie/'.$movie->id)}}">
            <img src="{{asset('storage/'.$movie->image)}}" width="100%">
            <h5>{{$movie->movie_name_vn}}</h5>
            <p>{{$movie->release_date}}</p>
        </a>
    </div>
    @endforeach
</div>

</x-movie-layout>