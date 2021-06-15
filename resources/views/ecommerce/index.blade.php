
@extends("layouts.master")

@section("title")
   Socatoles
@endsection

@section("content")
 @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
             @endif

   <div class="custom-pudoct">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

     <ol class="carousel-indicators">
     @foreach($products_tole as $item => $slider)
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    @endforeach
  </ol>

  <div class="carousel-inner">
      @foreach($products_tole as $item => $slider)
      <div class="carousel-item {{ $item == 0 ? 'active' : '' }}">
        <a href="/shop-single/{{$slider['id']}}" class="center-block "><img src="{{ asset('images') }}/{{ $slider->image }}" class="d-flex justify-center w-100  slider-img " alt="...">
      <div class="carousel-caption d-none d-md-block slider-text">
        <h5>{{ $slider['name'] }}</h5>
        <p>{{ $slider['description'] }}</p>
      </div></a>
      </div>
      @endforeach

  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgb(152, 173, 211) !important;"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgb(152, 173, 211) !important;"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
    </div>
   </div>

    <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="title-section text-center col-12">
            <h2 class="text-uppercase">CHAPENTRE</h2>
          </div>
        </div>

       <div>

        <div class="row">
          @foreach($products_charpente as $item)

             <div class="col-sm-6 col-lg-3 text-center item mb-4">
            <a href="/shop-single/{{$item->id}}"> <img class="trending_image" src="{{ asset('images') }}/{{ $item->image }}" alt="Image"></a>
            <h5><a class="p-name text-dark" href="/shop-single/">{{ $item->name }}</a></h5>
            <p class="price">{{ $item->price }}CFA</p>
          </div>
          @endforeach
          <div class="row mt-5 ">
          <div class="col-12 text-center">
            <a href="/chap" class="btn btn-primary px-4 py-3">voir tous</a>
          </div>
        </div>
          </div>

          <div class="site-section bg-light">
        <div class="row">
            <div class="title-section text-center col-12">
            <h2 class="text-uppercase">Produits</h2>
          </div>
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
               @foreach($products_tole as $item)
            <div class="text-center item mb-3">
            <a href="/shop-single/{{$item->id}}"> <img class="trending_image" src="{{ asset('images') }}/{{ $item->image }}" alt="Image"></a>
            <h5><a class=" text-dark" href="/shop-single/">{{ $item->name }}</a></h5>
            <p class="price"> {{ $item->price }}CFA</p>
          </div>
          @endforeach

            </div>
          </div>
          <div class="row mt-5">
          <div class="col-12 text-center">
            <a href="/shop" class="btn btn-primary px-4 py-3">voir tous les produits</a>
          </div>
        </div>
        </div>
    </div>

      </div>
      </div>
      </div>





@endsection
