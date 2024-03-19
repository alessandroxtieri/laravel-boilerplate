@props(['name', 'label', 'description', 'value', 'required'])

<label for="{{ $name }}">{{ $label }} {!! ($required ?? false) ? '<span class="required">*</span>' : '' !!}</label>
<div class="form-group">
    <div class="form-line {{ $errors->has($name) ? 'error' : '' }}">
        <textarea   id="{{ $name }}" 
                    class="form-control"                    
                    name="{{ $name }}" 
                    rows="5" 
                    style="resize: vertical;" 
                    {{ ($required ?? false) ? 'required' : '' }} >

            {{ old($name) ?? $value ?? '' }}
        </textarea>
    </div>

    @if ($errors->has($name))
        <label class="error">{{ $errors->first($name) }}</label>
    @endif                                                    
    <div class="help-info">{{ $description }}</div>
</div>
