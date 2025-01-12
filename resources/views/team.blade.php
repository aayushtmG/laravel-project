@extends('layouts.app')
@section('title','Team')
@section('content')
 <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-xl font-bold text-gray-800 mb-8">Management Committee</h1>

        <!-- Central Head -->
        <div class="flex justify-center mb-12">
            <div class="bg-blue-50 rounded-lg p-6 shadow-md text-center">
                <img src="/path-to-image.jpg" alt="Profile" class="w-24 h-24 rounded-full mx-auto mb-4">
                <h2 class="text-lg font-bold text-gray-800">Mahendra Kumar Giri</h2>
                <p class="text-sm text-gray-600">Chief Executive</p>
                <a href="mailto:ceo@saharanepal.coop.np" class="text-blue-500 text-sm">ceo@saharanepal.coop.np</a>
            </div>
        </div>

        <!-- Other Members -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            <!-- Member 1 -->
            <div class="bg-white rounded-lg p-6 shadow-md text-center">
                <img src="/path-to-image.jpg" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Laxman Khatiwada</h3>
                <p class="text-sm text-gray-600">Director</p>
                <a href="mailto:director@saharanepal.coop.np" class="text-blue-500 text-sm">director@saharanepal.coop.np</a>
            </div>

            <!-- Member 2 -->
            <div class="bg-white rounded-lg p-6 shadow-md text-center">
                <img src="/path-to-image.jpg" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Dinesh Bahadur Niraula</h3>
                <p class="text-sm text-gray-600">Deputy Director</p>
                <a href="mailto:admin@saharanepal.coop.np" class="text-blue-500 text-sm">admin@saharanepal.coop.np</a>
            </div>

            <!-- Member 3 -->
            <div class="bg-white rounded-lg p-6 shadow-md text-center">
                <img src="/path-to-image.jpg" alt="Profile" class="w-20 h-20 rounded-full mx-auto mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Ishwor Prasad Bhattarai</h3>
                <p class="text-sm text-gray-600">Assistant Director</p>
                <a href="mailto:audit@saharanepal.coop.np" class="text-blue-500 text-sm">audit@saharanepal.coop.np</a>
            </div>
        </div>
    </div>
@endsection