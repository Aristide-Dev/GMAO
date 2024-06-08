<x-gmao-layout>
    <x-slot name="title">{{ __('Prestataires') }}</x-slot>
    <x-slot name="title_desc">{{ __('Prestataires') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>

    @php
    $indices_performance = [
        [
            'statut' => 'Mauvais',
            'color' => 'danger',
            'value' => rand(0,100),
        ],
        [
            'statut' => 'Moyen',
            'value' => rand(0,100),
            'color' => 'warning',
        ],
        [
            'statut' => 'Bon',
            'value' => rand(0,100),
            'color' => 'primary',
        ],
        [
            'statut' => 'Excellent',
            'value' => rand(0,100),
            'color' => 'success',
        ],
    ];
    @endphp

    <x-breadcrumb :data="['Prestataires'=> '']"/>

    <div class="app-academy">
        <div class="p-0 mb-4 card">
            <div class="p-0 pt-4 pb-4 shadow-xl card-body d-flex flex-column flex-md-row justify-content-between">
                <div class="hidden py-0 w-25 card-body md:block animate-pulse">
                    <img src="/storage/assets/img/illustrations/bulb-light.png" class="h-50" alt="Bulb in hand" height="53" />
                </div>
                <div class=" card-body w-100 d-flex align-items-md-center flex-column text-md-center">
                    <h3 class="mb-1 card-title h3">
                        <span class="fw-bold text-primary fw-medium text-nowrap">Prestataires</span>
                    </h3>
                    <p class="mb-3 w-100">
                        <p class="fw-bold">Bienvenue sur la page de d'administration des prestataires.</p>
                        <p class="text-justify">
                            Cette section vous permet de consulter et de gérer les informations des prestataires enregistrés dans le système.
                            Les prestataires sont des acteurs essentiels dans notre processus de maintenance, et cette page vous offre une vue d'ensemble de ceux qui sont associés à votre entreprise.
                        </p>
                    </p>
                </div>
                <div class="hidden w-25 d-flex align-items-end justify-content-end md:block">
                    <img src="/storage/assets/img/illustrations/black-man-with-a-beard.png" alt="pencil rocket" height="53" class="hidden h-50 md:block" />
                </div>
            </div>
        </div>

        <div class="mb-4 shadow-2xl card">
            <div class="flex mt-3 justify-content-center">
                <div class="p-3 my-2 bg-gray-100 d-flex align-items-center justify-content-between w-75 rounded-2xl">
                    <input type="search" placeholder="Rechercher un prestataire" class="form-control me-2 rounded-2xl" />
                    <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i class="ti ti-search"></i></button>
                </div>
            </div>
            <div class="flex-wrap gap-3 card-header d-flex justify-content-between">
                <div class="mb-0 card-title me-1">
                    <h5 class="mb-1">
                        Liste des prestataires
                    </h5>
                    <p class="mb-0 text-muted">Total {{ count($prestataires) }} prestataires</p>
                </div>

                <div class="mb-0 card-title me-1">
                    <a href="{{ route('admin.prestataires.create') }}" class="btn btn-primary">Nouveau Prestataire</a>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4 row gy-4">
                    @php
                        $prestataires = [];
                    @endphp
                    @forelse ($prestataires as $prestataire)

                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-1.png" alt="tutor image 1" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-label-primary">Web</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        4.4 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted">(1.23k)</span>
                                    </h6>
                                </div>
                                <a href="app-academy-course-details.html" class="h5">Basics of Angular</a>
                                <p class="mt-2">Introductory course for Angular and framework basics in web development.</p>
                                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>30 minutes</p>
                                <div class="mb-4 progress" style="height: 8px">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="gap-2 d-flex flex-column flex-md-row text-nowrap">
                                    <a class="app-academy-md-50 btn btn-label-secondary me-md-2 d-flex align-items-center" href="app-academy-course-details.html">
                                        <i class="align-middle ti ti-rotate-clockwise-2 scaleX-n1-rtl me-2 mt-n1 ti-sm"></i><span>Start Over</span>
                                    </a>
                                    <a class="app-academy-md-50 btn btn-label-primary d-flex align-items-center" href="app-academy-course-details.html">
                                        <span class="me-2">Continue</span><i class="ti ti-chevron-right scaleX-n1-rtl ti-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="flex justify-content-center col-12">
                            <div class="flex gap-0 p-3 bg-gray-700 rounded-lg justify-content-center animate-pulse">
                                <svg class="m-0 flex-0" id="Capa_1" enable-background="new 0 0 512 512" height="44" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m159.633 98.476v-52.072h123.163c6.259 0 11.884 3.821 14.191 9.64l16.819 42.431-77.086 20.703z" fill="#8ac9fe"/><path d="m313.808 98.48h-22.802l-16.819-42.438c-2.303-5.819-7.926-9.633-14.187-9.633h22.792c6.261 0 11.884 3.814 14.198 9.633z" fill="#60b7ff"/><path d="m424.262 98.476h-222.667c-6.259 0-11.884-3.821-14.191-9.64l-12.998-32.792c-2.306-5.819-7.931-9.64-14.191-9.64h-107.898c-8.43 0-15.265 6.834-15.265 15.265v21.542c0 8.43-6.834 15.265-15.265 15.265h-1.407c-11.256 0-20.38 9.124-20.38 20.379v312.611c0 18.849 15.28 34.129 34.129 34.129h410.512v-346.74c0-11.255-9.124-20.379-20.379-20.379z" fill="#fef0ae"/><path d="m444.639 145.278v320.313h-410.505c-3.722 0-7.31-.596-10.661-1.696 13.632-4.472 23.481-17.302 23.481-32.435v-265.806c0-11.257 9.119-20.376 20.376-20.376z" fill="#fee97d"/><path d="m201.595 98.48h-20.561c-6.261 0-11.884-3.824-14.187-9.643l-13.005-32.795c-2.303-5.819-7.926-9.633-14.187-9.633h20.561c6.261 0 11.884 3.814 14.187 9.633l13.005 32.795c2.303 5.819 7.926 9.643 14.187 9.643z" fill="#fee97d"/><path d="m88.644 145.274h379.732c11.255 0 20.38 9.124 20.38 20.38v279.562c0 11.255-9.124 20.38-20.38 20.38h-400.112-34.132c18.851 0 34.132-15.281 34.132-34.132v-265.81c0-11.255 9.125-20.38 20.38-20.38z" fill="#fee45a"/><path d="m488.753 165.654v279.561c0 11.257-9.119 20.376-20.376 20.376h-19.883c11.257 0 20.386-9.119 20.386-20.376v-279.561c0-11.257-9.129-20.376-20.386-20.376h19.883c11.257 0 20.376 9.119 20.376 20.376z" fill="#fed402"/><g><path d="m182.928 378.346h-66.674c-4.258 0-7.71-3.452-7.71-7.71 0-4.259 3.452-7.71 7.71-7.71h66.674c4.258 0 7.71 3.452 7.71 7.71 0 4.259-3.452 7.71-7.71 7.71z" fill="#fac600"/></g><g><path d="m222.32 410.401h-106.066c-4.258 0-7.71-3.452-7.71-7.71 0-4.259 3.452-7.71 7.71-7.71h106.066c4.258 0 7.71 3.452 7.71 7.71.001 4.258-3.451 7.71-7.71 7.71z" fill="#fac600"/></g></g><circle cx="416.741" cy="145.274" fill="#ee6161" r="95.259"/><path d="m511.998 145.278c0 52.606-42.644 95.26-95.26 95.26-20.859 0-40.156-6.703-55.844-18.083 11.504 4.934 24.19 7.669 37.504 7.669 52.616 0 95.26-42.654 95.26-95.26 0-31.746-15.534-59.864-39.416-77.176 33.966 14.556 57.756 48.287 57.756 87.59z" fill="#e94444"/><path d="m438.549 145.274 18.691-18.691c6.023-6.022 6.023-15.786 0-21.808-6.022-6.023-15.786-6.023-21.808 0l-18.691 18.691-18.691-18.691c-6.021-6.022-15.785-6.022-21.808 0s-6.023 15.786 0 21.808l18.691 18.691-18.691 18.691c-6.023 6.022-6.023 15.786 0 21.808 3.011 3.011 6.957 4.517 10.904 4.517s7.893-1.505 10.904-4.517l18.691-18.691 18.691 18.691c3.011 3.011 6.957 4.517 10.904 4.517 3.946 0 7.893-1.506 10.904-4.517 6.023-6.022 6.023-15.786 0-21.808z" fill="#eaf6ff"/><path d="m456.955 163.679c5.78 5.78 6.396 15.155 1.019 21.312-3.087 3.534-7.363 5.295-11.638 5.295-3.937 0-7.865-1.491-10.877-4.482 6.045-6.022 6.055-15.801.031-21.836l-15.063-15.054c-2.009-2.008-2.009-5.264 0-7.271l15.063-15.054c6.014-6.024 6.014-15.791 0-21.815l-.031-.031c6.203-6.172 16.353-5.977 22.311.583 5.58 6.144 5.036 15.702-.833 21.571l-18.383 18.383z" fill="#d8ecfe"/></g></svg>
                                <span class="px-3 py-2 m-0 font-bold text-center text-white flex-0">Aucun Prestataire enregistré</span>
                                <svg class="m-0 flex-0" id="Capa_1" enable-background="new 0 0 512 512" height="44" viewBox="0 0 512 512" width="40" xmlns="http://www.w3.org/2000/svg"><g><g><path d="m159.633 98.476v-52.072h123.163c6.259 0 11.884 3.821 14.191 9.64l16.819 42.431-77.086 20.703z" fill="#8ac9fe"/><path d="m313.808 98.48h-22.802l-16.819-42.438c-2.303-5.819-7.926-9.633-14.187-9.633h22.792c6.261 0 11.884 3.814 14.198 9.633z" fill="#60b7ff"/><path d="m424.262 98.476h-222.667c-6.259 0-11.884-3.821-14.191-9.64l-12.998-32.792c-2.306-5.819-7.931-9.64-14.191-9.64h-107.898c-8.43 0-15.265 6.834-15.265 15.265v21.542c0 8.43-6.834 15.265-15.265 15.265h-1.407c-11.256 0-20.38 9.124-20.38 20.379v312.611c0 18.849 15.28 34.129 34.129 34.129h410.512v-346.74c0-11.255-9.124-20.379-20.379-20.379z" fill="#fef0ae"/><path d="m444.639 145.278v320.313h-410.505c-3.722 0-7.31-.596-10.661-1.696 13.632-4.472 23.481-17.302 23.481-32.435v-265.806c0-11.257 9.119-20.376 20.376-20.376z" fill="#fee97d"/><path d="m201.595 98.48h-20.561c-6.261 0-11.884-3.824-14.187-9.643l-13.005-32.795c-2.303-5.819-7.926-9.633-14.187-9.633h20.561c6.261 0 11.884 3.814 14.187 9.633l13.005 32.795c2.303 5.819 7.926 9.643 14.187 9.643z" fill="#fee97d"/><path d="m88.644 145.274h379.732c11.255 0 20.38 9.124 20.38 20.38v279.562c0 11.255-9.124 20.38-20.38 20.38h-400.112-34.132c18.851 0 34.132-15.281 34.132-34.132v-265.81c0-11.255 9.125-20.38 20.38-20.38z" fill="#fee45a"/><path d="m488.753 165.654v279.561c0 11.257-9.119 20.376-20.376 20.376h-19.883c11.257 0 20.386-9.119 20.386-20.376v-279.561c0-11.257-9.129-20.376-20.386-20.376h19.883c11.257 0 20.376 9.119 20.376 20.376z" fill="#fed402"/><g><path d="m182.928 378.346h-66.674c-4.258 0-7.71-3.452-7.71-7.71 0-4.259 3.452-7.71 7.71-7.71h66.674c4.258 0 7.71 3.452 7.71 7.71 0 4.259-3.452 7.71-7.71 7.71z" fill="#fac600"/></g><g><path d="m222.32 410.401h-106.066c-4.258 0-7.71-3.452-7.71-7.71 0-4.259 3.452-7.71 7.71-7.71h106.066c4.258 0 7.71 3.452 7.71 7.71.001 4.258-3.451 7.71-7.71 7.71z" fill="#fac600"/></g></g><circle cx="416.741" cy="145.274" fill="#ee6161" r="95.259"/><path d="m511.998 145.278c0 52.606-42.644 95.26-95.26 95.26-20.859 0-40.156-6.703-55.844-18.083 11.504 4.934 24.19 7.669 37.504 7.669 52.616 0 95.26-42.654 95.26-95.26 0-31.746-15.534-59.864-39.416-77.176 33.966 14.556 57.756 48.287 57.756 87.59z" fill="#e94444"/><path d="m438.549 145.274 18.691-18.691c6.023-6.022 6.023-15.786 0-21.808-6.022-6.023-15.786-6.023-21.808 0l-18.691 18.691-18.691-18.691c-6.021-6.022-15.785-6.022-21.808 0s-6.023 15.786 0 21.808l18.691 18.691-18.691 18.691c-6.023 6.022-6.023 15.786 0 21.808 3.011 3.011 6.957 4.517 10.904 4.517s7.893-1.505 10.904-4.517l18.691-18.691 18.691 18.691c3.011 3.011 6.957 4.517 10.904 4.517 3.946 0 7.893-1.506 10.904-4.517 6.023-6.022 6.023-15.786 0-21.808z" fill="#eaf6ff"/><path d="m456.955 163.679c5.78 5.78 6.396 15.155 1.019 21.312-3.087 3.534-7.363 5.295-11.638 5.295-3.937 0-7.865-1.491-10.877-4.482 6.045-6.022 6.055-15.801.031-21.836l-15.063-15.054c-2.009-2.008-2.009-5.264 0-7.271l15.063-15.054c6.014-6.024 6.014-15.791 0-21.815l-.031-.031c6.203-6.172 16.353-5.977 22.311.583 5.58 6.144 5.036 15.702-.833 21.571l-18.383 18.383z" fill="#d8ecfe"/></g></svg>
                            </div>
                        </div>
                    @endforelse
                </div>


                <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-center">
                    <ul class="pagination">
                        <li class="page-item prev">
                            <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-left ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:void(0);">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:void(0);">5</a>
                        </li>
                        <li class="page-item next">
                            <a class="page-link" href="javascript:void(0);"><i class="ti ti-chevron-right ti-xs scaleX-n1-rtl"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>



    <div class="mt-3 col-12">
        <!-- Hoverable Table rows -->
        <div class="overflow-hidden card">
            <div class="border-b-2 card-header row">
                <div class="mb-3 col-12">
                    <a href="{{ route('admin.prestataires.create') }}" class="btn btn-primary">Nouveau Prestataire</a>
                </div>
                <div class="col-12">
                    <h5>Liste des prestataires</h5>
                </div>
            </div>

            <div class="table-responsive text-nowrap d-none d-sm-none d-md-block">
                <table class="table table-hover">
                    <caption class="ms-4">Liste des prestataires</caption>
                    <thead class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Telephone</th>
                            <th class="text-left">Indice de performance</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($prestataires as $key => $prestataire)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                <a href="{{ route('admin.prestataires.show', $prestataire) }}" class="text-black">
                                    {{ $prestataire->name }}  (<span class="fw-bolder">{{ $prestataire->slug }}</span>)
                                </a>
                            </td>
                            <td class="text-start">
                                <a href="{{ route('admin.prestataires.show', $prestataire) }}" class="text-black">{{ $prestataire->email }}</a>
                            </td>
                            <td class="text-start">{{ $prestataire->telephone }}</td>
                            <td class="text-start">
                                @php
                                    $st = $indices_performance[rand(0,3)];
                                @endphp
                                <small class="fw-bolder">{{ $st['value'] }}% -->
                                <span class="badge bg-{{ $st['color'] }} me-1">{{ $st['statut'] }}</span> </small>
                            </td>
                        </tr>
                        @empty
                            <h3 class="text-center">Vide</h3>
                        @endforelse
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Telephone</th>
                            <th class="text-left">Indice de performance</th>
                        </tr>
                    </tfoot>
                </table>
            </div>



        <!--/ Hoverable Table rows -->
    </div>
</x-gmao-layout>

