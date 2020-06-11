<?php


namespace App\Http\Services;


use App\Http\Repositories\RoomTypeRepository;
use App\RoomType;
use Illuminate\Support\Facades\Storage;

class RoomTypeService
{
    protected $roomTypeRepository;

    public function __construct(RoomTypeRepository $roomTypeRepository)
    {
        $this->roomTypeRepository = $roomTypeRepository;
    }

    public function getAll()
    {
        return $this->roomTypeRepository->getAll();
    }

    public function getById($id)
    {
        return $this->roomTypeRepository->find($id);
    }

    public function update($roomTypeRequest,$roomType){
        $roomType->name= $roomTypeRequest->name;
        $roomType->price= $roomTypeRequest->price;
        $roomType->description= $roomTypeRequest->description;


        if ($roomTypeRequest->hasFile('image')){
            $currentImg= $roomTypeRequest->image;
            if ($currentImg){
                Storage::delete('/public/'.$currentImg);
            }
            $image = $roomTypeRequest->file('image');
            $path=$image->store('images','public');
            $roomType->image= $path;
        }
        $this->roomTypeRepository->save($roomType);
    }

    public function destroy($roomType){

        $this->roomTypeRepository->destroy($roomType);
    }

}
