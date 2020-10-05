@extends('templates.template')

@section('content')
    <div class="d-flex flex-column align-items-center p-4 register">
        <div class="d-flex flex-column">
            @foreach ($errors->all() as $message)
                <div class="alert bg-danger text-white font-weight-bold">
                    {{$message}}
                </div>
            @endforeach
        </div>
        <form method="POST" action="/Register" enctype="multipart/form-data" class="d-flex flex-column text-center border border-danger bg-white p-4">
            @csrf
            <h4 class="font-weight-bold my-3">Sign Up</h4>
            <div class="d-flex flex-column border-danger text-left">
                <span>Name:</span>
                <input class="form-control my-3" name="name" type="text" value="{{old('name')}}">
                <span>Email:</span>
                <input class="form-control my-3" name="email" type="email" value="{{old('email')}}">
                <span>Password:</span>
                <input class="form-control my-3" name="password" type="password">
            </div>
            <div class="d-flex justify-content-center align-items-center my-2">
                <button type="submit" class="btn rounded-pill text-white bg-danger">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
@endsection
