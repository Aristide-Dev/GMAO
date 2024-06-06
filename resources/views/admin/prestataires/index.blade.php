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

<h4 class="py-3 mb-4"><span class="text-muted fw-light">Academy/</span> My Courses</h4>

    <div class="app-academy">
        <div class="p-0 mb-4 card">
            <div class="p-0 pt-4 card-body d-flex flex-column flex-md-row justify-content-between">
                <div class="py-0 app-academy-md-25 card-body">
                    <img src="/storage/assets/img/illustrations/bulb-light.png" class="img-fluid app-academy-img-height scaleX-n1-rtl" alt="Bulb in hand" data-app-light-img="illustrations/bulb-light.png" data-app-dark-img="illustrations/bulb-dark.png" height="90" />
                </div>
                <div class="app-academy-md-50 card-body d-flex align-items-md-center flex-column text-md-center">
                    <h3 class="mb-4 card-title lh-sm px-md-5 lh-lg">
                        Education, talents, and career opportunities.
                        <span class="text-primary fw-medium text-nowrap">All in one place</span>.
                    </h3>
                    <p class="mb-3">
                        Grow your skill with the most reliable online courses and certifications in marketing, information technology, programming, and data science.
                    </p>
                    <div class="d-flex align-items-center justify-content-between app-academy-md-80">
                        <input type="search" placeholder="Find your course" class="form-control me-2" />
                        <button type="submit" class="btn btn-primary btn-icon"><i class="ti ti-search"></i></button>
                    </div>
                </div>
                <div class="app-academy-md-25 d-flex align-items-end justify-content-end">
                    <img src="/storage/assets/img/illustrations/pencil-rocket.png" alt="pencil rocket" height="188" class="scaleX-n1-rtl" />
                </div>
            </div>
        </div>

        <div class="mb-4 card">
            <div class="flex-wrap gap-3 card-header d-flex justify-content-between">
                <div class="mb-0 card-title me-1">
                    <h5 class="mb-1">My Courses</h5>
                    <p class="mb-0 text-muted">Total 6 course you have purchased</p>
                </div>
                <div class="flex-wrap gap-3 d-flex justify-content-md-end align-items-center">
                    <select id="select2_course_select" class="select2 form-select" data-placeholder="All Courses">
                        <option value="">All Courses</option>
                        <option value="ui/ux">UI/UX</option>
                        <option value="seo">SEO</option>
                        <option value="web">Web</option>
                        <option value="music">Music</option>
                        <option value="painting">Painting</option>
                    </select>

                    <label class="switch">
                        <input type="checkbox" class="switch-input">
                        <span class="switch-toggle-slider">
                        <span class="switch-on"></span>
                        <span class="switch-off"></span>
                        </span>
                        <span class="mb-0 switch-label text-nowrap">Hide completed</span>
                    </label>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-4 row gy-4">
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-2.png" alt="tutor image 2" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center pe-xl-3 pe-xxl-0">
                                    <span class="badge bg-label-danger">UI/UX</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        4.2 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"> (424)</span>
                                    </h6>
                                </div>
                                <a class="h5" href="app-academy-course-details.html">Figma & More</a>
                                <p class="mt-2">Introductory course for design and framework basics in web development.</p>
                                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>16 hours</p>
                                <div class="mb-4 progress" style="height: 8px">
                                    <div class="progress-bar w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-3.png" alt="tutor image 3" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-label-success">SEO</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        5 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"> (12)</span>
                                    </h6>
                                </div>
                                <a class="h5" href="app-academy-course-details.html">Keyword Research</a>
                                <p class="mt-2">Keyword suggestion tool provides comprehensive details & suggestions.</p>
                                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>7 hours</p>
                                <div class="mb-4 progress" style="height: 8px">
                                    <div class="progress-bar w-50" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-4.png" alt="tutor image 4" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-label-info">Music</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        3.8 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"> (634)</span>
                                    </h6>
                                </div>
                                <a class="h5" href="app-academy-course-details.html">Basics to Advanced</a>
                                <p class="mt-2">20 more lessons like this about music production, writing, mixing, mastering</p>
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
                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-5.png" alt="tutor image 5" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-label-warning">Painting</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        4.7 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"> (34)</span>
                                    </h6>
                                </div>
                                <a class="h5" href="app-academy-course-details.html">Art & Drawing</a>
                                <p class="mt-2">Easy-to-follow video & guides show you how to draw animals, people & more.</p>
                                <p class="d-flex align-items-center text-success"><i class="ti ti-checks me-2 mt-n1"></i>Completed</p>
                                <div class="mb-4 progress" style="height: 8px">
                                    <div class="progress-bar w-100" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <a class="w-100 btn btn-label-primary" href="app-academy-course-details.html"><i class="ti ti-rotate-clockwise-2 me-2 mt-n1 scaleX-n1-rtl"></i>Start Over</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="p-2 border shadow-none card h-100">
                            <div class="mb-3 text-center rounded-2">
                                <a href="app-academy-course-details.html"><img class="img-fluid" src="/storage/assets/img/pages/app-academy-tutor-6.png" alt="tutor image 6" /></a>
                            </div>
                            <div class="p-3 pt-2 card-body">
                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                    <span class="badge bg-label-danger">UI/UX</span>
                                    <h6 class="gap-1 mb-0 d-flex align-items-center justify-content-center">
                                        3.6 <span class="text-warning"><i class="ti ti-star-filled me-1 mt-n1"></i></span><span class="text-muted"> (2.5k)</span>
                                    </h6>
                                </div>
                                <a class="h5" href="app-academy-course-details.html">Basics Fundamentals</a>
                                <p class="mt-2">This guide will help you develop a systematic and programmatic approach user interface.</p>
                                <p class="d-flex align-items-center"><i class="ti ti-clock me-2 mt-n1"></i>16 hours</p>
                                <div class="mb-4 progress" style="height: 8px">
                                    <div class="progress-bar w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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

