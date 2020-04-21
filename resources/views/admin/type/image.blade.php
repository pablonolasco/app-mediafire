@extends('admin.layouts.app')
@section('page','Imagenes')
@section('content')
    <div class="container">
        <div class="row">
            @forelse($images as $image)
                <div class="col-sm-6 col-md-4">
                    <div class="card" style="width: 18rem;">
                        {{$folder}}
                        <img src="{{ asset('storage') }}/{{ $folder }}/image/{{ $image->ln_nombre }}.
                            {{ $image->ln_extension }}" alt="{{$image->ln_nombre}}">
                    </div>

                </div>
                @empty
             @endforelse
        </div>
    </div>
@endsection
