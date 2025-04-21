<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>{{ $settings->company_name ?? 'Alawneh Exchange' }}</h3>
            <p>{{ $settings->company_address ?? 'Amman Down Town, Next to Al-Husseini Mosque, Alhashimi St, عمّان، Jordan' }}</p>
            <p><i class="fas fa-phone"></i> {{ $settings->company_phone ?? '+962 6 123 4567' }}</p>
            <p><i class="fas fa-envelope"></i> {{ $settings->company_email ?? 'info@alawnehex.com' }}</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                @foreach($navigations as $navigation)
                <li><a href="{{$navigation->url}}">{{$navigation->title}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="footer-section">
            <h3>Follow Us</h3>
            <div class="social-icons">
                @if($settings && $settings->facebook)
                    <a href="{{ $settings->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                @endif
                @if($settings && $settings->twitter)
                    <a href="{{ $settings->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                @endif
                @if($settings && $settings->linkedin)
                    <a href="{{ $settings->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                @endif
                @if($settings && $settings->instagram)
                    <a href="{{ $settings->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                @endif
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} {{ $settings->company_name ?? 'Alawneh Exchange' }}. All rights reserved.</p>
    </div>
</footer>