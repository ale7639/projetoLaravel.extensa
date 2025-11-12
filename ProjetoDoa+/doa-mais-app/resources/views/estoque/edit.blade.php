<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Item do Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-gray-900">

                    <form method="POST" action="{{ route('estoque.update', $estoque->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="item_nome" class="block font-medium text-sm text-gray-700">Nome do Item</label>
                            <input type="text" name="item_nome" id="item_nome" 
                                   value="{{ old('item_nome', $estoque->item_nome) }}" 
                                   class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="quantidade" class="block font-medium text-sm text-gray-700">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade" 
                                   value="{{ old('quantidade', $estoque->quantidade) }}" 
                                   class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                        </div>

                        <div class="mt-4">
                            <label for="data_recebimento" class="block font-medium text-sm text-gray-700">Data de Recebimento</label>
                            <input type="date" name="data_recebimento" id="data_recebimento" 
                                   value="{{ old('data_recebimento', $estoque->data_recebimento) }}" 
                                   class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 active:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Atualizar Item
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>