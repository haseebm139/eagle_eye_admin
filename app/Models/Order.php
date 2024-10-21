<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [ ];

     /**
      * Get the customer that owns the Order
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function customer()
     {
         return $this->belongsTo(User::class,'user_id','id');
     }


     /**
      * Get the customer that owns the Order
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
      public function employee()
      {
          return $this->belongsTo(User::class,'emp_id','id');
      }
}
