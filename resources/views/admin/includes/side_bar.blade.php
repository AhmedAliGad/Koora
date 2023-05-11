<div class="aside-container desktop">
    @if (auth()->check())
        <div class="side-header">
            <figure class="image is-48x48 avatar">
                <img src="{{ auth()->user()->image ?: asset('/admin/img/admin2.png') }}">
            </figure>
            <span class="avatar-name">{{ auth()->user()->name }}</span>
        </div>
    @endif
    @if(auth()->user()->role == 'agent')
            @include('admin.includes.agent_menu')
    @else
            @include('admin.includes.main_menu')
    @endif
</div>
