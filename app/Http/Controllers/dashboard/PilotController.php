<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pilot;
use Illuminate\Validation\Rule;

class PilotController extends Controller
{
    public function __construct()
    {
        //create read update delete
       $this->middleware(['permission:pilots_read'])->only('index');
        $this->middleware(['permission:pilots_create'])->only('create');
       $this->middleware(['permission:pilots_update'])->only('edit');
       $this->middleware(['permission:pilots_delete'])->only('destroy');

    }//end of constructor

    public function index(Request $request)
    {
        $pilots = Pilot::when($request->search, function($q) use ($request){
            return $q->where('name','like','%'.$request->search.'%');
        })->latest()->paginate(5);
        return view('dashboard.pilots.index', compact('pilots'));
    }//end of index

    
    public function create()
    {
        return view('dashboard.pilots.create');
    }//end of create

    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => 'required|numeric|unique:pilots',
            'Address' => 'required',
            'gender' => 'required',

        ]);
        Pilot::create($request->all());
        session()->flash('success','تم حفظ البيانات بنجاح');
        return redirect()->route('admin.pilots.index');
    }//end of store

    
    public function show($id)
    {
        //
    }

   
    public function edit(Request $request, Pilot $pilot)
    {
        return view('dashboard.pilots.edit', compact('pilot'));
    }

  
    public function update(Request $request, Pilot $pilot)
    {
        $validate = $request->validate([
            'name' => 'required',
            'phone' => ['required', 'numeric', Rule::unique('pilots')->ignore($pilot->id),],
            'Address' => 'required',
            'gender' => 'required',

        ]);
        $pilot->update($request->all());
        session()->flash('success','تم تعديل البيانات  بنجاح');
        return redirect()->route('admin.pilots.index');
    }

    
    public function destroy(Pilot $pilot)
    {
        $pilot->delete();
        session()->flash('success', 'تم حذف البيانات بنجاح');
        return redirect()->route('admin.pilots.index');

    }//end of destroy function
}
