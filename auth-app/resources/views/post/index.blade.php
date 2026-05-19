<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Meus Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-end mb-6">
                <a href="{{ route('post.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-gray-300 transition shadow-sm hover:shadow-md">
                    ➕ Escrever Novo Post
                </a>
            </div>

            @if($posts->isEmpty())
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 text-center text-gray-500 dark:text-gray-400">
                    Nenhum post encontrado. Que tal escrever o primeiro?
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    @foreach($posts as $post)
                        <div class="bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700/70 rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 p-6 flex flex-col justify-between">
                            
                            <div>
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold tracking-wide uppercase bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300 mb-3">
                                    {{ $post->categorias->name}}
                                </span>

                                <h3 class="text-2xl font-extrabold text-gray-900 dark:text-white tracking-tight mb-4">
                                    {{ $post->title }}
                                </h3>

                                <div class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed whitespace-pre-wrap">
                                    {{ $post->text }}
                                </div>
                            </div>

                            <div class="flex items-center justify-end border-t border-gray-100 dark:border-gray-700 pt-4 mt-6 gap-4">
                                
                                <a href="{{ route('post.edit', $post->id) }}" class="text-sm font-semibold text-blue-600 dark:text-blue-400 hover:text-blue-800 transition-colors">
                                    Editar
                                </a>
                                
                                <form method="POST" action="{{ route('post.destroy', $post->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Tem certeza?')" class="text-sm font-semibold text-red-600 dark:text-red-400 hover:text-red-800 transition-colors">
                                        Deletar
                                    </button>
                                </form>
                                
                            </div>
                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </div>
</x-app-layout>