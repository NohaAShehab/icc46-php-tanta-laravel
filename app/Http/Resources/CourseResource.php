<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dump($request);
        // I need to re-construct the data ?

//        return parent::toArray($request);
//        return [$request];
        # course resource object --> can access content of the course model object
//        if($this->creator) {
//            return [
//                "owner" => $this->creator
//            ];
//        }
//        return  ["id"=>$this->id ];
        return [
            "id"=> $this->id,
            "name"=> $this->name,
//            "image"=> "/storage/{$this->image}", # send path of the image
            "image"=> $this->image,
            "price"=> $this->price,
            "note"=>"Price includes only sessions not exam",
            "created_by"=>$this->creator ? $this->creator->name : "no user selected",
            "owner"=>new UserResource($this->creator)
        ];
    }
}
