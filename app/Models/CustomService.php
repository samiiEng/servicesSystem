<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomService extends Model
{
    use HasFactory;
    protected $table = "customServices";
    protected $fillable = [
        "details",
        "cost",
        "service_ref_id",
        "customer_ref_id",
        "installment_details",
    ];
}
