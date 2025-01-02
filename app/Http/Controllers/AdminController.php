<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

Use App\Models\Order;

Use App\Models\Product;

Use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(1000)->closeButton()->addSuccess('The category was successfully created.');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(1000)->closeButton()->addSuccess('The category was successfully deleted.');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
<<<<<<< HEAD
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Updated Successfully');
        return redirect('/view_category');
=======

        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
       $data = Category::find($id);
       
       $data->category_name= $request->category;

       $data->save();

       return redirect('/view_category');
>>>>>>> a89f420 (Ladiva final)
    }

    public function add_product()
    {
        $category = Category::all();
<<<<<<< HEAD
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);
        return view('admin.view_product', compact('product'));
=======

        return view('admin.add_product',compact('category'));
    }
    

    public function upload_product(Request $request)
    {

        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->qty;

        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('products',$imagename);

        $data->image = $imagename;

        }

        $data->save();

        return redirect()->back();

    }
    
    public function view_product()
    {
        $product = Product::all();
        return view('admin.view_product',compact('product'));
>>>>>>> a89f420 (Ladiva final)
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
<<<<<<< HEAD
        $image_path = public_path('products/'.$data->image);

        if (file_exists($image_path)) {
=======

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
>>>>>>> a89f420 (Ladiva final)
            unlink($image_path);
        }

        $data->delete();
<<<<<<< HEAD
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully');
=======

>>>>>>> a89f420 (Ladiva final)
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
<<<<<<< HEAD
        return view('admin.update_page', compact('data', 'category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully');
        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);
        return view('admin.view_product', compact('product'));
    }
}
=======
        return view('admin.update_page', compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
        
    $imagename = time().'.'.$image->getClientOriginalExtension();    

    $request->image->move('products',$imagename);

    $data->image = $imagename;

        }

        $data->save();

        return redirect('/view_product');


    }

    public function view_order()
    {
        $data = Order::all();
        return view('admin.order',compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'on the way';

        $data->save();

        return redirect('/view_orders');

    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');

    }

    public function print_pdf($id)
    {

        $data = Order::find($id);
        
        $pdf = Pdf::loadView('admin.invoice',compact('data'));

        return $pdf->download('invoice.pdf');
    


    }

}
>>>>>>> a89f420 (Ladiva final)
