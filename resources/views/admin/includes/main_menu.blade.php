<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-home"></i><span>Dashboard</span></a>
    <collapse-item title="Manage App Pharmacies" icon="fa fa-users">
        <a class="link-item" href="{{ route('admin.users.create') }}">Add Pharmacy</a>
        <a class="link-item" href="{{ route('admin.users.index') }}">Pharmacies List</a>
    </collapse-item>
    <collapse-item title="Manage Staff Members" icon="fa fa-id-badge">
        <a class="link-item" href="{{ route('admin.admins.create') }}">Add Member</a>
        <a class="link-item" href="{{ route('admin.admins.index') }}">Members List</a>
    </collapse-item>
    <collapse-item title="Reports" icon="fa fa-chart-bar">
        <a class="link-item" href="{{ route('admin.current_status') }}">Current Status</a>
        <a class="link-item" href="{{ route('admin.calls_report') }}">Report of Calls</a>
        <a class="link-item" href="{{ route('admin.agents_report') }}">Report of Agents</a>
        <a class="link-item" href="{{ route('admin.users_report') }}">Report of Pharmacies</a>
        <a class="link-item" href="{{ route('admin.waiting_time') }}">Waiting Time</a>
    </collapse-item>
    <collapse-item title="Manage App Settings" icon="fa fa-cogs">
        <a class="link-item" href="{{ route('admin.cities.index') }}">Cities List</a>
        <a class="link-item" href="{{ route('admin.working_hours.index') }}">Working Hours</a>
        <a class="link-item" href="{{ route('admin.settings.edit') }}">General Settings</a>
    </collapse-item>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
  document.getElementById('header_logout').submit();" class="card link-item-no-collapse"><i
            class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    <form id="header_logout" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
