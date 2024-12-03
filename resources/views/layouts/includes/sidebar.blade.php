<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


    
    <li>
      <a class="nav-link {{Route::is("dashboard") ? '':'collapsed'}}" href="{{ route("dashboard") }}">
        <i class="bi bi-house"></i>
        <span>Anasayfa</span>
      </a>
    </li>
    <li>
      <a class="nav-link {{Route::is("customers.*") ? '':'collapsed'}}" href="{{ route("customers.index") }}">
        <i class='bx bx-user-pin'></i>
        <span>Müşteriler</span>
      </a>
    </li>
    <li>
      <a class="nav-link {{Route::is("sales-opportunities.*") ? '':'collapsed'}}" href="{{ route("sales-opportunities.index") }}">
        <i class='bx bxs-briefcase'></i>
        <span>Satış Fırsatları</span>
      </a>
    </li>
    <li>
      <a class="nav-link {{Route::is("tasks.*") ? '':'collapsed'}}" href="{{ route("tasks.index") }}">
        <i class='bx bx-task' ></i>
        <span>Görevler</span>
      </a>
    </li>
    <li>
      <a class="nav-link {{Route::is("interactions.*") ? '':'collapsed'}}" href="{{ route("interactions.index") }}">
        <i class='bx bxs-calendar-edit' ></i>
        <span>Etkileşimler</span>
      </a>
    </li>
    @if(auth()->user() && (auth()->user()->hasRole('admin') || auth()->user()->hasRole('manager')))
    <li>
      <a class="nav-link {{Route::is("users.*") ? '':'collapsed'}}" href="{{ route("users.index") }}">
        <i class="bx bx-group"></i>
        <span>Kullanıcılar</span>
      </a>
    </li>
    <li>
      <a class="nav-link {{Route::is("settings.*") ? '':'collapsed'}}" href="{{ route("settings.edit") }}">
        <i class="bi bi-gear"></i>
        <span>Ayarlar</span>
      </a>
    </li>
    @endif
    
      <li class="nav-item ">
        {{-- <a class="nav-link {{Route::is("admin.headers.*") ? '':'collapsed'}}" href="{{ route('admin.headers.index') }}">
            <i class="bi bi-card-heading"></i>
          <span>Başlık</span>
        </a> --}}
      </li>
      <li class="nav-item">
        {{-- <a class="nav-link {{Route::is("admin.abouts.index") ? '':'collapsed'}}" href="{{ route('admin.abouts.index') }}" >
            <i class="bi bi-file-earmark-person"></i>
          <span>Hakkımızda</span>
        </a> --}}
      </li>
      <li class="nav-item">
        {{-- <a class="nav-link {{Route::is("admin.projects.*") ? '':'collapsed'}}" href="{{route('admin.projects.list')}}">
            <i class="bi bi-kanban"></i>
          <span>Yaptığımız İşler (Projeler)</span>
        </a> --}}
      </li>



      <li class="nav-item">
        {{-- <a class="nav-link {{Route::is("admin.categories.*") ? '':'collapsed'}}" href="{{route('admin.categories.list')}}">
            <i class="bi bi-inboxes"></i>
          <span>Kategoriler</span>
        </a> --}}
      </li>

      <li class="nav-item">
        {{-- <a class="nav-link {{Route::is("admin.products.*") ? '':'collapsed'}}" href="{{route('admin.products.list')}}">
            <i class="bi bi-box-seam"></i>
          <span>Ürünler</span>
        </a> --}}
      </li><!-- End Error 404 Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->