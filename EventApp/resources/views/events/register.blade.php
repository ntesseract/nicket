<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for {{ $event->name }} - NICKET</title>
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
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="p-6 md:p-8 pb-0 bg-black text-white">
                    <h1 class="text-3xl font-bold mb-2">Register for Event</h1>
                    <p class="mb-6">{{ $event->name }}</p>
                </div>
                
                <div class="p-6 md:p-8">
                    <div class="bg-gray-50 p-4 rounded-lg mb-6 border-l-4 border-black">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 text-black">
                                <i class="fas fa-info-circle text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-black font-semibold">Registration Information</h3>
                                <p class="text-gray-700 text-sm">
                                    Please fill out the form below to register for this event. All fields are required.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <form action="{{ route('events.storeRegistration', $event) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('name') border-red-500 @enderror" 
                                   required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('email') border-red-500 @enderror" 
                                   required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" 
                                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('birth_date') border-red-500 @enderror" 
                                   required>
                            @error('birth_date')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea name="address" id="address" rows="3" 
                                      class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-black focus:border-black @error('address') border-red-500 @enderror" 
                                      required>{{ old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="pt-4">
                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="terms" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-black" required>
                                </div>
                                <label for="terms" class="ml-2 text-sm font-medium text-gray-700">
                                    I agree to the <a href="#" class="text-black hover:underline">Terms and Conditions</a> and <a href="#" class="text-black hover:underline">Privacy Policy</a>
                                </label>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 -mx-8 px-8 py-4 mt-8 flex justify-end space-x-4 border-t border-gray-200">
                            <a href="{{ route('events.show', $event) }}" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-black text-white font-medium rounded-lg hover:bg-gray-800 transition">
                                Complete Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="mt-8 text-center text-gray-600 text-sm">
                <p>Need help? <a href="#" class="text-black hover:underline">Contact support</a></p>
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