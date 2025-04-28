<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: #4A5568;
            font-size: 2rem;
            font-weight: bold;
        }

        .table_deg {
            width: 100%;
            max-width: 1000px;
            margin: auto;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        td {
            border: 2px solid #333;
            padding: 12px;
            text-align: center;
            color: #333;
        }

        th {
            background-color: #8B4513;
            border: 2px solid #666;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 12px;

        }

        td {
            border-bottom: 1px solid #ddd;
            padding: 12px;
            text-align: center;
            color: #333;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        input[type='search'] {
            width: 350px;
            height: 40px;
            border: 2px solid #ddd;
            border-radius: 8px;
            /* Sudut tumpul, tidak oval */
            padding: 0 15px;
            font-size: 16px;
            outline: none;
            transition: 0.3s;
        }

        input[type='search']:focus {
            border-color: #28a745;
            /* Warna hijau */
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.5);
        }

        input[type='submit'] {
            background: #28a745;
            /* Warna hijau */
            color: #fff;
            border: none;
            border-radius: 8px;
            /* Sudut tumpul */
            height: 40px;
            padding: 0 20px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type='submit']:hover {
            background: #218838;
            /* Warna hijau lebih gelap saat hover */
        }

        form {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            margin-left: 20px;
        }

        .add_product{
            margin: 10px 0 20px 20px;
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
                <h1 class="h5 no-margin-bottom">Daftar Produk</h1>
            </div>
        </div>
            
        <form action="{{url('product_search')}}" method="get">
                @csrf
                <input type="search" name="search" placeholder="cari produk">
                <input type="submit" class="btn btn-secondary" value="Cari">
            </form>

        <div class="add_product">
            <a class="btn btn-success" href="{{url('add_product')}}">Tambah produk</a>
        </div>

        <div class="div_deg">
            <table class="table_deg">
                <tr>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Kuantitas</th>
                    <th>Foto</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>

                @foreach($product as $products)

                    <tr>
                        <td>{{$products->title}}</td>
                        <td>{!!Str::limit($products->description, 50)!!}</td>
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$products->image}}">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product', $products->id)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)"
                                href="{{url('delete_product', $products->id)}}">Hapus</a>
                        </td>
                    </tr>

                @endforeach
            </table>

        </div>

        <div class="div_deg">
            {{$product->onEachSide(1)->links()}}
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
</body>

</html>