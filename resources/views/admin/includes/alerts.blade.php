@if(count($errors) > 0)
    <alert
        alert-title="Invalid given Data"
        alert-type="error"
        :alert-messages="{{ collect($errors->all()) }}">
    </alert>
@endif

@if(session()->has('error'))
    <alert title="Invalid given Data" alert-type="error" alert-title="{{ session('error') }}"></alert>
@elseif(session()->has('success'))
    <alert title="Request is sent successfully" alert-type="success" alert-title="{{ session('success') }}"></alert>
@endif
