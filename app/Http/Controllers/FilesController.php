<?php

namespace App\Http\Controllers;

use App\Clases\Archivos;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class FilesController extends Controller
{
    private $archivo;


    //===verificara si el usuario esta logueado, y solo dejara utilizar este controlador si se encuentra logueado
    public function __construct(Archivos $archivo)
    {
        $this->middleware('auth');
        $this->archivo=$archivo;
    }

    public function index(){

    }


    public function image(){
        $images=File::where('id_nu_user','=',auth()->id())
            ->OrderBy('id_nu_archivo','desc')->where('ln_tipo','=','image')->get();
        $folder=str_slug(Auth::user()->name.'-'.Auth::id());
        return view('admin.type.image',compact('images','folder'));
    }

    public function video(){
        return view('admin.type.video');
    }

    public function document(){
        return view('admin.type.document');
    }

    public function audio(){
        return view('admin.type.audio');
    }

    public function create(){
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        $this->archivo=$request->file('file');
        //===retornamos un mensaje de sesion
        //===info nombre de la sesion, se pasa el arreglo con el mensaje y la clase de boostrap
        return back()->with('info',['success','El archivo se ha subido correctamente']);

    }


}
