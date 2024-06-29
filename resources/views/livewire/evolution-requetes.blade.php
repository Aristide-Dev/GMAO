<div>
    <div class="px-2 row">
        
        <x-stat-header title="évolution des requêtes" />

        <div class="p-0 my-3 bg-white col-md-8">
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-200">
                                    <tr>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Etiquetes de lignes</th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Nombre de requete</th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Taux</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="text-sm font-bold text-green-500 whitespace-nowrap">Cloturé</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">52</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">91%</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm font-bold text-yellow-500 whitespace-nowrap">En cours</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">2</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">4%</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm font-bold text-red-500 whitespace-nowrap">Pas traité</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">3</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">5%</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-200">
                                        <td class="font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="font-bold text-gray-800 text-md whitespace-nowrap">57</td>
                                        <td class="font-bold text-gray-800 text-md whitespace-nowrap">100%</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
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
</div>
