<form action="{{ route('admin.hcp_events.export', $hcpEvent->id) }}" method="post">
    @csrf
    <div class="field has-addons">
        <button class="button has-background-primary">
            Download as Excel
        </button>
    </div>
</form>
