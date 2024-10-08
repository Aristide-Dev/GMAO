<div>
    <div class="row">
        <x-stat-header title="Coût des pieces de rechange" >
            <div class="p-3 row">
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
                    <input type="text" name='periode' class="rounded form-control form-control-sm" placeholder="YYYY-MM-DD au YYYY-MM-DD" id="flatpickr-range-2" wire:model.live='periode' />
                    {{-- <input type="date" id="bs-rangepicker-basic" class="form-control" /> --}}
                </div>
                <!-- /Range Picker-->
            </div>
        </x-stat-header>

        <div class="col-12">
            <h1 class="py-2 my-3 text-xl font-bold text-center bg-white rounded shadow">{{ $periode_text }}</h1>
        </div>

        <div class="p-0 my-3 bg-white col-md-4 pe-1">
            <div class="flex flex-col rounded shadow">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="p-1 bg-blue-200">
                                    <tr>
                                        <th scope="col" class="px-1 py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            <a href="javascript:;" wire:click.prevent="sortBy('name')">Site</a>
                                        </th>
                                        <th scope="col" class="px-1 py-2 text-xs font-bold text-gray-900 uppercase text-start">
                                            <a href="javascript:;" wire:click.prevent="sortBy('cout_maintenance')">Coût Maintenance</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    
                                    <tr wire:loading>
                                        <td colspan="4" class="w-full px-1 py-2 text-sm text-gray-800 whitespace-nowrap"  style="width:100%">
                                            <div role="status" class="space-y-2.5 animate-pulse w-100 border-2 p-2"  style="width:100%">
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
                                        <td colspan="4" class="w-full px-1 py-2 text-sm text-gray-800 whitespace-nowrap"  style="width:100%">
                                            <div role="status" class="space-y-2.5 animate-pulse w-100 border-2 p-2"  style="width:100%">
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
                                        $total_cout_maintenance = 0;
                                    @endphp
                                    @foreach($requeteBySite as $site)
                                    @php
                                        $total_cout_maintenance += $site['cout_maintenance'];
                                    @endphp
        
                                    <tr wire:loading.remove>
                                        <td class="px-1 py-2 text-sm font-bold text-gray-500 whitespace-nowrap">{{ $site['name'] }}</td>
                                        <td class="px-1 py-2 text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['cout_maintenance'], 0,'',' ') }} F</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="py-2 font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="py-2 text-sm font-bold text-black whitespace-nowrap">{{ number_format($total_cout_maintenance, 0,'',' ') }} F</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="p-0 my-3 bg-white col-md-8 ps-1">
            <div class="flex p-4 bg-white border rounded shadow h-full min-h-[1000px]" style="height: 100%">
                <livewire:livewire-column-chart
                    key="{{ $columnChartModel->reactiveKey() }}"
                    :column-chart-model="$columnChartModel"
                />
            </div>
        </div>
    </div>
</div>
