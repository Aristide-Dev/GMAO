<x-gmao-layout>
    <x-slot name="title">{{ __('ZONES & PRIORITES') }}</x-slot>
    <x-slot name="title_desc">{{ __('Administration des zones') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>


    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Liste des zones</h5>
            <div class="mx-3 col-md-4">
                <x-gmao.create-zone/>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des zones</caption>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>zone</th>
                            <th>priorite</th>
                            <th>Delais</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($zones as $key => $zone)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a href="{{ route('admin.zones.show', $zone) }}">{{ $zone->name }}</a>
                            </td>
                            <td>
                                <div class="fw-bold p-1 rounded-pill text-center bg-label-{{ $zone->prioriteColor() }}">{{ $zone->prioriteText() }}</div>
                            </td>
                            <td>
                                <span class="fw-bolder text-center">
                                    {{ $zone->delais }} H
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>zone</th>
                            <th>priorite</th>
                            <th>Delais</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <nav aria-label="Page navigation" class="mx-3 d-flex">
                {{ $zones->links() }}
            </nav>

        </div>
        <!--/ Hoverable Table rows -->
    </div>


</x-gmao-layout>