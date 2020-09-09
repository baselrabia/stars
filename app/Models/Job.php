<?php

namespace App\Models;

use App\Events\CreateService;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Log;

class Job extends Model implements TranslatableContract
{
    use Translatable;



    public static function boot() {
        parent::boot();
        
        self::created(function($job) {
            $type = class_basename($job);
            event(new CreateService($job,$type));
        });
      
    }

    public $table = ['provider_jobs'];

    public $translatedAttributes = ['title','summary','requirements',];

    // image in db from provider 
    protected $fillable = [
        'title','summary','requirements','provider_id','priority','status','phone','email','location','deadline','link','person_name',  
      ]; 

      public function scopeActive($query)
      {
          return $query->where('status', 1);
      }
  
      public function scopePriority($query)
      {
          return $query->where('priority', 'on');
      }
  
      public function scopePrioritySorted($query)
      {
          return $query->orderBy('priority');
      }

     /**
     * Get the provider that owns the jobs.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
