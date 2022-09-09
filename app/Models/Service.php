<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_ref_id",
        "category_ref_id",
        "details",
        "cost",
        "installment_ref_id",
    ];
}
