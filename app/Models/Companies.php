<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Companies extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "companies";


    public function employy()
    {
        return $this->hasMany(Employees::class,'company_id');
    }
}
