<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;

class Products extends Component
{
use WithFileUploads;
public $products, $name, $image, $description, $price, $product_id;
public $updateMode = false;

    public function render()
    {

        $this->products = Product::all();
        return view('livewire.products');
    }

private function resetInputFields(){
$this->name = '';
$this->price = '';
$this->description = '';
$this->image = '';
}

public function store()
{
$validatedDate = $this->validate([
'name' => 'required',
'price' => 'required',
'description' => 'required',
'image' => 'required',
]);
Product::create($validatedDate);
session()->flash('message', 'Product Created Successfully.');
$this->resetInputFields();
}

public function edit($id)
{
$$product = Product::findOrFail($id);
$this->pruduct_id = $id;
$this->name = $product->name;
$this->price = $product->price;
$this->description = $product->description;
$this->image = $product->image;
$this->updateMode = true;
}

public function cancel()
{
$this->updateMode = false;
$this->resetInputFields();
}

public function update()
{
$validatedDate = $this->validate([
'name' => 'required',
'price' => 'required',
'description' => 'required',
'image' => 'required|mimes:jpg,jpeg,png,svg,gif|max:2048',
]);
$product = Product::find($this->product_id);
$product->update([
'name' => $this->name,
'price' => $this->price,
'description' => $this->description,
'image' => $this->image,
]);
$this->updateMode = false;
session()->flash('message', 'Product Updated Successfully.');
$this->resetInputFields();
}

public function delete($id)
{
Product::find($id)->delete();
session()->flash('message', 'Product Deleted Successfully.');
}
}
