<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('post.update', $post->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Título -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                Título:
                            </label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" 
                                class="w-full px-3 py-2 border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        </div>

                        <!-- Descrição -->
                        <div class="mb-6">
                            <label for="text" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                Conteúdo:
                            </label>
                            <textarea name="text" id="text" rows="8" 
                                class="w-full px-3 py-2 border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('text', $post->text) }}</textarea>
                        </div>

                        <!-- Categoria -->
                        <div class="mb-4">
                            <label for="categorias_id" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">
                                Categoria:
                            </label>

                            <select name="categorias_id" id="categorias_id" required
                                class="w-full px-3 py-2 border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categorias_id', $post->categorias_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                                Salvar Alterações
                            </button>
                            
                            <a href="{{ route('post.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>