{{-- <!-- Basic with Icons --> --}}
<div class="col-xxl">
    <div class="mb-4 card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Ajouter un prestataire</h5>
            {{-- <small class="text-muted float-end">Merged input group</small> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.prestataires.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname">Nom complet du prestataire</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                            <input type="text" name="name" class="form-control" id="basic-icon-default-fullname" placeholder="Star Oil Guinée" aria-label="Star Oil Guinée" aria-describedby="basic-icon-default-fullname2" value="{{ old('name') }}" />
                        </div>
                        <x-input-error bag="create_prestataire" for="name" class="mt-2" />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="basic-icon-default-fullname_">Slug</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                            <input type="text" name="slug" class="form-control" id="basic-icon-default-fullname_" placeholder="SOG" aria-label="SOG" aria-describedby="basic-icon-default-fullname" value="{{ old('slug') }}" />
                        </div>
                        <x-input-error bag="create_prestataire" for="slug" class="mt-2" />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="basic-icon-default-email">Email</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="ti ti-mail"></i></span>
                            <input type="text" name="email" id="basic-icon-default-email" class="form-control" placeholder="adresse Email" aria-label="adresse Email" aria-describedby="basic-icon-default-email2" value="{{ old('email') }}" />
                        </div>
                        <x-input-error bag="create_prestataire" for="email" class="mt-2" />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 form-label" for="basic-icon-default-phone">Telephone</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i class="ti ti-phone"></i></span>
                            <input type="text" name="telephone" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2" value="{{ old('telephone') }}" />
                        </div>
                        <x-input-error bag="create_prestataire" for="telephone" class="mt-2" />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 form-label" for="basic-icon-default-adresse">Adresse</label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-merge">
                            <span id="basic-icon-default-adresse2" class="input-group-text"><i class="ti ti-building"></i></span>
                            <input type="text" name="adresse" id="basic-icon-default-adresse" class="form-control phone-mask" placeholder="Conakry/Ratoma" aria-label="Conakry/Ratoma" aria-describedby="basic-icon-default-adresse2" value="{{ old('adresse') }}" />
                        </div>
                        <x-input-error bag="create_prestataire" for="adresse" class="mt-2" />
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="gap-2 col-sm-12 d-flex justify-content-end">
                        <button type="reset" class="text-white bg-red-500 btn hover:bg-red-600">Effacer</button>
                        <button type="submit" class="text-white bg-green-500 btn hover:bg-green-600 text-uppercase">Enregistrer</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

