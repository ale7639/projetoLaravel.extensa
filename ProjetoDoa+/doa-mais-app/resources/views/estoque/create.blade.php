<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Novo Item ao Estoque') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-gray-900">

                    <form method="POST" action="{{ route('estoque.store') }}">
                        @csrf 
                        
                        <div>
                            <label for="item_nome" class="block font-medium text-sm text-gray-700">Nome do Item</label>
                            <input type="text" name="item_nome" id="item_nome" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required autofocus>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="quantidade" class="block font-medium text-sm text-gray-700">Quantidade</label>
                                <input type="number" name="quantidade" id="quantidade" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                            </div>

                            <div>
                                <label for="data_recebimento" class="block font-medium text-sm text-gray-700">Data de Recebimento</label>
                                <input type="date" name="data_recebimento" id="data_recebimento" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                            <select name="status" id="status" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500">
                                <option value="OKAY">OKAY</option>
                                <option value="INVALIDO">INVALIDO</option>
                                <option value="PENDENTE">PENDENTE</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-700 active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Salvar Item
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>