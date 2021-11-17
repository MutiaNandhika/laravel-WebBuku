<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
        </li>
          @if (auth()->user()->level==1)
        <li class="nav-item">
            <a href="/buku" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book
              </p>
            </a>
        </li>
        @elseif (auth()->user()->level==2)
        <li class="nav-item">
            <a href="/buku" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Book
              </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/user" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
        </li>
    @endif
</ul>
