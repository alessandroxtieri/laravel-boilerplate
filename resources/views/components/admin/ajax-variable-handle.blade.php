@props(['key', 'description', 'value', 'id'])

<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <div class="row clearfix">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="form-group">
                <div class="form-line">
                    <input type="number" class="value form-control" name="{{ $key }}" value="{{ $value }}"
                        data-id="{{ $id }}" />
                    <div class="help-info">{{ $description }}</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="javascript:void(0);" class="btn-update waves-effect mt-1 d-block" data-id="{{ $key }}"
                style="">
                <i class="material-icons">autorenew</i>
            </a>
        </div>
    </div>
</div>
