<aside id="sidebar-wrapper">

   <div class="sidebar-brand">
      <a href="{{ url('/admin') }}">SKMH</a>
   </div>

   <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ url('/admin') }}">SKMH</a>
   </div>

   <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="dropdown">
         <a href="{{ url('/users') }}" class="nav-link"><i class="fas fa-user"></i><span>Users</span></a>
      </li>
      <li class="dropdown">
         <a href="{{ url('#') }}" class="nav-link has-dropdown"><i class="fas fa-motorcycle"></i><span>Products</span></a>
         <ul class="dropdown-menu">
            <li class="active"><a class="nav-link" href="{{ url('products/kategori-motor') }}">Kategori Motor</a></li>
            <li><a class="nav-link" href="{{ url('products/tipe-motor') }}">Tipe Motor</a></li>
            <li><a class="nav-link" href="{{ url('products/motor') }}">Detail Motor </a></li>
         </ul>
      </li>
      <li class="dropdown">
         <a href="{{ url('#') }}" class="nav-link"><i class="fas fa-wallet"></i><span>Pricelist</span></a>
      </li>
      <li class="dropdown">
         <a href="#" class="nav-link"><i class="fas fa-address-book"></i><span>Subcribers</span></a>
      </li>
      <li class="dropdown">
         <a href="#" class="nav-link"><i class="fas fa-credit-card"></i><span>Schema Credit</span></a>
      </li>
      <li class="dropdown">
         <a href="#" class="nav-link"><i class="fas fa-users"></i><span>About Us</span></a>
      </li>
   </ul>

</aside>