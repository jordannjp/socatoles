<!DOCTYPE html>
<html lang="en">

<head>
  <title>
     Socatoles
   {{--  @yield("title")  --}}
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
   <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="../assets/fonts/style.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.min (3).css">
  <link rel="stylesheet" href="../assets/css/magnific-popup.css">
  <link rel="stylesheet" href="../assets/css/jquery-ui.css">
  <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
 <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('assets/css/dataTables.min.css')}}">
     <link rel="stylesheet" href="../assets/css/bootstrap5.css">
  <link rel="stylesheet" href="../assets/css/bootstrap5.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="../assets/css/aos.css">
   <link rel="stylesheet" href="../assets/css/style (2).css">
    <link rel="stylesheet" href="../assets/css/style.css">
  {{-- <link href="../assets/css/now-ui-dashboard.css?vf=1.5.0" rel="stylesheet" /> --}}

</head>
<body>

@include('layouts.partials.ecommerce_navbar')


             @yield("content")
@include('layouts.partials.ecommerce_footer')
         </div>

  <script src="../assets/js/jquery-3.3.1.min.js"></script>
  <script src="../assets/js/jquery-ui.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
   <script src="../assets/js/jquery.dataTables.min.js"></script>
   <script src="../assets/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('assets/js/dataTables.min.js')}}"></script>
  <script src="../assets/js/aos.js"></script>
  <script src="../assets/js/main.js"></script>
 <script src="../assets/js/bootstrap5.min.js"></script>
  <script src="../assets/js/bootstrap5.js"></script>
 @yield("scripts")
</body>

<style>
img.slider-img{
  height:400px !important
}
.custom-pudoct{
   margin-top: 80px;
}
.slider-text{
  background-color:#35443585 !important
}
.trending_image{
  height:250px;
}
.search_image{
  height:300px;
}
.single_image{
  height:400px
}
.p-name{
  text-decoration: none;
}
.search{
  float: right;
}
.search-box{

width:500px !important;
height: 40px
}
.w-10p{width:10% !important;}
.w-25p{width:25% !important;}
</style>

</html>
