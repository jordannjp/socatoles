<div>
@if (session()->has('message'))
<div class="alert alert-success">
{{ session('message') }}
</div>
@endif
@if($updateMode)
@include('livewire.update')
@else
@include('livewire.create')
@endif
<table class="table table-bordered mt-5">
<thead>
<tr>
<th>No.</th>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Image</th>
<th width="150px">Action</th>
</tr>
</thead>
<tbody>
    
@foreach($products as $product)
<tr>
<td>{{ $product->id }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->description }}</td>
<td>{{ $product->price }}</td>
<td>{{ $product->image }}</td>
<td>
<button wire:click="edit({{ $product->id }})" class="btn btn-primar
y btn-sm">Edit</button>
<button wire:click="delete({{ $product->id }})" class="btn btndanger btn-sm">Delete</button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
