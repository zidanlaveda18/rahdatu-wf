<!DOCTYPE html>
<html lang="en">

<head>
  @include('home.css')

  <style type="text/css">
    .hero_area {
        background-color: #f8f9fa; /* Latar belakang yang lebih cerah */
        padding: 20px 0;
    }

    .shop_section {
        padding: 60px 0;
    }

    .heading_container {
        margin-bottom: 40px;
    }

    .div_center {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        background-color: #fff; /* Latar belakang putih untuk gambar */
        border-radius: 10px; /* Sudut melengkung */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    }

    .detail-box {
        padding: 15px;
        text-align: center; /* Rata tengah teks */
    }

    .detail-box h6 {
        margin: 10px 0;
        color: #333; /* Warna teks */
    }

    .price {
        font-size: 1.5rem; /* Ukuran font lebih besar untuk harga */
        color: #28a745; /* Warna hijau untuk harga */
    }

    .description {
        margin-top: 20px;
        font-style: italic; /* Miring untuk deskripsi */
        color: #666; /* Warna teks deskripsi */
        text-align: justify;
        line-height: 1.8;
    }

    .btn {
        background-color: #007bff; /* Tombol biru */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; /* Animasi saat hover */
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

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>{{$data->title}}</h2>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box"> 
            <div class="div_center">
              <img width="400" src="/products/{{$data->image}}" alt="">
            </div>
            <div class="detail-box">
              <h6>{{$data->title}}</h6>
              <h6 class="price">Rp. {{$data->price}}</h6>
            </div>
            <div class="detail-box">
              <h6>Category: {{$data->category}}</h6>
              <h6>Stok Tersedia: <span>{{$data->quantity}} Pcs</span></h6>
            </div>
            <div class="detail-box">
              <p class="description">{{$data->description}}</p>
            </div>
            <div class="detail-box">
              <form action="{{ url('add_cart', $data->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Tambahkan Keranjang</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @include('home.footer')
</body>

</html>
