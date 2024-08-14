<x-mail::message>
# Bonjour,

## Nous vous informons de la clôture de la requête suivante:

- **Numero de Rapport D'intervention**: {{ $rapport_interventon->ri_reference }}
- **Numero de Bon de Travail**: {{ $bonTravail->bt_reference }}
- **Panne**: {{ $bonTravail->requete }}
- **Site**: {{ $bonTravail->demande->site->name }}
- **Equipement**: {{ $bonTravail->equipement->name }}
- **Date et Heure de Déclaration**: {{ $bonTravail->demande->created_at->format('d/m/Y à H:i') }}
- **Zone et Qualification**: {{ $bonTravail->zone_name }} - {{ $bonTravail->prioriteText() }}
- **Delais**: {{ $bonTravail->zone_delais }} H
- **Date Echeance**: {{ $bonTravail->date_echeance->format('d/m/Y à H:i') }}
- **KPIs**: {{ $bonTravail->kpi ? 'Dans les Délais':'Hors Délais' }}

@if ($rapport_interventon->commentaire)
### Commentaire:
{{ $rapport_interventon->commentaire }}
@endif

NB: Données disponibles sur G-Maintenance
{{-- <x-mail::button :url="config('app.url')">
Cliquer Ici
</x-mail::button> --}}

@if (config('app.env') != 'production')
<img src="https://gn-gmaintenance.com/storage/assets/img/logo.png" alt="Logo Star Oil" width="50%" />
@else
<img src="{{ config('app.url') . '/storage/assets/img/logo.png' }}" alt="Logo Star Oil" width="50%" />
@endif
</x-mail::message>
