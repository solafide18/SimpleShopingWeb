<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Category;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    public function GetTransaction()
    {
        $data = Transaction::with('product')->get();
        // error_log("start cek");
        // error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data->count()
        ]);
    }

    public function PostTransaction(Requests\TransactionRequest $request)
    {
        $data = $this->handleRequest($request);
        $transaction = Transaction::create($data);
        
        return response()->json([
            'code' => 200,
            'data' => $transaction,
            'count' => 0,
            'message' => "oke"
        ]);
    }

    public function GetCategory()
    {
        $data = Category::with('products')->get();
        // error_log("start cek");
        // error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data ->count()
        ]);
    }

    public function GetCategoryById($id)
    {
        $data = Category::findOrFail($id);
        error_log("start cek");
        error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data ->count()
        ]);
    }

    public function PostCategory(Requests\CategoryRequest $request)
    {
        $data = $this->handleRequest($request);
        $category = Category::create($data);
        
        return response()->json([
            'code' => 200,
            'data' => $category,
            'count' => 0,
            'message' => "Inserted"
        ]);
    }

    public function PutCategory(Requests\PutCategoryRequest $request)
    {
        $data = $this->handleRequest($request);
        $category = Category::findOrFail($data['id'])->update($data);
        return response()->json([
            'code' => 200,
            'data' => $category,
            'count' => 0,
            'message' => "Updated"
        ]);
    }

    public function DeleteCategory($id)
    {
        $data = Category::with('products')->findOrFail($id);
        // $dataProducts = $data::with('products')->get();
        // $data->delete();
        // error_log("dataProducts");
        // error_log($data);
        if($data->products->count()>0){
            abort(400, "Category masih digunakan dibeberapa Product Active");
        }else{
            return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => 0,
                'message' => "Deleted"
            ]);
        }
    }

    public function GetProduct()
    {
        $data = Product::with('transactions')->get();
        // error_log("start cek");
        // error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data ->count()
        ]);
    }

    public function PostProduct(Requests\CategoryRequest $request)
    {
        $data = $this->handleRequest($request);
        $product = Product::create($data);
        
        return response()->json([
            'code' => 200,
            'data' => $product,
            'count' => 0,
            'message' => "oke"
        ]);
    }

    private function handleRequest($request)
    {
        $data = $request->all();
        return $data;
    }
}
