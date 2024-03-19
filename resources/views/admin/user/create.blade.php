@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><i class="material-icons">edit</i>Crea nuovo utente</h2>
                    </div>
                    <div class="body">

                        @if ($errors->any())
                            <div id="errors-container" class="alert alert-danger alert-dismissible">
                                <span>Si è verificato un errore: per favore controlla e correggi.</span>
                            </div>
                        @endif

                        <form action="{{ route('admin.user.store') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <x-admin.input-text :name="'name'" :label="'Nome'" :value="old('name') ?? ''"
                                                :description="'Nome dell\' utente'" :required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <x-admin.input-text :name="'email'" :label="'Email'" :value="old('email') ?? ''"
                                                :description="'Email dell\' utente'" :required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="email">Password<span class="required">*</span></label>
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('password') ? 'error' : '' }}">
                                                    <input type="password" class="form-control" name="password"
                                                        value="" maxlength="255">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <label class="error">{{ $errors->first('password') }}</label>
                                                @endif
                                                <div class="help-info">Password utente</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                                <x-admin.select :name="'role'" :options="$roles" :label="'Ruolo'"
                                                    :check="old('role') ?? ''" :description="'Ruolo dell utente'" :empty="true"
                                                    :required="true" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary waves-effect">
                                            <i class="material-icons">done</i>
                                            <span>Salva</span>
                                        </button>

                                        <a href="{{ route('admin.user.index') }}" class="btn waves-effect btn-default ml-2">
                                            <i class="material-icons">undo</i><span>Indietro</span></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
