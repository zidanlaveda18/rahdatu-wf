<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name =  $request->category;
        $category->save();
        toastr()->timeOut(5000)->closeButton()->success('Category Added Successfully');
        return redirect()->back(); 
    }

    public function delete_category($id)
    {
        $data = Category:: findorFail($id);
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Category Updated Successfully');
        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();
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
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->success('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);
        return view('admin.view_product', compact('product'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $data->delete();
        toastr()->timeOut(5000)->closeButton()->success('Category Deleted Successfully');
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.update_page', compact('data','category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension(); 
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->timeOut(5000)->closeButton()->success('Category Updated Successfully');
        return redirect('/view_product'); 
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product', compact('product'));
    }

    public function view_order()
    {
        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On the Way';
        $data->save();
        return redirect('/view_order');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_order');
    }

    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }

    /*public function dashboard()
    {
        // Label bulan (6 bulan pertama atau dinamis jika perlu)
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];

        // Mengambil Total Pesanan per Bulan
        $monthlyOrders = Order::selectRaw('MONTH(created_at) as month, count(*) as total_orders')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_orders', 'month'); // Ambil data dengan indeks bulan

        // Mengambil Total Pengiriman per Bulan
        $monthlyDelivered = Order::selectRaw('MONTH(created_at) as month, count(*) as total_delivered')
            ->where('status', 'delivered')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_delivered', 'month'); // Ambil data dengan indeks bulan

        // Mapping data untuk memastikan semua bulan ada
        $ordersData = [];
        $deliveredData = [];
        foreach (range(1, 6) as $i) {
            $ordersData[] = $monthlyOrders[$i] ?? 0; // Default 0 jika kosong
            $deliveredData[] = $monthlyDelivered[$i] ?? 0; // Default 0 jika kosong
        }

        // Kirim data ke view
        return view('admin.index', compact('ordersData', 'deliveredData', 'months'));
    }*/

}
