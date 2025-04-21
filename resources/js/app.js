import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// Simple slider functionality
document.addEventListener('DOMContentLoaded', function() {
    // Announcement slider
    const slides = document.querySelectorAll('.banking-slide');
    const dots = document.querySelectorAll('.banking-dot');
    const prevBtn = document.querySelector('.banking-prev-slide');
    const nextBtn = document.querySelector('.banking-next-slide');
    
    // Only proceed if required elements exist
    if (!slides.length || !dots.length || !prevBtn || !nextBtn) {
        console.error('Slider elements not found');
        return;
    }

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
    const linksWrapper = document.querySelector('.banking-links-wrapper');
    const linkCards = document.querySelectorAll('.banking-link-card');
    const navDots = document.querySelectorAll('.banking-nav-dot');
    const prevBtn = document.querySelector('.banking-prev-links');
    const nextBtn = document.querySelector('.banking-next-links');

    // Only proceed if required elements exist
    if (!linksWrapper || !linkCards.length || !navDots.length || !prevBtn || !nextBtn) {
        console.error('Quick Access Slider elements not found');
        return;
    }

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
    const currencyRatesContainer = document.querySelector('#banking-currency-rates');
    const searchInput = document.querySelector('#banking-currency-search');
    
    // Only proceed if required elements exist
    if (!currencyRatesContainer || !searchInput) {
        console.error('Currency exchange elements not found');
        return;
    }

    let allRows = []; // Store all rows for filtering

    // Fetch currency rates from API
    async function fetchCurrencyRates() {
        try {
            const response = await fetch('/api/currency-rates');
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const data = await response.json();
            
            if (!data.rates) {
                throw new Error('Invalid currency rates data');
            }
            
            updateCurrencyTable(data);
        } catch (error) {
            console.error('Currency rates fetch failed:', error);
            currencyRatesContainer.innerHTML = `
                <div class="alert alert-warning">
                    Currency rates currently unavailable. Please try again later.
                </div>
            `;
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
    const calendarGrid = document.getElementById('calendar-grid');
    const prevNav = document.querySelector('.cal-nav.prev');
    const nextNav = document.querySelector('.cal-nav.next');
    
    // Only proceed if required elements exist
    if (!calendarGrid || !prevNav || !nextNav) {
        console.error('Calendar elements not found');
        return;
    }

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
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const data = await response.json();
            
            if (!Array.isArray(data)) {
                throw new Error('Invalid events data format');
            }
            
            return data;
        } catch (error) {
            console.error('Events fetch failed:', error);
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
    const contactList = document.getElementById('contacts');
    
    // Only proceed if required elements exist
    if (!searchInput || !contactList) {
        console.error('Contact search elements not found');
        return;
    }

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


// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});


document.addEventListener('DOMContentLoaded', function() {
    // Contact Search Functionality
    const contactSearch = document.getElementById('contact-search');
    const searchResults = document.getElementById('search-results');
    const employeeModal = document.getElementById('employee-modal');
    const closeModal = document.querySelector('.close-modal');

    // Debounce function to limit API calls
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    // Handle search input
    contactSearch.addEventListener('input', debounce(function(e) {
        const query = e.target.value.trim();
        
        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        fetch(`/api/contacts/search?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    searchResults.innerHTML = '';
                    data.forEach(employee => {
                        const item = document.createElement('div');
                        item.className = 'search-result-item';
                        item.innerHTML = `
                            <img src="${employee.photo || '/images/default-profile.png'}" alt="${employee.name}">
                            <div>
                                <strong>${employee.name}</strong>
                                <div class="text-muted">${employee.department}</div>
                            </div>
                        `;
                        item.addEventListener('click', () => showEmployeeDetails(employee));
                        searchResults.appendChild(item);
                    });
                    searchResults.style.display = 'block';
                } else {
                    searchResults.innerHTML = '<div class="search-result-item">No employees found</div>';
                    searchResults.style.display = 'block';
                }
            });
    }, 300));

    // Show employee details in modal
    function showEmployeeDetails(employee) {
        document.getElementById('modal-employee-name').textContent = employee.name;
        document.getElementById('modal-employee-email').textContent = employee.email;
        document.getElementById('modal-employee-phone').textContent = employee.phone;
        document.getElementById('modal-employee-department').textContent = employee.department;
        document.getElementById('modal-employee-position').textContent = employee.position || 'Employee';
        document.getElementById('modal-employee-photo').src = employee.photo || '/images/default-profile.png';
        
        searchResults.style.display = 'none';
        contactSearch.value = '';
        employeeModal.style.display = 'flex';
    }

    // Close modal
    closeModal.addEventListener('click', () => {
        employeeModal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target === employeeModal) {
            employeeModal.style.display = 'none';
        }
    });
});