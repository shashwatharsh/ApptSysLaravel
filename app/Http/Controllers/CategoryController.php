<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;
use App\Mail\UpdateAppMsg;
// use App\Http\Controllers\Auth;

class CategoryController extends Controller
{
    
    public function excelinit(){
        return view('imexp.excel');
    }
    public function excelexport(){
        dd('exportfjealj'); 
    }
    //
    public function index(){
        // if(Auth::check()){

        $categories = Category::latest()->paginate(5);
        return view('categories.list',['categories'=>$categories]);
        // }
        // return redirect("login")->withSuccess('You are not allowed to access');
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
        CategoryController::sendmailforapp($category);
        return redirect('/')->withSuccess('New Appointment Created');
    }
    // Send mail
    public function sendmailforapp($categories){
        $mailData = $categories;
        Mail::to($mailData->email)->send(new TestEmail($mailData));
        // dd('Mail sent Sucessfully');
    }
    public function updateappmsg($categories){
        $mailData = $categories;
        Mail::to($mailData->email)->send(new UpdateAppMsg($mailData));
        // dd('Mail sent Sucessfully');
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
        CategoryController::updateappmsg($category);
        return redirect('/')->withSuccess('Value Updated Sucessfully');


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
