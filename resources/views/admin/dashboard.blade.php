<x-gmao-layout>
    <x-slot name="title">{{ __('Dashboard') }}</x-slot>
    <x-slot name="title_desc">{{ __('Dashboard') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <!-- View sales -->
        <div class="mb-4 col-xl-4 col-lg-5 col-12">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="mb-4 card-title">Content de vous revoir! 🎉</h5>
                            {{-- <p class="mb-2">{{ Auth::user()?->first_name }} {{ Auth::user()?->last_name }}</p> --}}
                            {{-- <h4 class="mb-1 text-primary">$48.9k</h4> --}}
                            <a href="javascript:;" class="mt-4 btn btn-primary">{{ Auth::user()?->first_name }} {{
                                Auth::user()?->last_name }}s</a>
                        </div>
                    </div>
                    <div class="text-center col-5 text-sm-left">
                        <div class="px-0 pb-0 card-body px-md-4">
                            @php
                            $userImageIllustration = ["card-advance-sale.png", "add-new-roles.png"];
                            @endphp
                            <img src="/storage/assets/img/illustrations/{{ $userImageIllustration[rand(0,1)] }}"
                                height="140" alt="view sales">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="mb-4 col-xl-8 col-lg-7 col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="mb-3 d-flex justify-content-between">
                        <h5 class="mb-0 card-title">Statistics</h5>
                        <small class="text-muted">--------------------------------</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row gy-3">
                        {{-- DEMANDES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-primary me-3">
                                    {{-- <i class="ti ti-chart-pie-2 ti-sm"></i> --}}
                                    <i class="menu-icon fa-solid fa-hand-holding-medical fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">230k</h6>
                                    <small>Demandes</small>
                                </div>
                            </div>
                        </div>
                        {{-- DEMANDES --}}

                        {{-- SITES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-info me-3">
                                    <i class="menu-icon fa-solid fa-screwdriver-wrench fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">
                                        <span class="text-danger">8.549k</span> / 100
                                    </h6>
                                    <small>Sites (actifs)</small>
                                </div>
                            </div>
                        </div>
                        {{-- SITES --}}

                        {{-- PRESTATAIRES --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-danger me-3">
                                    <i class="menu-icon fa-solid fa-users-gear fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">1.423k</h6>
                                    <small>Prestataires</small>
                                </div>
                            </div>
                        </div>
                        {{-- PRESTATAIRES --}}

                        {{-- UTILISATEURS --}}
                        <div class="col-md-3 col-6">
                            <div class="d-flex align-items-center">
                                <div class="p-2 badge rounded-pill bg-label-success me-3">
                                    <i class="menu-icon fa-solid fa-user-tie fa-md"></i>
                                </div>
                                <div class="card-info">
                                    <h6 class="mb-0">$9745</h6>
                                    <small>Utilisateurs</small>
                                </div>
                            </div>
                        </div>
                        {{-- UTILISATEURS --}}

                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->
    </div>

    <div class="px-2 row">
        <div
            class="flex items-center justify-between h-10 p-0 overflow-hidden text-white bg-blue-700 shadow-xl shadow-gray-500 col-md-12">
            <img src="/storage/assets/img/logo.png" class="" alt="logo" width="15%" />
            <p class="w-full text-2xl font-bold text-center uppercase">évolution des requêtes</p>
        </div>

        <div class="p-0 my-3 bg-white col-md-8">
            <div class="flex flex-col rounded shadow-xl">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full p-0 align-middle">
                        <div class="p-0 overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-blue-400">
                                    <tr>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Etiquetes de lignes</th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Nombre de requete</th>
                                        <th scope="col" class="py-2 text-xs font-bold text-gray-900 uppercase text-start ">
                                            Taux</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="text-sm font-bold text-green-500 whitespace-nowrap">Cloturé</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">52</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">91%</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm font-bold text-yellow-500 whitespace-nowrap">En cours</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">2</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">4%</td>
                                    </tr>

                                    <tr>
                                        <td class="text-sm font-bold text-red-500 whitespace-nowrap">Pas traité</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">3</td>
                                        <td class="text-sm text-gray-800 whitespace-nowrap">5%</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-blue-400">
                                        <td class="font-bold text-black text-md whitespace-nowrap">TOTAL</td>
                                        <td class="font-bold text-gray-800 text-md whitespace-nowrap">57</td>
                                        <td class="font-bold text-gray-800 text-md whitespace-nowrap">100%</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-2 row">
        <div class="my-3 col-md-8">
            <div class="w-full max-w-sm p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div
                            class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-lg dark:bg-gray-700 me-3">
                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                                <path
                                    d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                                <path
                                    d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                            </svg>
                        </div>
                        <div>
                            <h5 class="pb-1 text-2xl font-bold leading-none text-gray-900 dark:text-white">3.4k</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Leads generated per week</p>
                        </div>
                    </div>
                    <div>
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                            <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                            </svg>
                            42.5%
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-sm font-normal text-gray-500 dark:text-gray-400 me-1">Money spent:</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">$3,232</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-sm font-normal text-gray-500 dark:text-gray-400 me-1">Conversion rate:</dt>
                        <dd class="text-sm font-semibold text-gray-900 dark:text-white">1.2%</dd>
                    </dl>
                </div>

                <div id="column-chart"></div>
                <div
                    class="grid items-center justify-between grid-cols-1 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="inline-flex items-center text-sm font-medium text-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
                            type="button">
                            Last 7 days
                            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                        90 days</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#"
                            class="inline-flex items-center px-3 py-2 text-sm font-semibold text-blue-600 uppercase rounded-lg hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Leads Report
                            <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-gmao-layout>
