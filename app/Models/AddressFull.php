<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressFull extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = ['client_id','tenant_id', 'district', 'address', 'number', 'complemnet'];


    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

}
