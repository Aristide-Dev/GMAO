@php
$statuts = [
    [
        'statut' => 'actif',
        'color' => 'success',
    ],
    [
        'statut' => 'désactivé',
        'color' => 'danger',
    ],
];

@endphp
<div class="p-3 card">
    <h3 class="mb-3 font-bold card-header h5">
        Liste des utilisateurs
        <p class="mb-0 font-normal text-muted">Total {{ $utilisateurs->total() }} utilisateurs</p>
    </h3>
    <div class="flex mt-2 row justify-content-end align-items-center">
        <div class="flex col-8 justify-content-end">
            <div class="w-auto p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl">
                {{-- <label for="search" class="mx-1 font-bold">Rechercher</label> --}}
                <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un utilisateur" class="mx-2 form-control rounded-2xl" />
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>



    <div class="table-responsive text-nowrap"  wire:loading.class="hidden">
        <table class="table table-hover">
            <caption class="ms-4">Liste de vos Utilisateur</caption>
            <thead class="table-light">
                <tr>
                    <th>N°</th>
                    <th>Prenom & Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">

                <div class="flex justify-content-center col-12" wire:loading>
                    <div class="flex gap-0 p-3 bg-transparent rounded-lg justify-content-center animate-pulse">
                        <div class="demo-inline-spacing display-1">
                            <div class="spinner-border spinner-border-lg text-primary h1 display-1" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>

                @forelse ($utilisateurs as $key => $utilisateur)
                <tr>
                    <td>
                        <a href="{{ route('admin.utilisateurs.show', $utilisateur) }}">{{ $key+1 }}</a>
                    </td>
                    <td>
                        <a class="fw-bold"href="{{ route('admin.utilisateurs.show', $utilisateur) }}">{{ $utilisateur->first_name }} {{ $utilisateur->last_name }}</</a>
                    </td>
                    <td class="text-left">
                        {{ $utilisateur->email }}
                    </td>
                    <td>
                        <span class="fw-bold">{{ $utilisateur->telephone }}</span>
                    </td>
                    <td>
                        <span class="fw-bold text-secondary">{{ $utilisateur?->role_text }}</span>
                    </td>
                    <td>
                        @if ($utilisateur->status == true)
                        <span class="text-white bg-green-500 badge me-1">actif</span>
                        @else
                        <span class="text-white bg-red-500 badge me-1">bloqué</span>
                        @endif
                    </td>
                    <td>
                        <div class="flex justify-center gap-1">
                            @if ($action_name == 'gerant')
                                <a href="{{ route('prestataires.utilisateurs.show', $utilisateur) }}" class="text-white bg-blue-500 btn w-100 hover:bg-blue-600">Voir +</a>
                            @else
                                --- 
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">

                    <div class="flex justify-content-center col-12" wire:loading.class="hidden">
                        <div class="flex gap-0 p-3 bg-gray-200 rounded-lg justify-content-center animate-pulse w-100">
                            <span class="px-3 py-2 m-0 text-xl font-bold text-center text-black flex-0 animate-pulse">Aucun utilisateur trouvé</span>
                        </div>
                    </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th>N°</th>
                    <th>Prenom & Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <nav aria-label="Page navigation" class="mx-3 d-flex">
        {{ $utilisateurs->links() }}
    </nav>
</div>
