<div>
    <div class="px-2 row">
        <x-stat-header title="Évolution des requêtes" color="red">
            <div class="row">
                <div class="col-4">
                    <select name="evolution_des_requetes_year_filter" id="evolution_des_requetes_year_filter" class="form-control" wire:model.live="year_filter">
                        @for ($year = 2024; $year <= 2032; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-4">
                    <select name="evolution_des_requetes_month_filter" id="evolution_des_requetes_month_filter" class="form-control" wire:model.live="month_filter">
                        @foreach (['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'] as $index => $month)
                            <option value="{{ $index + 1 }}" @if($index + 1 == date('n')) selected @endif>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-stat-header>

        <div class="p-0 my-3 bg-white col-md-8" wire:loading.remove>
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-200">
                                    <tr>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Étiquettes de lignes
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Nombre de requêtes
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Taux
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $total = 0;
                                        $total_per_cent = 0;
                                    @endphp
                                    @foreach($status_list as $status)
                                        @php
                                            $status_count = $status['count'];
                                            $total += $status_count;
                                            $percentage = ($status_count * 100) / $total_demande;
                                            $total_per_cent += $percentage;
                                        @endphp
                                        <tr>
                                            <td class="text-sm font-bold text-gray-500 whitespace-nowrap">{{ $status['name'] }}</td>
                                            <td class="text-sm text-gray-800 whitespace-nowrap">{{ $status_count }}</td>
                                            <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($percentage, 0) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ $total }}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($total_per_cent, 2) }}%</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" wire:loading.remove>
        <div class="col-md-8">
            <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel->reactiveKey() }}"
                    :column-chart-model="$columnChartModel"
                />
            </div>
        </div>
        <div class="col-md-4">
            <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                <livewire:livewire-pie-chart
                    key="{{ $pieChartModel->reactiveKey() }}"
                    :pie-chart-model="$pieChartModel"
                />
            </div>
        </div>
    </div>

    <div class="my-3 row">
        <div class="col-md-8" wire:loading>
            <div role="status" class="w-full p-4 bg-white border border-gray-200 rounded shadow animate-pulse md:p-6">
                <div class="h-2.5 bg-gray-200 rounded-full animate-pulse w-32 mb-2.5"></div>
                <div class="w-48 h-2 mb-10 bg-gray-200 rounded-full animate-pulse"></div>
                <div class="flex items-baseline mt-4">
                    <div class="w-full bg-red-200 rounded-t-lg h-72 animate-pulse"></div>
                    <div class="w-full h-56 bg-yellow-200 rounded-t-lg ms-6 animate-pulse"></div>
                    <div class="w-full bg-green-200 rounded-t-lg h-72 ms-6 animate-pulse"></div>
                    <div class="w-full h-64 bg-blue-200 rounded-t-lg ms-6 animate-pulse"></div>
                    <div class="w-full bg-orange-200 rounded-t-lg h-80 ms-6 animate-pulse"></div>
                    <div class="w-full bg-purple-200 rounded-t-lg h-72 ms-6 animate-pulse"></div>
                    <div class="w-full bg-gray-200 rounded-t-lg h-80 ms-6 animate-pulse"></div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="col-md-4" wire:loading>
            <div role="status" class="w-full h-full shadow p-4 space-y-2.5 animate-pulse max-w-lg bg-white">
                <div class="flex items-center w-full">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-32"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-24"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                </div>
                <div class="flex items-center w-full max-w-[480px]">
                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-24"></div>
                </div>
                <div class="flex items-center w-full max-w-[400px]">
                    <div class="h-2.5 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-200 rounded-full dark:bg-gray-700 w-80"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                </div>
                <div class="flex items-center w-full max-w-[480px]">
                    <div class="h-2.5 ms-2 bg-gray-200 rounded-full dark:bg-gray-700 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-24"></div>
                </div>
                <div class="flex items-center w-full max-w-[440px]">
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-32"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-24"></div>
                    <div class="h-2.5 ms-2 bg-gray-200 rounded-full dark:bg-gray-700 w-full"></div>
                </div>
                <div class="flex items-center w-full max-w-[360px]">
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                    <div class="h-2.5 ms-2 bg-gray-200 rounded-full dark:bg-gray-700 w-80"></div>
                    <div class="h-2.5 ms-2 bg-gray-300 rounded-full dark:bg-gray-600 w-full"></div>
                </div>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>
