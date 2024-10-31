@extends('layouts.dashboard.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">
          Buat Produk Baru
        </button>
    </div>
  </div>
  <div class="card mt-2">
    <h5 class="card-header">Tabel Produk</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="productTable">
        <thead>
          <tr class="text-nowrap table-dark">
            <th class="text-white">No</th>
            <th class="text-white">Nama</th>
            <th class="text-white">Slug</th>
            <th class="text-white">Kategori</th>
            <th class="text-white">Thumbnail</th>
            <th class="text-white">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->category->name }}</td>
            <td><img src="{{ $product->thumbnail }}" alt="{{ $product->name }}" width="50"></td>
            <td>
              <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
                Edit
              </button>
              <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#addImageModal{{ $product->id }}">
                Tambah Gambar
              </button>
              <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- / Content -->

<!-- Create Product Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="createProductModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProductModalLabel">Buat Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('dashboard.products.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select class="form-select" id="category_id" name="category_id" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail URL</label>
            <input type="url" class="form-control" id="thumbnail" name="thumbnail" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Product Modals -->
@foreach ($products as $product)
<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="edit_name{{ $product->id }}" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="edit_name{{ $product->id }}" name="name" value="{{ $product->name }}" required>
          </div>
          <div class="mb-3">
            <label for="edit_category_id{{ $product->id }}" class="form-label">Kategori</label>
            <select class="form-select" id="edit_category_id{{ $product->id }}" name="category_id" required>
              @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="edit_thumbnail{{ $product->id }}" class="form-label">Thumbnail URL</label>
            <input type="url" class="form-control" id="edit_thumbnail{{ $product->id }}" name="thumbnail" value="{{ $product->thumbnail }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Add Image Modals -->
@foreach ($products as $product)
<div class="modal fade" id="addImageModal{{ $product->id }}" tabindex="-1" aria-labelledby="addImageModalLabel{{ $product->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addImageModalLabel{{ $product->id }}">Tambah Gambar Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('dashboard.product-images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <div class="modal-body">
          <div class="mb-3">
            <label for="image{{ $product->id }}" class="form-label">Pilih Gambar</label>
            <input type="file" class="form-control" id="image{{ $product->id }}" name="image" accept="image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Unggah Gambar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

@endsection

@push('scripts')
<script>
  $(document).ready(function() {
    $('#productTable').DataTable();
  });
</script>
@endpush
