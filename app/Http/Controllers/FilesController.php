<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    //
    private static $img_ext=['jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF'];
    private static $video_ext=['mp4','avi','mpeg'];
    private static $documento_ext=['doc','docx','pdf','odt'];
    private static $audio_ext=['mp3','mpga','wma','ogg'];

    //===verificara si el usuario esta logueado, y solo dejara utilizar este controlador si se encuentra logueado
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function create(){
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        try {
            //=====obtiene el valor maximo que el servidor permite subir archivo
            $max_size=(int)ini_get('upload_max_filesize')*1000;
            //=====unir extensiones
            $all_ext=implode(',',$this->allExtension());

            $this->validate(request(),[
                    'file'=>'required|file|mimes:'.$all_ext.'|max:'.$max_size
                ]
            );

            $upload= new File();
            $file=$request->file('file');
            $name = $file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $type=$this->getType($ext);
            
            
            if(Storage::putFileAs('/public/' . $this->getUserFolder() . '/' . $type . '/', $file, $name . '.' . $ext)){
                $upload::create([
                    'ln_nombre'=>$name,
                    'ln_tipo'=>$type,
                    'ln_extension'=>$ext,
                    'id_nu_user'=>Auth::id()]
                );
            }

            
        } catch (Exception $e) {
            
            
        }
        
        //===retornamos un mensaje de sesion
        //===info nombre de la sesion, se pasa el arreglo con el mensaje y la clase de boostrap
        return back()->with('info',['success','El archivo se ha subido correctamente']);

    }

    private function getType ($extension){
        if(in_array($extension,self::$img_ext)){
            return 'image';
        }
        if (in_array($extension,self::$video_ext)){
            return 'video';
        }

        if (in_array($extension,self::$documento_ext)){
            return 'document';
        }

        if (in_array($extension,self::$audio_ext)){
            return 'audio';
        }
    }

    /*
     * ===retorna un arreglo general
     * @return array_merge
     */
    private function allExtension(){
        return array_merge(self::$img_ext,self::$video_ext,self::$documento_ext,self::$audio_ext);
    }

    /*
     * @return la carpeta del usuario donde se va a almacenar la informaciuon
     */
    private function getUserFolder(){
        return Auth::user()->name.'-'.Auth::id();
    }
}
