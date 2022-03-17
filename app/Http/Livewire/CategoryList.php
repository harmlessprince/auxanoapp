<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    // public $name;
    public function render()
    {
        return view('livewire.category-list', [
            'categories' =>  Category::paginate(10)
        ]);
    }


    public function edit(Category $category)
    {
        dd($category);
        // $this->openModal();/
        // $this->dispatchBrowserEvent('edit-equipment', ['equipment' => $equipment]);
    }
}
