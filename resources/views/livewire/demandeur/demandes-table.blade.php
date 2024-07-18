@props(['url', 'demandes'])

<div>
    
    <div class="flex px-1 my-3 col-md-6 offset-md-6 justify-content-end">
        <div class="p-3 bg-gray-100 d-flex align-items-center justify-content-between rounded-2xl w-100">
            <label for="search" class="mx-1 font-bold">Rechercher</label>
            <input wire:model.live="search" name="search" type="search" placeholder="Rechercher une demande" class="mx-2 form-control rounded-2xl" />
            {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button> --}}
        </div>
    </div>
    <div class="table-responsive text-nowrap">
        
        <table class="table table-hover">
            <caption class="ms-4">Liste des Demandes d'interventions (DI)</caption>
            <thead class="table-light">
                <tr>
                    <th>N°</th>
                    <th>D.I</th>
                    <th class="text-left">Site</th>
                    <th class="text-left">Document</th>
                    <th class="text-left">Demandeur</th>
                    <th>Status</th>
                    <th>Action</th>
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
                
                @forelse ($demandes as $key => $demande)
                    <tr  wire:loading.class="hidden">
                        <td>{{ $key + 1 }}</td>
                        <td><span class="fw-bold">{{ $demande->di_reference }}</span></td>
                        <td class="text-left">
                            @if ($url == 'prestataires')
                                <p class="fw-bold">{{ $demande->site->name }}</p>
                            @else
                                <a class="fw-bold" href="{{ route($url.'.sites.show', $demande->site->id) }}">{{ $demande->site->name }}</a>
                            @endif
                        </td>
                        <td class="text-left">
                            <div class="avatar avatar-md me-2">
                                <img src="{{ asset($demande->document()) }}" alt="document" class="rounded-circle" id="doc_image_url{{ $key + 1 }}" onclick="displayImageInModal('doc_image_url{{ $key + 1 }}')">
                            </div>
                        </td>
                        <td class="justify-center align-items-center">
                            @if ($url == 'prestataires' || $url == 'demandeur')
                                <p class="fw-bold">{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}</p>
                            @else
                                <a href="{{ route('admin.utilisateurs.show', $demande->demandeur->id) }}" class="fw-bold">{{ $demande->demandeur->first_name }} {{ $demande->demandeur->last_name }}</a>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="text-center badge me-1 w-100 text-uppercase" style="background-color: {{ $demande->statutColor() }}">{{ $demande->status }}</span>
                        </td>
                        <td>
                            <a href="{{ route($url.'.demandes.show', $demande) }}" class="btn btn-primary">Suivis</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <h3 class="text-xl font-bold text-center animate-pulse">Aucune demande</h3>
                        </td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot class="table-light">
                <tr>
                    <th>N°</th>
                    <th>D.I</th>
                    <th class="text-left">Site</th>
                    <th class="text-left">Document</th>
                    <th class="text-left">Demandeur</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <nav aria-label="Page navigation" class="mx-3 d-flex">
        {{ $demandes->links() }}
    </nav>
</div>