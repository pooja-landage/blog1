<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
//use App\Exports\CategoryExport;
//use App\Imports\CategoryImport;
//use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function getCategories()
    {
        return view('category.index');
    }
    public function submitForm(Request $request)
    {
        $product = new Category();
        $product->name = $request->name;
        $product->slug = $request->name;
        $product->save();
        return redirect()->route('category.table')->with('message', 'Data Successfully Added');
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
    }
    public function getTable(Request $request)
        {
            if ($request->search) {
                $data = Category::where('id', $request->search)
                    ->paginate(5);
                    
                $search = $request->search;
    
                return view('category.table', compact('data', 'search'));
            }
        
            $data = Category::paginate(5);
            // dd($data);
            return view('category.table',compact('data'));
        } 
    public function editform($id)
    {
        $data = Category::find($id);
         
        return view('edit', compact('data'));
    }
    public function updateForm(Request $request,$id)
    {
        $product = Category::find($id);
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->update();
        return redirect()->route('category.table')->with('message', 'Data Successfully Added');
    }
    public function deleteForm(Request $request,$id)
    {
        $product = Category::find($id);
        $product->name = $request->namee;
        $product->slug = $request->slug;
        
        $product->delete();
        return redirect()->route('category.table')->with('message', 'Data Successfully Added');
    }
    public function search(Request $request)
    {
        $store = $request->input('name');
        $data = Category::query()
        ->where('name','LIKE',"%($store)%")
        ->get();
        return view('category.serach',compact('data'));
    }
    public function deleteall(Request $request,$id)
        {
            $id = $request->id;
            
            {
                Category::where('id', $id)->delete();
            }
            return redirect()->route('category.form');
        }
        public function destroy(Request $request)
        {
            if ($request->ids) 
            {
                foreach ($request->ids as $id) 
            {
                Category::destroy($id);
            }

            }

            return response()->json('Success');
        }
        // public function export()
        // {
        //     return Excel::download(new CategoryExport,'user.csv');
        // }
}
