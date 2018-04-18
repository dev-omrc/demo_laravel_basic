@extends('layouts.app')
@section('title', 'Todas las distros')
@section('content')
    <h1>Distros guardadas</h1>
    @foreach($distros->chunk(2) as $distroChunk)
        <div class="row">
            @foreach($distroChunk as $distro)
                <div class="col-sm card" style="width: 18rem;">
                    @if($distro->image_path)
                        <img class="card-img-top" src="{{ asset('storage/'.$distro->image_path) }}" alt="Card image cap" style="width: 128px">
                    @else
                        <img class="card-img-top" src="{{ asset('storage/images/no_image.png') }}" alt="Card image cap" style="width: 128px">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $distro->name }}</h5>
                        <h3>Distro de: {{ $distro->user->name }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
    @endforeach
    {{ $distros->links() }}
@endsection