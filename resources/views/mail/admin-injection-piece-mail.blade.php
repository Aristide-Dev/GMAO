<x-mail::message>
# Bonjour,

## Merci de procéder au remplacement des pièces validées:


- **Numero de Bon de Travail**: {{ $bonTravail->bt_reference }}
- **Panne**: {{ $bonTravail->requete }}
- **Site**: {{ $bonTravail->demande->site->name }}
- **Equipement**: {{ $bonTravail->equipement->name }}
- **Date et Heure de Déclaration**: {{ $bonTravail->demande->created_at->format('d/m/Y à H:i') }}

NB: Données disponibles sur G-Maintenance
    {{-- <x-mail::button :url="config('app.url')">
Cliquer Ici
</x-mail::button> --}}

@if (config('app.env') != 'production')
<img src="https://gn-gmaintenance.com/storage/assets/img/logo.png" alt="Star Oil logo" width="50%" />
@else
<img src="{{ config('app.url') . '/storage/assets/img/logo.png' }}" alt="Star Oil logo" width="50%" />
@endif

</x-mail::message>
