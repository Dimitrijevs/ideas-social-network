@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-4">
            @include('shared.left-sidebar')
        </div>
        <div class="col-8 pe-4 ps-0">
            @include('shared.success-message')
            <div class="mt-3">
                @include('shared.idea-card')
            </div>
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
@endsection