@extends('layouts.app')

@section('content')
            <!-- let people make clients -->
    <passport-clients></passport-clients>

    <!-- list of clients people have authorized to access our account -->
    <passport-authorized-clients></passport-authorized-clients>

    <!-- make it simple to generate a token right in the UI to play with -->
    <passport-personal-access-tokens></passport-personal-access-tokens>

@endsection
