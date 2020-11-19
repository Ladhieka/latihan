@extends('adminlte.master');

@section('content')
        <div class="mt-3 ml-3">
        <h4> {{ $pertanyaan->judul }} </h4>
        <p>  {{ $pertanyaan->isi }} </p>
    </div>

    <div class="mt-3 ml-3">  
        <a href="{{ route('pertanyaan.index', ['pertanyaan' => $pertanyaan->id])}}" class="btn btn-info btn-sm">back</a>
    </div>
@endsection