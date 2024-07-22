<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Commande') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Mes commandes") }}
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                        </div>
            
            <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $commandes as $commande)
                            <tr>
                                <td>{{$commande->numero}}</td>
                                <td>{{$commande->total}} €</td>
                                <td>{{$commande->created_at}}</td>
                                <td>Detail</td>
                            </tr>
                        @empty
                           Vous n'avez pas de commande
                        @endforelse
                    </tbody>
            </table>

        </div>
    </div>
</div>
</div>
</div>
</x-app-layout>
