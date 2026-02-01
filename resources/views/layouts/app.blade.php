@extends('Master_page')

@section('title')
    {{ config('app.name', 'Laravel') }}
@endsection

@section('content')
    <div class="min-h-screen">
        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow mb-6 rounded-lg">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <div>
            {{ $slot }}
        </div>
    </div>
@endsection
