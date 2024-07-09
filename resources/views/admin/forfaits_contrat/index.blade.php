<x-gmao-layout>
    <x-slot name="title">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="title_desc">{{ __('Forfaits Contrat') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Forfaits Contrat'=> '']"/>

    <div class="container">
        <h1>Forfaits en attente de validation</h1>

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

        <table class="table">
            <thead>
                <tr>
                    <th>Site</th>
                    <th>Montant</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingForfaits as $forfait)
                    <tr>
                        <td>{{ $forfait->site->name }}</td>
                        <td>{{ $forfait->amount }}</td>
                        <td>{{ $forfait->start_date }}</td>
                        <td>{{ $forfait->end_date }}</td>
                        <td>
                            <form action="{{ route('admin.forfaits.validate', $forfait->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-green-500 btn btn-success">Valider</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-gmao-layout>

