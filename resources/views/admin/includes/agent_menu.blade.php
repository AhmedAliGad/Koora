<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-home"></i><span>Dashboard</span></a>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
  document.getElementById('header_logout').submit();" class="card link-item-no-collapse"><i
            class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    <form id="header_logout" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
