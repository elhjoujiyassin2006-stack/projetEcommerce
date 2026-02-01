@extends('Master_page')

@section('title')
    {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg border border-gray-100 dark:border-gray-700">
            {{ $slot }}
        </div>
    </div>
@endsection
