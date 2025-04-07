<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>{{ $settings->company_name ?? 'Alawneh Exchange' }}</h3>
            <p>{{ $settings->address ?? 'Amman Down Town, Next to Al-Husseini Mosque,<br> Alhashimi St, عمّان، Jordan' }}</p>
            <p><i class="fas fa-phone"></i> {{ $settings->phone ?? '+962 6 123 4567' }}</p>
            <p><i class="fas fa-envelope"></i> {{ $settings->email ?? 'info@alawnehex.com' }}</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Contact</a></li>
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