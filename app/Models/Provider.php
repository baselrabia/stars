<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable=[
        'user_id',
        'business_Type_id',
        'company_fullname',
        'company_name_ar',
        'company_short_name',
        'number_of_employees',
        'certified',
        'certification',
        'commercial_register',
        'portfolio',
        'video',
        'priority',
        'status',
        'logo',

    ];

    protected $with=['premiumAccount'];

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

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    /**
     * Get the user that this provider belongs to.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that this provider belongs to.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_provider','provider_id','category_id')->withPivot('provider_id','category_id');
    }

    /**
     * Get the businessDeals that this provider belongs to.
     */
    public function businessDeals()
    {
        return $this->hasMany(BusinessDeal::class,'provider_id','id');
    }
      /**
     * Get the neededs that this provider belongs to.
     */
    public function neededs()
    {
        return $this->hasMany(Needed::class,'provider_id','id');
    }

    /* Get the jobs that this provider belongs to.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class,'provider_id','id');
    }
      /* Get the jobs that this provider belongs to.
     */
    public function webinars()
    {
        return $this->hasMany(Webinar::class,'provider_id','id');
    }
   /**
     * Get the Events that this provider belongs to.
     */
    public function events()
    {
        return $this->hasMany(Event::class,'provider_id');
    }
     /**
     * Get the countries that this provider belongs to.
     */
    public function countries()
    {
        return $this->belongsToMany(Country::class,'country_provider')->withPivot('provider_id','country_id');

    }
    public function firstCountry()
    {
        return $this->countries->first();

    }
    /**
     * Get the Business Type that this provider belongs to.
     */
    public function businessType()
    {
        return $this->belongsTo(BusinessType::class,'businessType_id');
    }



        /**
     * Get the branche that this provider belongs to.
     */
    public function branche()
    {
        return $this->hasMany(Branche::class,'provider_id','id');
    }

    /**
     * Get the brochure Type that this provider belongs to.
     */
    public function brochures()
    {
        return $this->hasMany(Brochure::class);
    }
      /**
     * Get the brochure Type that this provider belongs to.
     */
    public function products()
    {
        return $this->hasMany(Product::class,'provider_id');
    }

     /**
     * Get the quotations that this providers belongs to.
     */
    public function quotations()
    {
        return $this->belongsToMany(Quotation::class,'provider_quotation')->withPivot('status');
    }
   /**
     * Get the Premium Account that this provider belongs to.
     */
    public function premiumAccount()
    {
        return $this->belongsToMany(PricingPlan::class,'premium_accounts','provider_id','pricing_plan_id')
        ->orderBy('id', 'Desc')->withPivot('start','end');
    }

    public function FirstPlan()
    {
        return $this->premiumAccount->first();

    }


}
