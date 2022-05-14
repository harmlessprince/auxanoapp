<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryFormModal extends Component
{

    public $name;
    public $editMode = false;
    public $category;

    public function mount($category = null)
    {
        $this->category = $category;
    }
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:category,name', 'max:50'],
        ];
    }
    public function render()
    {
        return view('livewire.category-form-modal', [
            'category' =>  $this->category,
        ]);
    }

    public function create()
    {
        $validatedData = $this->validate();
       
    }
}
