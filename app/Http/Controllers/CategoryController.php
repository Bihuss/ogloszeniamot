<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public $categories = array();

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentCategories = Category::where('parent_id',null)->with('subcategory')->get();

        return view('item.categoryTreeSelect', compact('parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function categoryChildRecursive($id) {
        $children = array();

        if(Category::find($id)->subcategory) {
//            dump(Category::find($id)->subcategory);
            # It has children, let's get them.
            Category::find($id)->subcategory->each(function ($i) use (&$children) {
                $children[$i->name] = ['id'=>$i->id,'child'=>$this->categoryChildRecursive($i->id)];
            });
        }

        return $children;
    }

    public function categoryChild($i,$item = null) {
        $children = array();

        if(!is_null($item)) {
            $this->categories[$item->id] = $item->name;
//            array_push($this->categories,$item->name);
        }
        if($i->subcategory) {
            $i->subcategory->each(function ($i) use (&$children) {
                $children[$i->name] = $this->categoryChild($i,$i);
            });
        }

        return $children;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perPage = 25;
//        $routeName = 'item.products';

        $thisCat = Category::find($id);
        $this->categoryChild($thisCat);

        $categories = collect($this->categories);
        $categories[$thisCat->id] = $thisCat->name;

        $items = Item::whereIn('category_id',$categories->keys())
            ->latest()->paginate($perPage);

        return view('item.products', compact('items','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
