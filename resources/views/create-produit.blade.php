@extends('Master_page')
@section('content')
    <div class="w-full flex justify-center items-center p-6 md:p-12">
        <form action=" {{ route('produits.store') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-xl bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            @csrf
            <div class="mb-5">
            <label for="name" class="block text-gray-800 text-sm font-semibold mb-2">Product Name</label>
            <input type="text" name="titre" id="name" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-gray-800 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none">
            @error('titre')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-5">
            <label for="description" class="block text-gray-800 text-sm font-semibold mb-2">Description</label>
            <textarea name="contenu" id="description" rows="4" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-gray-800 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none"></textarea>
            @error('contenu')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-5">
            <label for="price" class="block text-gray-800 text-sm font-semibold mb-2">Price</label>
            <input type="number" step="0.01" name="prix" id="price" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-gray-800 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none">
            @error('prix')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-5">
            <label for="image" class="block text-gray-800 text-sm font-semibold mb-2">Product Image</label>
            <input type="file" name="image" id="image" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-800 file:mr-4 file:rounded-md file:border-0 file:bg-primary/10 file:px-3 file:py-2 file:text-primary hover:file:bg-primary/20 focus:border-primary focus:ring-2 focus:ring-primary/20 focus:outline-none">
            @error('image')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="mb-6">
            <label for="category" class="block text-gray-800 text-sm font-semibold mb-2">Category</label>
            <select name="categorie" id="category" class="w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2 text-gray-800 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 focus:outline-none">
                <option value="" disabled selected>Select a category</option>
                <option value="Men">Men</option>
                <option value="Women">Women</option>
                
            </select>
            @error('categorie')
                <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
            @enderror
            </div>
            <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center rounded-lg bg-primary px-5 py-2.5 text-white font-semibold shadow-sm hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-primary/50">Create Product</button>
            </div>
        </form>
    </div>
@endsection