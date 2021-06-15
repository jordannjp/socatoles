<x-admin-layout>
@section("content")
@section("content")
 @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
             @endif
{{-- ************************************************************************************************ --}}
<!-- The Modal ADD-->
 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModallable">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>

        <!-- Modal body -->

        <form action="/product_save" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <Label>Category: </Label>
             <select name="category_id" class="form-control" required>
             <option></option>
               @foreach($categories as $datas)
             <option value="{{$datas->id}}">{{$datas->name}}</option>
             @endforeach
            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="text" name="price" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label for="file">Choose product Image</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img id="previewimg" alt="" style="max-width: 130px;">
											</div>
											<div class="upload-input">
												<input type="file" name="file" class="form-controle" onchange="previewfile(this)" required/>
                     </div>
										</div>
									</div>
                  </div>
                 </div>
							<div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" cols="30" name="description" required></textarea>
                </div>
                            </div>
             <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Save</button>
        </div>

        </div>
        </form>
      </div>
    </div>
  </div>
  <!--End The Modal ADD-->

{{-- ************************************************************************************************ --}}
  <!-- The Modal Edit-->
  <div class="modal fade" id="editmodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModallable">Edit Product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
            <div><img src="../assets/img/sent.png" alt="" width="50" height="46"></div>
        <form id="edit_modal_Form" method="POST">
                      @csrf
                      @method('Patch')
            <!--<input type="text" id="edit_doctor_id">-->
             <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Product Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="product_name">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <Label>Category: </Label>
             <select name="category_id" class="form-control">
             <option></option>
               @foreach($categories as $datas)
             <option value="{{$datas->id}}">{{$datas->name}}</option>
             @endforeach
            </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input class="form-control" type="text" name="price" id="product_price">
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group">
										<label>Image</label>
										<div class="profile-upload">
											<div class="upload-img">
												<img id="previewimg" alt="product image" style="max-width: 13px;margin-top: 20px;">
											</div>
											<div class="upload-input">
												<input type="file" class="form-control" name="image" onchange="previewfile(this)">
											</div>
										</div>
									</div>
                  </div>
                 </div>
							<div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" cols="30" name="description" id="product_description"></textarea>
                </div>
             <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >save</button>
        </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--End The Modal Edit-->

{{-- ************************************************************************************************ --}}
                            <!-- The delete Modal -->
 <div class="modal fade" id="deletemodalpop" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="">Delete Product</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="delete_modal_Form" method="POST">
                      @csrf
                      @method('DELETE')

        <!-- Modal body -->
        <div class="modal-body text-center">
            <!--<input type="text" id="product_id">-->
						<img src="../assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Product?</h3>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class='btn btn-danger'>Yes </button>
        </div>
        </form>
      </div>
    </div>
  </div>
<!-- end the delete Modal  -->

{{-- ************************************************************************************************ --}}
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="page-title"> Products
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"> Add Product</i></button>

                  @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </h4>
              </div>
              <style>
              .w-10p{width:10% !important;}
              </style>

              <div class="card-body" style=" text-align: center;">
                 <div class="table-responsive">
                 <table class="table table-primary table-hover" id="myTable">
                    <thead >
                     <th class="w-10p">id</th>
                      <th class="w-10p">Name</th>
                      <th class="w-10p">category</th>
                      <th class="w-10p">image</th>
                      <th class="w-10p">Price</th>
                      <th class="w-10p">description</th>
                      <th class="w-10p">Action</th>
                    </thead>
                    <tbody >
                    @foreach($products as $data)
                      <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->category->name}} </td>
                      <td> <img src="{{ asset('images') }}/{{ $data->image }}" alt="Image" class="img-fluid" width="50" higth="50"> </td>
                      <td>{{$data->price}} </td>
                      <td>{{$data->description}} </td>

                      <td>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>

												<div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item bg-info text-white editbtn" style=" font-size: 16px" href="javascript:void(0)">
                        <i class="fa fa-pencil m-r-5"></i> Edit</i>
                               </a>

                               <a class="dropdown-item bg-danger text-white deletebtn"style=" font-size: 16px" href="javascript:void(0)">
                             <i class="fa fa-trash-o m-r-5"></i> Delete
                               </a>
                               </a>
												</div>
											</div>
										</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
       </div>

 {{-- ************************************************************************************************ --}}
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

//taking the id of the product send it to the routre to delete
  $('#myTable').on('click', '.deletebtn', function(){
       $tr = $(this).closest('tr');
       var product = $tr.children('td').map(function(){
         return $(this).text();
       }).get();

      // console.log(product);

       $('#product_id').val(product[0]);
       $('#delete_modal_Form').attr('action', '/delete_product/'+product[0]);
       $('#deletemodalpop').modal('show');

        });

//taking the id of the product send it to the routre to edit
        $('#myTable').on('click', '.editbtn', function(){
       $tr = $(this).closest('tr');
       var product = $tr.children('td').map(function(){
         return $(this).text();
       }).get();

      // console.log(product);

       $('#edit_doctor_id').val(product[0]);
       $('#product_name').val(product[1]);
       $('#product_price').val(product[3]);
       $('#product_description').val(product[5]);
       $('#edit_modal_Form').attr('action', '/update_product/'+product[0]);
       $('#editmodalpop').modal('show');

        });

});

</script>

@endsection
</x-admin-layout>

