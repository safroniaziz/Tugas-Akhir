{{-- @php
    use App\PusatCluster;
@endphp --}}
<li class="nav-item">
  <a href="{{ route('admin.dashboard') }}" class="nav-link">
    <i class="nav-icon fas fa-desktop"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('admin.data_gempa') }}" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Data Gempa
    </p>
  </a>
</li>
{{-- @php
    $pusat_cluster = PusatCluster::max('iterasi_ke');
@endphp --}}
<li class="nav-item">
  <a href="{{ route('admin.proses_clustering.proses_clustering') }}" class="nav-link">
    <i class="nav-icon fas fa-cog"></i>
    <p>
      Proses Clustering
    </p>
  </a>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-list"></i>
    <p>
      Data Clustering
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.data_clustering.pusat_cluster') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Pusat Cluster</p>
      </a>
    </li>
  </ul>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.data_clustering.data_iterasi') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Data Iterasi</p>
      </a>
    </li>
  </ul>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.data_clustering.nilai_cost') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Nilai Cost</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-bar-chart"></i>
    <p>
      Tampilan Data 
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.tampilan_data.table') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Tampilan Table</p>
      </a>
    </li>
  </ul>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.tampilan_data.grafik') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Tampilan Grafik</p>
      </a>
    </li>
  </ul>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="{{ route('admin.tampilan_data.peta') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Tampilan Peta</p>
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a class="nav-link" style="margin-left: 7px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fa fa-power-off text-danger"></i>
    <p style="margin-left: 10px;">Logout</p>
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</li>