<x-mail::message>
    # Bonjour,

    ## Merci de prendre en compte la demande suivante:

    - **Numero de demande d’intervention**: {{ $demande->di_reference }}
    {{-- - **Panne**: {{ $demande->requete }} --}}
    - **Site**: {{ $demande->demande->site->name }}
    - **Date et Heure de Déclaration**: {{ $demande->created_at->format('d/m/Y à H:i') }}

    ## **NB**: Données disponibles sur G-Maintenance
    {{-- <x-mail::button :url="'{{ config('app.url') }}'">
Cliquer Ici
</x-mail::button> --}}

    @if (config('app.env') != 'production')
        <img src="https://gn-gmaintenance.com/storage/assets/img/logo.png" alt="Star Oil logo" width="50%" />
    @else
        <img src="{{ config('app.url') . '/storage/assets/img/logo.png' }}" alt="Star Oillogo" width="50%" />
    @endif

</x-mail::message>
