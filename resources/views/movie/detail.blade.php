<x-movie-layout :title="$movie->movie_name_vn" :genre="$genre">

<div class="movie-info" style="gap: 20px; padding: 20px;">
    <div>
        <img src="{{ asset('storage/'.$movie->image) }}" width="100%">
    </div>

    <div>
        <h2>{{ $movie->movie_name_vn }}</h2>
        <p><b>Ngày phát hành:</b> {{ $movie->release_date }}</p>
        <p><b>Quốc gia:</b> <b>{{ $movie->country_name }}</b></p>
        <p><b>Thời gian:</b> {{ $movie->runtime }} phút</p>
        <p><b>Doanh thu:</b> {{ $movie->revenue }}</p>
        <p><b>Mô tả:</b><br>{{ $movie->overview_vn }}</p>

        @if($movie->trailer)
        <a href="{{ $movie->trailer }}" 
           target="_blank"
           style="display:inline-block; padding: 8px 20px; background-image: linear-gradient(to right, rgba(30,213,169,1) 0%, rgba(1,180,228,1) 100%); color: white; border-radius: 5px; text-decoration: none;">
            Xem trailer
        </a>
        @endif
    </div>
</div>

</x-movie-layout>