<!-- halaman myorders -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpg">
    <title>Rahdatu Wooden Furniture</title>
    @include('home.css')

    <style type="text/css">
        .orders-container {
            margin: 60px auto;
            max-width: 90%;
            background: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        th {
            background-color: #333;
            color: #fff;
            padding: 15px;
            font-size: 18px;
        }

        td {
            padding: 12px;
            font-size: 16px;
        }

        tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e1e1e1;
        }

        img {
            height: 150px;
            width: auto;
            border-radius: 5px;
        }

        .heading {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
       
        
        <div class="orders-container">
            <h2 class="heading">My Orders</h2>
            <table>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Verifikasi Pembayaran</th>
                    <th>Status Pengiriman</th>
                    <th>Gambar Produk</th>
                </tr>
                @foreach ($order as $order)
                <tr>
                    <td>{{ $order->product->title }}</td>
                    <td>Rp.{{ $order->product->price }}</td>
                    <td></td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <img src="/products/{{ $order->product->image }}" alt="{{ $order->product->title }}" width="100">
                    </td>
                </tr>
                @endforeach>
            </table>
            
        </div>
    </div>

    @include('home.footer')
</body>
</html>

