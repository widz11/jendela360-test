<?php

namespace App\Models\Cars;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends BaseModel
{
    use HasFactory;

    protected $table = 'cars';
}
