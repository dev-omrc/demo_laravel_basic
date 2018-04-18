@extends('layouts.app')
@section('title', 'Distro')
@section('content')
    <h1>Mis Distribuciones</h1>
        <div id="table-data"></div>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-distro-modal">
        <i class="fas fa-plus"></i>
        Agregar Distro
    </button>
    @include('distro.create')
    @include('distro.edit')
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('script')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ url('js/distro.js') }}"></script>
@endsection