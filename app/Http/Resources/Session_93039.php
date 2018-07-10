<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Session_93039 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
         return[
            'exersice_type'=> $this->exersice_type,
            'reps' =>$this->reps,
            'sets' =>$this->sets,
            'place'=>$this->place,
            'date_time'=>$this->date_time
        ];
    }
}
