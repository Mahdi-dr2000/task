<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "employees";


    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
