<form>
<input type="hidden" wire:model="product_id">
<div class="form-group">
<label for="exampleFormControlInput1">Name:</label>
<input type="text" class="form-control" id="exampleFormControlInput1" pl
aceholder="Enter product name" wire:model="name">
@error('name') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<div class="form-group">
<label for="exampleFormControlInput2">Description:</label>
<textarea type="email" class="form-control" id="exampleFormControlInput2
" wire:model="description" placeholder="Enter description"></textarea>
@error('description') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<div class="form-group">
<label for="exampleFormControlInput1">Price:</label>
<input type="text" class="form-control" id="exampleFormControlInput1" pl
aceholder="Enter product price" wire:model="price">
@error('price') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<div class="form-group">
<label for="exampleFormControlInput1">Image:</label>
<input type="file" class="form-control" id="exampleFormControlInput1" wire:model="image">
@error('image') <span class="text-danger">{{ $message }}</span>@enderror
</div>

<button wire:click.prevent="update()" class="btn btn-dark">Update</button>
<button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
