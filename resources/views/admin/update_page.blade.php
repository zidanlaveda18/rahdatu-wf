<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
     <style type="text/css">
        .form-container {
        padding: 20px;
        border-radius: 8px;
        max-width: 800px;
        margin-left: 20px;
        margin-right: 0;
        margin-top: 20px;
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

      img {
        margin-top: 10px;
        display: block;
        max-width: 150px;
      }
     </style>
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Update Product</h2>
            </div>
        </div>
        <div class="form-container">
            <form action="{{url('edit_product', $data->id)}}" method="post" enctype="multipart/form-data">
                    
                @csrf 

                <div class="mb-3">
                    <label for="title">Nama Produk</label>
                    <input type="text" id="title" name="title" value="{{$data->title}}" required>
                </div>

                <div class="mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" required>{{$data->description}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price">Harga</label>
                    <input type="text" id="price" name="price" value="{{$data->price}}">
                </div>

                <div class="mb-3">
                    <label for="quantity">Kuantitas</label>
                    <input type="number" name="quantity" value="{{$data->quantity}}">
                </div>

                <div class="mb-3">
                    <label for="category">Kategori Produk</label>
                    <select id="category" name="category" required>

                        <option value="{{$data->category}}">{{$data->category}}</option>

                         @foreach($category as $category)
                                
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto Produk Saat Ini</label>
                    <img src="/products/{{$data->image}}" alt="Current Product Image">
                </div>

                <div class="mb-3">
                    <label for="image">Ganti Foto Produk</label>
                    <input type="file" id="image" name="image">
                </div>

                <div>
                    <input class="btn btn-success" type="submit" value="Update Product">
                </div>
            </form>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>