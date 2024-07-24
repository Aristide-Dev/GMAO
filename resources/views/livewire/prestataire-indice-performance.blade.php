<div>
    <div class="px-2 row">

        <x-stat-header title="Indice de Performance des Prestataires">
            <div class="p-3 row">
                <!-- Range Picker-->
                <div class="col-8">
                    <label for="flatpickr-range">Période</label>
                    <input type="text" name='periode' class="rounded form-control form-control-sm" placeholder="YYYY-MM-DD au YYYY-MM-DD" id="flatpickr-range" wire:model.live='periode' />
                </div>
                <!-- /Range Picker-->
            </div>
        </x-stat-header>

        <div class="p-0 my-3 bg-white col-md-6 pe-1">
            <div class="flex flex-col rounded shadow">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="p-1 bg-blue-200">
                                    <tr>
                                        <th scope="col" class="px-1 py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            <a href="javascript:;" wire:click.prevent="sortBy('name')">Prestataire</a>
                                        </th>
                                        <th scope="col" class="px-1 py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            <a href="javascript:;" wire:click.prevent="sortBy('indice_performance_periode')">Indice de Performance (Période)</a>
                                        </th>
                                        <th scope="col" class="px-1 py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            <a href="javascript:;" wire:click.prevent="sortBy('indice_performance_general')">Indice de Performance Générale</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">

                                    <tr wire:loading>
                                        <td colspan="3" class="w-full px-1 py-2 text-sm text-gray-800 whitespace-nowrap" style="width:100%">
                                            <div role="status" class="space-y-2.5 animate-pulse w-100 border-2 p-2" style="width:100%">
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 bg-gray-500 rounded-full w-1/2"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-3/4"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                </div>
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 bg-gray-500 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-3/4"></div>
                                                </div>
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 bg-gray-600 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-500 rounded-full w-80"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                </div>
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 ms-2 bg-gray-500 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-3/4"></div>
                                                </div>
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full dark:bg-gray-600 w-32"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-3/4"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-500 rounded-full w-full"></div>
                                                </div>
                                                <div class="flex items-center w-full">
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-500 rounded-full w-80"></div>
                                                    <div class="h-2.5 ms-2 bg-gray-600 rounded-full w-full"></div>
                                                </div>
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                    $total_indice_periode = 0;
                                    $total_indice_general = 0;
                                    $total = count($prestataires);
                                    @endphp
                                    @foreach($prestataires as $prestataire)
                                    @php
                                    $total_indice_periode += $prestataire['indice_performance_periode'];
                                    $total_indice_general += $prestataire['indice_performance_general'];
                                    @endphp

                                    <tr wire:loading.remove>
                                        <td class="px-1 py-2 text-sm font-bold text-gray-500 whitespace-nowrap">{{ $prestataire['name'] }}</td>
                                        <td class="px-1 py-2 text-sm text-gray-800 whitespace-nowrap">{{ number_format($prestataire['indice_performance_periode'], 0,'',' ') }}%</td>
                                        <td class="px-1 py-2 text-sm text-gray-800 whitespace-nowrap">{{ number_format($prestataire['indice_performance_general'], 0,'',' ') }}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="py-2 font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="py-2 text-sm font-bold text-black whitespace-nowrap">
                                            {{ $total > 0 ? number_format($total_indice_periode / $total, 0, '', ' ') . '%' : 'N/A' }}
                                        </td>
                                        <td class="py-2 text-sm font-bold text-black whitespace-nowrap">
                                            {{ $total > 0 ? number_format($total_indice_general / $total, 0, '', ' ') . '%' : 'N/A' }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 my-3 bg-white col-md-6 ps-1">
            <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                <livewire:livewire-column-chart key="{{ $columnChartModel->reactiveKey() }}" :column-chart-model="$columnChartModel" />
            </div>
        </div>

    </div>
</div>
