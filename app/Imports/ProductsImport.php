<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Products([
            //
            'ProductName'    => $row[0],
            'Description'    => $row[1],
            'Picture'    => $row[2],
            'Price'    => $row[3],
            'Quantity'    => $row[4],
            'Status'    => $row[5],
            'Cate_Id'    => $row[6],
        ]);
    }
}
