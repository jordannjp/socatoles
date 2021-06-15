@extends("layouts.master")

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

         @if(Auth::user())
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
            <h5>Un Produit exite déjà dans le panier veuillez d'abord valider la commande ou retirer pour prendre un autre</h5>
                <a href="/cartlist" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Voir</a>
            @endif

          </div>
@else
<hr>
<div class="mb-5">
<h5> veuillez vous connecter pour ajouter un produit dans le panier</h5>
                <a href="{{ route('login') }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Login</a>
</div>
<hr>
<div class="mb-5">
<h5> Si vous n'avez pas de compte merci de vous inscrire</h5>
                <a href="{{ route('register') }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-success">Register</a>
</div>
@endif
        </div>
        </div>
      </div>
    </div>



  <@endsection
