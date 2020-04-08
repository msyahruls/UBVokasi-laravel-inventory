      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">{{ config('app.name', 'Laravel') }}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">S.in</a>
          </div>
          <ul class="sidebar-menu">
              <li class="">
                <a class="nav-link" href="{{ route('dashboard') }}"><i class="far fa-square"></i> <span>Dashboard</span></a>
                @if(auth()->user()->role == 'admin')
                  <a class="nav-link" href="{{ route('fakultas.index') }}"><i class="far fa-square"></i> <span>Fakultas</span></a>
                  <a class="nav-link" href="{{ route('jurusan.index') }}"><i class="far fa-square"></i> <span>Jurusan</span></a>
                  <a class="nav-link" href="{{ route('ruangan.index') }}"><i class="far fa-square"></i> <span>Ruangan</span></a>
                @endif
                <a class="nav-link" href="{{ route('barang.index') }}"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
          </ul>
        </aside>
      </div>