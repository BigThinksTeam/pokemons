@extends('templates.template')

@section('content')
    <only_pokemon :poke="{{$pokemon}}"></only_pokemon>
@endsection
