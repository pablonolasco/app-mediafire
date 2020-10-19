<?php


namespace App\Clases;


use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Archivos
{
    //
    private static $img_ext=['jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF'];
    private static $video_ext=['mp4','avi','mpeg'];
    private static $documento_ext=['doc','docx','pdf','odt'];
    private static $audio_ext=['mp3','mpga','wma','ogg'];
    private $file;

    public function subirArchivo(){
        try {
            //=====obtiene el valor maximo que el servidor permite subir archivo
            $max_size=(int)ini_get('upload_max_filesize')*1000;
            //=====unir extensiones
            $all_ext=implode(',',$this->allExtension());

            $this->validate(request(),[
                    'file.*'=>'required|file|mimes:'.$all_ext.'|max:'.$max_size
                ]
            );

            $upload= new File();
            //$file=$file;
            $name = $this->file->getClientOriginalName();
            $ext=$this->file->getClientOriginalExtension();
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
        $folder=Auth::user()->name.'-'.Auth::id();
        //===quita los espacios en blanco y retorna la url como imagen
        return str_slug($folder);
    }

}
