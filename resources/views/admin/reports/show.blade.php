<x-gmao-layout>
    <x-slot name="title">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="title_desc">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Rapports Mensuels'=> route('admin.reports.index'), \Carbon\Carbon::createFromFormat('m', $monthlyReport->month)->format('F').' '.$monthlyReport->year=> '']"/>

    <div class="mx-2 row">
        <div class="flex items-center justify-between mx-0 {{ !$monthlyReport->validated ? 'bg-red-100':'bg-green-100' }} rounded shadow-xl h-14 col-md-12">
            <h1 class="font-bold text-gray-500">
                RAPPORT MENSUEL: {{ \Carbon\Carbon::createFromFormat('m', $monthlyReport->month)->format('F').' '.$monthlyReport->year }}
            </h1>
            @if($monthlyReport->validated)
                <span class="px-5 py-1 text-white bg-green-500 badge hover:bg-green-600">Validé</span>
            @else
                <span class="px-5 py-1 text-white bg-red-500 badge hover:bg-red-600 animate-pulse">Non Validé</span>
            @endif
        </div>
        <div class="flex justify-between">
            <p class="mt-3 text-sm">
                Rapport Généré le {{ \Carbon\Carbon::parse($monthlyReport->created_at)->translatedFormat('l, d/m/Y \à H\hi') }}
            </p>
            
    
            @if(!$monthlyReport->validated)
                <div class="mt-4 row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.reports.validate', $monthlyReport->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">Valider le Rapport</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="mt-4 row">
        <div class="col-md-6">
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg font-semibold">Détails du Site</h2>
                <p><strong>Nom du Site :</strong> {{ $monthlyReport?->site?->name }}</p>
                <p><strong>Registre :</strong> {{ $monthlyReport?->site?->registre }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-white rounded shadow">
                <h2 class="text-lg font-semibold">Coûts</h2>
                <p><strong>Coût de la Maintenance :</strong> {{ number_format($monthlyReport->maintenance_cost, 2) }} €</p>
                <p><strong>Forfait Contrat :</strong> {{ number_format($monthlyReport->forfait_contrat, 2) }} €</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 col-12">
            <livewire:rapports.evolution-requetes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:rapports.top-10-pannes />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:rapports.requete-by-equipement-type />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:rapports.requete-by-zone />
        </div>
    </div>

    <div class="row">
        <div class="p-3 my-3 shadow col-12">
            <livewire:rapports.cout-total-maintenance />
        </div>
    </div>
</x-gmao-layout>
