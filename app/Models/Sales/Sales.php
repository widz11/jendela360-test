<?php

namespace App\Models\Sales;

use App\Models\BaseModel;
use App\Models\Cars\Cars;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sales extends BaseModel
{
    use HasFactory;

    protected $table = 'cars';

    /**
     * Relation
     *
     * @return $this
     */
    public function car() {
        return $this->hasOne(Cars::class, 'car_id');
    }
}
