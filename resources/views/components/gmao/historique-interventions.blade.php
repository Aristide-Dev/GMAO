@props(['bon_travails'])
<div class="col-12">
    <div class="border card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="pt-1 m-0 mb-2 card-title me-2 d-flex align-items-center"><i class="ti ti-list-details ms-n1 me-2"></i> Historique des interactions</h5>
        </div>
            @foreach ($bon_travails as $key => $bon_travail)

            <x-gmao.fullscreen-modal :bon_travail="$bon_travail" btn_title="btn_title" modal_title="modal_title">
                <div class="mb-4 card">
                    <div class="card-widget-separator-wrapper">
                        <div class="card-body card-widget-separator">
                            <div class="row gy-4 gy-sm-1">
                                <div class="my-2 col-12">
                                    <div class="py-3 mb-3 sm:px-0 row md:px-2 rounded-xl border-bottom">
                                        <div class="pb-1 border-t col-12 d-flex justify-content-between align-items-start card-widget-1 hover:bg-gray-100">
                                            <div class="flex flex-col items-center justify-center gap-1">
                                                <span class="avatar">
                                                    <span class="rounded avatar-initial bg-label-secondary"><i
                                                            class="ti-md ti ti-user text-body"></i></span>
                                                </span>
                                                <h6 class="">Initiateur</h6>
                                            </div>
                                            <div class="">
                                                <p class="font-bold text-center">{{ $bon_travail->user->first_name }} {{ $bon_travail->user->last_name
                                                    }}</p>
                                            </div>
                                        </div>
                                        <div class="pb-1 border-t col-12 hover:bg-gray-100">
                                            <div class="flex items-center justify-between gap-1">
                                                <h6 class="">Reference</h6>
                                                <div class="">
                                                    <p class="font-bold text-center">{{ $bon_travail->bt_reference }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-1 border-t col-12 hover:bg-gray-100">
                                            <div class="flex items-center justify-between gap-1">
                                                <h6 class="">Equipement</h6>
                                                <div class="">
                                                    <p class="font-medium text-center">{{ $bon_travail?->equipement?->name }}</p>
                                                    <small class="font-bold text-center">{{ $bon_travail?->equipement?->numero_serie }}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-1 border-t col-12 hover:bg-gray-100">
                                            <div class="flex items-center justify-between gap-1">
                                                <h6 class="">Prestataire</h6>
                                                <div class="">
                                                    <p class="font-medium text-center">
                                                        {{ $bon_travail?->prestataire?->name }}
                                                        (<small class="font-bold text-center">{{ $bon_travail?->prestataire?->slug }}</small>)
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pb-1 border-t col-12 hover:bg-gray-100">
                                            <div class="flex items-center justify-between gap-1">
                                                <h6 class="">Delais - Zone et Qualification</h6>
                                                <div class="">
                                                    <p class="font-medium text-center uppercase">
                                                        {{ $bon_travail?->zone_name }}
                                                    </p>
                                                    <p class="font-bold text-center">urgence <span class="uppercase text-{{ $bon_travail?->prioriteColor() }}">{{ $bon_travail?->prioriteText() }}</span> - {{ $bon_travail?->zone_delais }} h</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </div>


                                
                                <div class="col-sm-6 col-lg-6">
                                    <div
                                        class="pb-3 d-flex justify-content-between align-items-start card-widget-1 border-end pb-sm-0">
                                        <div>
                                            <h6 class="mb-2">In-store Sales</h6>
                                            <h4 class="mb-2">$5,345.43</h4>
                                            <p class="mb-0"><span class="text-muted me-2">5k orders</span><span
                                                    class="badge bg-label-success">+5.7%</span></p>
                                        </div>
                                        <span class="avatar me-sm-4">
                                            <span class="rounded avatar-initial bg-label-secondary"><i
                                                    class="ti-md ti ti-smart-home text-body"></i></span>
                                        </span>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </div>
                                
                                <div class="col-sm-6 col-lg-6">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-2">Affiliate</h6>
                                            <h4 class="mb-2">$8,345.23</h4>
                                            <p class="mb-0"><span class="text-muted me-2">150 orders</span><span
                                                    class="badge bg-label-danger">-3.5%</span></p>
                                        </div>
                                        <span class="p-2 avatar">
                                            <span class="rounded avatar-initial bg-label-secondary"><i
                                                    class="ti-md ti ti-wallet text-body"></i></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-gmao.fullscreen-modal>

                    <!-- Fullscreen Modal -->
                    {{-- <div class="mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#fullscreenModal-{{$key+1}}">
                            Launch modal {{$key+1}}
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="fullscreenModal-{{$key+1}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalFullTitle">Modal title - {{$key+1}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
                                            egestas
                                            eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus
                                            vel augue
                                            laoreet rutrum faucibus dolor auctor.</p>
                                        <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque
                                            nisl
                                            consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            @endforeach
        <div class="pb-0 card-body">
            <ul class="mb-0 timeline ms-1">
                <li class="timeline-item timeline-item-transparent ps-4">
                    <span class="timeline-point timeline-point-info"></span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <h6 class="mb-0">demande créée par <span class="fw-bolder">{{ fake()->name }}</span></h6>
                        </div>
                        <small class="fw-light text-info">Aujourd'hui</small>
                        <small class="fw-bolder text-info">à 10h00</small>
                    </div>
                </li>
                <li class="timeline-item timeline-item-transparent ps-4">
                    <span class="timeline-point timeline-point-primary"></span>
                    <div class="timeline-event">
                        <div class="timeline-header fw-light">
                            <p class="w-full mb-0"><span class="fw-bold">D.I</span> transformée en <span class="fw-bold">BT</span> par <span class="fw-bold">{{ fake()->name }}</span></p>
                        </div>
                        <div class="timeline-header fw-light">
                            <div>Numero BT: <span class="fw-bolder">BT000000{{ rand(1,200) }}</span></div>
                        </div>
                        <div class="timeline-header fw-light">
                            <p class="w-full mb-0">demande transmise au prestataire (<span class="fw-bolder text-danger">{{ fake()->name }}</span>)</p>
                        </div>
                        <small class="fw-light text-primary">Aujourd'hui</small>
                        <small class="fw-bolder text-primary">à 10h15</small>
                    </div>
                </li>


                <li class="timeline-item timeline-item-transparent ps-4">
                    <span class="timeline-point timeline-point-warning"></span>
                    <div class="timeline-event">
                        <div class="timeline-header">
                            <div>Numero BT: <span class="fw-bolder">BT000000{{ rand(1,200) }}</span> en cours de traitement par le prestataire</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
