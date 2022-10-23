<?php

namespace App\Repositories\images;

use App\Http\Controllers\Imagen;
use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ImageRepository  {

private Image $Image;

    public function __construct() {
    $this->Image= new Image(); 
    }

    public function getAll(){
    return $this->Image->all()->sortByDesc("id");
    }

    public function getFavs(){
        return $this->Image->where("favorite",'1')->orderby("id")->get();
    }

    public function saveImage(Request $request)
    {  
        $request->validate([     
            'file' => 'required|mimes:jpg,png|max:2048',
            'title'=> 'required', 
        ]);
        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('storage'), $fileName);
        $url_file = Storage::url($fileName);
        $this->Image->title = $request->get('title');
        $this->Image->url = $url_file;
        $this->Image->users_id = $request->user()->id;
        return $this->Image->save();    
    }

    public function getImage($id){
        return Image::find($id);
    }
    public function updateImage(Request $request)
    {
        $request->validate([
            'file' => 'mimes:jpg,png|max:2048',
            'title'=> 'required', 
        ]);

        $Image = $this->getImage($request->id);
        if($request->file('file')) {
            $fileName = time().'.'.$request->file->extension();
            $request->file->move(public_path('storage'), $fileName);
            $url_file = Storage::url($fileName);
            $Image->url = $url_file;
        }
        $Image->title = $request->get('title');
        
        $Image->users_id = $request->user()->id;
        return $Image->save(); 
    }

    public function setFav(Request $request)
    {
        $Image = $this->getImage($request->id);
        $Image->favorite = !((bool)$request->fav);
        return $Image->save(); 
    }

    public function destroyImage(Request $request)
    {
        $Image = $this->getImage($request->id);
        return $Image->delete();
    
    }

}