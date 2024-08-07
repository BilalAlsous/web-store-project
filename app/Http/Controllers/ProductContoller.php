<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Payments;
use App\Models\TempProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class ProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('products', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function insertcomment(Request $req)
    {
        $com = new Comments();
        $com->pid = $req->input('id');
        $com->username = $req->input('username');
        $com->content = $req->input('content');
        $com->rate = $req->input('rate');
        $com->save();

        $single = $req->input('id');
        $comment = Comments::find($single);

        return view('addcomment', ['item' => $comment]);
    }
    public function confirm(Request $request)
    {
        $pay = new Payments;
        $pay->order_id = $request->input('order_id');
        $pay->user_id = $request->input('user_id');
        $pay->payment_status = 'not paid';
        $pay->payment_id = $request->input('pay_no');
        $pay->save();
        return redirect()->to('/dashboard');
    }
    public function update_temp(Request $request)
    {
        $prodid = $request->input('id');
        $quantity = $request->input('quantity');
        $name = $request->input('name');
        $price = $request->input('price');
        $dprice = $request->input('discount_price');
        $desc = $request->input('description');

        $affected = DB::table('temp_products')
            ->where('id', $prodid)
            ->update(['quantity' => $quantity, 'name' => $name, 'price' => $price, 'discount_price' => $dprice, 'description' => $desc]);
        $prods = DB::select('select * from temp_products');
        $msg = 'تم التعديل بنجاح';
        return view('showtemps', ['prods' => $prods, 'message' => $msg]);
    }
    public function delete_temp(Request $req)
    {
        $id = $req->input('id');
        DB::table('temp_products')->where('id', '=', $id)->delete();
        $prods = DB::select('select * from temp_products');
        $msg = 'تم الحذف بنجاح';
        return view('showtemps', ['prods' => $prods, 'message' => $msg]);
    }
    public function showtemps()
    {
        $prods = DB::select('select * from temp_products');
        $msg = '';
        return view('showtemps', ['prods' => $prods, 'message' => $msg]);
    }
    public function temp_create(Request $req)
    {
        // Check if file is present
        if ($req->hasFile('imgpath')) {
            $file = $req->file('imgpath');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('/assets/uploads/products'), $filename);
            $imgPath = '/assets/uploads/products/' . $filename;
        } else {
            return back()->with('error', 'Image file is required');
        }

        $prod = new TempProduct();
        $prod->name = $req->input('name');
        $prod->quantity = $req->input('quantity');
        $prod->price = $req->input('price');
        $prod->discount_price = $req->input('discount_price');
        $prod->description = $req->input('description');
        $catname = $req->input('selectedoption');
        $result  = DB::table('categories')->where('name', '=', $catname)->value('id');
        $prod->catid = $result;
        $prod->imgpath = $imgPath;
        $prod->save();
        $msg = 'The Product Uploaded Successfully Waite to Accept From Admin !';
        return view('addproduct', ['categories' => Category::all(), 'message' => $msg]);
    }

    public function create(Request $req)
    {
        // Check if file is present
        if ($req->hasFile('imgpath')) {
            $file = $req->file('imgpath');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('/assets/uploads/products'), $filename);
            $imgPath = '/assets/uploads/products/' . $filename;
        } else {
            return back()->with('error', 'Image file is required');
        }

        $prod = new Product();
        $prod->name = $req->input('name');
        $prod->quantity = $req->input('quantity');
        $prod->price = $req->input('price');
        $prod->discount_price = $req->input('discount_price');
        $prod->description = $req->input('description');
        $catname = $req->input('catname');
        $prod->imgpath = $imgPath;
        $result  = DB::table('categories')->where('name', '=', $catname)->value('id');

        $prod->catid = intval($result);


        $prod->save();

        return redirect('/dashboard')->with('status', 'Category Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products; // products is a function in a Category model 
        return view('products', compact('category', 'products'));
    }
    public function showSingle(Request $req)
    {
        $single = $req->input('id');
        $result = DB::table('comments')->where('pid', '=', $single)->get();

        $product = Product::find($single);
        $cat = Category::find($product->catid);
        return view('single', ['item' => $product, 'category' => $cat, 'result' => $result]);
    }


    public function addcomment(Request $req)
    {
        if (Auth::id()) {
            $single = $req->input('id');

            return view('addcomment', ['item' => $single]);
        } else {
            return redirect('login');
        }
    }
    public function showcomment(Request $req)
    {
        if (Auth::id()) {
            $single = $req->input('id');

            $result = DB::table('comments')->where('pid', '=', $single)->get();

            return view('showcomment', ['result' => $result]);
        } else {
            return redirect('login');
        }
    }
    public function cartShow(Request $req)
    {
        if (Auth::id()) {
            $single = $req->input('id');
            $product = Product::find($single);
            
            $products[] = $product;
            
            return view('cart', ['item' => $products]);
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
