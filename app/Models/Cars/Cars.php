<?php

namespace App\Models\Cars;

use App\Models\BaseModel;
use App\Models\Sales\Sales;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cars extends BaseModel
{
    use HasFactory;

    protected $table = 'cars';

    /**
     * Relation
     *
     * @return $this
     */
    public function sales() {
        return $this->belongsTo(Sales::class, 'id', 'car_id');
    }
}
