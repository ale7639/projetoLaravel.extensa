<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Doação Recebida') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-8 text-gray-900">

                    <form method="POST" action="{{ route('doacoes.store') }}">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="doador_nome" class="block font-medium text-sm text-gray-700">Nome do Doador</label>
                                <input type="text" name="doador_nome" id="doador_nome" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required autofocus>
                            </div>

                            <div>
                                <label for="data_doacao" class="block font-medium text-sm text-gray-700">Data da Doação</label>
                                <input type="date" name="data_doacao" id="data_doacao" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <label for="doador_telefone" class="block font-medium text-sm text-gray-700">Telefone (Opcional)</label>
                                <input type="text" name="doador_telefone" id="doador_telefone" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500">
                            </div>

                            <div>
                                <label for="doador_endereco" class="block font-medium text-sm text-gray-700">Endereço (Opcional)</label>
                                <input type="text" name="doador_endereco" id="doador_endereco" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label for="itens_doados" class="block font-medium text-sm text-gray-700">Itens Doados (Ex: 10 Livros, 5 Cadernos)</label>
                            <textarea name="itens_doados" id="itens_doados" rows="4" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-teal-500 focus:ring-teal-500" required></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <button type="submit" class="inline-flex items-center px-6 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-700 active:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Registrar Doação
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>