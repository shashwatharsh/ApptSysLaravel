<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){

        $categories = Category::latest()->paginate(5);
        return view('categories.list',['categories'=>$categories]);
    }

    public function create(){
        return view('categories.new');
    }
    public function store(Request $request){

        $request->validate([
            'number' => 'required|max:10|min:10',
            //'reason' => 'required|min:5',
            //'name' => 'required|min:5',
            //'email' => 'required'
        ]);
    //    dd($request->all());
        $category = new Category;
        $category->name = $request->name;
        $category->email = $request->email;
        $category->number = $request->number;
        $category->Reason = $request->Reason;
        $category->date = $request->date;
        $category->save();
        return redirect('/')->withSuccess('New Appointment Created');
    }
    public function edit($id){
        // dd($id);
        $category = Category::where('id',$id)->first();
        return view('categories.edit',compact('category'));
        
    }
    public function update(Request $request, $id){
        $category = Category::where('id',$id)->first();
        $category->name = $request->name;
        $category->email = $request->email;
        $category->number = $request->number;
        $category->Reason = $request->Reason;
        $category->date = $request->date;
        $category->status = $request->status;
        $category->save();
        return redirect('/')->withSuccess('Value Sucessfully Updated');


    }

    // public function export() 
    // {
    //     return Excel::download(new UsersExport, 'list.xlsx');
    // }

    public function destroy($id){
        $category   = Category::where('id',$id)->first();
        $category->delete();
        return redirect("/")->withSuccess('Value Sucessfully Deleted');
    }

}
