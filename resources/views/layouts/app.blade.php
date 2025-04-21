<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->company_name ?? 'Alawneh Intranet' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap CSS -->
<link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
  scroll-behavior: smooth;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: #f0f0f0;
  color: var(--text);
  line-height: 1.6;
  overflow-x: hidden;
}

.desktop {
  max-width: 1440px;
  margin: 0 6rem;
  background-color: var(--light);
}
a:hover{
  color:rgb(20, 160, 233) !important;
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
  /* border-radius: var(--radius); */
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
  font-size: 1rem;
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
  /* margin: 1rem auto 0; */
  background-color: transparent;
  color: #0d2f5f !important;
  border: 2px solid #0d2f5f;
  /* border-radius: var(--radius); */
  padding: 0.3rem 1rem;
  font-size: 0.75rem;
  text-align: center;
}
.contacts {
  
  display: flex;
    justify-content: center;
  z-index: 99;
   width: 100%;

}
.view-all:hover {
  background-color: #0d2f5f!important;
  color: white !important;
}


/* Header Styles */
.header {
  /* box-shadow: 1px 1px 12px; */
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #0d2f5f;
  position: sticky;
    z-index: 99999999999;
    top: 1px;
  /* border 1px solid var(--light-gray); */
  /* border-radius: var(--radius); */
  /* margin-bottom: 1.5rem; */

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
 a{
  color : white !important;
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
  /* background-color: white; */
  /* border-radius: 20px; */
  padding: 0.3rem 0.5rem;
}



.search-button {
  background: none;
  border: none;
  color: white;
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
  /* border-radius: 50%; */
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
  /* border-radius: var(--radius); */
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
  padding: 0 2rem;
  border-top: 20px solid #f0f0f0;
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
  /* border-radius: var(--radius); */
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
  /* border-radius: var(--radius); */
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
  /* border-radius: 25px; */
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
  /* border-radius: var(--radius); */
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
  color: white;
  padding: 0.5rem;
  /* border-radius: 0 0 var(--radius) var(--radius); */
  transition: var(--transition);
  opacity: 0;
}

.link-card:hover {
  transform: translateY(-15px);
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
  grid-template-columns: 2fr 1fr;
  gap: 1.5rem;
  margin-bottom: 2rem;
}

.column {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

/* Events Styles */
.events, .documents, .leaderboard, .invitations {
  background-color: white;
  padding: 1.5rem;
  /* border-radius: var(--radius); */
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
  /* border-radius: var(--radius); */
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
  /* border-radius: var(--radius); */
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
    width: inherit;
  }
  .search-contacts input {
    width: 100%;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    border: 1px solid var(--light-gray);
    /* border-radius: var(--radius); */
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
    /* border-radius: var(--radius); */
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
    /* border-radius: 50%; */
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
  /* border-radius: var(--radius); */
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
  /* border-radius: var(--radius); */
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
  /* border-radius: var(--radius) var(--radius) 0 0; */
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
  /* border-radius: var(--radius); */
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
  /* border-radius: 20px; */
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
  /* border-radius: 50%; */
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
  /* border-radius: 4px; */
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
  justify-content : center;
  align-items:center;
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
  /* border-radius: 50%; */
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
  /* border-radius: 50%; */
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
/* Main Layout Styles */
.banking-layout {
  font-family: 'Arial', sans-serif;
  z-index: 999;
  padding-bottom: 20px;
}

/* Top Row Layout */
.banking-top-row {
 
  position: relative;
  z-index: 99;
 
}

.banking-slider-container {
  flex: 2;
  position: relative;
  overflow: hidden;
  /* border-radius: 12px; */
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.banking-quick-links {
  
  background-color: #f7f9fc;
  /* border-radius: 12px; */
  padding: 10px 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}



.banking-currency-card {
  background-color: #ffffff;
  /* border-radius: 12px; */
  padding: 20px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Slider Styles */
.banking-slider {
  position: relative;
  height: 490px;
  width: 100%;
}

.banking-slide {
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  transition: opacity 0.5s ease;
  display: flex;
  flex-direction: column;
}

.banking-slide.active {
  opacity: 1;
  z-index: 1;
}

.banking-slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* border-radius: 12px; */
}

.banking-slide-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
  color: white;

}

.banking-slide:hover .banking-slide-content {
  background: linear-gradient(to top, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.6), transparent);
  transition: background 0.3s ease;
}
.banking-slide-content h2{
  color:white;
  font-weight:bold;
}
.banking-slide-btn {
  display: inline-block;
  padding: 8px 16px;
  background: linear-gradient(135deg, #004e78, #14A0E9);
  color: white;
  text-decoration: none;
  /* border-radius: 4px; */
  font-weight: bold;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

.banking-slide-btn:hover {
  background:white;
  color:white;
  text-decoration: none;
  transform: translateY(-2px);
}

.banking-slider-controls {
  position: absolute;
  bottom: 20px;
  left: 0;
  right: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 2;
}

.banking-prev-slide,
.banking-next-slide {
  background-color: rgba(255, 255, 255, 0.5);
  border: none;
  border-radius: 50%;
  width: 30px;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.banking-prev-slide:hover,
.banking-next-slide:hover {
  background-color: rgba(255, 255, 255, 0.8);
}

.banking-slider-dots {
  display: flex;
  gap: 10px;
  margin: 0 15px;
}

.banking-dot {
  width: 10px;
  height: 10px;
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 50%;
  cursor: pointer;
}

.banking-dot.active {
  background-color: white;
}

/* Quick Links Styles */
.banking-quick-links h2 {
    /* margin-top: 5px; */
    padding-bottom: 6px;
    font-size: small;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.banking-links-wrapper {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 5px;
}

.banking-link-card {
  padding: 15px;
  /* border-radius: 8px; */
  color: white;
  text-align: center;
  cursor: pointer;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.banking-link-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.banking-link-card i {
  font-size: 24px;
  margin-bottom: 10px;
}

.banking-link-card p {
  margin: 0;
  font-weight: bold;
}

.banking-quick-links-nav {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 20px;
}

.banking-prev-links,
.banking-next-links {
  background-color:rgb(255, 255, 255);
  border: none;
  /* border-radius: 50%; */
  width: 30px;
  height: 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.banking-prev-links:hover,
.banking-next-links:hover {
  background-color: #e0e0e0;
}

.banking-nav-dots {
  display: flex;
  gap: 8px;
  margin: 0 10px;
}

.banking-nav-dot {
  width: 8px;
  height: 8px;
  background-color: #ccc;
  border-radius: 50%;
  cursor: pointer;
}

.banking-nav-dot.active {
  background-color: #666;
}

/* Currency Table Styles */
.banking-currency-card h2 {
  margin-top: 0;
  margin-bottom: 20px;
  color: #333;
}

.banking-currency-search {
  position: relative;
  margin-bottom: 15px;
}

.banking-currency-search input {
  width: 100%;
  padding: 10px 15px;
  padding-right: 40px;
  border: 1px solid #ddd;
  /* border-radius: 6px; */
  font-size: 14px;
}

.banking-currency-search i {
  position: absolute;
  right: 15px;
  top: 50%;
  transform: translateY(-50%);
  color: #666;
}

.banking-currency-table {
  border: 1px solid #eee;
  /* border-radius: 6px; */
  overflow: hidden;
}

.banking-currency-header {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  background-color: #f7f9fc;
  padding: 12px 15px;
  font-weight: bold;
  border-bottom: 1px solid #eee;
}

#banking-currency-rates {
  max-height: 300px;
  overflow-y: auto;
}

.banking-currency-row {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  padding: 12px 15px;
  border-bottom: 1px solid #eee;
  transition: background-color 0.2s ease;
}

.banking-currency-row:hover {
  background-color: #f5f5f5;
}

.banking-currency-row:last-child {
  border-bottom: none;
}


/* ///////////////////////////////////////////////////////// */
/* Search Results Dropdown */


.search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border: 1px solid var(--light-gray);
    border-radius: 0 0 var(--radius) var(--radius);
    max-height: 300px;
    overflow-y: auto;
    z-index: 999999;
    box-shadow: var(--shadow);
    padding: 0.75rem; /* Added padding */
}

.search-result-item {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid var(--light-gray);
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-result-item:hover {
    background-color: var(--light);
}

.search-result-item img {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}

/* Modal Styles */
.modal {
  background-color: rgb(0,0,0,0.6);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;

    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: white;
    padding: 2rem;
    border-radius: var(--radius);
    width: 90%;
    border: 3px solid black;
    /* top: 194px; */
    /* right: 378px; */
    max-width: 500px;
    position: relative;

}

.close-modal {
    position: absolute;
    top: 1rem;
    right: 1rem;
    font-size: 1.5rem;
    cursor: pointer;
}

.modal-employee-photo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 1rem;
    display: block;
    border: 3px solid var(--secondary);
}

.modal-employee-info {
    text-align: center;
}

.modal-employee-info p {
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}


/* Responsive Styles */
@media (max-width: 992px) {
  .banking-top-row {
    flex-direction: column;
  }
  
  .banking-slider-container,
  .banking-quick-links {
    flex: none;
    width: 100%;
  }
  
  .banking-slider {
    height: 300px;
  }
  
  .banking-links-wrapper {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media (max-width: 768px) {
  .banking-links-wrapper {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .banking-currency-header,
  .banking-currency-row {
    grid-template-columns: 1.5fr 1fr 1fr;
  }
}

@media (max-width: 576px) {
  .banking-slider {
    height: 250px;
  }
  
  .banking-links-wrapper {
    grid-template-columns: 1fr 1fr;
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
      /* border-radius: var(--radius); */
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
    /* border-radius: var(--radius); */
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
      /* border-radius: var(--radius); */
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
      /* border-radius: var(--radius); */
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
      /* border-radius: 6px; */
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
      /* border-radius: 4px; */
    }
    .nearest-event-btn:hover {
      background-color: var(--primary);
    }
/* Scrolling Ad Bar Styles */
.scrolling-ad-container {
    width: 100%;
    overflow: hidden;
    background: linear-gradient(135deg, #013c2c, #11AD83);
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    margin: 10px 0;
    height: 40px;
   
    position: relative;
}

.scrolling-ad-track {
    display: flex;
    align-items: center;
    height: 100%;
    position: absolute;
    white-space: nowrap;
    will-change: transform;
    animation: scrollAds 30s linear infinite;
}

.scrolling-ad {
    flex-shrink: 0;
    padding: 0 20px;
    height: 100%;
    display: flex;
    align-items: center;
}

.scrolling-ad img {
    max-height: 60px;
    max-width: 160px;
    object-fit: contain;
}

.ad-text {
    margin-left: 10px;
    font-size: 14px;
    color : white;}

@keyframes scrollAds {
    from { transform: translateX(0); }
    to { transform: translateX(-50%); }
}

/* Pause animation on hover */
.scrolling-ad-container:hover .scrolling-ad-track {
    animation-play-state: paused;
}
/* Contacts Index Page Styles */
.contacts-index {
    padding: 2rem;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.contacts-search {
    position: relative;
    margin-bottom: 1.5rem;
    width: 100%;
}

.contacts-search input {
    width: 100%;
    padding: 0.75rem 2.5rem 0.75rem 1rem;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.contacts-search input:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
    outline: none;
}

.contacts-search i {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #7f8c8d;
}

.contacts-list-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.contact-card {
    display: flex;
    align-items: center;
    padding: 1rem;
    background-color: #f9f9f9;
    border-radius: 8px;
    transition: all 0.3s ease;
    overflow:hidden;
    border: 1px solid #e0e0e0;
}

.contact-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border-color: #3498db;
}

.contact-card-image {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 1rem;
    border: 2px solid #e0e0e0;
}

.contact-card-details {
    flex: 1;
}

.contact-card-name {
    margin: 0 0 0.5rem 0;
    color: #2c3e50;
    font-size: 1.1rem;
}

.contact-card-phone,
.contact-card-email,
.contact-card-department {
    margin: 0.25rem 0;
    font-size: 0.9rem;
    color: #7f8c8d;
    display: flex;
    align-items: center;
}

.contact-card-phone i,
.contact-card-email i,
.contact-card-department i {
    margin-right: 0.5rem;
    width: 16px;
    color: #3498db;
}

.contact-card-action {
    background: none;
    border: none;
    color: #7f8c8d;
    font-size: 1rem;
    cursor: pointer;
    padding: 0.5rem;
    border-radius: 4px;
    transition: all 0.3s ease;
}

.contact-card-action:hover {
    background-color: #e0e0e0;
    color: #2c3e50;
}

/* Contact Modal Styles */
.contact-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.contact-modal-content {
    background-color: white;
    border-radius: 8px;
    width: 90%;
    max-width: 500px;
    padding: 2rem;
    position: relative;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
}

.contact-modal-close {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    font-size: 1.5rem;
    cursor: pointer;
    color: #7f8c8d;
    transition: all 0.3s ease;
}

.contact-modal-close:hover {
    color: #e74c3c;
}

.contact-modal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.contact-modal-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid #3498db;
    margin-bottom: 1.5rem;
}

.contact-modal-info {
    text-align: center;
    width: 100%;
}

.contact-modal-info h3 {
    margin-bottom: 1rem;
    color: #2c3e50;
}

.contact-modal-info p {
    margin: 0.75rem 0;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-modal-info p i {
    margin-right: 0.75rem;
    color: #3498db;
}

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 2rem;
}

.pagination li {
    margin: 0 0.25rem;
}

.pagination li a,
.pagination li span {
    display: inline-block;
    padding: 0.5rem 1rem;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
    color: #3498db;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination li.active a,
.pagination li.active span {
    background-color: #3498db;
    color: white;
    border-color: #3498db;
}

.pagination li a:hover {
    background-color: #f0f0f0;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .contacts-list-container {
        grid-template-columns: 1fr;
    }
    
    .contact-modal-content {
        width: 95%;
        padding: 1.5rem;
    }
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

