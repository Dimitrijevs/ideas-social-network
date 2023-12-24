@extends('layout.layout')

@section('content')
    <div class="row" style="width: 1000px">
        <div class="col-4">
            @include('shared.left-sidebar')
        </div>
        <div class="col-8 pe-4 ps-0">
            @include('shared.success-message')
            @include('shared.submit-idea')
            <hr>
            @foreach ($ideas as $idea)
                <div class="mt-3">
                    @include('shared.idea-card')
                </div>
            @endforeach
            <div class="mt-2">
                {{ $ideas->links() }}
            </div>
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
    </div>
@endsection
