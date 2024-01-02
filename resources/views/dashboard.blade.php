@extends('layout.layout')

@section('content')
    <div class="row" style="width: 1000px">
        <div class="col-4">
            @include('shared.left-sidebar')
        </div>
        <div class="col-8 pe-4 ps-0">
            @include('shared.success-message')
            @include('ideas.shared.submit-idea')
            <hr>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('ideas.shared.idea-card')
                </div>
            @empty
                <h1 class="text-center">No results found</h1>
            @endforelse
            <div class="mt-2">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('users.shared.follow-box')
    </div>
    </div>
@endsection
