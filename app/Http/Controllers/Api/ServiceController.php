<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Category;
use App\Product;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = public_path(config('cms.image.directory'));
    }
    //Transaction
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
        $product = Product::with('transactions')->findOrFail($data['product_id']);
        if($product->stock <= 0){
            abort(400, "Stock Product kosong");
        }
        if($product->transactions->count() >= $product->stock){
            abort(400, "Stock Product kosong");
        }
        $transaction = Transaction::create($data);
        
        return response()->json([
            'code' => 200,
            'data' => $transaction,
            'count' => 0,
            'message' => "Pesanan Anda sedang diproses"
        ]);
    }

    public function PostTransactionApprove(Requests\TransactionRequest $request)
    {
        // $user = Auth::user();
        $data = $this->handleRequest($request);
        $statusApproval = $data['status'];
        $data = $this->handleRequest($request);
        $transaction = Transaction::findOrFail($data['id']);
        $transaction->user_id = 1;//$user->id;
        $transaction->confirmed_at = Carbon::now();
        $transaction->status = $statusApproval;
        $transaction->save();
        
        if($statusApproval == 10){
            $product = Product::findOrFail($data['product_id']);
            $product->stock = $product->stock - 1;
            $product->save();
        }
        return response()->json([
            'code' => 200,
            'data' => $transaction,
            'count' => 0,
            'message' => "Pesanan an. '".$transaction->full_name."' sedang diproses,<br> pastikan untuk mengirim pesanan tersebut"
        ]);
    }
    //End Transaction
    //Category
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

    public function GetDDLCategory()
    {
        $data = Category::get();
        // error_log("start cek");
        // error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data->count()
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
        try {
            $data = $this->handleRequest($request);
            $category = Category::create($data);
            
            return response()->json([
                'code' => 200,
                'data' => $category,
                'count' => 0,
                'message' => "Inserted"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'data' => null,
                'count' => 0,
                'message' => $e->getMessage()
            ]);
        }
        
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
    //End Category

    //Product
    public function GetProduct()
    {
        $data = Product::with('category', 'transactions')->get();
        // error_log("start cek");
        // error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data ->count()
        ]);
    }

    public function GetProductById($id)
    {
        $data = Product::findOrFail($id);
        error_log("start cek");
        error_log($data);
        return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => $data ->count()
        ]);
    }

    public function PostProduct(Requests\ProductRequest $request)
    {
        try {
            $data = $this->handleRequest($request);
            $product = Product::create($data);
            
            return response()->json([
                'code' => 200,
                'data' => $product,
                'count' => 0,
                'message' => "Inserted"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'data' => null,
                'count' => 0,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function PutProduct(Requests\PutProductRequest $request)
    {
        try {
            $data = $this->handleRequest($request);
            $product = Product::findOrFail($data['id'])->update($data);
            return response()->json([
                'code' => 200,
                'data' => $product,
                'count' => 0,
                'message' => "Updated"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'data' => null,
                'count' => 0,
                'message' => $e->getMessage()
            ]);
        }
        
    }

    public function DeleteProduct($id)
    {
        $data = Product::with('transactions')->findOrFail($id);
        // $dataProducts = $data::with('products')->get();
        // $data->delete();
        // error_log("dataProducts");
        // error_log($data);
        if($data->transactions->count()>0){
            abort(400, "Product masih digunakan dibeberapa transaksi active");
        }else{
            return response()->json([
                'code' => 200,
                'data' => $data,
                'count' => 0,
                'message' => "Deleted"
            ]);
        }
    }
    //End Product

    // private function handleRequest($request)
    // {
    //     $data = $request->all();
    //     return $data;
    // }

    private function handleRequest($request)
    {
        $uuid = Str::uuid()->toString();
        $data = $request->all();
        // dd($request);
        if ($request->file('path_image_upload'))
        {
            $image       = $request->file('path_image_upload');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if ($successUploaded)
            {
                $width     = config('cms.image.thumbnail.width');
                $height    = config('cms.image.thumbnail.height');
                $extension = $image->getClientOriginalExtension();
                // $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                $thumbnail = $uuid."_thumb.{$extension}";

                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }

            $data['path_image'] = config('cms.image.directory') . '/' . $thumbnail;
        }

        return $data;
    }
}
