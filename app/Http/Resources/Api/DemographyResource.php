<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class DemographyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'genders' => $this->gender->gender,
            'jobs' => JobResource::collection($this->jobs),
            'interests' => InterestResource::collection($this->interests),
            'provinces' => $this->province->province,
            'is_survey_avail' => $this->is_survey_avail,
        ];
    }
}
