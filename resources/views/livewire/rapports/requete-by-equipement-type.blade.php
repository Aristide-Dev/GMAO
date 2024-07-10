<div>
    <div class="px-2 row">
        <x-stat-header title="Nombre de requête par type d'équipement du mois de {{ $monthlyReport->title }}" color="{{ !$monthlyReport->validated ? 'red':'green' }}" :unique="true"/>

        <div class="p-0 my-3 bg-white col-md-5">
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-{{ !$monthlyReport->validated ? 'red':'green' }}-200">
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
                                    @foreach($requeteByTypes as $requete)
                                    @php
                                        $request_count = $requete['count'];
                                        $total += $request_count;
                                        $percentage = ($request_count > 0) ? (($request_count * 100) / $total_bt) : 0;
                                        $total_per_cent += $percentage;
                                    @endphp

                                    <tr>
                                        <td class="text-sm font-bold text-gray-500 whitespace-nowrap">{{ $requete['categorie']}}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ $request_count }}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($percentage, 2) }}%</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-{{ !$monthlyReport->validated ? 'red':'green' }}-200">
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
