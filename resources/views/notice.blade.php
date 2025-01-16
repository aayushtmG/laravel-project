<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Add Tailwind CSS for styling (Optional but recommended) -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>
</head>
<body class="bg-gray-100">

<!-- Modal -->
<div x-data="{ showModal: true }" x-show="showModal" x-init="setTimeout(() => showModal = false, 5000)" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white p-5 rounded-lg max-w-sm w-full">
        <div class="flex justify-end">
            <button @click="showModal = false" class="text-gray-500">Close</button>
        </div>
        <h2 class="text-xl font-bold mb-3">Notice</h2>
        
        <!-- Loop through notices -->
        @foreach($notices as $notice)
            <div class="mb-4">
                <img src="{{ asset('/images/notices/' . $notice->image) }}" alt="Notice" class="w-full h-auto rounded-lg">
            </div>
        @endforeach

    </div>
</div>

<!-- Rest of your page content -->
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold">Welcome to the Home Page</h1>
    <!-- Other content of your home page -->
</div>

</body>
</html>
