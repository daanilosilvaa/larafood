<?php

namespace App\Models;


use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  use TenantTrait;

  protected $fillable = [
      'tenant_id',
      'city_id',
      'client_id',
      'identify',
      'table_id',
      'total',
      'status',
      'option',
      'district',
      'address',
      'number',
      'complement',
      'comment'];

  /***
   * options Status
   */

   public $statusOptions = [
       'open' => 'Aberto',
       'done' => 'Completo',
       'rejected' => 'rejeitado',
       'working' => 'Andamento',
       'canceled' => 'Cancelado',
       'delivering' => 'Em transito',
   ];

   /***
   * options
   */

  public $statusoption = [
    'withdraw' => 'Retirar',
    'delivery' => 'Entrega',
];

  public function tenant()
  {
      return $this->belongsTo(Tenant::class);
  }

  public function client()
  {
      return $this->belongsTo(Client::class);
  }

  public function table()
  {
      return $this->belongsTo(Table::class);
  }

  public function products()
  {
      return $this->belongsToMany(Product::class);
  }

  public function evaluations()
  {
      return $this->hasMany(Evaluation::class);
  }
}
