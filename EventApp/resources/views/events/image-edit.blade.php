<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gambar {{ $event->name }} - EventHub</title>
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
                    <a href="{{ route('home') }}" class="text-2xl font-bold">EventHub</a>
                    <div class="hidden md:flex space-x-4">
                        <a href="{{ route('home') }}" class="hover:text-gray-300 transition">Home</a>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    @auth
                        <a href="{{ url('/admin') }}" class="bg-white text-black hover:bg-gray-200 px-4 py-2 rounded-lg font-medium transition shadow-md">Admin Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-white text-black hover:bg-gray-200 px-4 py-2 rounded-lg font-medium transition shadow-md">Admin Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumbs -->
    <div class="bg-gray-50 border-t border-gray-200">
        <div class="container mx-auto px-4 py-3">
            <div class="flex items-center text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-black transition">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('events.show', $event) }}" class="hover:text-black transition">{{ $event->name }}</a>
                <span class="mx-2">/</span>
                <span class="text-black font-medium">Edit Gambar</span>
            </div>
        </div>
    </div>

    <main class="flex-grow py-12">
        <div class="container mx-auto px-4 max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="p-6 md:p-8 pb-0 bg-black text-white">
                    <h1 class="text-3xl font-bold mb-2">Edit Gambar Event</h1>
                    <p class="mb-6">{{ $event->name }}</p>
                </div>
                
                <div class="p-6 md:p-8">
                    @if (session('error'))
                        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <!-- Current Image Preview -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-black mb-4">Gambar Saat Ini</h2>
                        <div class="bg-gray-100 rounded-lg p-4">
                            @if($event->image_path)
                                <img src="{{ Storage::url($event->image_path) }}" alt="{{ $event->name }}" class="max-h-64 mx-auto">
                                
                                <div class="mt-4 text-center">
                                    <form action="{{ route('event.image.destroy', $event) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus gambar ini?')" 
                                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                                            <i class="fas fa-trash-alt mr-2"></i> Hapus Gambar
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="text-center py-8">
                                    <i class="fas fa-image text-gray-400 text-5xl mb-3"></i>
                                    <p class="text-gray-500">Tidak ada gambar</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Upload Form -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-black mb-4">Unggah Gambar Baru</h2>
                        <form action="{{ route('event.image.update', $event) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Gambar</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-black transition cursor-pointer" id="dropzone">
                                    <input type="file" name="image" id="image" accept="image/*" class="hidden">
                                    <div class="space-y-2" id="dropzone-content">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400"></i>
                                        <p class="text-gray-500">Klik atau seret gambar ke sini</p>
                                        <p class="text-xs text-gray-400">PNG, JPG, GIF hingga 2MB</p>
                                    </div>
                                    <div class="hidden space-y-2" id="preview-content">
                                        <img id="preview-image" src="#" alt="Preview" class="max-h-40 mx-auto">
                                        <p class="text-sm text-gray-500" id="filename"></p>
                                    </div>
                                </div>
                                @error('image')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex justify-end space-x-4">
                                <a href="{{ route('events.show', $event) }}" 
                                   class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-100 transition">
                                    Batal
                                </a>
                                <button type="submit" 
                                        class="px-6 py-3 bg-black text-white font-medium rounded-lg hover:bg-gray-800 transition">
                                    Simpan Gambar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-12 mt-12">
        <div class="container mx-auto px-4">
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} EventHub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Script untuk preview gambar
        document.addEventListener('DOMContentLoaded', function() {
            const dropzone = document.getElementById('dropzone');
            const fileInput = document.getElementById('image');
            const dropzoneContent = document.getElementById('dropzone-content');
            const previewContent = document.getElementById('preview-content');
            const previewImage = document.getElementById('preview-image');
            const filename = document.getElementById('filename');

            dropzone.addEventListener('click', function() {
                fileInput.click();
            });

            dropzone.addEventListener('dragover', function(e) {
                e.preventDefault();
                dropzone.classList.add('border-black');
            });

            dropzone.addEventListener('dragleave', function() {
                dropzone.classList.remove('border-black');
            });

            dropzone.addEventListener('drop', function(e) {
                e.preventDefault();
                dropzone.classList.remove('border-black');
                
                if (e.dataTransfer.files.length) {
                    fileInput.files = e.dataTransfer.files;
                    updatePreview(e.dataTransfer.files[0]);
                }
            });

            fileInput.addEventListener('change', function() {
                if (fileInput.files.length) {
                    updatePreview(fileInput.files[0]);
                }
            });

            function updatePreview(file) {
                if (file) {
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        filename.textContent = file.name;
                        
                        dropzoneContent.classList.add('hidden');
                        previewContent.classList.remove('hidden');
                    };
                    
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
</body>
</html>