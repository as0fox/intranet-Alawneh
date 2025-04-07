<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Alawneh Exchange</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Announcements</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $stats['announcements'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Events</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $stats['events'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Documents</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $stats['documents'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Contacts</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $stats['contacts'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-500">Quick Links</p>
                            <p class="text-2xl font-semibold text-gray-900">{{ $stats['quickLinks'] }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Events -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Events</h3>
                    <div class="space-y-4">
                        @forelse($recentEvents as $event)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-blue-100 rounded-md p-2">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                                    <p class="text-sm text-gray-500">{{ $event->date->format('M d, Y') }} @if($event->time) • {{ $event->time }} @endif</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No recent events</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Recent Documents -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Recent Documents</h3>
                    <div class="space-y-4">
                        @forelse($recentDocuments as $document)
                            <div class="flex items-start">
                                <div class="flex-shrink-0 bg-purple-100 rounded-md p-2">
                                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $document->title }}</p>
                                    <p class="text-sm text-gray-500">Updated {{ $document->updated_date->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500">No recent documents</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>