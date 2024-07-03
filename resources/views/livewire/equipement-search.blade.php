<div>
    <div lass="mb-4">
        <div class="flex mt-3 justify-content-center">
            <div class="p-3 my-2 bg-blue-900 shadow-xl shadow-blue-400 d-flex align-items-center justify-content-between w-100 rounded-2xl form-password-toggle">
                <label for="search" class="mx-1 font-bold text-white">Rechercher</label>
                <div class="input-group input-group-merge rounded-e-2x">
                    <input wire:model.live="search" name="search" type="search" placeholder="Rechercher un equipement"
                        class="form-control rounded-e-2xl" />
                    @if ($search)
                    <span wire:click="resetSearch" class="m-0 text-red-500 bg-white border-none cursor-pointer input-group-text rounded-e-3x" id="basic-default-password">
                        <i class="fa fa-xmark-square"></i>
                    </span>
                    @endif
                </div>
                {{-- <button type="submit" class="px-3 py-2 text-white bg-blue-500 btn-icon rounded-xl"><i
                        class="ti ti-search"></i></button> --}}
            </div>
        </div>
    </div>

    
    <div class="flex justify-content-center col-12" wire:loading>
        <div class="flex gap-0 p-3 bg-transparent rounded-lg justify-content-center animate-pulse">
            <div class="demo-inline-spacing display-1">
                <div class="spinner-border spinner-border-lg text-primary h1 display-1" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    @if($equipements->count())
    <div class="my-3 row">
       @foreach ($equipements as $equipement)
            <div class="col-md-4">
                <div class="mb-4 card rounded-xl">
                    <div class="card-body">
                        <div class="flex justify-between">
                            
                        <p class="font-bold card-text">{{ $equipement->name }}</p>
                        <small class="font-medium text-yellow-400">{{ $equipement->categorie }}</small>
                    </div>
                    <ul class="mt-2">
                        <li class="flex justify-between p-3 border-b shadow-xl rounded-xl">
                            <p class="font-bold card-text">Numero serie</p>
                            <p class="card-text">{{ $equipement->numero_serie }}</p>
                        </li>
                        <li class="flex justify-between p-3 border-b shadow-xl rounded-xl">
                            <p class="font-bold card-text">Forfait contrat</p>
                            <p class="card-text">{{ $equipement->forfait_contrat }}</p>
                        </li>
                        <li class="flex items-center justify-between p-3 border-b shadow-xl align-center rounded-xl">
                            <p class="font-bold card-text">QR CODE</p>
                            <p class="card-text">{!! $equipement->qrcode(75) !!}</p>
                        </li>
                        <li class="flex items-center justify-between p-2 align-center w-100">
                            <a href="{{ route('admin.sites.equipement.categorie', ['site' => $site, 'categorie_equipement' => $equipement->categorie]) }}" class="py-3 text-white bg-blue-700 shadow-2xl btn hover:bg-blue-800 w-100">
                                Voir +
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
       @endforeach
    </div>
    @endif

    @if ($equipements->count() <= 0 && !empty($search))
        <h3 wire:loading.class="opacity-0" class="my-5 text-xl font-bold text-center animate-pulse">Aucune corespondance</h3>
    @endif

</div>