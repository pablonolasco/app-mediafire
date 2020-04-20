@extends('admin.layouts.app')
@section('page','Agregar archivo')
@section('content')
<form action="{{route('archivo.subir')}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="row d-flexflex-row justify-content-center align-items-center pt-5">
        <div class="form-group">
            <label for="file">
                Selecciona un archivo para subirlo
            </label>
            <input type="file" class="form-control-file" name="file" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary file">Subir</button>
        </div>
    </div>
</form>
@endsection
