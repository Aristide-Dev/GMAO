@props(['data' => []])
<nav
    aria-label="breadcrumb"
    class="py-3 mt-1 text-white"
    style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
    >
    <ol class="px-3 py-2 mb-3 text-center bg-indigo-800 border-2 border-dotted rounded shadow-lg breadcrumb fs-6">
        <li class="text-white breadcrumb-item">
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}" class="text-white fw-bolder link-light">Tableau de Bord</a>
        </li>
        @foreach ($data as $key => $item)
            @if(empty($item))
                <li class="text-gray-200 breadcrumb-item active" aria-current="page">
                    <span class="text-gray-400 fw-normal text-capitalize fst-italic fw-bold animate-pulse">{{ $key }}</span>
                </li>
            @else
                <li class="fw-bolder breadcrumb-item">
                    <a class="text-white link-light text-capitalize" href="{{ $item }}">{{ $key }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
