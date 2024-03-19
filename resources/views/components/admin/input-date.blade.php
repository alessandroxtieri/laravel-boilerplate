@props(['name', 'label', 'description', 'value', 'required'])

<label for="{{ $name }}">{{ $label }} {!! ($required ?? false) ? '<span class="required">*</span>' : '' !!}</label>
<div class="input-group">
    <div class="form-line">
        <input  type="date" 
                class="form-control" 
                name="{{ $name }}" 
                value="{{ old($name) ?? $value ?? '' }}" 
                {{ ($required ?? false) ? 'required' : '' }} />
    </div>
    
    @if ($errors->has($name))
        <label class="error">{{ $errors->first($name) }}</label>
    @endif                                                    
</div>
