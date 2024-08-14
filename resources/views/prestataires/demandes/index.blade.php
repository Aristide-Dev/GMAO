<x-gmao-layout>
    <x-slot name="title">{{ __('Demandes') }}</x-slot>
    <x-slot name="title_desc">
        <div class="text-xl">
            {{ $prestataire->name }} -
            <span class="text-lg font-bold">{{ $prestataire->slug }}</span>
        </div>
    </x-slot>
    <x-slot name="sidebar">prestataire</x-slot>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="col-4 right">
                    <h5>Vos demandes d'interventions</h5>
                </div>
            </div>


            {{-- <x-gmao.demande-list :demandes="$demandes" action="admin" /> --}}

            <div class="table-responsive text-nowrap d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste de vos demandes d'interventions</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Bon de commande</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Document</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($bon_travails as $key => $bon_travail)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <span class="fw-bold">{{ $bon_travail->bt_reference }}</span>
                            </td>
                            <td class="text-left">
                                <p >{{ $bon_travail->demande->site->name }}</p>
                            </td>
                            <td class="text-left">
                                <div class="avatar avatar-md me-2">
                                    <img src="{{ $bon_travail->demande->document() }}" alt="document" class="rounded-circle" id="doc_image_url{{ $key+1 }}" onclick="displayImageInModal('doc_image_url{{ $key+1 }}')">
                                </div>
                            </td>
                            <td>
                                <span class="badge me-1 w-100" style="background-color: {{ $bon_travail->demande->statutColor() }}">{{ $bon_travail->demande->status }}</span>
                            </td>
                            <td>
                                <a href="{{ route('prestataires.demandes.show', $bon_travail->demande) }}" class="btn btn-primary">Suivis</a>
                            </td>
                        </tr>
                        @empty
                            <h3 class="text-center">Aucun</h3>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Bon de commande</th>
                            <th class="text-left">Site</th>
                            <th class="text-left">Document</th>
                            <th>Status</th>
                            <th>action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>


        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>

