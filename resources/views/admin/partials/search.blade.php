<form action="{{ route(Request::route()->getName()) }}" method="get">
<div class="field has-addons search-input">
<!--    <a href="{{ route(Request::route()->getName()) }}" class="button">
                <span class="icon is-small">
                  <i class="fa fa-sync"></i>
                </span>
    </a>-->
    <div class="control">
        @if((isset($type) && $type == 'previous')) <input hidden name="filter" value="previous"> @endif
            @if((isset($type) && $type == 'pending')) <input hidden name="filter" value="pending"> @endif
        <input type="text" class="input" name="search"
               placeholder="search ...">
    </div>
    <div class="control">
        <button class="button has-background-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>
</form>
