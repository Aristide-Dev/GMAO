<x-gmao-layout>
    <x-slot name="title">{{ __('STOCK') }}</x-slot>
    <x-slot name="title_desc">{{ __('Administration du Stock') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>




    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="card">
            <h5 class="card-header">Liste des pieces</h5>
            <div class="mx-3 col-md-4">
                <x-gmao.create-piece/>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des pieces</caption>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>piece</th>
                            <th>Qauntité</th>
                            <th>Stock min</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($pieces as $key => $piece)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a class="{{ ($piece->stock_min == $piece->quantite) ? 'bg-label-danger':'text-dark' }}" href="{{ route('admin.pieces.edit', $piece) }}">{{ $piece->piece }}</a>
                            </td>
                            <td>
                                {{ $piece->quantite }}
                            </td>
                            <td>
                                <span class="badge fw-bold w-100 {{ ($piece->stock_min == $piece->quantite) ? 'bg-label-danger':'text-dark' }}">{{ $piece->stock_min }}</span>
                            </td>
                            <td>
                                <span class="fw-bold">
                                    {{ number_format($piece->price, 2, '.', ' ') }} GNF
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>N°</th>
                            <th>piece</th>
                            <th>Qauntité</th>
                            <th>Stock min</th>
                            <th>Prix</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <nav aria-label="Page navigation" class="mx-3 d-flex">
                {{ $pieces->links() }}
            </nav>

        </div>
        <!--/ Hoverable Table rows -->
    </div>

</x-gmao-layout>



