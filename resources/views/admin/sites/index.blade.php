<x-gmao-layout>
    <x-slot name="title">{{ __('Sites') }}</x-slot>
    <x-slot name="title_desc">{{ __('Sites') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Sites'=> '']"/>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Liste des sites</h5>
            <div class="mx-3 col-md-4">
                <x-gmao.create-site/>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des sites</caption>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Site</th>
                            <th>Registre</th>
                            <th>Forfait Contrat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($sites as $key => $site)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a href="{{ route('admin.sites.show', $site) }}">{{ $site->name }}</a>
                            </td>
                            <td>
                                {{ $site->registre }}
                            </td>
                            <td>
                                <span class="fw-bold">
                                    {{ number_format($site->calculateTotalForfaitContrat(), 2, '.', ' ') }} GNF
                                </span>
                            </td>
                            <td>
                                @switch($site->actif)
                                    @case(1)
                                        <span class="badge bg-label-success me-1">actif</span>
                                        @break
                                    @case(0)
                                        <span class="badge bg-label-danger me-1">désactivé</span>
                                        @break
                                    @default
                                    <span class="badge bg-label-secondary me-1">N/A</span>
                                    @break

                                @endswitch
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>Site</th>
                            <th>Registre</th>
                            <th>Forfait Contrat</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <nav aria-label="Page navigation" class="mx-3 d-flex">
                {{ $sites->links() }}
            </nav>

        </div>
        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>

