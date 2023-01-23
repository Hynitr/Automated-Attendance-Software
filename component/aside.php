<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
<div class="app-brand demo">
  <a href="./" class="app-brand-link">
   
    <span class="app-brand-text demo menu-text fw-bolder ms-2"> <?php echo ucwords($t_admins['alias']) ?></span>
  </a>

  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
    <i class="bx bx-chevron-left bx-sm align-middle"></i>
  </a>
</div>

<div class="menu-inner-shadow"></div>

<ul class="menu-inner py-1">
  <!-- Dashboard -->
  <li class="menu-item active">
    <a href="./" class="menu-link">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Analytics">Dashboard</div>
    </a>
  </li>

 
  <li class="menu-header small text-uppercase">
    <span class="menu-header-text">Bio Data</span>
  </li>
  <li class="menu-item">
    <a href="./register" class="menu-link">
      <i class="menu-icon tf-icons bx bx-pencil"></i>
      <div data-i18n="Account Settings">Register</div>
    </a>
  </li>
  <li class="menu-item">
    <a href="./view" class="menu-link">
      <i class="menu-icon tf-icons bx bx-message-square-edit"></i>
      <div data-i18n="Authentications">View</div>
    </a>
   </li>
 
  <!-- Components -->
  <li class="menu-header small text-uppercase"><span class="menu-header-text">Logs</span></li>
  <!-- Cards -->
  <li class="menu-item">
    <a href="./absentee" class="menu-link">
      <i class="menu-icon tf-icons bx bx-book-open"></i>
      <div data-i18n="Basic">Absentee</div>
    </a>
  </li>
  <!-- User interface -->
  <li class="menu-item">
    <a href="https://portal.nigeriabulksms.com/recharge" class="menu-link">
      <i class="menu-icon tf-icons bx bx-money"></i>
      <div data-i18n="User interface">Buy SMS Credit</div>
    </a>
   </li>


   <li class="menu-item">
    <a href="./expirys" class="menu-link">
      <i class="menu-icon tf-icons bx bx-credit-card"></i>
      <div data-i18n="User interface">Renew Software</div>
    </a>
   </li>
   

 
  <!-- Forms & Tables -->
  <li class="menu-header small text-uppercase"><span class="menu-header-text">Support</span></li>
  <!-- Forms -->
  <li class="menu-item">
    <a href="./profile" class="menu-link">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div data-i18n="Form Elements">Profile</div>
    </a>
  </li>
  <li class="menu-item">
    <a href="#" class="menu-link">
      <i class="menu-icon tf-icons bx bx-question-mark"></i>
      <div data-i18n="Form Layouts">Help</div>
    </a>
     </li>
  <!-- Tables -->
  <li class="menu-item">
    <a href="./logout" class="menu-link">
      <i class="menu-icon tf-icons bx bx-lock"></i>
      <div data-i18n="Tables">Logout</div>
    </a>
  </li>
</ul>
</aside>


