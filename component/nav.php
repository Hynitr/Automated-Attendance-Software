<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
  <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
    <i class="bx bx-menu bx-sm"></i>
  </a>
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

<p class="text-primary mt-auto fw-bold"><?php echo date('l, F d, Y'); ?></p>

  <ul class="navbar-nav flex-row align-items-center ms-auto">


    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="assets/img/logo.png" alt class="w-px-40 h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="assets/img/logo.png" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
                <span class="fw-semibold d-block"><?php echo ucwords($t_admins['alias']) ?></span>
                <small class="text-muted">Admin</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="./profile">
            <i class="bx bx-user me-2"></i>
            <span class="align-middle">My Profile</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" target="_blank" href="https://portal.nigeriabulksms.com/recharge">
            <i class="bx bx-credit-card me-2"></i>
            <span class="align-middle">Buy SMS Credit</span>
          </a>
        </li>
        <li>
          <a class="dropdown-item" target="_blank" href="https://hynitr.com/support">
            <span class="d-flex align-items-center align-middle">
              <i class="flex-shrink-0 bx bx-phone me-2"></i>
              <span class="flex-grow-1 align-middle">Contact Support</span>
            </span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider"></div>
        </li>
        <li>
          <a class="dropdown-item" href="./logout">
            <i class="bx bx-power-off me-2"></i>
            <span class="align-middle">Log Out</span>
          </a>
        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>