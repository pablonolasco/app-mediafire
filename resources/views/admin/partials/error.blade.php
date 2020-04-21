@if($errors->any())
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none;'">X</span>
            @foreach($errors->all() as $error)
                {{--$error--}}
                @if($error == 'validation.mimes')
                    <strong>Error</strong> No se puede subir ese formato de archivo
                @endif
                @if($error == 'validation.max.file')
                    <strong>Error </strong> El archivo excede el tamaño maximo
                @endif
            @endforeach
        </div>
    </div>
@endif
