@extends('template.master')

@section('style')
  <link rel="stylesheet" href="{{asset('style/style.css')}}">
@endsection


@section('content')

@if($errors->any())
    <div class="alert alert-danger">  
        <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>

@endif

  <form class="mb-4" action="/category-store" method="POST">
    @csrf
    <h1 class="text-center mb-4">Create Category</h1>
    <div class="form-group">
        <label for="">Category Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
        @error('name') <span class="text-danger">{{$message}}</span> @enderror  
    </div>
    <button id="btn-submit" class="btn btn-primary mt-3">Submit</button>
  </form>

@endsection