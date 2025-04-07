<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - {{ config('app.name') }}</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-full md:w-64 flex-shrink-0">
            <div class="p-4">
                <h1 class="text-xl font-bold">Alawneh Exchange</h1>
                <p class="text-gray-400 text-sm">Admin Dashboard</p>
            </div>
            
            <nav class="mt-6">
                <x-admin-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                    <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.settings.edit') }}" :active="request()->routeIs('admin.settings.*')">
                    <i class="fas fa-cog mr-2"></i> Site Settings
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.navigations.index') }}" :active="request()->routeIs('admin.navigations.*')">
                    <i class="fas fa-bars mr-2"></i> Navigation
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.events.index') }}" :active="request()->routeIs('admin.events.*')">
                    <i class="fas fa-calendar-alt mr-2"></i> Events
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.documents.index') }}" :active="request()->routeIs('admin.documents.*')">
                    <i class="fas fa-file-alt mr-2"></i> Documents
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.contacts.index') }}" :active="request()->routeIs('admin.contacts.*')">
                    <i class="fas fa-address-book mr-2"></i> Contacts
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.leaderboards.index') }}" :active="request()->routeIs('admin.leaderboards.*')">
                    <i class="fas fa-trophy mr-2"></i> Leaderboard
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.invitations.index') }}" :active="request()->routeIs('admin.invitations.*')">
                    <i class="fas fa-envelope mr-2"></i> Invitations
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.quick-links.index') }}" :active="request()->routeIs('admin.quick-links.*')">
                    <i class="fas fa-link mr-2"></i> Quick Links
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.announcements.index') }}" :active="request()->routeIs('admin.announcements.*')">
                    <i class="fas fa-bullhorn mr-2"></i> Announcements
                </x-admin-nav-link>
                
                <x-admin-nav-link href="{{ route('admin.currency-settings.index') }}" :active="request()->routeIs('admin.currency-settings.*')">
                    <i class="fas fa-exchange-alt mr-2"></i> Currency Settings
                </x-admin-nav-link>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="font-semibold text-xl text-gray-800">
                        @yield('title')
                    </h2>
                    
                    <div class="flex items-center space-x-4">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition">
                                    <div>{{ Auth::user()->name }}</div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            
                            <x-slot name="content">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>