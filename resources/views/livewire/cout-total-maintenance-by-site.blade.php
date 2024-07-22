<div>
    <div class="px-2 row">
        <x-stat-header title="Coût total de la maintenance par site" >
            <div class="p-3 row">
                {{-- <div class="col-4">
                    <label for="evolution_des_requetes_registre_filter">Registre</label>
                    <select name="evolution_des_requetes_registre_filter" id="evolution_des_requetes_registre_filter" class="form-control form-control-sm" wire:model.live="registre_filter">
                        <option value="">Tous les sites</option>
                        @foreach (['b2b', 'contrat', 'depot', 'autre'] as $index => $registre)
                            <option value="{{ $registre }}">{{ $registre ?? '*' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="evolution_des_requetes_year_filter">Année</label>
                    <select name="evolution_des_requetes_year_filter" id="evolution_des_requetes_year_filter" class="form-control form-control-sm" wire:model.live="year_filter">
                        @for ($year = 2024; $year <= 2032; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-4">
                    <label for="evolution_des_requetes_month_filter">Mois</label>
                    <select name="evolution_des_requetes_month_filter" id="evolution_des_requetes_month_filter" class="form-control form-control-sm" wire:model.live="month_filter">
                        @foreach (['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'] as $index => $month)
                            <option value="{{ $index + 1 }}" @if($index + 1 == date('n')) selected @endif>{{ $month }}</option>
                        @endforeach
                    </select>
                </div> --}}
            <div class="col-4">
                <label for="evolution_des_requetes_registre_filter">Registre</label>
                <select name="evolution_des_requetes_registre_filter" id="evolution_des_requetes_registre_filter" class="form-control" wire:model.live="registre_filter">
                    <option value="">Tous les sites</option>
                    @foreach (['b2b', 'contrat', 'depot', 'autre'] as $index => $registre)
                        <option value="{{ $registre }}">{{ $registre ?? '*' }}</option>
                    @endforeach
                </select>
            </div>
                
          <!-- Range Picker-->
          <div class="col-8">            
            <label for="flatpickr-range">Periode</label>
            <input type="text" name='periode' class="rounded form-control form-control-sm" placeholder="YYYY-MM-DD au YYYY-MM-DD" id="flatpickr-range" wire:model.live='periode' />
          </div>
          <!-- /Range Picker-->
            </div>
        </x-stat-header>

        <div class="col-12">
            <h1 class="py-2 my-3 text-xl font-bold text-center bg-white rounded shadow">{{ $periode_text }}</h1>
        </div>

        <div class="p-0 my-3 bg-white col-md-6 pe-1">
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-200">
                                    <tr>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Site
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Forfait Contrat
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Coût Maintenance
                                        </th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @php
                                        $total_forfait_contrat = 0;
                                        $total_cout_maintenance = 0;
                                    @endphp
                                    @foreach($requeteBySite as $site)
                                    @php
                                        $total_forfait_contrat += $site['forfait_contrat'];
                                        $total_cout_maintenance += $site['cout_maintenance'];
                                    @endphp

                                    <tr wire:loading.remove>
                                        <td class="text-sm font-bold text-gray-500 whitespace-nowrap">{{ $site['name'] }}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['forfait_contrat'], 0,'',' ') }} F</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['cout_maintenance'], 0,'',' ') }} F</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['total_frais_maintenance'], 0,'',' ') }} F</td>
                                    </tr>
                                    @endforeach
                                    <tr wire:loading>
                                        <td colspan="4">
                                            <div role="status" class="space-y-2.5 animate-pulse max-w-lg">
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
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="text-sm font-bold text-black whitespace-nowrap">{{ number_format($total_forfait_contrat, 0,'',' ') }} F</td>
                                        <td class="text-sm font-bold text-black whitespace-nowrap">{{ number_format($total_cout_maintenance, 0,'',' ') }} F</td>
                                        <td class="text-sm font-bold text-black whitespace-nowrap">{{ number_format($total_forfait_contrat+$total_cout_maintenance, 0,'',' ') }} F</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-0 my-3 bg-white col-md-6 ps-1">
            <div class="flex p-4 bg-white border rounded shadow h-full min-h-[1000px]" style="height: 100%">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel->reactiveKey() }}"
                    :column-chart-model="$columnChartModel"
                />
            </div>
        </div>
    </div>
</div>
