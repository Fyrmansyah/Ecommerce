<nav class="sidebar" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="/admin/dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/category">
      <i class="mdi mdi-buffer menu-icon"></i>
      <span class="menu-title">Kategori</span>
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/admin/produks') }}">
        <i class="mdi mdi-cart menu-icon"></i>
        <span class="menu-title">Produk</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="#collapseExample" data-bs-toggle="collapse" >
        <i class="mdi mdi-coin menu-icon"></i>
        <span class="menu-title">Transaksi</span>
      </a>
      <div class="collapse" id="collapseExample">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link pl-4" href="masteradm" >
              &nbsp; &nbsp; &nbsp; &nbsp; <i class="mdi mdi-hand menu-icon"></i>
              <span class="menu-title">Master</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-4" href="buktiadm" >
              &nbsp; &nbsp; &nbsp; &nbsp; <i class="mdi mdi-pencil menu-icon"></i>
              <span class="menu-title">diproses</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-4" href="prosesadm" >
              &nbsp; &nbsp; &nbsp; &nbsp; <i class="mdi mdi-car menu-icon"></i>
              <span class="menu-title">dibatalkan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayatadm" >
              &nbsp; &nbsp; &nbsp; &nbsp;<i class="mdi mdi-book menu-icon"></i>
              <span class="menu-title">Riwayat</span>
            </a>
          </li>
        </ul> 
      </div>
    </li>
  </ul>
</nav>