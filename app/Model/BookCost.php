<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookCost extends Model
{
    //

    protected $table="book_costs";
    protected $fillable=['book_id','supplier_id','cost','in_stock'];

    public function book(){
        return $this->belongsTo('\App\Model\Book');
    }
    public function supplier(){
        return $this->belongsTo('\App\Model\Supplier');
    }
}
