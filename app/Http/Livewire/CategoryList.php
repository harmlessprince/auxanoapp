<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public $categories;
    public $count = 0;
    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.category-list')->extends('layouts.app');
    }

    
 
 
    public function increment()
    {
        $this->count++;
    }

    public function edit(Category $category)
    {
        dd($category);
        // $this->openModal();/
        // $this->dispatchBrowserEvent('edit-equipment', ['equipment' => $equipment]);
    }

    public function store()
    {
        dd('kdkd');
    }
}
