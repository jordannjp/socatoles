@extends("layouts.master")
@section("content")
    <div class="site-section">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <strong class="text-black">my Orders</strong>
          </div>
        </div>
      </div>
    </div>
    <hr><br>
            <style>
              .w-10p{width:10% !important;}
              </style>
      <div class="container">
       <div class="card-body" style=" text-align: center;">
                 <div class="table-responsive">
                 <table class="table table-primary table-hover" id="myTable">
                <thead>
                  <tr>
                    <th class="w-10p">Client</th>
                    <th class="w-10p">Address</th>
                    <th class="w-10p">Produit</th>
                    <th class="w-10p">Quentity</th>
                    <th class="w-10p">Prix Unique</th>
                    <th class="w-10p">Prix Total</th>
                    <th class="w-10p">Delivery Status</th>
                    <th class="w-10p">Date</th>

                </thead>
                <tbody>

                  @foreach($orders as $item)
                  <tr>
                    <td>
                    <h6 class=" text-black">{{ $item->username }}</h6>
                    </td>
                      <td>
                    <h6 class=" text-black">{{ $item->address }}</h6>
                    </td>
                    <td class="product-thumbnail">
                    <h6> <img src="{{ asset('images') }}/{{ $item->image }}" alt="Image" class="img-fluid">
                    <p></p><p>{{ $item->name }}</p></h6>
                    </td>

                    <td>
                      <h6 class=" text-black">{{ $item->product_quentity }}</h6>
                    </td>
                    <td>
                      <h6 class=" text-black">{{ $item->price }}</h6>
                    </td>
                    <td>
                      <h6 class=" text-black">{{ $item->total_price}}</h6>
                    </td>
                    <td>
                    <h6 class=" text-black">{{ $item->status}}</h6>
                    </td>
                    <td>
                    <h6 class=" text-black">{{ $item->created_at}}</h6>
                    </td>

                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>
@endsection

@section("scripts")

<script>
function previewfile(input){
  var file=$("input[type=file]").get(0).files[0];
  if(file)
  {
    var reader = new FileReader();
    reader.onload= function(){
      $('#previewimg').attr("src",reader.result);
    }
    reader.readAsDataURL(file);
  }
}

$(document).ready( function () {

  //displaying the bootstrap modele table
$('#myTable').DataTable();


});

</script>

@endsection

