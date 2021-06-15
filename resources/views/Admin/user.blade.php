<x-admin-layout>
@section("content")

    <div class="site-section">
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <strong class="text-black">Users</strong>
          </div>
        </div>
      </div>
    </div>
    <hr><br>

      <div class="container">
                  <div class="table-responsive">
                 <table class="table table-primary table-hover" id="myTable">
                <thead>
                  <tr>
                    <th class="w-10p">#</th>
                    <th class="w-10p">Name</th>
                    <th class="w-10p">Email</th>
                </thead>
                <tbody>

                  @foreach($users as $user)
                  <tr>
                    <td>
                    <h6 class=" text-black">{{ $user->id }}</h6>
                    </td>

                      <td>
                    <h6 class=" text-black">{{ $user->name }}</h6>
                    </td>

                    <td>
                      <h6 class=" text-black">{{ $user->email }}</h6>
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
</x-admin-layout>

