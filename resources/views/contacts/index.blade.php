@extends('layouts.app')

@section('content')

<div class="desktop">
    
    <div class="banking-top-row">
 <!-- Scrolling Ad Bar -->
<div class="scrolling-ad-container">
    <div class="scrolling-ad-track">
        @foreach($ads as $ad)
            <div class="scrolling-ad"> 
                    @if($ad->text)
                        <span class="ad-text">{{ $ad->text }}</span>
                    @endif
                </a>
            </div>
        @endforeach
    </div>
</div>
</div>
        <section class="contacts-index">
            <h2 class="section-title">All Contacts <i class="fas fa-address-book"></i></h2>
            
            <div class="contacts-search">
                <input type="text" id="contacts-filter" placeholder="Filter contacts..." />
                <i class="fas fa-search"></i>
            </div>
            
            <!-- Employee Details Modal -->
            <div id="contact-details-modal" class="contact-modal">
                <div class="contact-modal-content">
                    <span class="contact-modal-close">&times;</span>
                    <div class="contact-modal-body">
                        <img id="modal-contact-img" src="" alt="Contact" class="contact-modal-image">
                        <div class="contact-modal-info">
                            <h3 id="modal-contact-name"></h3>
                            <p><i class="fas fa-phone"></i> <span id="modal-contact-phone"></span></p>
                            <p><i class="fas fa-envelope"></i> <span id="modal-contact-email"></span></p>
                            <p><i class="fas fa-building"></i> <span id="modal-contact-department"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contacts-list-container">
                @foreach($contacts as $contact)
                <div class="contact-card" 
                     data-name="{{ $contact->name }}" 
                     data-department="{{ $contact->department }}"
                     data-phone="{{ $contact->phone }}"
                     data-email="{{ $contact->email }}"
                     data-image="{{ $contact->photo ?? '/images/default-profile.png' }}">
                    <img src="{{ $contact->photo ?? '/images/default-profile.png' }}" alt="Contact" class="contact-card-image">
                    <div class="contact-card-details">
                        <h4 class="contact-card-name">{{ $contact->name }}</h4>
                        <p class="contact-card-phone"><i class="fas fa-phone"></i> {{ $contact->phone }}</p>
                        <p class="contact-card-email"><i class="fas fa-envelope"></i> {{ $contact->email }}</p>
                        <p class="contact-card-department"><i class="fas fa-building"></i> {{ $contact->department }}</p>
                    </div>
                
                </div>
                @endforeach
            </div>

            {{ $contacts->links() }}
        </section>
  
</div>
@endsection

@push('styles')
<style>

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter contacts
    const contactsFilter = document.getElementById('contacts-filter');
    const contactCards = document.querySelectorAll('.contact-card');
    
    contactsFilter.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        contactCards.forEach(card => {
            const name = card.dataset.name.toLowerCase();
            const department = card.dataset.department.toLowerCase();
            const phone = card.dataset.phone.toLowerCase();
            const email = card.dataset.email.toLowerCase();
            
            if (name.includes(searchTerm) || 
                department.includes(searchTerm) || 
                phone.includes(searchTerm) || 
                email.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    });

    // Modal functionality
    const modal = document.getElementById('contact-details-modal');
    const modalImg = document.getElementById('modal-contact-img');
    const modalName = document.getElementById('modal-contact-name');
    const modalPhone = document.getElementById('modal-contact-phone');
    const modalEmail = document.getElementById('modal-contact-email');
    const modalDept = document.getElementById('modal-contact-department');
    const closeModal = document.querySelector('.contact-modal-close');
    
    // Open modal when contact card is clicked
    contactCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Don't open modal if clicking the action button
            if (e.target.closest('.contact-card-action')) {
                return;
            }
            
            modalImg.src = this.dataset.image;
            modalName.textContent = this.dataset.name;
            modalPhone.textContent = this.dataset.phone;
            modalEmail.textContent = this.dataset.email;
            modalDept.textContent = this.dataset.department;
            
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close modal
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
    
    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Contact card action menu (placeholder functionality)
    const actionButtons = document.querySelectorAll('.contact-card-action');
    
    actionButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();
            alert('Contact actions would appear here (edit, delete, etc.)');
        });
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
});
</script>
@endpush