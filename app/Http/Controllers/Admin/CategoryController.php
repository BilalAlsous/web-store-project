<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\TempProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $prods = DB::select('select * from categories');
        $msg = '';
        return view('admin.category.index', ['categories' => $prods, 'message' => $msg]);
    }

    public function deletecat(Request $req)
    {
        $name = $req->input('name');
        $result  = DB::table('categories')->where('name', '=', $name)->value('id');
        $id = DB::table('products')->where('catid', '=', $result)->value('id');
        $comid = DB::table('comments')->where('pid', '=', $id)->value('id');
        $oid = DB::table('order_details')->where('product_id', '=', $id)->value('id');
        DB::table('comments')->where('id', '=', $comid)->delete();
        DB::table('carts')->where('product_id', '=', $id)->delete();
        DB::table('order_details')->where('id', '=', $oid)->delete();
        DB::table('products')->where('id', '=', $id)->delete();
        DB::table('categories')->where('id', '=', $result)->delete();
        $prods = DB::select('select * from categories');
        $msg = 'The Category Deleted Sucessfully';
        return view('admin.category.index', ['categories' => $prods, 'message' => $msg]);
    }

    public function add()
    {
        $msg = '';
        return view('admin.category.add', ['message' => $msg]);
    }

    public function acceptrequests(Request $req)
    {
        $prod = new Product();
        $prod->name = $req->input('name');
        $prod->quantity = $req->input('quantity');
        $prod->price = $req->input('price');
        $prod->discount_price = $req->input('discount_price');
        $prod->description = $req->input('description');
        $prod->catid = $req->input('catid');
        $prod->imgpath = $req->input('imgpath');
        $prod->save();
        $id = $req->input('id');
        DB::table('temp_products')->where('id', '=', $id)->delete();
        return redirect('/showtemps')->with('status', 'Category Added Successfully');
    }

    public function deleterequests(Request $req)
    {
        $id = $req->input('id');
        DB::table('temp_products')->where('id', '=', $id)->delete();
        return redirect('/showtemps')->with('status', 'Category Added Successfully');
    }

    public function insert(Request $req)
    {
        // Check if file is present
        if ($req->hasFile('imgpath')) {
            $file = $req->file('imgpath');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('/assets/uploads/category'), $filename);
            $imgPath = '/assets/uploads/category/' . $filename;
        } else {
            return back()->with('error', 'Image file is required');
        }
        $category = new Category();
        $category->name = $req->input('name');
        $category->description = $req->input('description');
        $category->imgpath = $imgPath;
        $category->save();
        $msg = 'The Category Added Sucessfully';
        return view('admin.category.add', ['message' => $msg]);
    }

    public function showrequests()
    {
        $prods = DB::select('select * from temp_products');
        return view('ProductRequest', ['prods' => $prods]);
    }

    public function orderequests()
    {
        $prods = DB::select('select * from orders');
        $orders = DB::select('select * from payments,orders where orders.id=payments.order_id');
        return view('orderRequest', ['prods' => $prods, 'orders' => $orders]);
    }
}