<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        table 
        {
            border: 2px solid #8B4513;
            text-align: center;
        }

        th 
        {
            background-color: #8B4513;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        td
        {
            border: 1px solid #8B4513;
            padding: 10px;
            color: white;
        }

        .table_center
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: auto;
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
                <h2 class="h5 no-margin-bottom">Daftar Pesanan</h2>
            </div>
        </div>
        <div class="table_center">
            <table>
                <tr>
                    <th>Nama pemesan</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change the Status</th>
                    <!--<th>Print PDF</th>-->
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->rec_address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product->title}}</td>
                    <td>Rp.{{$data->product->price}}</td>
                    <td>
                        <img width="150" src="/products/{{$data->product->image}}" >
                    </td>
                    <td>
                        @if($data->status == 'in progress')
                        <span style="color: red">{{$data->status}}</span>

                        @elseif($data->status == 'On the Way')
                        <span style="color: yellow">{{$data->status}}</span>

                        @else
                        <span style="color: green">{{$data->status}}</span>

                        @endif

                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('on_the_way', $data->id)}}">On the Way</a>
                        <a class="btn btn-success" href="{{url('delivered', $data->id)}}">Delivered</a>
                    </td>
                    <!--<td>
                        <a class="btn btn-secondary" href="{{url('print_pdf', $data->id)}}">Print PDF</a>
                    </td>-->
                </tr>

                @endforeach

            </table>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>