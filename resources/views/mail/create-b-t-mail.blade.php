<x-mail::message>
# Nouvelle Demande D"Intervention

- Numero de Demande: {{ $bonTravail->di_reference }}
- Numero de Bon de Travail: {{ $bonTravail->bt_reference }}
- Site: {{ $bonTravail->demande->site->name }}
- Equipement: {{ $bonTravail->equipement->name }}
- Zone et Qualification: {{ $bonTravail->zone_name }} - {{ $bonTravail->prioriteText() }}
- Delais: {{ $bonTravail->zone_delais }}
- Date et Heure de Déclaration: {{ $bonTravail->created_at }}
- Date Echance: {{ $bonTravail->date_echeance }}

NB: Veuillez vous connecter à votre interface pour traiter la demande.

{{-- <x-mail::button :url="''">
Button Text
</x-mail::button> --}}

Cdtm,<br>
{{ config('app.name') }}
</x-mail::message>
