<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard da Instituição') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <a href="{{ route('doacoes.create') }}" 
                   class="group bg-gradient-to-r from-teal-500 to-cyan-600 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-30 p-3 rounded-full">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold">{{ __('+ Adicionar Doação') }}</h4>
                            <p class="mt-1 text-teal-100 text-sm">{{ __('Registrar uma nova doação recebida.') }}</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('estoque.index') }}"
                   class="group bg-gradient-to-r from-emerald-500 to-green-600 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center space-x-4">
                        <div class="bg-white bg-opacity-30 p-3 rounded-full">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold">{{ __('Gerenciar Estoque') }}</h4>
                            <p class="mt-1 text-emerald-100 text-sm">{{ __('Visualizar e atualizar os itens.') }}</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('doacoes.index') }}"
                   class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-gray-200">
                    <div class="flex items-center space-x-4">
                        <div class="bg-gray-100 p-3 rounded-full group-hover:bg-gray-200 transition-colors">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H7a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-xl font-semibold text-gray-800">{{ __('Histórico de Doações') }}</h4>
                            <p class="mt-1 text-gray-600 text-sm">{{ __('Visualizar doações recebidas.') }}</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                        Total de Itens no Estoque
                    </h4>
                    <p class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $totalEstoque }}
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                        Total de Doadores Registrados
                    </h4>
                    <p class="text-4xl font-bold text-gray-900 mt-2">
                        {{ $totalDoadores }}
                    </p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Últimas Doações Recebidas
                    </h3>
                </div>
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Doador</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Itens</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($ultimasDoacoes as $doacao)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                        {{ \Carbon\Carbon::parse($doacao->data_doacao)->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $doacao->doador->name ?? $doacao->doador_nome ?? 'Anônimo' }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-700">
                                        {{ $doacao->itens_doados }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                                        Nenhuma doação recebida ainda.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>