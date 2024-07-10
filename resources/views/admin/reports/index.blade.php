<x-gmao-layout>
    <x-slot name="title">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="title_desc">{{ __('Rapports Mensuels') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['Rapports Mensuels'=> '']"/>

    <div class="container">
        <h1>Monthly Reports</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Rapport Mensuel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ \Carbon\Carbon::createFromFormat('m', $report->month)->format('F') }} {{ $report->year }}</td>
                    <td>
                        <div class="flex gap-2">
                            <a href="{{ route('admin.reports.show', $report) }}" class="text-white bg-blue-500 hover:bg-blue-500 btn">Voir +</a>
                        <form action="{{ route('admin.reports.validate', $report->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Validate</button>
                        </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-gmao-layout>

