@extends('Master_page')

@section('title', 'Contact - PrimeShop')

@section('content')
<div class="py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Contactez-nous</h1>
            <p class="text-xl text-gray-600">Notre équipe est à votre écoute pour toute question ou suggestion.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Contact info -->
            <div class="lg:col-span-1 space-y-8">
                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-xl font-bold text-gray-800 mb-6">Nos Coordonnées</h2>
                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm">Adresse</h3>
                                <p class="text-gray-600 text-sm">Tanger, Maroc</p>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm">Email</h3>
                                <a href="mailto:contact@primeshop.com" class="text-gray-600 text-sm hover:text-primary transition-colors">contact@primeshop.com</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="w-10 h-10 bg-primary/10 text-primary rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 text-sm">Téléphone</h3>
                                <a href="tel:+212651208768" class="text-gray-600 text-sm hover:text-primary transition-colors">+212 6 51 20 87 68</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="bg-black text-white p-8 rounded-2xl shadow-xl">
                    <h2 class="text-xl font-bold mb-4">Horaires d'Ouverture</h2>
                    <ul class="space-y-3 text-sm text-gray-300">
                        <li class="flex justify-between"><span>Lundi - Vendredi</span> <span>09:00 - 18:00</span></li>
                        <li class="flex justify-between"><span>Samedi</span> <span>10:00 - 16:00</span></li>
                        <li class="flex justify-between font-semibold text-primary"><span>Dimanche</span> <span>Fermé</span></li>
                    </ul>
                </div>
            </div>

            <!-- Contact form -->
            <div class="lg:col-span-2">
                <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Envoyez-nous un message</h2>
                    <form action="#" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom Complet</label>
                                <input type="text" id="name" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="Votre nom">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="votre@email.com">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Sujet</label>
                            <input type="text" id="subject" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all" placeholder="Quel est l'objet de votre message ?">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all resize-none" placeholder="Comment pouvons-nous vous aider ?"></textarea>
                        </div>
                        <button type="button" class="w-full py-4 bg-primary text-white font-bold rounded-xl hover:bg-opacity-90 transition-all shadow-lg shadow-primary/20">
                            Envoyer le message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
