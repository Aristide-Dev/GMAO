<x-gmao-layout>
    <x-slot name="title">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="title_desc">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="sidebar">commercial</x-slot>
    <x-breadcrumb :data="['Forfaits Contrat'=> '']"/>

    <div class="container">
        <h1>Forfaits Contrats pour le mois</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Site</th>
                    <th>Montant</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Validé</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forfaits as $forfait)
                    <tr>
                        <td>{{ $forfait->site->name }}</td>
                        <td>{{ $forfait->amount }}</td>
                        <td>{{ $forfait->start_date }}</td>
                        <td>{{ $forfait->end_date }}</td>
                        <td>{{ $forfait->validated ? 'Oui' : 'Non' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-gmao-layout>

