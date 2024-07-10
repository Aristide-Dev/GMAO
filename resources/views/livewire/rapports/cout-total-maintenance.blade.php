<div>
    <div class="px-2 row">
        <x-stat-header title="Coût total de la maintenance par site du mois de {{ $monthlyReport->title }}" color="{{ !$monthlyReport->validated ? 'red':'green' }}"  :unique="true"/>

        <div class="p-0 my-3 bg-white col-md-5">
            <div class="flex flex-col rounded shadow-sm">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-{{ !$monthlyReport->validated ? 'red':'green' }}-200">
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

                                    <tr>
                                        <td class="text-sm font-bold text-gray-500 whitespace-nowrap">{{ $site['name'] }}</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['forfait_contrat'], 0,'',' ') }} F</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['cout_maintenance'], 0,'',' ') }} F</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">{{ number_format($site['cout_maintenance']+$site['forfait_contrat'], 0,'',' ') }} F</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-{{ !$monthlyReport->validated ? 'red':'green' }}-200">
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
