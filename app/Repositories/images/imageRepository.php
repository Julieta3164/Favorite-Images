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

    public function editImage(Request $request, $id){
        return Image::find($id);
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png|max:2048',
            'title'=> 'required',
            'details'=> 'required',
            'age'=> 'required',
            'link' => 'required',
        ]);

        $fileName = time().'.'.$request->file->extension();
        $request->file->move(public_path('storage'), $fileName);
        // $url_file = Storage::url($fileName);
        // $this->MiniGame = MiniGame::find($id);
        // $this->MiniGame->title = $request->get('title');
        // $this->MiniGame->details = $request->get('details');
        // $this->MiniGame->age = $request->get('age');
        // $this->MiniGame->link = $request->get('link');
        // $this->MiniGame->image = $url_file;
        // Alert::success('Actualizado', 'Este administrador ha sido actualizado con éxito');
        return $this->Image->save(); 
    }

    public function destroyImage(Request $request)
    {
        $Image= Image::find($request->id);
        // Alert::warning('Eliminado', 'El Minijuego Ha sido Borrado');        
        return $Image->delete();
    
    }

}