@props(['name', 'label', 'checked', 'icon'])

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <img src="{{ asset('icons/' . $icon) }}" alt="{{ $label }}" class="switch-icon" />
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 mt-07">
            <div class="switch" style="display:inline-block; min-width:170px;">
                <label>
                    <input type="checkbox" name="{{ $name }}" @checked(old($name, $checked)) value="1" />
                    <span class="lever"></span>
                </label>
                <div class="demo-switch-title" style="min-width:95px; display:inline-block;">{{ $label }}</div>
            </div>
        </div>
    </div>
</div>
