<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageUpload;
use App\Models\Item;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ItemsController extends Controller
{
    public $perPage = 6;

    public function __construct()
    {
    }

    public function filter(Request $request)
    {
        $all = $request->all();
        if(empty($all)) {
            return redirect(route('home'));
        }

        $items = Item::query();

        $keyword = $request->get('search'); 
        if (!empty($keyword)) {
            $items->where(function($q) use ($keyword) {
                $q->where('title', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->active();
            });
        }

        if ($request->has('type') && !empty($request->get('type'))) {
            $items->where('type', $request->get('type'));
        }

        if ($request->has('sort') && !empty($request->get('sort'))) {
            $type = 'DESC';
            if ($request->has('sortorder') && !empty($request->get('sortorder'))) {
                if($request->get('sortorder')=='asc') {
                    $type = 'ASC';
                }
            }
            $items->orderBy($request->get('sort'),$type);
        }

        if ($request->has('mileage_start') && !empty($request->get('mileage_start'))) {
            $items->where('mileage', '>=', $request->get('mileage_start'));
        }
        if ($request->has('mileage_end') && !empty($request->get('mileage_end'))) {
            $items->where('mileage', '<=', $request->get('mileage_end'));
        }
        if ($request->has('price_start') && !empty($request->get('price_start'))) {
            $items->where('price', '>=', $request->get('price_start'));
        }
        if ($request->has('price_end') && !empty($request->get('price_end'))) {
            $items->where('price', '<=', $request->get('price_end'));
        }
        if ($request->has('userid') && !empty($request->get('userid'))) {
            $items->where('user_id', '=', $request->get('userid'));
        }
        

        $items = $items->paginate($this->perPage);

        return view('item.products', compact('items','all'));
    }

    /**
     * Display a listing of the resource./ 
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search'); //$_GET['search'] zapis w php;

        if (!empty($keyword)) {
            $items = Item::where('title', 'LIKE', "%$keyword%")
                ->orWhere('desc', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('location', 'LIKE', "%$keyword%")
                ->orWhere('brand', 'LIKE', "%$keyword%")
                ->active()
                ->latest()->paginate($this->perPage);
        } else {
            $items = Item::latest()->active()
                ->paginate($this->perPage);
        }
        
        return view('item.products', ['items'=>$items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parentCategories = Category::where('parent_id',null)->with('subcategory')->get();

        return view('item.create',compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required|max:1000',
            'photos.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required',
            'mail' => 'required|email',
            'phone' => 'required',
            'price' => 'required|numeric|max:9999999',
            'type' => ['required', Rule::in(collect(Item::CARS)->keys())],
            'brand' => 'required',
            'fuel' => ['required', Rule::in(collect(Item::FUEL)->keys())],
            'mileage' => 'required|numeric',

        ]);
        $validatedData['user_id'] = auth()->user()->id;

        $item = Item::create($validatedData);

        if(isset($request->photos)) {
            collect($request->photos)->each(function ($file) use ($item) {
                $requestData['user_id'] = auth()->user()->id;
                $requestData['item_id'] = $item->id;
                $imageName = $file->hashName();
                Storage::disk('public')->putFileAs('items', new File($file), $imageName);
                $requestData['filename'] = $imageName;

                ImageUpload::create($requestData);
            });
        }

        return redirect(route('items.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        $items = Item::inRandomOrder()->take(6)->get();

        return view('item.show', compact('item','items')); //['item'=>$item,'items....]
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
/*        $item = Item::findOrFail($id);

        return view('item.edit', compact('item'));*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        /*$this->validate($request, [
            'category_id' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required',
            'photos.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location' => 'required',
            'mail' => 'required|email',
            'phone' => 'required',
            'price' => 'required|numeric',
            'type' => ['required', Rule::in(collect(Item::CARS)->keys())],
            'brand' => 'required',
            'fuel' => ['required', Rule::in(collect(Item::FUEL)->keys())],
            'mileage' => 'required|numeric',
        ]);
        $requestData = $request->all();

        $item = Item::findOrFail($id);
//        if($item->user_id !== auth()->user()->id) {
//           return redirect('items.index')->withErrors('brak uprawnień');
//          } //todo zrobic cos takiego jakby byla edycja
        $item->update($requestData);

        return redirect('product')->with('flash_message', 'Item updated!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
/*        Item::destroy($id);

        return redirect('product')->with('flash_message', 'Item deleted!');*/
    }
}
