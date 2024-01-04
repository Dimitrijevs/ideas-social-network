<div class="card mt-3">
    <div class="card-header pb-0 border-0">
        <h5 class="">Who to follow?</h5>
    </div>
    <div class="card-body">
        @foreach ($topUsers as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="{{ route('users.show', $user->id) }}"><img style="width: 50px" class="avatar-img rounded-circle"
                            src="{{ $user->getImageURL() }}" alt=""></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="#!">{{ $user->name }}</a>
                    <p class="m-0 small truncate">Followers: {{ $user->followers->count() }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
