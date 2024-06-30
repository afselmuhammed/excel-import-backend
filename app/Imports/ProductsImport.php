<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Product;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            Product::PRODUCT_NAME => $row[Product::PRODUCT_NAME],
            Product::PRICE => $row[ Product::PRICE],
            Product::SKU => $row['sku'],
            Product::DESCRIPTION => $row[Product::DESCRIPTION],
        ]);
    }
}
