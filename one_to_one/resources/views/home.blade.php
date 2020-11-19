@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <br><br><br>
                <form action="/personal-information" method="POST">
                @csrf
                <label for="agama">Agama</label><br>
                <input type="text" name="agama"><br>
                <input type="submit">
                
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
