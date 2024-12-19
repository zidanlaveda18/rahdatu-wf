<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .invoice-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .header {
            text-align: center;
        }
        .header h1 {
            margin: 0;
        }
        .invoice-details, .billing-info {
            margin-top: 20px;
        }
        .billing-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .billing-info th, .billing-info td{
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        .invoice-details table{
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed; /* Membuat kolom memiliki lebar yang seragam */
        }
        .invoice-details th, .invoice-details td {
            padding: 10px; /* Tambah padding agar lebih seimbang */
            border-bottom: 1px solid #ddd;
            text-align: center; /* Pusatkan teks */
        }
        .invoice-details th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        .invoice-details td {
            vertical-align: middle; /* Tengah secara vertikal */
        }
        .invoice-details th:nth-child(1), .invoice-details td:nth-child(1) {
            width: 25%; /* Tentukan lebar untuk kolom 'Product' */
        }
        .invoice-details th:nth-child(2), .invoice-details td:nth-child(2) {
            width: 25%; /* Tentukan lebar untuk kolom 'Quantity' */
        }
        .invoice-details th:nth-child(3), .invoice-details td:nth-child(3) {
            width: 25%; /* Tentukan lebar untuk kolom 'Price' */
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h1>Invoice</h1>
            <p><strong>Rahdatu Wooden Furniture</strong></p>
            <p>Jl. Sleman,Yogyakarta</p>
            <p>Email: info@rahdatu.com | Phone: 08123456789</p>
        </div>

        <div class="billing-info">
            <h2>Billing Information</h2>
            <table>
                <tr>
                    <td><strong>Invoice No:</strong></td>
                    <td>#INV001</td>
                </tr>
                <tr>
                    <td><strong>Order Date:</strong></td>
                    <td>2024-10-29</td>
                </tr>
                <tr>
                    <td><strong>Customer Name:</strong></td>
                    <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <td><strong>Customer Address:</strong></td>
                    <td>{{$data->rec_address}}</td>
                </tr>
                <tr>
                    <td><strong>Customer Phone Number:</strong></td>
                    <td>{{$data->phone}}</td>
                </tr>
            </table>
        </div>

        <div class="invoice-details"> 
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php
                    $value = 0; // Inisialisasi variabel untuk menghitung total harga
                    ?>
                    <tr>
                        <td>{{$data->product->title}}</td>
                        <td>1</td>
                        <td>Rp {{$data->product->price}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total">
            <p><strong>Subtotal:</strong></p>
            <p><strong>Total:</strong></p>
        </div>
    </div>
</body>
</html>
