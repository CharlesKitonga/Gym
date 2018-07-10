<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User_93039 extends JsonResource
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
            'fname'=> $this->fname,
            'lname' =>$this->lname,
            'email' =>$this->email,
            'password'=>$this->password
        ];
    }
}
