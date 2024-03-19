@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><i class="material-icons">edit</i>Modifica utente</h2>
                    </div>
                    <div class="body">

                        @if ($errors->any())
                            <div id="errors-container" class="alert alert-danger alert-dismissible">
                                <span>Si è verificato un errore: per favore controlla e correggi.</span>
                            </div>
                        @endif

                        <form action="{{ route('admin.user.update', $user) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}

                            <input type="hidden" name="id" value="{{ $user->id }}">

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <x-admin.input-text :name="'name'" :label="'Nome'" :value="old('name') ?? $user->name"
                                                :description="'Nome dell\' utente'" :required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <x-admin.input-text :name="'email'" :label="'Email'" :value="old('email') ?? $user->email"
                                                :description="'Email dell\' utente'" :required="true" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="email">Nuova password<span class="required">*</span></label>
                                            <div class="form-group">
                                                <div class="form-line {{ $errors->has('password') ? 'error' : '' }}">
                                                    <input type="password" class="form-control" name="password"
                                                        value="" maxlength="255">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <label class="error">{{ $errors->first('password') }}</label>
                                                @endif
                                                <div class="help-info">Nuova password utente</div>
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
                                                    :description="'Ruolo dell utente'" :check="old('role') ?? $user->roles->first()->name" :required="true"
                                                    :disabled="true" />
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
                                                <x-admin.select :name="'is_disabled'" :options="$status" :label="'Stato'"
                                                    :description="'Stato dell utente'" :check="old('role') ?? $user->is_disabled" :required="true"
                                                    :disabled="$user->id == Auth::user()->id ? true : false" />
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

                                        @if ($user->id != Auth::user()->id)
                                            <x-admin.ajax-del-button-link :url="'admin/user'" :resource="$user" />
                                        @endif

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
