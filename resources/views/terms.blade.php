@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1 class="mb-3">Welcome to Ideas Social Network!</h1>
    
            <p>
                By accessing or using our platform, you agree to comply with these terms. Users must be at least 13 years old.
                You
                are solely responsible for your interactions and content, and unlawful behavior is prohibited. While you retain
                ownership of your content, we have a license to use it on the platform. Review our Privacy Policy for
                information on
                data collection and usage. Adhere to community guidelines, prohibiting hate speech and discrimination. Respect
                intellectual property rights, and report any security issues. We can terminate accounts violating our terms
                without
                notice. The platform is provided "as is," and we do not guarantee content accuracy. We are not liable for
                indirect
                or consequential damages. These terms may be updated, and changes will be notified. The governing law is
                [jurisdiction]. Thank you for joining our creative community!
            </p>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('users.shared.follow-box')
        </div>
    </div>
@endsection
