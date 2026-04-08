<x-movie-layout :genre="$genre" title="Thêm phim mới">
    <h2 class="text-center mb-4" 
        style="color: #004080; font-weight: bold; text-transform: uppercase;">
        THÊM PHIM
    </h2>

    <form action="{{ route('movie-manager.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="movie_name_en" class="form-label">Tên tiếng Anh</label>
            <input type="text" name="movie_name_en" class="form-control" required
                   oninvalid="this.setCustomValidity('Vui lòng nhập tên tiếng Anh')"
                   oninput="this.setCustomValidity('')">
        </div>

        <div class="mb-3">
            <label for="movie_name_vn" class="form-label">Tên tiếng Việt</label>
            <input type="text" name="movie_name_vn" class="form-control" required
                   oninvalid="this.setCustomValidity('Vui lòng nhập tên tiếng Việt')"
                   oninput="this.setCustomValidity('')">
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Ngày phát hành</label>
            <input type="date" name="release_date" class="form-control" required
                   oninvalid="this.setCustomValidity('Vui lòng chọn ngày phát hành')"
                   oninput="this.setCustomValidity('')">
        </div>

        <div class="mb-3">
            <label for="overview_vn" class="form-label">Mô tả</label>
            <textarea name="overview_vn" class="form-control" rows="3" required
                      oninvalid="this.setCustomValidity('Vui lòng nhập mô tả phim')"
                      oninput="this.setCustomValidity('')"></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ảnh đại diện</label>
            <input type="file" name="image" class="form-control" accept="image/*" required
                   oninvalid="this.setCustomValidity('Vui lòng chọn ảnh đại diện')"
                   oninput="this.setCustomValidity('')">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('movie-manager.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</x-movie-layout>
