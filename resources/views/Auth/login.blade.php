@extends('templates.template')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center p-5">
        @if(Session::get('error') !== null)
            <div class="alert bg-danger text-white font-weight-bold">
                {{Session::get('error')}}
            </div>
        @endif
        @if(Session::get('success') !== null)
            <div class="alert bg-success font-weight-bold">
                {{Session::get('success')}}
            </div>
        @endif
        <form method="POST" action="/Login" enctype="multipart/form-data" class="d-flex flex-column border border-danger p-4">
            @csrf
            <div class="d-flex flex-column border-danger">
                <div>
                    <span>Email:</span>
                    <input class="form-control" name="email" type="email" placeholder="Type Email">
                </div>
                <div class="my-3">
                    <span>Password:</span>
                    <input class="form-control" name="password" type="password" placeholder="Type Password">
                </div>
            </div>
            <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn rounded-pill text-white bg-danger">
                    Login
                </button>
            </div>
        </form>
    </div>
@endsection
