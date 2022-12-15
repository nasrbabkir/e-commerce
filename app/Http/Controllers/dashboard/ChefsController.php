<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\Chef;

class ChefsController extends Controller
{
    public function __construct()
    {
        //create read update delete
       $this->middleware(['permission:chefs_read'])->only('index');
        $this->middleware(['permission:chefs_create'])->only('create');
       $this->middleware(['permission:chefs_update'])->only('edit');
       $this->middleware(['permission:chefs_delete'])->only('destroy');

    }//end of constructor
    
    public function index(Request $request)
    {
        $chefs = Chef::when($request->search, function($q) use ($request){

            return $q->where('name','like'.'%'.$request->search.'%');

        })->latest()->paginate(5);

        return view('dashboard.chefs.index', compact('chefs'));

    }//end of index

   
    public function create()
    {
        return view('dashboard.chefs.create');
    }//end of create

    
    public function store(Request $request)
    {
        //validate the request
        $validate = $request->validate([

            'name' => 'required',
            'speiality' => 'required',
            'image' => 'required',

        ]);
        //get all request
        $request_data = $request->all();

        if($request->image){

            Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/chefs_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }
        //insert all the request
        Chef::create($request_data);
        session()->flash('success', 'تم إضافة البيانات بنجاح');
        return redirect()->route('admin.chefs.index');

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Chef $chef, Request $request)
    {
        return view('dashboard.chefs.edit', compact('chef'));
    }

   
    public function update(Chef $chef, Request $request)
    {
         //validate the request
         $validate = $request->validate([

            'name' => 'required',
            'speiality' => 'required',
            'image' => 'image',

        ]);
        //get all request
        $request_data = $request->all();

        if($request->image){

            storage::disk('public_uploads')->delete('/chefs_images/'.$chef->image);
            Image::make($request->image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path('uploads/chefs_images/' . $request->image->hashName()));

            $request_data['image'] = $request->image->hashName();
        }
        //insert all the request
        $chef->update($request_data);
        session()->flash('success', 'تم تعديل البيانات بنجاح');
        return redirect()->route('admin.chefs.index');
    }

    
    public function destroy(Chef $chef)
    {

        storage::disk('public_uploads')->delete('/chefs_images/'.$chef->image);
        $chef->delete();

        session()->flash('success','تم حذف البيانات بنجاح');
        return redirect()->route('admin.chefs.index');
        
    }//end of destroy
}
