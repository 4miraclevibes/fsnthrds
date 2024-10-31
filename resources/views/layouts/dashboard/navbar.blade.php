        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo d-flex justify-content-center align-items-center">
              <a href="{{ route('home') }}" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <img src="{{ asset('assets/landing/images/logo.png') }}" style="max-width: 200px; height: auto;" alt="Logo">
                </span>
              </a>
  
              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none position-absolute" style="top: 1rem; right: 1rem;">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>
  
            <div class="menu-inner-shadow"></div>
  
            <ul class="menu-inner py-1 mt-3">
              {{-- Dashboard --}}
              <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-home"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              {{-- Users --}}
              <li class="menu-item {{ Route::is('users*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user"></i>
                  <div data-i18n="Analytics">Users</div>
                </a>
              </li>
              {{-- Categories --}}
              <li class="menu-item {{ Route::is('categories*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-category"></i>
                  <div data-i18n="Analytics">Categories</div>
                </a>
              </li>
              {{-- Products --}}
              <li class="menu-item {{ Route::is('dashboard.products*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-package"></i>
                  <div data-i18n="Analytics">Products</div>
                </a>
              </li>
              {{-- Transactions --}}
              <li class="menu-item {{ Route::is('transactions*') ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-money"></i>
                  <div data-i18n="Analytics">Transactions</div>
                </a>
              </li>
            </ul>
          </aside>
          <!-- / Menu -->

@push('styles')
<style>
  .app-brand.demo {
    height: 80px; /* Sesuaikan dengan kebutuhan */
    overflow: hidden;
  }
  .app-brand-logo.demo img {
    object-fit: contain;
    max-height: 100%;
  }
</style>
@endpush