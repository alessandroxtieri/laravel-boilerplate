@props(['name', 'label', 'description', 'value', 'required'])

<label for="{{ $name }}">{{ $label }} {!! $required ?? false ? '<span class="required">*</span>' : '' !!}</label>
<div class="form-group">
    <div class="form-line {{ $errors->has($name) ? 'error' : '' }}">
        <input type="number" class="form-control" name="{{ $name }}" value="{{ old($name) ?? ($value ?? '') }}"
            {{ $required ?? false ? 'required' : '' }} />
    </div>

    @if ($errors->has($name))
        <label class="error">{{ $errors->first($name) }}</label>
    @endif
    <div class="help-info">{{ $description }}</div>
</div>
