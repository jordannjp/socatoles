@extends("layouts.master")

@section("title")
   E-Commerce
@endsection

@section("content")

    
    <div class="site-section">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"> 
            <h4><strong class="text-black">Panier</strong></h4>
          </div>
        </div>
      </div>
    </div>
    <hr><br>

      <div class="container">
        <div class="row mb-5">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class=" w-10p">Image</th>
                    <th class=" w-10p">Produit</th>
                    <th class=" w-10p">Prix Unique</th>
                    <th class=" w-10p">Quantity</th>
                    <th class=" w-10p">Prix Total</th>
                    <th class=" w-10p">Retirer</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach($products as $item)
                  <tr>
                    <td class="product-thumbnail">
                     <img src="{{ asset('images') }}/{{ $item->image }}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black">{{ $item->name }}</h2>
                    </td>
                    <td>{{ $item->price }}CFA</td>
                    <td>
                 <form action="/updateitem/{{$item->cart_id}}" method="POST">
            @csrf
             @method('Patch')
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" value="{{ $item->product_quentity }}" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" name=quentity>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
            <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">modifier</button>
            </form>
                    </td>
                    <td>{{ $item->total_price }}CFA</td>
                    <td><a href="/removeitem/{{ $item->cart_id }}" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
        </div>
    
        <div class="row">
          
              <div class="col-md-4">
              
            </div>

            @if ($count==0)
                
                <div class="col-md-4">
                    <div class="text-center"><h4>Votre panier es vide</h4></div>
                 <a href="/shop" class="btn btn-success btn-lg btn-block"> Ajouter un produit </a>
            </div>
            @else
                <div class="col-md-4">
                 <a href="ordernow">
                    <button class="btn btn-success btn-lg btn-block" onclick="window.location='checkout'">Confirmé</button>
                    </a>
            </div>
            @endif
           
              <div class="col-md-4">
                 
                  </div>
            
          </div>
          
        </div>
      </div>
    </div>

@endsection