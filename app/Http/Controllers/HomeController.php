<?php

namespace App\Http\Controllers;

use App\allBill;
use App\billQ;
use App\Category;
use App\customerBill;
use App\customerInfo;
use App\Product;
use App\stock;
use App\supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    function welcome()
    {
        return view('welcome');
    }
    function category()
    {
        $addCategory = Category::all();
         Alert::success('Success Title', 'Success Message');

        return view('category', compact('addCategory'));
    }
    function saveNewCategory(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'categoryName' => 'required',
            'activation' => 'required',
            'adiinfo' => 'required',
        ]);
        Category::insert([
            'categoryName' => $request->categoryName,
            'activation' => $request->activation,
            'adiinfo' => $request->adiinfo,
            'created_at' => Carbon::now()
        ]);

        return back()->with('greenStatus','New Category Added 👍');
    }
    function changeCategoryActivation($id,$currentData)
    {
        if ($currentData == 1) {
            Category::findOrFail($id)->update([
                'activation' => 0
            ]);
            return back()->with('greenStatus','Deactivated');
        }
        else {
            Category::findOrFail($id)->update([
                'activation' => 1
            ]);
            return back()->with('greenStatus', 'Activated 👍');
        }
    }
    function deleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return back()->with('greenStatus',"Category Deleted 👏");
    }
    function categoryEdit($id)
    {
        $data = Category::findOrFail($id)->all();
        return view('categoryEdit',compact('id'));
    }
    function saveEditedCategory(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'activation' => 'required',
            'adiinfo' => 'required',
        ]);
        Category::findOrFail($request->id)->update([
            'categoryName' => $request->categoryName,
            'activation' => $request->activation,
            'adiinfo' => $request->adiinfo,
            '	updated_at' => Carbon::now()
        ]);

        return redirect("category")->with('greenStatus', 'Category Edited 😁');
    }
    function supplier()
    {
        $allSupplier = supplier::all();
        // Alert::success('Success Title', 'Success Message');

        return view('supplier', compact('allSupplier'));
    }
    function saveNewSupplier(Request $request)
    {
        // print_r($request->all());
        $request->validate([
            'supplierName' => 'required',
            'companyName' => 'required',
            'firstContact' => 'required',
            'activation' => 'required',
            'supplierAddress' => 'required',
        ]);
        supplier::insert([
            'supplierName' => $request->supplierName,
            'companyName' => $request->companyName,
            'firstContact' => $request->firstContact,
            'secondContact' => $request->secondContact,
            'activation' => $request->activation,
            'supplierAddress' => $request->supplierAddress,
            'created_at' => Carbon::now()
        ]);

        return back()->with('greenStatus', 'New Supplier Added 👍');
    }
    function changeSupplierActivation($id, $currentData)
    {
        if ($currentData == 1) {
            supplier::findOrFail($id)->update([
                'activation' => 0
            ]);
            return back()->with('greenStatus', 'Deactivated');
        } else {
            supplier::findOrFail($id)->update([
                'activation' => 1
            ]);
            return back()->with('greenStatus', 'Activated 👍');
        }
    }
    function deleteSupplier($id)
    {
        supplier::findOrFail($id)->delete();
        return back()->with('greenStatus', "Supplier Deleted 👏");
    }
    function supplierEdit($id)
    {
        $data = supplier::findOrFail($id)->all();
        return view('supplierEdit', compact('id'));
    }
    function saveEditedSupplier(Request $request)
    {
        $request->validate([
            'supplierName' => 'required',
            'companyName' => 'required',
            'firstContact' => 'required',
            'activation' => 'required',
            'supplierAddress' => 'required',
            ]);
            supplier::findOrFail($request->id)->update([
                'supplierName' => $request->supplierName,
                'companyName' => $request->companyName,
                'firstContact' => $request->firstContact,
                'secondContact' => $request->secondContact,
                'activation' => $request->activation,
                'supplierAddress' => $request->supplierAddress,
                'updated_at' => Carbon::now()
                ]);
                return redirect("supplier")->with('greenStatus', 'Supplier Edited 😁');
            }
            function stockManager()
            {
                $lastId = stock::all()->last();
                $allStock = stock::paginate(5);
                $allSupplier = supplier::all();
                $allCategory = Category::all();
                $allProduct = Product::all();
                return view('stockManager',compact('allProduct','allStock','lastId', 'allSupplier', 'allCategory'));
            }
            function saveNewStock(Request $request)
            {
                // print_r($request->all());
                $request->validate([
                    'stockid' => 'required',
                    'productid' => 'required',
                    'quantity' => 'required|numeric',
                    'supplierid' => 'required|numeric',
                    'categoryid' => 'required|numeric',
                    'buingPrice' => 'required|numeric',
                    'sellingPrice' => 'required|numeric',
                    'expireDate' => 'required|date',
                    'totalBill' => 'required|numeric',
                    'pay' => 'required|numeric',
                    'dis' => 'required',
                    'due' => 'required|numeric',
                    'payMethod' => 'required|numeric',
                    'dueDate' =>'required|date',
                ]);
                stock::insert([
                    'stockid' => $request->stockid,
                    'productid' => $request->productid,
                    'quantity' => $request->quantity,
                    'supplierid' => $request->supplierid,
                    'categoryid' => $request->categoryid,
                    'buingPrice' => $request->buingPrice,
                    'sellingPrice' => $request->sellingPrice,
                    'expireDate' => $request->expireDate,
                    'totalBill' => $request->totalBill,
                    'pay' => $request->pay,
                    'dis' => $request->dis,
                    'due' => $request->due,
                    'payMethod' => $request->payMethod,
                    'dueDate' => $request->dueDate,
                    'created_at' => Carbon::now(),
                ]);
                        return back()->with('greenStatus', 'New Stock Saved ✔');
            }
                    function stockEdit($id)
                    {
                        $allSupplier = supplier::all();
                        $allCategory = Category::all();
                        $data = stock::findOrFail($id)->all();
                        return view('stockEdit', compact('id', 'allSupplier', 'allCategory'));
                    }
                    function saveEditedStock(Request $request)
                    {
                        $request->validate([
                            'stockid' => 'required',
                            'stockName' => 'required',
                            'quantity' => 'required|numeric',
                            'supplierid' => 'required|numeric',
                            'categoryid' => 'required|numeric',
                            'buingPrice' => 'required|numeric',
                            'sellingPrice' => 'required|numeric',
                            'expireDate' => 'required|date',
                            ]);
                            stock::findOrFail($request->id)->update([
                                'stockName' => $request->stockName,
                                'quantity' => $request->quantity,
                                'supplierid' => $request->supplierid,
                                'categoryid' => $request->categoryid,
                                'buingPrice' => $request->buingPrice,
                                'sellingPrice' => $request->sellingPrice,
                                'expireDate' => $request->expireDate,
                                ]);
                     return redirect(__('stockManager'))->with('greenStatus', 'Stock Edited 😁');
        }
        function deleteStock($id)
        {
            stock::findOrFail($id)->delete();
            return back()->with('greenStatus', "Stock Deleted 👏");
        }
        function products()
        {
        $lastId = Product::all()->last();
        $allProduct = Product::paginate(5);;
        $allSupplier = supplier::all();
        $allCategory = Category::all();
        return view('product', compact('allProduct', 'lastId', 'allSupplier', 'allCategory'));
        }
        function saveNewProduct(Request $request)
        {
        $request->validate([
            'productid' => 'required',
            'productName' => 'required',
            'categoryid' => 'required|numeric',
            'aditional' => 'required',
        ]);
        Product::insert([
            'productid' => $request->productid,
            'productName' => $request->productName,
            'categoryid' => $request->categoryid,
            'aditional' => $request->aditional,
        ]);
        return back()->with('greenStatus', 'New Product Saved ✔');
        }
        function getProductName(Request $request)
        {
            $stringToSend = "";
            $allcity = Product::where('categoryid', $request->categoryid)->get();
            foreach ($allcity as $value) {
            $stringToSend .= "<option value='" . $value->id . "'>".$value->productName."</option>";
                // echo $value->name;
            }
            echo $stringToSend;
        }
        function viewStock()
        {
            // $allProduct = Product::all();;
            // $allSupplier = supplier::all();
            // $allCategory = Category::all();
            $allStock = stock::all();
            return view('viewStock',compact('allStock'));
        }
        function saleProduct()
        {
            $lastId = customerBill::all()->last();
            $allProduct = Product::paginate(5);;
            $allSupplier = supplier::all();
            $allCategory = Category::all();
            $allStock = stock::all();
            return view("saleProduct", compact('allStock','lastId','allProduct','allSupplier','allCategory','allStock'));
        }
        function getBuingPrice(Request $request)
        {
            $stringToSend = "";
            // $allcity = stock::find('stockid')->all();
            $allcity = stock::where('id', $request->stockid)->get('buingPrice');
            foreach ($allcity as $value) {
            // array_push($stringToSend, $value->buingPrice, $value->sellingPrice);
                $stringToSend = $value->buingPrice;
            }
            echo($stringToSend);
            // print_r($allcity);
        }
        function getSellingPrice(Request $request)
        {
            $stringToSend = "";
            // $allcity = stock::find('stockid')->all();
            $allcity = stock::where('id', $request->stockid)->get('sellingPrice');
            foreach ($allcity as $value) {
            // array_push($stringToSend, $value->buingPrice, $value->sellingPrice);
                $stringToSend = $value->sellingPrice;
            }
            echo($stringToSend);
            // print_r($allcity);
        }
        function getquantity(Request $request)
        {
            $stringToSend = "";
            // $allcity = stock::find('stockid')->all();
            $allcity = stock::where('id', $request->stockid)->get('quantity');
            foreach ($allcity as $value) {
            // array_push($stringToSend, $value->buingPrice, $value->sellingPrice);
                $stringToSend = $value->quantity;
            }
            echo($stringToSend);
            // print_r($allcity);
        }


        function getProducts(Request $request)
        {
            $stringToSend = "";
            $allcity = stock::where('categoryid', $request->categoryid)->get();
            foreach ($allcity as $value) {
                //sending stock id and product name form tracking category id in stock
            $stringToSend .= "<option value='" . $value->id . "'>".Product::find($value->productid)->productName."</option>";
            // echo $value->name;

            }
            echo $stringToSend;
        }
        function saveSellQueue(Request $request)
        {
            // print_r($request->all());
            $request->validate([
                'stockid' => 'required',
                'saleid' => 'required',
                'categoryid' => 'required|numeric',
                'buingPrice' => 'required|numeric',
                'sellingPrice' => 'required|numeric',
                'quantity' => 'required|numeric',
                'available' => 'required|numeric',
                'totalBill' => 'required|numeric',
                'pay' => 'required|numeric',
                'due' => 'required|numeric',
                'dis' => 'required',
                'payMethod' => 'required',
                'dueDate' => 'required|date',
            ]);
            billQ::insert([
                'stockid' => $request->stockid,
                'saleid' => $request->saleid,
                'categoryid' => $request->categoryid,
                'buingPrice' => $request->buingPrice,
                'sellingPrice' => $request->sellingPrice,
                'quantity' => $request->quantity,
                'available' => $request->available,
                'totalBill' => $request->totalBill,
                'pay' => $request->pay,
                'due' => $request->due,
                'dis' => $request->dis,
                'payMethod' => $request->payMethod,
                'dueDate' => $request->dueDate,
            ]);
            return back()->with('greenStatus', 'Sell Added ✔');
        }
        function queue()
        {
            $allqueue = billQ::all();
            return view('queue',compact('allqueue'));
        }
        function saveNewCustomer(Request $request)
        {
        $request->validate([
            'customerName' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $customerId = customerInfo::insertGetId([
            'customerName' => $request->customerName,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);


        $allqueue = billQ::all();
        $thisSaleId = '';
        foreach ($allqueue as $value) {
            $stockNow = stock::findOrFail($value->stockid)->quantity;
            $billId = customerBill::insertGetId([
                'stockid' => $value->stockid,
                'saleid' => $value->saleid,
                'categoryid' => $value->categoryid,
                'buingPrice' => $value->buingPrice,
                'sellingPrice' => $value->sellingPrice,
                'quantity' => $value->quantity,
                'available' => $value->available,
                'totalBill' => $value->totalBill,
                'pay' => $value->pay,
                'due' => $value->due,
                'dis' => $value->dis,
                'payMethod' => $value->payMethod,
                'dueDate' => $value->dueDate,
                'customerid' => $customerId,
                'sallerid' => Auth::user()->id,
            ]);
            stock::findOrFail($value->stockid)->update([
                'quantity' => $stockNow-$value->quantity,
                'updated_at' => Carbon::now(),
            ]);
            // customerBill::findOrFail($billId)->update([
            //     'quantity' => $stockNow-$value->quantity,
            // ]);
            $thisSaleId = $value->saleid;
            allBill::insert([
                'saleid' => $thisSaleId,
                'customerid' => $customerId,
            ]);
            billQ::findOrFail($value->id)->delete();
        }


            // echo Auth::user()->id;

        return back()->with('greenStatus', 'New Customer Saved 👍');
        }
    }
