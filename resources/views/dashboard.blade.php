@if (Auth::user())
    @php
        $gmao_dash_role = Auth::user()->role ?? null;
    @endphp
    @if ($gmao_dash_role == 'super_admin' || $gmao_dash_role == 'admin' || $gmao_dash_role == 'maintenance')
        @include('admin.dashboard')
    @elseif ($gmao_dash_role == 'demandeur')
        @include('demandeur.dashboard')
    @elseif ($gmao_dash_role == 'commercial')
        @include('commercial.dashboard')
    @elseif ($gmao_dash_role == 'prestataire_admin' || $gmao_dash_role == 'agent')
        @include('prestataires.dashboard')
    @else
        <script>
            window.location = "{{ route('welcome') }}";
        </script>
    @endif
@else
    <script>
        window.location = "{{ route('welcome') }}";
    </script>
@endif