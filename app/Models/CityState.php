<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityState extends Model
{
    use HasFactory;

    protected $table = 'cities_state';

    protected $fillable = ['name','uuid', 'active', 'state_id'];


    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
