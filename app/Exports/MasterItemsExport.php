<?php

namespace App\Exports;

use App\Models\MasterItem;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MasterItemsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return MasterItem::select(
            'id',
            'kode',
            'nama',
            'harga_beli',
            'laba',
            'supplier',
            'jenis',
            'created_at',
            'updated_at'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Kode',
            'Nama',
            'Harga Beli',
            'Laba',
            'Supplier',
            'Jenis',
            'Created At',
            'Updated At',
        ];
    }
}