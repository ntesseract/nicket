<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration System</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    <nav class="bg-black text-white shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('home') }}" class="text-2xl font-bold">NICKET</a>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">Home</a>
                        <a href="#events" class="hover:text-gray-300 transition">Events</a>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    @auth
                        <a href="{{ url('/admin') }}" class="bg-white text-black hover:bg-gray-200 px-4 py-2 rounded-lg font-medium transition shadow-md">Admin Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="bg-gray-800 hover:bg-gray-700 px-4 py-2 rounded-lg font-medium transition shadow-md">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-black hover:bg-gray-200 px-4 py-2 rounded-lg font-medium transition shadow-md">Admin Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-black text-white py-16">
        <div class="container mx-auto px-4 flex flex-col items-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 text-center">Discover & Join Amazing Events</h1>
            <p class="text-xl mb-8 text-center max-w-3xl text-gray-300">Find the perfect events to attend, network with like-minded people, and create unforgettable memories.</p>
            <a href="#events" class="bg-white text-black hover:bg-gray-200 px-6 py-3 rounded-full font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
                Explore Events
            </a>
        </div>
    </div>

    <!-- Events Section -->
    <div id="events" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-2 text-black">Upcoming Events</h2>
            <p class="text-center text-gray-600 mb-12">Discover events that match your interests</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($events as $event)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition border border-gray-200">
                        <div class="h-48 bg-gray-900 flex items-center justify-center">
                            @if($event->image_path)
                                <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-white text-lg font-semibold">{{ $event->name }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-xl font-bold text-black hover:text-gray-700">{{ $event->name }}</h3>
                                <span class="bg-black text-white text-xs font-semibold px-2 py-1 rounded-full">New</span>
                            </div>
                            
                            <div class="flex items-center text-gray-600 text-sm mb-4">
                                <i class="far fa-calendar-alt mr-2 text-black"></i>
                                <span>{{ $event->event_date->format('l, F j, Y') }}</span>
                            </div>
                            
                            <p class="text-gray-600 mb-6">{{ Str::limit($event->information, 120) }}</p>
                            
                            <div class="flex justify-between items-center">
                                <a href="{{ route('events.show', $event) }}" 
                                   class="inline-block bg-black hover:bg-gray-800 text-white font-medium px-5 py-2 rounded-lg transition">
                                    View Details
                                </a>
                                <button class="text-gray-500 hover:text-black transition">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full bg-white rounded-xl shadow p-8 text-center border border-gray-200">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-calendar-times text-gray-500 text-3xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-black mb-2">No Events Available</h3>
                        <p class="text-gray-600">Check back soon for upcoming events.</p>
                    </div>
                @endforelse
            </div>
            
            @if(count($events) > 6)
                <div class="text-center mt-12">
                    <a href="#" class="inline-block border-2 border-black text-black hover:bg-black hover:text-white font-medium px-6 py-3 rounded-lg transition">
                        View All Events
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">NICKET</h3>
                    <p class="text-gray-400">The best platform to find and register for events that match your interests.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Events</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Connect With Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} NICKET. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>