<div>
    <div class="px-2 row">
        <x-stat-header title="TOP 10 PANNES" >
            <div class="row">
                <div class="col-4">
                    <select name="evolution_des_requetes_year_filter" id="evolution_des_requetes_year_filter" class="form-control form-control-sm" wire:model.live="year_filter">
                        @for ($year = 2024; $year <= 2032; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-4">
                    <select name="evolution_des_requetes_month_filter" id="evolution_des_requetes_month_filter" class="form-control form-control-sm" wire:model.live="month_filter">
                        @foreach (['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'] as $index => $month)
                            <option value="{{ $index + 1 }}" @if($index + 1 == date('n')) selected @endif>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-stat-header>

        <div class="p-0 my-3 bg-white col-md-5">
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-200">
                                    <tr>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Etiquettes de lignes
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Nombre de requête
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
                                    @foreach($topSites as $site)
                                        @php
                                            $site_count = 0;
                                            $site_count = $site->demande_interventions_count;
                                            $percentage = ($site_count > 0) ? ($site_count * 100) / $total_demande : 0;
                                            $total_per_cent += $percentage;
                                        @endphp
                                        <tr>
                                            <td class="text-sm font-bold text-gray-500 whitespace-nowrap">{{ $site->name }}</td>
                                            <td class="text-sm text-gray-800 whitespace-nowrap">{{ $site_count }}</td>
                                            <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($percentage, 0) }}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ $total_demande }}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($total_per_cent, 0) }}%</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="flex-1 p-4 bg-white border rounded shadow" style="height: 32rem;">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel->reactiveKey() }}"
                    :column-chart-model="$columnChartModel"
                />
            </div>
        </div>
    </div>
</div>
