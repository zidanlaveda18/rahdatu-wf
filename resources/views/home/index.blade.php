<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- slider section -->
     @include('home.slider')
     
  </div>
  <!-- end hero area -->

  <!-- shop section -->
    @include('home.product')
  <!-- info section -->
   @include('home.footer')
</body>

</html>