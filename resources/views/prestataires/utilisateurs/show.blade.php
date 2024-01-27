<x-gmao-layout>
    <x-slot name="title">{{ __('Utilisateurs') }}</x-slot>
    <x-slot name="title_desc">{{ __('Informations sur l\'utilisateur') }}</x-slot>
    <x-slot name="sidebar">prestataire</x-slot>


    <!-- User Card -->
    <div class="card mb-4">
        <div class="card-body">
          <div class="user-avatar-section">
            <div class=" d-flex align-items-center flex-column">
              <img class="img-fluid rounded mb-3 pt-1 mt-4" src="../../assets/img/avatars/15.png" height="100" width="100" alt="User avatar" />
              <div class="user-info text-center">
                <h4 class="mb-2">Abdourahamane Yassine Diallo</h4>
                <span class="badge bg-label-secondary mt-1">Author</span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-around flex-wrap mt-3 pt-3 pb-4 border-bottom">
            <div class="d-flex align-items-start me-4 mt-3 gap-2">
              <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-checkbox ti-sm'></i></span>
              <div>
                <p class="mb-0 fw-medium">1.23k</p>
                <small>Prestation participer</small>
              </div>
            </div>
            <div class="d-flex align-items-start mt-3 gap-2">
              <span class="badge bg-label-primary p-2 rounded"><i class='ti ti-briefcase ti-sm'></i></span>
              <div>
                <p class="mb-0 fw-medium">568</p>
                <small>prestation terminer</small>
              </div>
            </div>
          </div>
          <p class="mt-4 small text-uppercase text-muted">Details</p>
          <div class="info-container">
            <ul class="list-unstyled">
              <li class="mb-2">
                <span class="fw-medium me-1">Prenom et nom:</span>
                <span>Yassine Diallo</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Email:</span>
                <span>Yassine@gmail.com</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Status:</span>
                <span class="badge bg-label-success">Active</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Role:</span>
                <span>Author</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Telephone:</span>
                <span>623176862</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Contact:</span>
                <span>(123) 456-7890</span>
              </li>
              <li class="mb-2 pt-1">
                <span class="fw-medium me-1">Languages:</span>
                <span>French</span>
              </li>
              <li class="pt-1">
                <span class="fw-medium me-1">Domaine d'expertise:</span>
                <span>Génie info</span>
              </li>
              <li class="pt-1">
                <span class="fw-medium me-1">Competence:</span>
                <span>Developpeur</span>
              </li>
            </ul>
            <div class="d-flex justify-content-center">
              <a href="javascript:;" class="btn btn-primary me-3" data-bs-target="#editUser" data-bs-toggle="modal">Edit</a>
              <a href="javascript:;" class="btn btn-label-danger suspend-user">Suspended</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /User Card -->
      <!-- Change Password -->
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
          <form id="formChangePassword" method="GET" onsubmit="return false">
            <div class="alert alert-warning" role="alert">
              <h5 class="alert-heading mb-2">Ensure that these requirements are met</h5>
              <span>Minimum 8 characters long, uppercase & symbol</span>
            </div>
            <div class="row">
              <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                <label class="form-label" for="newPassword">New Password</label>
                <div class="input-group input-group-merge">
                  <input class="form-control" type="password" id="newPassword" name="newPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
  
              <div class="mb-3 col-12 col-sm-6 form-password-toggle">
                <label class="form-label" for="confirmPassword">Confirm New Password</label>
                <div class="input-group input-group-merge">
                  <input class="form-control" type="password" name="confirmPassword" id="confirmPassword" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                  <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary me-2">Change Password</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!--/ Change Password -->
  </x-gmao-layout>


