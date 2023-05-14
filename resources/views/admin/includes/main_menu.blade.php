<collapse class="outer " accordion is-fullwidth>
    <a href="{{ route('admin.dashboard') }}" class="card link-item-no-collapse "><i
            class="fas fa-home"></i><span>Dashboard</span></a>
    <collapse-item title="Teams" icon="fa fa-users">
        <a class="link-item" href="{{ route('admin.teams.create') }}">Add Team</a>
        <a class="link-item" href="{{ route('admin.teams.index') }}">Teams List</a>
    </collapse-item>
    <collapse-item title="Sliders" icon="fa fa-images">
        <a class="link-item" href="{{ route('admin.sliders.create') }}">Add Slider</a>
        <a class="link-item" href="{{ route('admin.sliders.index') }}">Sliders List</a>
    </collapse-item>
    <collapse-item title="Partners" icon="fa fa-handshake">
        <a class="link-item" href="{{ route('admin.partners.create') }}">Add Partner</a>
        <a class="link-item" href="{{ route('admin.partners.index') }}">Partners List</a>
    </collapse-item>
    <collapse-item title="Upcoming Matches" icon="fa fa-soccer-ball">
        <a class="link-item" href="{{ route('admin.upcoming_matches.create') }}">Add Upcoming Match</a>
        <a class="link-item" href="{{ route('admin.upcoming_matches.index') }}">Upcoming Matches List</a>
    </collapse-item>
    <collapse-item title="News" icon="fa fa-newspaper">
        <a class="link-item" href="{{ route('admin.news_lists.create') }}">Add Post</a>
        <a class="link-item" href="{{ route('admin.news_lists.index') }}">News List</a>
    </collapse-item>
    <collapse-item title="Manage App Settings" icon="fa fa-cogs">
        <a class="link-item" href="{{ route('admin.cities.index') }}">Cities List</a>
        <a class="link-item" href="{{ route('admin.working_hours.index') }}">Working Hours</a>
        <a class="link-item" href="{{ route('admin.settings.edit') }}">General Settings</a>
    </collapse-item>
    <a href="{{ route('admin.contact_messages.index') }}" class="card link-item-no-collapse"><i class="fa fa-envelope"></i><span>Contact Messages</span></a>
    <a href="{{ route('admin_logout') }}" onclick="event.preventDefault();
  document.getElementById('header_logout').submit();" class="card link-item-no-collapse"><i
            class="fas fa-sign-out-alt"></i><span>Logout</span></a>
    <form id="header_logout" action="{{ route('admin_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</collapse>
