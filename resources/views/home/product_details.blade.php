<!DOCTYPE html>
<html lang="en">
<head>
  @include('home.css')
  <style type="text/css">
    .hero_area {
        background-color: #f8f9fa;
        padding: 20px 0;
    }
    .shop_section {
        padding: 60px 0;
    }
    .heading_container {
        margin-bottom: 50px;
        text-align: center;
    }
    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        max-width: 1200px;
        margin: auto;
    }
    .product-image {
        flex: 1;
        max-width: 45%;
    }
    .product-image img {
        width: 100%;
        border-radius: 10px;
    }
    .product-details {
        flex: 1;
        max-width: 50%;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .product-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
    }
    .price {
        font-size: 2rem;
        color: #28a745;
        font-weight: bold;
        margin-top: 15px;
    }
    .category {
        font-size: 1rem;
        color: #333;
        margin: 5px 0
    }
    .description {
        font-size: 1rem;
        color: #333;
        margin-top: 10px;
        text-align: justify;
    }
    .contact {
        font-size: 1rem;
        color: #333;
        margin-top: 10px;
        text-align: justify;
    }
    .btn {
      display: block;
        margin-top: 20px;
        padding: 15px;
        background-color: #007bff;
        color: #fff;
        text-align: center;
        font-size: 1.2rem;
        border-radius: 5px;
        transition: background 0.3s;
        text-decoration: none;
    }
    .btn:hover {
        background-color: #0056b3; /* Warna saat hover */
    }
  </style>
</head>
<body>
  <div class="hero_area">
    @include('home.header')
    
  </div>
  <section class="hero_area">
    <div class="container">
      <h2 class="heading_container">Detail Produk</h2>
      <div class="product-container">
        <div class="product-image">
          <img src="/products/{{$data->image}}" alt="">
        </div>
        <div class="product-details">
          <h6 class="product-title">{{ $data->title}}</h6>
          <p class="price">Rp {{$data->price}}</p>
          <p class="category">Kategori: {{ $data->category }}</p>
          <p class="description">{{ $data->description }}</p>
          <p class="contact">Untuk info detail, kami melayani pemesanan dan custom product sesuai selera dan kebutuhan anda. Please DM atau kontak konsultasi GRATIS. Tlp/WA: 0852-1582-0912</p>
          <div class="detail-box">
            <form action="{{ url('add_cart', $data->id) }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary">Tambahkan Keranjang</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('home.footer')
</body>
</html>
