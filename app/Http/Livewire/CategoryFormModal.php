<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryFormModal extends Component
{

    public $name;
    public $editMode = false;
    public $category;
    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'unique:categories,name', 'max:50'],
        ];
    }
    public function render()
    {
        return view('livewire.category-form-modal');
    }

    public function create()
    {
        $validatedData = $this->validate();
        Category::create($validatedData);
        return redirect(route('categories.index'))->with('success', "Category added successfully");
    }
}
