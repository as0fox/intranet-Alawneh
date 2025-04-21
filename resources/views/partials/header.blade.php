<header class="header">
    <div class="logo">
        @if($settings && $settings->logo)
            <img src="{{ ('/'.$settings->logo) }}" alt="Logo" class="fade-in">
        @else
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="fade-in">
        @endif
    </div>
    <nav class="nav">
        @foreach($navigations as $nav)
            <a href="{{ $nav->url }}" class="nav-link">{{ $nav->title }}</a>
        @endforeach
    </nav>
    <div class="search-container">
        <button class="search-button">
        <i class="fa-regular fa-comments"></i>
        </button>
    </div>
</header>