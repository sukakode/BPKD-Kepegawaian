<li class="nav-item">
    <a href="{{ route('main') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <span><i class="nav-icon fas fa-home"></i></span>&ensp;
        <p>Dashboard</p>
    </a>
</li>
<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0;">

<li class="nav-header">
    {{-- <i class="right fas fa-code-branch"></i> --}}
    Master Data
</li>

{{-- <ul class="nav"> --}}
<li class="nav-item">
    <a href="{{ route('user.index') }}" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
        <span><i class="fas fa-user-cog nav-icon"></i></span>&ensp;
        <p>Data User</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('jabatan.index') }}" class="nav-link {{ Request::is('jabatan*') ? 'active' : '' }}">
        <span><i class="fas fa-user-tag nav-icon"></i></span>&ensp;
        <p>Data Jabatan</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('pegawai.index') }}" class="nav-link {{ Request::is('pegawai*') ? 'active' : '' }}">
        <span><i class="fas fa-users nav-icon"></i></span>&ensp;
        <p>Data Pegawai</p>
    </a>
</li> 
{{-- </ul> --}}

{{-- <li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-code-branch"></i>
<p>
Master Data
<i class="right fas fa-angle-left"></i>
</p>
</a>

</li> --}}
{{-- <li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-th"></i>
<p>
Simple Link
<span class="right badge badge-danger">New</span>
</p>
</a>
</li> --}}