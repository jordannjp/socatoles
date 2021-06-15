@extends("layouts.master")

@section("title")
   E-Commerce
@endsection

@section("content")
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="col-md-12 mb-0">
            <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Vérifier</strong>
          </div>
          </div>
        </div>
        <div class="row">

              <div class="col-md-6">
                <h2 class="h3 mb-3 text-black">Votre Commande</h2>
                <div class="p-3 p-lg-5 site-blocks-table border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th class=" w-10p">Produit</th>
                      <th class=" w-10p">Prix Unique</th>
                      <th class=" w-10p">Prix Total</th>
                    </thead>
                    <tbody>
                      @foreach($products as $item)
                      <tr>
                        <td class="product-name">{{ $item->name }} <strong class="mx-2">x</strong>{{ $item->product_quentity }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total_price }}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td class="text-black font-weight-bold" clospan="2"><strong>Total de la commande</strong></td>
                        <td></td>
                        <td class="text-black font-weight-bold"><strong>{{ $sum_total_price }}CFA</strong></td>
                      </tr>
                    </tbody>
                  </table>
                 <a href="/cartlist"><button class="btn btn-success btn-lg btn-block ">modifier</button></a>
                </div>
              </div>
           

          <div class="col-md-6 mb-6 mb-md-0">
            <h2 class="h3 mb-3 text-black">Vos Information</h2>
            <div class="p-3 p-lg-5 border">

            <form action="/send-email" method="post">
            @csrf
              <div class="form-group">
                <div class="col-md-12">
                  <label>ADDRESS <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="{{ Auth::user()->email }}" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>TELEPHONE <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="tel" name="tel" placeholder="" required>
                </div>
              </div>
               @foreach($products as $item)
                <input type="hidden" value="{{ $item->name }}" name="pname">
                <input type="hidden" value="{{ $item->product_quentity }}" name="pquentity">
                <input type="hidden" value="{{ $item->price }}" name="puniqueprice">
                <input type="hidden" value="{{ $item->total_price }}" name="ptotalprice">
               @endforeach
              <hr>
                  <div class="form-group">
                      <br>
                    <button type="submit" class="btn btn-success btn-lg btn-block" >Passer la commande</button>
                  </div>
    
            </div>
            </form>
          </div>
          </div>
          <div class="col-md-6">
    
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
    
    

    
 <@endsection