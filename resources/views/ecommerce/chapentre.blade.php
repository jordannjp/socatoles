@extends("layouts.master")

@section("title")
  E-Commerce
@endsection

@section("content")



    <div class="site-section">
     <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"></span> <strong class="text-black bg-info">Chapentre</strong>

       {{-- <div class="search">
       <form class="form-inline " action="/search">
    <input class="form-control mr-sm-2 search-box" name="search" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit"><span style="color:black"><i class="fa fa-search"></i>Search</span></button>
  </form>
      </div> --}}
      </div>
        </div>
      </div>
    </div>
    <hr><br>
      <div class="container">

        <div class="row">
            @foreach($products as $item)
            <div class="col-lg-4 col-6  text-center item mb-4 w-25p">
            <a href="/shop-single/{{$item->id}}"> <img class="trending_image" src="{{ asset('images') }}/{{ $item->image }}" alt="Image"></a>
            <h5><a class="p-name text-dark" href="/shop-single/">{{ $item->name }}</a></h5>
            <p class="price"> {{ $item->price }} FCFA</p>
          </div>
            @endforeach
          </div>

        <div class="row">
          <div class="col-md-12 lg text-center">
                <div>{{ $products->links()}}</div>
          </div>
        </div>
        
    </div>
    </div>
    </div>



  @endsection



{{-- @extends("layouts.master")

@section("title")
   E-Commerce
@endsection

@section("content")



    <div class="site-section">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">Votre Commande</strong></div>
        </div>
      </div>
    </div>
    <hr><br>
      <div class="container">
        <div class="row">
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img class="single_image" src="{{ asset('images') }}/{{ $product->image }}" alt="Image" class="img-fluid p-5">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $product->name }}</h2>
            <div> 
                <h4>Description:</h4>
                <h5>{{ $product->description }}</h5>
            </div>
            <p><spam class="h4">Prix:</spam><strong class="text-primary h4">{{ $product->price }} CFA</strong></p>


            @if($count==0)
                <form action="/add_to_cart" method="post">
            @csrf
            <div class="mb-5">
                <div> <h5>quantité:</h5></div>
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" name=quentity>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
            <input type="hidden" value="{{ $product['id'] }}" name="product_id">
            <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Ajouter au panier</button>
            </form>
            @else
            <h5>Un Produit exite déjà dans le panier veuillez d'abord valider ou retirer pour prendre un autre</h5>
                <a href="/cartlist" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Voir</a>
            @endif

          </div>
        </div>
        </div>
      </div>
    </div>



  <@endsection --}}