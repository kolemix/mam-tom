<x-movie-layout :genre="$genre" title="Danh sách phim">
    <h2 class="text-center mb-4">DANH SÁCH PHIM</h2>

    <div class="mb-3">
        <button class="btn btn-success">Thêm</button>
    </div>

    <table id="id-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th>Giới thiệu</th>
                <th>Ngày phát hành</th>
                <th>Điểm đánh giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $movie->image) }}" 
                             alt="{{ $movie->movie_name_vn }}" 
                             style="width:80px; height:auto;">
                    </td>
                    <td>{{ $movie->movie_name_vn }}</td>
                    <td>{{ $movie->overview_vn }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->vote_average }}</td>
                    <td>
                        <a href="{{ route('movie-manager.show', $movie->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <form action="{{ route('movie-manager.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="return confirm('Bạn có chắc muốn xóa phim này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Script khởi tạo DataTable đặt ngay sau bảng --}}
    <script>
        $(document).ready(function() {
            $('#id-table').DataTable({
                responsive: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
                bStateSave: true,
                language: {
                    search: "Search:",
                    lengthMenu: "Hiển thị _MENU_ phim mỗi trang",
                    info: "Đang hiển thị _START_ đến _END_ trong tổng số _TOTAL_ phim",
                    paginate: {
                        first: "Đầu",
                        last: "Cuối",
                        next: "Sau",
                        previous: "Trước"
                    }
                }
            });
        });
    </script>
</x-movie-layout>
