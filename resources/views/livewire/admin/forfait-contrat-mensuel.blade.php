<div class="container">
    <x-stat-header title="Forfaits en attente de validation">
        <div class="p-3 row">
            <div class="col-12">
                <h1 class="py-2 my-3 text-xl font-bold text-center bg-white rounded shadow">{{ $periode_text }}</h1>
            </div>
        </div>
        <div class="p-3 row">
            <div class="col-4">
                <label for="year_filter">Année</label>
                <select name="year_filter" id="year_filter" class="form-control form-control-sm" wire:model.live="year_filter">
                    @for ($year = 2024; $year <= 2032; $year++)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-4">
                <label for="month_filter">Mois</label>
                <select name="month_filter" id="month_filter" class="form-control form-control-sm" wire:model.live="month_filter">
                    @foreach (['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'] as $index => $month)
                        <option value="{{ $index + 1 }}" @if($index + 1 == date('n')) selected @endif>{{ $month }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </x-stat-header>

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

    <h2 class="mt-5">Forfaits en attente</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Site</th>
                <th>Montant</th>
                
                @if($canActions)
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingForfaits as $forfait)
                <tr>
                    <td>{{ $forfait->site->name }}</td>
                    <td>
                        @if($canActions)
                        <x-input type="number" name="amount_{{ $forfait->id }}" wire:model.defer="amounts.{{ $forfait->id }}" value="{{ $forfait->amount }}" class="form-control" />
                        @else
                        <p>{{ number_format($forfait->amount,0,'','') }}</p>
                        @endif
                        {{-- <x-input type="number" name="amount" value="{{ $forfait->amount }}" class="form-control" /> --}}
                    </td>
                    @if($canActions)
                    <td>
                        <button wire:click="saveForfait({{ $forfait->id }})" class="bg-green-500 btn btn-success">Valider</button>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">Forfaits Validés</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Site</th>
                <th>Montant</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                @if($canActions)
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($validateForfaits as $forfait)
                <tr>
                    <td>{{ $forfait->site->name }}</td>
                    <td>{{ number_format($forfait->amount, 0, '', ' ') }} F</td>
                    <td>{{ $forfait->start_date->format('d-m-Y') }}</td>
                    <td>{{ $forfait->end_date->format('d-m-Y') }}</td>
                    @if($canActions)
                    <td>
                        <button type="button" disabled class="bg-red-500 btn btn-danger">Supprimer</button>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
