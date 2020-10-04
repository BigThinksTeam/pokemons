@extends('templates.template')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center p-5">
        <form method="POST" action="/Login" enctype="multipart/form-data" class="d-flex flex-column border border-danger p-4">
            @csrf
            <div class="d-flex flex-column border-danger">
                <span>Email:</span>
                <input class="form-control my-3" name="email" type="email">
                <span>Password:</span>
                <input class="form-control" name="password" type="password">
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn rounded-pill text-white bg-danger">
                    Login
                </button>
            </div>
        </form>
    </div>
@endsection
