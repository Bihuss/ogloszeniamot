<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public function boot()
    {
        \Illuminate\Support\Facades\View::composer('layouts.app', function ($view) {
            $parentCategories = Category::where('parent_id',null)->with('subcategory')->get();
            $view->with('parentCategories',$parentCategories);
        });
    }
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
