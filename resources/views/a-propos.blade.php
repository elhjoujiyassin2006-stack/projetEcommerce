@extends('Master_page')

@section('title', 'À Propos - PrimeShop')

@section('content')
<div class="py-16 bg-white">
    <div class="container mx-auto px-6 text-gray-600 md:px-12 xl:px-6">
        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
            <div class="md:5/12 lg:w-5/12">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1742&q=80" alt="image" loading="lazy" class="rounded-3xl shadow-2xl">
            </div>
            <div class="md:7/12 lg:w-6/12">
                <h2 class="text-2xl text-gray-900 font-bold md:text-4xl">La passion du style et de la qualité</h2>
                <p class="mt-6 text-gray-600">
                    Chez PrimeShop, nous croyons que la mode est bien plus que des vêtements. C'est une expression de soi, un art de vivre. Depuis notre création, nous nous engageons à offrir à nos clients une sélection exclusive de produits qui allient tendance, confort et durabilité.
                </p>
                <p class="mt-4 text-gray-600">
                    Notre mission est de rendre le luxe et la qualité accessibles à tous. Nous travaillons directement avec des créateurs et des marques reconnues pour vous proposer des collections uniques qui vous ressemblent.
                </p>
                <div class="flex gap-4 mt-8">
                    <a href="/contact" class="inline-block px-6 py-3 rounded-lg bg-primary text-white font-semibold hover:bg-opacity-90 transition-colors">
                        Contactez-nous
                    </a>
                    <a href="/" class="inline-block px-6 py-3 rounded-lg bg-gray-100 text-gray-800 font-semibold hover:bg-gray-200 transition-colors">
                        Voir la collection
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
