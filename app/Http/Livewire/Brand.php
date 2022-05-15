<?php

namespace App\Http\Livewire;

use App\Models\Brand as ModelsBrand;
use Livewire\Component;

class Brand extends Component
{

    public $name;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:brands,name', 'max:50'],
        ];
    }
    public function render()
    {
        return view('livewire.brand');
    }

    public function create()
    {
        $this->validate();
        ModelsBrand::create([
            'name' => $this->name
        ]);
        return redirect(route('brands.index'))->with('success', "Brand added successfully");
    }
}
