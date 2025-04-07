<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->company_name ?? 'Alawneh Intranet' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Favicon -->
<link rel="shortcut icon" href="{{ $settings->favicon ? asset($settings->favicon) : asset('assets/settings/default-favicon.ico') }}" type="image/x-icon">
<link rel="apple-touch-icon" href="{{ $settings->favicon ? asset($settings->favicon) : asset('assets/settings/default-favicon.ico') }}">
    <style>
        :root {
            --primary: {{ $settings->primary_color ?? '#0D2F5F' }};
            --secondary: {{ $settings->secondary_color ?? '#14A0E9' }};
            --accent: {{ $settings->accent_color ?? '#FFA8A8' }};
            --light: {{ $settings->light_color ?? '#F5F5F5' }};
            --light-gray: #e9e9e9;
            --dark: #333;
            --text: #444;
            --success: #4CAF50;
            --warning: #FF9800;
            --danger: #F44336;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --radius: 8px;
            --transition: all 0.3s ease;
        }
       
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: var(--light);
  color: var(--text);
  line-height: 1.6;
  overflow-x: hidden;
}

.desktop {
  max-width: 1440px;
  margin: 0 auto;
  background-color: var(--light);
}

h1, h2, h3, h4, h5, h6 {
  color: var(--primary);
  margin-bottom: 1rem;
}

a {
  text-decoration: none;
  color: var(--primary);
  transition: var(--transition);
}

a:hover {
  color: var(--secondary);
}

button {
  cursor: pointer;
  border: none;
  border-radius: var(--radius);
  padding: 0.5rem 1rem;
  font-family: 'Inter', sans-serif;
  font-weight: 500;
  transition: var(--transition);
}

button:hover {
  transform: translateY(-2px);
  box-shadow: var(--shadow);
}

.section-title {
  display: flex;
  align-items: center;
  margin-bottom: 1.5rem;
  font-size: 1.5rem;
  color: var(--primary);
  border-bottom: 2px solid var(--light-gray);
  padding-bottom: 0.5rem;
}

.section-title i {
  margin-left: 0.5rem;
  color: var(--secondary);
}

.view-all {
  display: block;
  margin: 1rem auto 0;
  background-color: transparent;
  color: var(--secondary);
  border: 1px solid var(--secondary);
  border-radius: var(--radius);
  padding: 0.3rem 1rem;
  font-size: 0.85rem;
  text-align: center;
}

.view-all:hover {
  background-color: var(--secondary);
  color: white;
}

/* Header Styles */
.header {
  /* width: 1524px;
  margin-left: -40px; */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: white;
  border-radius: var(--radius);
  margin-bottom: 1.5rem;
  /* box-shadow: var(--shadow);
  border:1px solid #0D2F5F;
  box-shadow:3px 3px 12px #0D2F5F; */
  /* position: sticky;
  top: 0;
  z-index: 100; */
}

.logo {
  display: flex;
  align-items: center;
  gap: 1rem; /* Space between the two logos */
}

.logo img {
  max-width: 50%; /* Ensures the images are responsive */
  height: auto; /* Maintains aspect ratio */
}





.nav {
  display: flex;
  gap : 51px;
}

.nav-link {
  margin: 0 1rem;
  font-weight: 600;
  position: relative;
}

.nav-link::after {
  content: '';
  position: absolute;
  width: 0;
  height: 2px;
  bottom: -5px;
  left: 0;
  background-color: var(--secondary);
  transition: var(--transition);
}

.nav-link:hover::after {
  width: 100%;
}

.search-container {
  display: flex;
  align-items: center;
  background-color: white;
  border-radius: 20px;
  padding: 0.3rem 0.5rem;
}



.search-button {
  background: none;
  border: none;
  color: var(--primary);
  padding: 0.2rem 0.5rem;
  font-size: 1.5rem;
}

.search-button:hover {
  color: var(--secondary);
  transform: none;
  box-shadow: none;
}

.user-profile {
  position: relative;
  cursor: pointer;
}

.profile-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid var(--light-gray);
  transition: var(--transition);
}

.profile-img:hover {
  border-color: var(--secondary);
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: white;
  min-width: 150px;
  box-shadow: var(--shadow);
  border-radius: var(--radius);
  z-index: 10;
}

.dropdown-content a {
  display: block;
  padding: 0.75rem 1rem;
  color: var(--dark);
  border-bottom: 1px solid var(--light-gray);
}

.dropdown-content a:last-child {
  border-bottom: none;
}

.dropdown-content a:hover {
  background-color: var(--light);
}

.user-profile:hover .dropdown-content {
  display: block;
  animation: fadeIn 0.3s ease;
}

/* Main Content Area */
.main-content {
  padding: 0 4.5rem;
}

/* Banner Styles */
.banner {
  display: flex;
  justify-content: space-between;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.currency-card {
  flex: 1;
  background-color: white;
  padding: 1.5rem;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  height: 400px;
  overflow-y: scroll;
}

.currency-table {
  width: 100%;
}

.currency-header, .currency-row {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  padding: 0.5rem 0;
}

.currency-header {
  font-weight: 600;
  border-bottom: 1px solid var(--light-gray);
  margin-bottom: 0.5rem;
}

.currency-row {
  border-bottom: 1px solid var(--light-gray);
  transition: var(--transition);
}

.currency-row:last-child {
  border-bottom: none;
}

.currency-row:hover {
  background-color: var(--light);
}

.join-us {
  flex: 1;
  background: linear-gradient(135deg, var(--accent), #ff7b7b);
  padding: 2rem;
  color: white;
  text-align: center;
  border-radius: var(--radius);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  box-shadow: var(--shadow);
}

.join-us h1 {
  font-size: 2.5rem;
  margin-bottom: 1rem;
  font-family: 'Pacifico', cursive;
  color: white;
}

.join-us p {
  margin-bottom: 1.5rem;
  font-size: 1.1rem;
}

.register-btn {
  background-color: white;
  color: var(--primary);
  padding: 0.75rem 2rem;
  font-size: 1.1rem;
  font-weight: 600;
  border-radius: 25px;
  transition: var(--transition);
}

.register-btn:hover {
  background-color: var(--primary);
  color: white;
  transform: translateY(-3px);
}

/* Quick Links Styles */
.quick-links {
  margin-bottom: 2rem;
}

.links-container {
  display: flex;
  gap: 1.5rem;
  transition: transform 0.5s ease; /* Smooth sliding animation */
  padding: 0.5rem;
}

.link-card {
  background: linear-gradient(135deg, var(--secondary), #14A0E9);
  padding: 1.5rem;
  width: 100%;
  text-align: center;
  color: white;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  transition: var(--transition);
  position: relative;
  flex: 0 0 calc( 14% - 1rem); /* 4 cards per slide with gap */

  /* overflow: hidden; */
}

.link-card::before {
  content: attr(data-tooltip);
  position: absolute;
  bottom: -50px;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  color: white;
  padding: 0.5rem;
  border-radius: 0 0 var(--radius) var(--radius);
  transition: var(--transition);
  opacity: 0;
}

.link-card:hover {
  transform: translateY(-10px);
  cursor: pointer;
}

.link-card:hover::before {
  bottom: 0;
  opacity: 1;
}

.link-card i {
  font-size: 2.5rem;
  margin-bottom: 1rem;
}

.link-card p {
  font-weight: 500;
}

/* Two Column Layout */
.two-column {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.column {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Events Styles */
.events, .documents, .contacts, .leaderboard, .invitations {
  background-color: white;
  padding: 1.5rem;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}

.calendar {
  margin-bottom: 1.5rem;
}

.calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}

.cal-nav {
  background: none;
  color: var(--primary);
  padding: 0.2rem 0.5rem;
}

.cal-nav:hover {
  color: var(--secondary);
  transform: none;
  box-shadow: none;
}

.current-month {
  margin: 0;
  font-size: 1.1rem;
}

.calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 0.5rem;
}

.calendar-grid div {
  text-align: center;
  padding: 0.5rem;
}

.calendar-grid .day-name {
  font-weight: 600;
  color: var(--primary);
}

.calendar-grid .day {
  cursor: pointer;
  border-radius: 50%;
  width: 2.5rem;
  height: 2.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto;
  transition: var(--transition);
}

.calendar-grid .day:hover {
  background-color: var(--light);
}

.calendar-grid .today {
  background-color: var(--secondary);
  color: white;
}

.calendar-grid .has-event {
  position: relative;
}

.calendar-grid .has-event::after {
  content: '';
  position: absolute;
  bottom: 5px;
  left: 50%;
  transform: translateX(-50%);
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background-color: var(--accent);
}

.upcoming-events h3 {
  font-size: 1rem;
  margin-bottom: 1rem;
  color: var(--secondary);
}

.event-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.event {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.5rem;
  border-radius: var(--radius);
  transition: var(--transition);
}

.event:hover {
  background-color: var(--light);
}

.event-date {
  display: flex;
  flex-direction: column;
  align-items: center;
  color: var(--primary);
}

.date-box {
  background-color: var(--primary);
  color: white;
  width: 2.5rem;
  height: 2.5rem;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 6px;
  font-weight: 600;
  font-size: 1.2rem;
}

.month {
  font-size: 0.8rem;
  font-weight: 500;
}

.event-details {
  flex: 1;
}

.event-details h4 {
  margin-bottom: 0.2rem;
  color: var(--dark);
}

.event-details p {
  font-size: 0.85rem;
  color: #666;
}

.details-btn {
  background-color: var(--light);
  color: var(--primary);
  padding: 0.3rem 0.8rem;
  font-size: 0.8rem;
}

.details-btn:hover {
  background-color: var(--primary);
  color: white;
}

/* Documents Styles */
.document-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.document {
  display: flex;
  align-items: center;
  padding: 0.5rem;
  border-radius: var(--radius);
  transition: var(--transition);
}

.document:hover {
  background-color: var(--light);
}

.document-icon {
  font-size: 1.5rem;
  margin-right: 1rem;
  color: var(--primary);
}

.document-details {
  flex: 1;
}

.document-details h4 {
  margin-bottom: 0.2rem;
  color: var(--dark);
}

.document-details p {
  font-size: 0.85rem;
  color: #666;
}

.download-btn {
  background-color: var(--light);
  color: var(--primary);
  padding: 0.3rem 0.8rem;
  font-size: 0.8rem;
}

.download-btn:hover {
  background-color: var(--primary);
  color: white;
}

 /* Search Bar */
 .search-contacts {
    position: relative;
    margin-bottom: 1.5rem;
  }
  .search-contacts input {
    width: 100%;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    border: 1px solid var(--light-gray);
    border-radius: var(--radius);
    outline: none;
    transition: var(--transition);
  }
  .search-contacts input:focus {
    border-color: var(--secondary);
    box-shadow: 0 0 0 3px rgba(20, 160, 233, 0.1);
  }
  .search-contacts i {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: var(--primary);
  }

  /* Contact List */
  .contact-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }
  .contact {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.5rem;
    border-radius: var(--radius);
    transition: var(--transition);
  }
  .contact:hover {
    background-color: var(--light);
  }
  .contact-img {
    width: 47px;
    height: 47px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--light-gray);
  }
  .contact-details {
    flex: 1;
  }
  .contact-details h4 {
    margin-bottom: 0.2rem;
    color: var(--dark);
  }
  .contact-details p {
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 0.2rem;
    display: flex;
    align-items: center;
  }
  .contact-details p i {
    margin-right: 0.5rem;
    color: var(--primary);
    width: 15px;
  }
  .contact-action {
    background: none;
    color: var(--primary);
    padding: 0.3rem;
    border-radius: 50%;
  }
  .contact-action:hover {
    background-color: var(--light);
    transform: none;
    box-shadow: none;
  }

/* Leaderboard Styles */
.leaderboard-content {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.leaderboard-content h3 {
  font-size: 1rem;
  margin-bottom: 1rem;
  color: var(--secondary);
}

.leaderboard-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.5rem;
  border-radius: var(--radius);
  transition: var(--transition);
}

.leaderboard-item:hover {
  background-color: var(--light);
}

.rank {
  width: 25px;
  height: 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  background-color: var(--primary);
  color: white;
  border-radius: 50%;
  font-weight: 600;
  font-size: 0.9rem;
}

.leaderboard-item:nth-child(2) .rank {
  background-color: var(--secondary);
}

.leaderboard-item:nth-child(3) .rank {
  background-color: var(--accent);
}

.employee-img {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}

.employee-details {
  flex: 1;
}

.employee-details h4 {
  margin-bottom: 0.2rem;
  color: var(--dark);
}

.employee-details p {
  font-size: 0.85rem;
  color: #666;
}

.score {
  font-weight: 700;
  font-size: 1.2rem;
  color: var(--primary);
}

.score span {
  font-size: 0.8rem;
  font-weight: 500;
  color: #666;
  margin-left: 0.2rem;
}

/* Invitations Styles */
.invitation-list {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.invitation {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 1rem;
  border-radius: var(--radius);
  background-color: var(--light);
  transition: var(--transition);
}

.invitation:hover {
  transform: translateY(-3px);
  box-shadow: var(--shadow);
}

.invitation-icon {
  width: 40px;
  height: 40px;
  background-color: var(--secondary);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.2rem;
}

.invitation:nth-child(2) .invitation-icon {
  background-color: var(--accent);
}

.invitation-details {
  flex: 1;
}

.invitation-details h4 {
  margin-bottom: 0.2rem;
  color: var(--dark);
}

.invitation-details p {
  font-size: 0.9rem;
  color: #666;
  margin-bottom: 0.75rem;
}

.invitation-actions {
  display: flex;
  gap: 0.5rem;
}

.accept-btn {
  background-color: var(--success);
  color: white;
  padding: 0.3rem 1rem;
  font-size: 0.8rem;
}

.decline-btn {
  background-color: transparent;
  color: var(--dark);
  border: 1px solid var(--light-gray);
  padding: 0.3rem 1rem;
  font-size: 0.8rem;
}

.accept-btn:hover {
  background-color: #3d8b40;
}

.decline-btn:hover {
  background-color: var(--light-gray);
}

/* Footer Styles */
.footer {
  margin-top: 2rem;
  background-color: var(--primary);
  color: white;
  padding: 2rem 1.5rem 1rem;
  border-radius: var(--radius) var(--radius) 0 0;
}

.footer-content {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  margin-bottom: 2rem;
}

.footer-section h3 {
  color: white;
  margin-bottom: 1.2rem;
  position: relative;
  padding-bottom: 0.5rem;
}

.footer-section h3::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 50px;
  height: 2px;
  background-color: var(--secondary);
}

.footer-section p {
  margin-bottom: 0.8rem;
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.8);
}

.footer-section p i {
  margin-right: 0.5rem;
  color: var(--secondary);
}

.footer-section ul {
  list-style: none;
}

.footer-section ul li {
  margin-bottom: 0.8rem;
}

.footer-section ul li a {
  color: rgba(255, 255, 255, 0.8);
  transition: var(--transition);
}

.footer-section ul li a:hover {
  color: var(--secondary);
  padding-left: 0.5rem;
}

.social-icons {
  display: flex;
  gap: 1rem;
}

.social-icons a {
  width: 35px;
  height: 35px;
  background-color: rgba(255, 255, 255, 0.1);
  color: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: var(--transition);
}

.social-icons a:hover {
  background-color: var(--secondary);
  transform: translateY(-3px);
}

.footer-bottom {
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  padding-top: 1.5rem;
  text-align: center;
  font-size: 0.9rem;
  color: rgba(255, 255, 255, 0.7);
}
/* Announcement Slider Styles */
.announcement-slider {
  flex: 1;
  position: relative;
  border-radius: var(--radius);
  overflow: hidden;
  box-shadow: var(--shadow);
}

.slider-container {
  position: relative;
  height: 250px;
  width: 100%;
}

.slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.7s ease;
  overflow: hidden;
}

.slide.active {
  opacity: 1;
}

.slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.slide-content {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  padding: 1.5rem;
  background: linear-gradient(to top, rgba(0,0,0,0.8), rgba(0,0,0,0));
  color: white;
}

.slide-content h2 {
  color: white;
  margin-bottom: 0.5rem;
}

.slide-btn {
  background-color: var(--secondary);
  color: white;
  padding: 0.5rem 1.5rem;
  margin-top: 0.5rem;
  border-radius: 20px;
}

.slider-controls {
  position: absolute;
  bottom: 10px;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 10;
}

.prev-slide, .next-slide {
  background-color: rgba(255,255,255,0.3);
  color: white;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}

.slider-dots {
  display: flex;
  gap: 5px;
}

.dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: rgba(255,255,255,0.5);
  cursor: pointer;
  transition: var(--transition);
}

.dot.active {
  background-color: white;
}

/* Event Action Button Styles */
.event-actions {
  margin-top: 8px;
}

.join-event-btn {
  background-color: var(--secondary);
  color: white;
  padding: 0.3rem 0.8rem;
  font-size: 0.8rem;
  border-radius: 4px;
}

.join-event-btn:hover {
  background-color: var(--primary);
}

/* Quick Links Slider Styles */
.quick-links-slider {
  position: relative;
  overflow: hidden;
  margin-bottom: 1rem;
}

.links-wrapper {
  display: flex;
  gap: 1.5rem;
  transition: transform 0.5s ease;
  padding: 0.5rem;
}

.quick-links-nav {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 1rem;
  margin-top: 1rem;
}

.prev-links, .next-links {
  background-color: var(--light);
  color: var(--primary);
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav-dots {
  display: flex;
  gap: 5px;
}

.nav-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background-color: var(--light-gray);
  cursor: pointer;
  transition: var(--transition);
}

.nav-dot.active {
  background-color: var(--secondary);
}
.currency-row span.red {
  color: var(--danger); /* Red color */
}

.currency-row span.green {
  color: var(--success); /* Green color */
}
/* Animations */
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideInLeft {
  from {
    transform: translateX(-50px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes slideInRight {
  from {
    transform: translateX(50px);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes pulse {
  0% {
    transform: scale(1);
    box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.7);
  }
  70% {
    transform: scale(1.05);
    box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
  }
  100% {
    transform: scale(1);
    box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
  }
}

.fade-in {
  animation: fadeIn 1s ease forwards;
}

.slide-in-left {
  animation: slideInLeft 1s ease forwards;
}

.slide-in-right {
  animation: slideInRight 1s ease forwards;
}

.delay-1 {
  animation-delay: 0.3s;
}

.pulse {
  animation: pulse 2s infinite;
}

/* Responsive Styles */
@media screen and (max-width: 1024px) {
  .two-column {
    grid-template-columns: 1fr;
  }
  
  .banner {
    flex-direction: column;
  }
  
  .header {
    flex-wrap: wrap;
    gap: 1rem;
  }
  
  .nav {
    order: 3;
    width: 100%;
    justify-content: space-around;
    margin-top: 1rem;
  }
  
  .nav-link {
    margin: 0;
  }
}

@media screen and (max-width: 768px) {
  .links-container {
    grid-template-columns: repeat(3, 1fr);
  }
  
  .footer-content {
    grid-template-columns: 1fr;
  }
}

@media screen and (max-width: 576px) {
  .links-container {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .header {
    padding: 1rem;
  }
  

  
  .search-container {
    width: 100%;
    order: 2;
  }
  
  .search-input {
    width: 100%;
  }
}
    /* Currency Search */
    .currency-search {
      margin-bottom: 1rem;
      position: relative;
    }
    .currency-search input {
      width: 100%;
      padding: 0.75rem 1rem;
      border: 1px solid var(--light-gray);
      border-radius: var(--radius);
      outline: none;
      transition: var(--transition);
    }
    .currency-search input:focus {
      border-color: var(--secondary);
      box-shadow: 0 0 0 3px rgba(20, 160, 233, 0.1);
    }
    .currency-search i {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--primary);
    }
    .event-tooltip {
    display: none;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translateX(-50%);
    background-color: var(--primary);
    color: white;
    padding: 0.5rem;
    border-radius: var(--radius);
    z-index: 10;
    width: 200px;
    margin-top: 0.5rem;
    box-shadow: var(--shadow);
  }
  .day:hover .event-tooltip {
    display: block;
  }
     /* Existing styles remain unchanged */
     .nearest-events {
      margin-top: 1rem;
      background-color: var(--light);
      padding: 1rem;
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }
    .nearest-events h3 {
      font-size: 1rem;
      margin-bottom: 1rem;
      color: var(--secondary);
    }
    .nearest-event {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 0.5rem;
      border-radius: var(--radius);
      transition: var(--transition);
    }
    .nearest-event:hover {
      background-color: var(--light-gray);
    }
    .nearest-event-date {
      display: flex;
      flex-direction: column;
      align-items: center;
      color: var(--primary);
    }
    .nearest-event-date .date-box {
      background-color: var(--primary);
      color: white;
      width: 2.5rem;
      height: 2.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 6px;
      font-weight: 600;
      font-size: 1.2rem;
    }
    .nearest-event-date .month {
      font-size: 0.8rem;
      font-weight: 500;
    }
    .nearest-event-details {
      flex: 1;
    }
    .nearest-event-details h4 {
      margin-bottom: 0.2rem;
      color: var(--dark);
    }
    .nearest-event-details p {
      font-size: 0.85rem;
      color: #666;
    }
    .nearest-event-actions {
      display: flex;
      gap: 0.5rem;
    }
    .nearest-event-btn {
      background-color: var(--secondary);
      color: white;
      padding: 0.3rem 0.8rem;
      font-size: 0.8rem;
      border-radius: 4px;
    }
    .nearest-event-btn:hover {
      background-color: var(--primary);
    }

    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="desktop">
        @include('partials.header')
        
        <main class="main-content">
            @yield('content')
        </main>
        
        @include('partials.footer')
    </div>
    
    @stack('scripts')
</body>
</html>