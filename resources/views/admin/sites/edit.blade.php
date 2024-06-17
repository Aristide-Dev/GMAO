<x-gmao-layout>
    <x-slot name="title">{{ __('Editer site') }}</x-slot>
    <x-slot name="title_desc">{{ __('Editer site') }}</x-slot>
    <x-slot name="sidebar">admin</x-slot>
    <x-breadcrumb :data="['sites'=> route('admin.sites.index'), 'Editer site' => '']"/>

    <div class="row">
        <div class="col-xxl">
            <div class="mb-4 card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Editer les informations du site <span class="font-bold">{{ $site->name }}</span> </h5>
                    {{-- <small class="text-muted float-end">Merged input group</small> --}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form class="pt-0 add-new-demande" id="addNewDemandeForm" method="POST" action="{{ route('admin.sites.update',$site) }}">
                                @csrf
                                @method('put')
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label">Site</label>
                                    <input type="text" id="name" name="name" placeholder="Nom du site" class="rounded form-control" value="{{ $site->name }}"/>
                                    <x-input-error bag="create_site" for="name" class="mt-2" />
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label" for="registre">Registre</label>
                                    <select id="registre" name="registre" class="form-control">
                                        <option value="contrat" {{ old('registre', $site->registre) == 'contrat' ? 'selected' : '' }}>CONTRAT</option>
                                        <option value="b2b" {{ old('registre', $site->registre) == 'b2b' ? 'selected' : '' }}>B2B</option>
                                        <option value="autre" {{ old('registre', $site->registre) == 'autre' ? 'selected' : '' }}>AUTRE</option>
                                    </select>
                                    <x-input-error bag="create_site" for="registre" class="mt-2" />
                                </div>
                                
                                <button type="submit" class="text-white bg-green-500 hover:bg-green-600 btn">ENREGISTRER</button>
                                <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600" data-bs-dismiss="offcanvas">Annuler</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-gmao-layout>

