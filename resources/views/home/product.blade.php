<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
      </div>
      <div class="row">

        @foreach($product as $products)
        
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="{{url('product_details',$products->id)}}">
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$products->title}}</h6>
              </div>

              <div class="detail-box">
                <h6>
                  <span>Rp.{{$products->price}}</span>
                </h6>
              </div>
            </a>

            <div class="cart-button">
              <a class="btn btn-custom" href="{{url('add_cart', $products->id)}}">
                <i class="fa fa-shopping-cart"></i> Tambahkan Keranjang
              </a>
            </div>

          </div>
        </div>

        @endforeach
        
      </div>
      
    </div>
</section>
