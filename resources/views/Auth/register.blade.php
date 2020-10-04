@extends('templates.template')

@section('content')
    <div class="d-flex justify-content-center align-items-center p-4">
        <form method="POST" action="/Register" enctype="multipart/form-data" class="d-flex flex-column border border-danger p-4">
            @csrf
            <div class="d-flex flex-column border-danger">
                <span>Name:</span>
                <input class="form-control my-3" name="name" type="text">
                <span>Email:</span>
                <input class="form-control my-3" name="email" type="email">
                <span>Password:</span>
                <input class="form-control my-3" name="password" type="password">
            </div>
            <div class="d-flex justify-content-center align-items-center my-2">
                <button class="btn rounded-pill text-white bg-danger">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
@endsection
