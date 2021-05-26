<li class="nav-item">
    <a href="{{ route('main') }}" class="nav-link active">
        <i class="nav-icon fas fa-home"></i>&ensp;
        <p>
            Halaman Utama
        </p>
    </a>
</li>

<hr style="display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0;">

<li class="nav-header">
    {{-- <i class="right fas fa-code-branch"></i> --}}
    Master Data
</li>

<ul class="nav">
    <li class="nav-item">
        <a href="{{ route('jabatan.index') }}" class="nav-link">
            <i class="fas fa-user-tie nav-icon"></i>&ensp;
            <p>Data Jabatan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link">
            <i class="fas fa-user-cog nav-icon"></i>&ensp;
            <p>Data User</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('pegawai.index') }}" class="nav-link">
            <i class="fas fa-users nav-icon"></i>&ensp;
            <p>Data Pegawai</p>
        </a>
    </li> 
</ul>

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