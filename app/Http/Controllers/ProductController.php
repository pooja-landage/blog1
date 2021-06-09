<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Exports\UserExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function getForm()
    {
        return view('form');
    }
    public function submitForm(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->author = $request->author;
        $product->description = $request->description;
        if($files = $request->file('image'))
        {
            $name = $files->getClientOriginalName();
            $files->move('images',$name);
            $product->image = $name;
        }
        $product->save();
        return redirect()->route('product.table')->with('message', 'Data Successfully Added');
            $validator = Validator::make($request->all(),
                [
                 'title' => 'required|min:4|max:25',
                 'description' => 'required|min:4|max:25',
                ],[
                'title.required' => ' The title field is required.',
                 'title.min' => ' The title must be at least 4 characters.',
               'title.max' => ' The title may not be greater than 25 characters.',
                'description.required' => ' The description field is required.',
                 'description.min' => ' The description must be at least 4 characters.',
                'description.max' => ' The description may not be greater than 25 characters.',
                 ]);
             $validator->validate();
             dd('Form submitted successfully.');
    }
    public function getTable(Request $request)
        {
            if ($request->search) {
                $data = Product::where('id', $request->search)
                    ->paginate(5);
                    
                $search = $request->search;
    
                return view('table', compact('data', 'search'));
            }
        
            $data = Product::paginate(5);
            // dd($data);
            return view('table',compact('data'));
        } 
    public function editform($id)
    {
        $data = Product::find($id);
         
        return view('edit', compact('data'));
    }
    public function updateForm(Request $request,$id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->author = $request->author;
        $product->description = $request->description;
        $product->update();
        return redirect()->route('product.table')->with('message', 'Data Successfully Added');
    }
    public function deleteForm(Request $request,$id)
    {
        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = $request->slug;
        $product->author = $request->author;
        $product->description = $request->description;
        $product->delete();
        return redirect()->route('product.table')->with('message', 'Data Successfully Added');
    }
    public function search(Request $request)
    {
        $store = $request->input('product');
        $data = Product::query()
        ->where('id','LIKE',"%($store)%")
        ->get();
        return view('serach',compact('data'));
    }
    public function deleteall(Request $request,$id)
        {
            $id = $request->id;
            
            {
                Product::where('id', $id)->delete();
            }
            return redirect()->route('product.form');
        }
        public function destroy(Request $request)
        {
            if ($request->ids) 
            {
                foreach ($request->ids as $id) 
            {
                Product::destroy($id);
            }

            }

            return response()->json('Success');
        }
        public function export()
        {
            return Excel::download(new UsersExport,'user.csv');
        }     
}
