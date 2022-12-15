<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Food;

class FoodController extends Controller
{
    public function __construct()
    {
        //create read update delete
       $this->middleware(['permission:foods_read'])->only('index');
        $this->middleware(['permission:foods_create'])->only('create');
       $this->middleware(['permission:foods_update'])->only('edit');
       $this->middleware(['permission:foods_delete'])->only('destroy');

    }//end of constructor
    
    public function index(Request $request)
    {
        $foods = Food::when($request->search, function($q)use ($request){

            return $q->where('title','like','%'.$request->search.'%');

        })->latest()->paginate(2);

        return view('dashboard.foods.index', compact('foods'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.foods.create');
    }

    
    public function store(Request $request)
    {
         //validate the request
         $validate = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
            'description' => 'required',
        ]);

        //get all request
        $request_data = $request->all();

        //proccess the image 
        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/foods_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();

        }//end of if

        //insert all the request
        Food::create($request_data);
        session()->flash('success','تم حفظ البيانات بنجاح');
        return redirect()->route('admin.foods.index');
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit(Food $food, Request $request)
    {
        return view('dashboard.foods.edit', compact('food'));
    }//end of edit

    
    public function update(Request $request, Food $food)
    {
         //validate the request
         $validate = $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
            'description' => 'required',
        ]);

        $request_data = $request->all();

        if($request->image){
            storage::disk('public_uploads')->delete('/foods_images/'.$food->image);
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/foods_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }

        $food->update($request_data);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->route('admin.foods.index');
    }//end of update

   
    public function destroy(Food $food)
    {
        storage::disk('public_uploads')->delete('/foods_images/'.$food->image);
        $food->delete();

        session()->flash('success','تم حذف البيانات بنجاح');
        return redirect()->route('admin.foods.index');
    }//end of delete
}
