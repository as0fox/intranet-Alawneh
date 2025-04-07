import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Simple slider functionality
document.addEventListener('DOMContentLoaded', function() {
    // Announcement slider
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');
    let currentSlide = 0;
    
    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        currentSlide = (n + slides.length) % slides.length;
        
        slides[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }
    
    // Initialize slider controls
    if(prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => showSlide(currentSlide - 1));
        nextBtn.addEventListener('click', () => showSlide(currentSlide + 1));
        
        // Auto slide
        setInterval(() => showSlide(currentSlide + 1), 5000);
    }
    
    // Initialize dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });
});

// Quick Access Slider
document.addEventListener('DOMContentLoaded', function () {
    const linksWrapper = document.querySelector('.links-wrapper');
    const linkCards = document.querySelectorAll('.link-card');
    const navDots = document.querySelectorAll('.nav-dot');
    const prevBtn = document.querySelector('.prev-links');
    const nextBtn = document.querySelector('.next-links');

    let currentIndex = 0; // Current slide index
    const cardsPerSlide = 4; // Number of cards visible per slide
    const totalSlides = Math.ceil(linkCards.length / cardsPerSlide);

    // Function to update the slider position
    function updateSlider(index) {
        const offset = -index * 100; // Calculate percentage offset
        linksWrapper.style.transform = `translateX(${offset}%)`;

        // Update active dot
        navDots.forEach((dot, i) => {
            dot.classList.toggle('active', i === index);
        });
    }

    // Next slide
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalSlides;
        updateSlider(currentIndex);
    });

    // Previous slide
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
        updateSlider(currentIndex);
    });

    // Dot navigation
    navDots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateSlider(currentIndex);
        });
    });

    // Initialize slider
    updateSlider(currentIndex);
});

// Currency Exchange Rates
document.addEventListener('DOMContentLoaded', function () {
    const currencyRatesContainer = document.querySelector('#currency-rates');
    const searchInput = document.querySelector('#currency-search');
    let allRows = []; // Store all rows for filtering

    // Fetch currency rates from API
    async function fetchCurrencyRates() {
        try {
            const response = await fetch('/api/currency-rates');
            if (!response.ok) throw new Error('Failed to fetch currency rates');
            const data = await response.json();
            
            // Update the UI with new rates
            updateCurrencyTable(data);
        } catch (error) {
            console.error('Error fetching currency rates:', error);
            currencyRatesContainer.innerHTML = '<p class="error">Error loading currency rates.</p>';
        }
    }

    // Update the currency table
    function updateCurrencyTable(data) {
        currencyRatesContainer.innerHTML = ''; // Clear previous content
        allRows = []; // Reset stored rows

        // Loop through all currencies in the rates object
        Object.keys(data.rates).forEach((currency) => {
            const buyRate = (data.rates[currency] * data.buy_adjustment).toFixed(4);
            const sellRate = (data.rates[currency] * data.sell_adjustment).toFixed(4);

            // Create table row
            const row = document.createElement('div');
            row.className = 'currency-row';
            row.setAttribute('data-currency', currency.toLowerCase()); // For filtering
            row.innerHTML = `
                <span>${currency}</span>
                <span>${buyRate}</span>
                <span>${sellRate}</span>
            `;
            allRows.push(row); // Store row for filtering
            currencyRatesContainer.appendChild(row);
        });
    }

    // Filter rows based on search input
    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();
        currencyRatesContainer.innerHTML = ''; // Clear current rows

        if (query === '') {
            // If search is empty, show all rows
            allRows.forEach(row => currencyRatesContainer.appendChild(row));
        } else {
            // Filter rows by currency name
            const filteredRows = allRows.filter(row =>
                row.getAttribute('data-currency').includes(query)
            );
            filteredRows.forEach(row => currencyRatesContainer.appendChild(row));
        }
    });

    // Call the function to fetch and display rates
    fetchCurrencyRates();

    // Optional: Refresh rates every 5 minutes
    setInterval(fetchCurrencyRates, 5 * 60 * 1000);
});

// Calendar and Events
document.addEventListener('DOMContentLoaded', function () {
    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const monthsOfYear = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    let currentDate = new Date();
    let currentYear = currentDate.getFullYear();
    let currentMonth = currentDate.getMonth();

    // Fetch events from API
    async function fetchEvents() {
        try {
            const response = await fetch('/api/events');
            if (!response.ok) throw new Error('Failed to fetch events');
            return await response.json();
        } catch (error) {
            console.error('Error fetching events:', error);
            return [];
        }
    }

    // Generate calendar
    async function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1);
        const lastDay = new Date(year, month + 1, 0);
        const daysInMonth = lastDay.getDate();
        const startDay = firstDay.getDay();

        const calendarGrid = document.getElementById('calendar-grid');
        calendarGrid.innerHTML = '';

        // Add day names
        daysOfWeek.forEach(dayName => {
            const dayHeader = document.createElement('div');
            dayHeader.className = 'day-name';
            dayHeader.textContent = dayName;
            calendarGrid.appendChild(dayHeader);
        });

        // Add empty cells for days before the first day
        for (let i = 0; i < startDay; i++) {
            const emptyCell = document.createElement('div');
            calendarGrid.appendChild(emptyCell);
        }

        // Add days of the month
        const events = await fetchEvents();
        
        for (let day = 1; day <= daysInMonth; day++) {
            const dayCell = document.createElement('div');
            dayCell.className = 'day';
            dayCell.textContent = day;

            // Highlight today's date
            if (
                year === currentDate.getFullYear() &&
                month === currentDate.getMonth() &&
                day === currentDate.getDate()
            ) {
                dayCell.classList.add('today');
            }
            // Check for events
            const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
            const dayEvents = events.filter(event => event.date === formattedDate);
            if (dayEvents.length > 0) {
                dayCell.classList.add('has-event');

                // Create tooltip for events
                const tooltip = document.createElement('div');
                tooltip.className = 'event-tooltip';
                tooltip.innerHTML = dayEvents
                    .map(event => `<p><strong>${event.title}</strong><br>${event.time ? event.time + ' - ' : ''}${event.location || ''}</p>`)
                    .join('');
                dayCell.appendChild(tooltip);
            }

            calendarGrid.appendChild(dayCell);
        }

        // Update month header
        document.querySelector('.current-month').textContent = `${monthsOfYear[month]} ${year}`;
    }

    // Initialize calendar
    generateCalendar(currentYear, currentMonth);

    // Navigate to previous month
    document.querySelector('.cal-nav.prev').addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        }
        generateCalendar(currentYear, currentMonth);
    });

    // Navigate to next month
    document.querySelector('.cal-nav.next').addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        generateCalendar(currentYear, currentMonth);
    });
});

// Contact Search
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('contact-search');
    const contactList = document.getElementById('contact-list');
    const contacts = Array.from(contactList.querySelectorAll('.contact'));

    // Filter contacts based on search input
    searchInput.addEventListener('input', function () {
        const query = this.value.trim().toLowerCase();

        contacts.forEach(contact => {
            const name = contact.getAttribute('data-name').toLowerCase();
            const email = contact.getAttribute('data-email').toLowerCase();
            const phone = contact.getAttribute('data-phone').toLowerCase();
            const department = contact.getAttribute('data-department').toLowerCase();

            // Check if any field matches the query
            if (name.includes(query) || email.includes(query) || phone.includes(query) || department.includes(query)) {
                contact.style.display = 'flex';
            } else {
                contact.style.display = 'none';
            }
        });
    });
});

// Responsive Menu Toggle (for mobile)
document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuButton && mobileMenu) {
        menuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
});

// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});