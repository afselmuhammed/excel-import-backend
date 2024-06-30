<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProducStoreRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * Retrieve all products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Import products from an Excel file.
     *
     * @param  \App\Http\Requests\ProducStoreRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function import(ProducStoreRequest $request)
    {
        $file = $request->file('file');
        try {
            Excel::import(new ProductsImport, $file);
            return response()->json(['message' => 'File imported successfully', 'status' => 200]);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Error importing file. ' . $e->getMessage()], 500);
        }
    }
}
