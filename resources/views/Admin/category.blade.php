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
          <h4 class="modal-title" id="exampleModallable">Add Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>

        <!-- Modal body -->

        <form action="/save_category" method="POST">
        @csrf
        <div class="modal-body">
        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
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
          <h4 class="modal-title" id="exampleModallable">Edit Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
            <div><img src="../assets/img/sent.png" alt="" width="50" height="46"></div>
        <form id="edit_modal_Form" method="POST">
                      @csrf
                      @method('PATCH')
             <!--<input type="text" id="category_id">-->
             <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>category Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="category_name">
                                    </div>
                                </div>
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
          <h4 class="modal-title" id="">Delete Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="delete_modal_Form" method="POST">
                      @csrf
                      @method('DELETE')

        <!-- Modal body -->
        <div class="modal-body text-center">
						<img src="../assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this category?</h3>
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
                <h4 class="page-title"> Categories
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"> Add Category</i></button>

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
                 <table class="table " id="myTable">
                    <thead >
                     <th class="w-10p">id</th>
                      <th class="w-10p">Name</th>
                      <th class="w-10p">Action</th>
                    </thead>
                    <tbody >
                    @foreach($categories as $data)
                      <tr>
                      <td>{{$data->id}}</td>
                      <td>{{$data->name}}</td>
                      <td>
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item bg-info text-white editbtn"style=" font-size: 16px" href="javascript:void(0)">
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
$(document).ready( function () {

  //displaying the bootstrap modele table
$('#myTable').DataTable();

//taking the id of the category send it to the routre to delete
  $('#myTable').on('click', '.deletebtn', function(){
       $tr = $(this).closest('tr');
       var category = $tr.children('td').map(function(){
         return $(this).text();
       }).get();

      // console.log(category);

       $('#category_id').val(category[0]);
       $('#delete_modal_Form').attr('action', '/delete_category/'+category[0]);
       $('#deletemodalpop').modal('show');

        });

//taking the id of the category send it to the routre to edit
        $('#myTable').on('click', '.editbtn', function(){
       $tr = $(this).closest('tr');
       var category = $tr.children('td').map(function(){
         return $(this).text();
       }).get();

      // console.log(category);

       $('#edit_category_id').val(category[0]);
       $('#category_name').val(category[1]);
       $('#edit_modal_Form').attr('action', '/update_category/'+category[0]);
       $('#editmodalpop').modal('show');

        });

});

</script>

@endsection
</x-admin-layout>
