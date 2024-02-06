<!-- Default Wizard -->
<div class="mb-4 col-12">
    <small class="text-light fw-medium">Ajout d'un presttaire</small>
    <div class="mt-2 bs-stepper wizard-numbered">
        <div class="bs-stepper-header">
            <div class="step" data-target="#entreprise-details">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Information de l'entreprise</span>
                        <span class="bs-stepper-subtitle">Entrer les informations de l'entreprie</span>
                    </span>
                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            
            <div class="step" data-target="#personal-info">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Personal Info</span>
                        <span class="bs-stepper-subtitle">Add personal info</span>
                    </span>

                </button>
            </div>
            <div class="line">
                <i class="ti ti-chevron-right"></i>
            </div>
            
            <div class="step" data-target="#social-links">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">Social Links</span>
                        <span class="bs-stepper-subtitle">Add social links</span>
                    </span>
                </button>
            </div>
        </div>

        
        <div class="bs-stepper-content">
            <form onSubmit="return false">
                <!-- Account Details -->
                <div id="entreprise-details" class="content">
                    <div class="mb-3 content-header">
                        <h6 class="mb-0">Information de l'entreprise</h6>
                        <small>Entrer les informations de l'entreprie</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label" for="name">Nom de l'entreprise</label>
                            <input type="text" id="name" class="form-control" placeholder="Star Oil Guinée" required/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="slug">Acronyme</label>
                            <input type="text" id="slug" class="form-control" placeholder="SOG" required/>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email de l'entreprise" aria-label="john.doe" />
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="telephone">Telephone de l'entreprise</label>
                            <input type="text" id="telephone" class="form-control" placeholder="620407236" required/>
                        </div>
                        
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev" disabled> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Précédent</span>
                            </button>
                            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Suivant</span> <i class="ti ti-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Personal Info -->
                <div id="personal-info" class="content">
                    <div class="mb-3 content-header">
                        <h6 class="mb-0">Personal Info</h6>
                        <small>Enter Your Personal Info.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="first-name">First Name</label>
                            <input type="text" id="first-name" class="form-control" placeholder="John" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="last-name">Last Name</label>
                            <input type="text" id="last-name" class="form-control" placeholder="Doe" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="country">Country</label>
                            <select class="select2" id="country">
                                <option label=" "></option>
                                <option>UK</option>
                                <option>USA</option>
                                <option>Spain</option>
                                <option>France</option>
                                <option>Italy</option>
                                <option>Australia</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="language">Language</label>
                            <select class="w-auto selectpicker" id="language" data-style="btn-transparent" data-icon-base="ti" data-tick-icon="ti-check text-white" multiple>
                                <option>English</option>
                                <option>French</option>
                                <option>Spanish</option>
                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-primary btn-next"> <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span> <i class="ti ti-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <!-- Social Links -->
                <div id="social-links" class="content">
                    <div class="mb-3 content-header">
                        <h6 class="mb-0">Social Links</h6>
                        <small>Enter Your Social Links.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="twitter">Twitter</label>
                            <input type="text" id="twitter" class="form-control" placeholder="https://twitter.com/abc" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="facebook">Facebook</label>
                            <input type="text" id="facebook" class="form-control" placeholder="https://facebook.com/abc" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="google">Google+</label>
                            <input type="text" id="google" class="form-control" placeholder="https://plus.google.com/abc" />
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label" for="linkedin">LinkedIn</label>
                            <input type="text" id="linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-label-secondary btn-prev"> <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                            </button>
                            <button class="btn btn-success btn-submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Default Wizard -->
<x-slot name="custum_styles">
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bs-stepper/bs-stepper.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="/storage/assets/vendor/libs/%40form-validation/umd/styles/index.min.css" />
</x-slot>

<x-slot name="custum_scripts">
    <script src="/storage/assets/vendor/libs/bs-stepper/bs-stepper.js"></script>
    <script src="/storage/assets/js/form-wizard-numbered.js"></script>
</x-slot>
