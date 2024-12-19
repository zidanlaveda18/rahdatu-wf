<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
      .form-container {
        /*background: #ffffff;*/
        padding: 20px;
        border-radius: 8px;
        max-width: 800px;
        margin-left: 20px; /* Geser ke kiri */
        margin-right: 0; /* Optional: memastikan form tidak terlalu rapat di kanan */
        margin-top: 20px; /* Jarak atas untuk memberi ruang dari header */
      }

      .form-container label {
        font-weight: bold;
        margin-bottom: 8px;
        display: block;
      }

      .form-container input,
      .form-container textarea,
      .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 6px;
      }

      .form-container input[type="file"] {
        padding: 5px;
      }

      .form-container .btn {
        width: 100%;
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <!-- Content -->
    <div class="page-content">
      <!-- Page Header -->
      <div class="page-header">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Tambah Produk</h2>
        </div>
      </div>

      <!-- Form Container -->
      <div class="form-container">
        <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="title">Nama Produk</label>
            <input type="text" id="title" name="title" required>
          </div>

          <div class="mb-3">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" required></textarea>
          </div>

          <div class="mb-3">
            <label for="price">Harga</label>
            <input type="text" id="price" name="price">
          </div>

          <div class="mb-3">
            <label for="qty">Kuantitas</label>
            <input type="number" id="qty" name="qty">
          </div>

          <div class="mb-3">
            <label for="category">Kategori Produk</label>
            <select id="category" name="category" required>
              <option value="">Select a Category</option>
              @foreach($category as $category)
              <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="image">Foto Produk</label>
            <input type="file" id="image" name="image">
          </div>

          <div>
            <input type="submit" class="btn btn-success" value="Tambah Product">
          </div>
        </form>
      </div>
    </div> 

    <!-- JavaScript files -->
    @include('admin.js')
  </body>
</html>
