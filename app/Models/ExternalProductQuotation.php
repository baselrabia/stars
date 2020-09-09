<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalProductQuotation extends Model
{
    protected $fillable = [
    	'name','quotation_id', 'category_id','quantity'
    ]; 
}
