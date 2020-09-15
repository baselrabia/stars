<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProviderLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        dd($this->categories);
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'businessType_id' => $this->businessType_id,
            'company_fullname' => $this->company_fullname,
            'company_name_ar' => $this->company_name_ar,
            'company_short_name' => $this->company_short_name,
            'number_of_employees' => $this->number_of_employees,
            'certified' => $this->certified,
            'certification' => $this->certification,
            'commercial_register' => $this->commercial_register,
            'portfolio' => $this->portfolio,
            'video' => $this->video,
            'logo' => $this->logo,
            'countries' => new CountryCollection($this->countries),
            'categories' => new CategoryCollection($this->categories),
        ];
    }
}
