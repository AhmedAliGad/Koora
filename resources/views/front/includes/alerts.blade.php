@if(count($errors) > 0)
    <alert
            alert-title="{{ trans('main.form.error') }}"
            alert-type="error"
            :alert-messages="{{ collect($errors->all()) }}">
    </alert>
@endif

@if(session()->has('error'))
    <alert title="{{ trans('main.form.error') }}" alert-type="error" alert-title="{{ session('error') }}"></alert>
@elseif(session()->has('success'))
    <alert title="{{ trans('main.form.success') }}" alert-type="success" alert-title="{{ session('success') }}"></alert>
@endif
