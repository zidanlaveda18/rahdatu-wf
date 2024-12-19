<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="title">
            <h1 class="h5">Rahdatu Furniture</h1>
            <p>ADMIN</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li>
                  <a href="{{url('admin/dashboard')}}"> 
                    <i class="icon-home"></i>Home 
                  </a>
                </li>
                
                <li>
                  <a href="{{url('view_category')}}"> 
                    <i class="icon-controls"></i>Kategori 
                  </a>
                </li>
                
                <li>
                  <a href="{{url('add_product')}}">
                    <i class="icon-controls"></i>Tambah Produk
                  </a>
                </li>

                <li>
                  <a href="{{url('view_product')}}">
                    <i class="icon-picture"></i>Lihat Produk
                  </a>
                </li>

                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-layers"></i>Kelola Pesanan </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('view_order')}}">Lihat Pesanan</a></li> 
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                
        </ul>
      </nav>