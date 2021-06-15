@extends("layouts.master")

@section("title")
  E-Commerce
@endsection

@section("content")

   

    <div class="site-section">
     <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"></span> <strong class="text-black">Result For Product</strong>
      </div>
        </div>
      </div>
    </div>
    <hr><br>
      <div class="container">
        
        <div class="row">
          <div class="col-sm-6 col-lg-4" > <a href="#">filter</a></div>
            @foreach($products as $item)
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
            <a href="/shop-single/{{$item->id}}"> <img class="search_image" src="{{ asset('images') }}/{{ $item->image }}" alt="Image"></a>
            <h4><a class="p-name text-dark" href="/shop-single/">{{ $item->name }}</a></h4>
            <p class="price">Prix: {{ $item->price }} cfa</p>
          </div>
            @endforeach
    
          </div>
    </div>
    </div>

   
  @endsection