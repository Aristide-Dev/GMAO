@if(Auth::user())
@php
$gmao_dash_role = Auth::user()->role;
@endphp

@if($gmao_dash_role == "super_admin" || $gmao_dash_role == "admin" || $gmao_dash_role == "maintenance")
<script>
    window.location = "{{ route('admin.dashboard') }}";
</script>
<?php exit; ?>
@endif

@if($gmao_dash_role == "demandeur")
<script>
    window.location = "{{ route('demandeur.dashboard') }}";
</script>
<?php exit; ?>
@endif

@if($gmao_dash_role == "prestataire_admin" || $gmao_dash_role == "agent")
<script>
    window.location = "{{ route('prestataires.dashboard') }}";
</script>
<?php exit; ?>
@endif

@endif
