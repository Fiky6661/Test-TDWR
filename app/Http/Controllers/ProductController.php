<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $data = Product::all();

        return view('product.index', compact('data'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name'    => 'required|max:255',
            'price'  => 'required',
        ]);

        $input = $request->except('_token');
        
        $save = Product::create($input);

        if(!$save){
            return redirect('product')->with(['type' => 'error', 'message_error' => 'Created Failed']);
        }   
        
        return redirect('product')->with(['type' => 'success', 'message' => 'Product Created']);
    }

    public function edit($id)
    {
        $edit = Product::find($id);
        
        if(!$edit){
            return redirect('product')->with(['type' => 'error', 'message_error' => 'Data Not Found !']);
        }
      
        return view('product.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'  => 'required',
            'price' => 'required',
        ]);
        
        $input = $request->only('name','price');
        
        $save = Product::find($id);

        if(!$save){
            return redirect('product')->with(['type' => 'error', 'message_error' => 'Data Not Found !']);
        }
        
        $save->update($input);

        return redirect('product')->with(['type' => 'success', 'message' => 'Data Updated']);
    }

    public function destroy($id)
    {
        $data = Product::find($id)->delete();

        if(!$data){
            return redirect('product')->with(['type' => 'danger', 'message_error' => 'Deleted Failed']);    
        }
        
        return redirect('product')->with(['type' => 'success', 'message' => 'Data Deleted']);
    }
}
