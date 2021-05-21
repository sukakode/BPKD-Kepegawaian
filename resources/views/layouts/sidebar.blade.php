<li class="nav-item">
  <a href="#" class="nav-link active">
  <i class="nav-icon fas fa-home"></i>
  <p>
    Halaman Utama
  </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Master Data
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('jabatan.index') }}" class="nav-link">
        <i class="fas fa-user-tie nav-icon"></i>
        <p>Data Jabatan</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('user.index') }}" class="nav-link">
        <i class="fas fa-user-cog nav-icon"></i>
        <p>Data User</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('pegawai.index') }}" class="nav-link">
        <i class="fas fa-users nav-icon"></i>
        <p>Data Pegawai</p>
      </a>
    </li> 
  </ul>
</li>
{{-- <li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
      Simple Link
      <span class="right badge badge-danger">New</span>
    </p>
  </a>
</li> --}}