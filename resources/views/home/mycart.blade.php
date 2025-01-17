<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpg">
    <title>Rahdatu Wooden Furniture - My Cart</title>
     @include('home.css')
    <style type="text/css">
        .cart-container {
            margin: 60px auto;
            max-width: 90%;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th {
            background-color: #555;
            color: white;
            padding: 15px;
            font-size: 18px;
        }

        td {
            padding: 12px;
            font-size: 16px;
        }

        tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f0f0f0;
        }

        img {
            height: 100px;
            width: auto;
            border-radius: 5px;
        }

        .total-price {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    
    </div>

    <div class="cart-container">
        <h2 class="heading">My Cart</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @php $total = 0; @endphp
            @foreach ($cart as $cart)
            <tr>
                <td>{{ $cart->product->title }}</td>
                <td>Rp.{{ $cart->product->price }}</td>
                <td>
                    <img src="/products/{{ $cart->product->image }}" alt="{{ $cart->product->title }}" width="120">
                </td>
                <td>
                    <form action="{{ url('remove_cart', $cart->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </td>
            </tr>
            <?php
                $total = $total + ($cart->product->price * 1000);
            ?>
            @endforeach
        </table>
        <h3 class="total-price">Total belanja: Rp.{{ number_format($total, 0, ',', '.') }}</h3>
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Penerima</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Alamat Penerima</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telefon</label>
                <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Bukti Pembayaran</label>
                <input type="file" name="payment_proof" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="image">Foto Produk</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="payment-instructions">
                <h3>Tata Cara Pembayaran</h3>
                <ul>
                    <li>Transfer pembayaran ke rekening berikut: <strong>1234-5678-9012 (Bank Rahdatu)</strong>.</li>
                    <li>Gunakan nama lengkap Anda sebagai referensi pembayaran.</li>
                    <li>Unggah bukti pembayaran pada kolom di atas untuk verifikasi.</li>
                    <li>Pesanan Anda akan diverifikasi dalam 1-2 hari kerja.</li>
                </ul> 
            </div>
            <button type="submit" class="btn btn-primary">Confirm Order</button>
        </form>
    </div>
  <!-- info section -->
   @include('home.footer')
</body>

</html>