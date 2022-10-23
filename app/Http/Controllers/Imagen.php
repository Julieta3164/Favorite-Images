<?php

namespace App\Http\Controllers;

use App\Repositories\images\ImageRepository;
use Illuminate\Http\Request;

class Imagen extends Controller
{
    public $repository;
    function __construct()
    {
        $this->repository=new ImageRepository();
    }

    function create(Request $request){
        return view('createImage');
    }

    function save(Request $request){
        $image = $this->repository->saveImage($request);
        return redirect('/dashboard');
    }

    public function edit(Request $request)
    {
        $image = $this->repository->getImage($request->id);
        return view('editImage')->with('image',$image);
    }

    function update(Request $request){
        $image = $this->repository->updateImage($request);
        return redirect('/dashboard');
    }

    function fav(Request $request){
        $image = $this->repository->setFav($request);
        return redirect('/dashboard');
    }

    public function dashboard(Request $request)
    {
        $images = $this->repository->getAll();
        return view('dashboard')->with('images',$images);;
    }

    public function favorite(Request $request)
    {
        $images = $this->repository->getFavs();
        return view('favorite')->with('images',$images);;
    } 
    public function destroy(Request $request)
    {
        $this->repository->destroyImage($request);
        return redirect('/dashboard');
    }
}
