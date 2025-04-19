<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'nilai',
        'price',
        'saldo_awal',
        'saldo_akhir',
        'category_id',
        'nilai_rupiah',
    ];

    // Relasi ke Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
