<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->name }} - NICKET</title>
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
                        <a href="{{ route('home') }}#events" class="hover:text-gray-300 transition">Events</a>
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

    <main class="flex-grow py-12">
        <div class="container mx-auto px-4">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <!-- Event Header -->
                <div class="h-64 md:h-80 bg-gray-900 relative">
                    @if($event->image_path)
                        <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end">
                        <div class="p-6 text-white">
                            <h1 class="text-3xl md:text-4xl font-bold mb-2">{{ $event->name }}</h1>
                            <div class="flex flex-wrap gap-2">
                                <span class="bg-black bg-opacity-70 px-3 py-1 rounded-full text-sm flex items-center">
                                    <i class="far fa-calendar-alt mr-2"></i>
                                    {{ $event->event_date->format('F j, Y') }}
                                </span>
                                <span class="bg-black bg-opacity-70 px-3 py-1 rounded-full text-sm flex items-center">
                                    <i class="far fa-clock mr-2"></i>
                                    7:00 PM
                                </span>
                                <span class="bg-black bg-opacity-70 px-3 py-1 rounded-full text-sm flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2"></i>
                                    Virtual Event
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Event Content -->
                <div class="p-6">
                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- Main Content -->
                        <div class="md:w-2/3">
                            <h2 class="text-2xl font-bold text-black mb-4">About This Event</h2>
                            <div class="prose max-w-none text-gray-700">
                                <p class="mb-6">{{ $event->information }}</p>
                            </div>
                            
                            <h2 class="text-2xl font-bold text-black mt-8 mb-4">What You'll Learn</h2>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                    <span>Gain insights into the latest industry trends and best practices</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                    <span>Network with professionals from around the world</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                    <span>Participate in interactive workshops and Q&A sessions</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                    <span>Receive exclusive resources and materials</span>
                                </li>
                            </ul>
                            
                            <div class="flex flex-wrap gap-2 mt-8">
                                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-sm">Technology</span>
                                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-sm">Workshop</span>
                                <span class="bg-gray-100 text-black px-3 py-1 rounded-full text-sm">Professional</span>
                            </div>
                            
                            <div class="border-t border-gray-200 mt-8 pt-8">
                                <h2 class="text-2xl font-bold text-black mb-4">Share This Event</h2>
                                <div class="flex space-x-4">
                                    <a href="#" class="bg-black text-white p-2 rounded-full hover:bg-gray-800 transition">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="bg-black text-white p-2 rounded-full hover:bg-gray-800 transition">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="bg-black text-white p-2 rounded-full hover:bg-gray-800 transition">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                    <a href="#" class="bg-black text-white p-2 rounded-full hover:bg-gray-800 transition">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Sidebar -->
                        <div class="md:w-1/3">
                            <div class="bg-gray-50 rounded-xl p-6 mb-6 sticky top-6 border border-gray-200">
                                <h3 class="text-xl font-bold text-black mb-4">Registration</h3>
                                <div class="mb-6">
                                    <div class="mb-4">
                                        <span class="text-3xl font-bold text-black">Free</span>
                                    </div>
                                    <div class="space-y-2 text-gray-700 mb-4">
                                        <div class="flex items-center">
                                            <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                            <span>Full access to event</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                            <span>Event recording</span>
                                        </div>
                                        <div class="flex items-center">
                                            <span class="text-black mr-2"><i class="fas fa-check-circle"></i></span>
                                            <span>Certificate of attendance</span>
                                        </div>
                                    </div>
                                    <a href="{{ route('events.register', $event) }}" class="block w-full bg-black hover:bg-gray-800 text-white text-center py-3 rounded-lg font-semibold transition shadow-md">
                                        Register Now
                                    </a>
                                </div>
                                <div class="border-t border-gray-300 pt-4">
                                    <div class="flex justify-between items-center text-gray-700 mb-2">
                                        <span>Date:</span>
                                        <span class="font-medium">{{ $event->event_date->format('F j, Y') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center text-gray-700 mb-2">
                                        <span>Time:</span>
                                        <span class="font-medium">7:00 PM - 9:00 PM</span>
                                    </div>
                                    <div class="flex justify-between items-center text-gray-700">
                                        <span>Location:</span>
                                        <span class="font-medium">Online</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-white border border-gray-200 rounded-xl p-6">
                                <h3 class="text-xl font-bold text-black mb-4">Organizer</h3>
                                <div class="flex items-center mb-4">
                                    <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-black mr-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold">NICKET Team</h4>
                                        <p class="text-sm text-gray-600">Event Organizer</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm mb-4">
                                    Organizing quality events since 2020. We specialize in technology, business, and educational events.
                                </p>
                                <a href="#" class="text-black hover:underline text-sm font-medium">
                                    View organizer profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Similar Events -->
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-black mb-6">You Might Also Like</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Similar Event 1 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition border border-gray-200">
                        <div class="h-40 bg-gray-900 flex items-center justify-center">
                            <span class="text-white text-lg font-semibold">Web Development Workshop</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-black hover:text-gray-700">Web Development Workshop</h3>
                            <div class="flex items-center text-gray-600 text-sm my-2">
                                <i class="far fa-calendar-alt mr-2 text-black"></i>
                                <span>May 10, 2025</span>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-black hover:underline text-sm font-medium">View details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Similar Event 2 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition border border-gray-200">
                        <div class="h-40 bg-gray-800 flex items-center justify-center">
                            <span class="text-white text-lg font-semibold">Data Science Conference</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-black hover:text-gray-700">Data Science Conference</h3>
                            <div class="flex items-center text-gray-600 text-sm my-2">
                                <i class="far fa-calendar-alt mr-2 text-black"></i>
                                <span>May 15, 2025</span>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-black hover:underline text-sm font-medium">View details</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Similar Event 3 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition border border-gray-200">
                        <div class="h-40 bg-gray-700 flex items-center justify-center">
                            <span class="text-white text-lg font-semibold">UX/UI Design Masterclass</span>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-black hover:text-gray-700">UX/UI Design Masterclass</h3>
                            <div class="flex items-center text-gray-600 text-sm my-2">
                                <i class="far fa-calendar-alt mr-2 text-black"></i>
                                <span>May 20, 2025</span>
                            </div>
                            <div class="mt-3">
                                <a href="#" class="text-black hover:underline text-sm font-medium">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-12 mt-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">NICKET</h3>
                    <p class="text-gray-400">The best platform to find and register for events that match your interests.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('home') }}#events" class="text-gray-400 hover:text-white transition">Events</a></li>
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