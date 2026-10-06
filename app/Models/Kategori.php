<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';

    protected $fillable = [
        'nama',
        'kode',
    ];

    public function masterItems()
    {
        return $this->belongsToMany(MasterItem::class, 'item_kategori');
    }
}