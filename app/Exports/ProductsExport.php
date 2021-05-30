<?php

namespace App\Exports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;

class ProductsExport implements WithHeadings, WithEvents, ShouldAutoSize, WithMapping, FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Products::with('category')->get();
    // }

    public function query()
    {
        return Products::query()->with('category');
    }
     /**
    * @return array
    */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class  => function (AfterSheet $event)
            {
                $event->sheet->getStyle('A1:W1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 15
                    ]
                ]);
            //    $cellRange = 'A1:W1'; //All headers
            //    $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);

            },
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->ProductName,
            $product->Description,
            $product->Picture,
            $product->Price,
            $product->Quantity,
            $product->Status,
            $product->category->CategoryName
        ];
    }

    public function headings(): array
    {
        return [
            'Mã sách',
            'Tên sách',
            'Mô tả',
            'Hình ảnh',
            'Đơn giá',
            'Số lượng',
            'Trạng thái',
            'Tên loại'
        ];
    }

   
}
