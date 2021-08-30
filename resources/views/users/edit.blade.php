@extends('layouts.app')

@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Editar Usuarios</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Usuarios</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Editar</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Datos del usuario</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form"  method="post" action="{{ route('usuarios.update', $user->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nombre</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Nombre" name="name" value="{{ $user->name }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Email</label>
                                                    <input type="email" id="last-name-column" class="form-control" placeholder="fulanito@test.com" name="email" value="{{ $user->email }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Tipo de usuario</label>
                                                    <select class="form-control" name="type" id="type">
                                                        <option value="Administrador" @if($user->type == 'Administrador') {{ 'selected' }} @endif>Administrador</option>
                                                        <option value="Socio" @if($user->type == 'Socio') {{ 'selected' }} @endif>Socio</option>
                                                        <option value="Cliente" @if($user->type == 'Cliente') {{ 'selected' }} @endif>Cliente</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Estado</label>
                                                    <select class="form-control" name="status">
                                                        <option value=1 @if($user->status == 1) {{ 'selected' }} @endif>Activo</option>
                                                        <option value=0 @if($user->status == 0) {{ 'selected' }} @endif>Inactivo</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Hora de entrada</label>
                                                    <input type="time" id="company-column" class="form-control" name="entry_time" value="{{ $user->entry_time }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Hora de salida</label>
                                                    <input type="time" id="email-id-column" class="form-control" name="out_time" value="{{ $user->out_time }}" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Contraseña</label>
                                                    <input type="password" id="email-id-column" class="form-control" name="password" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Confirmación de contraseña</label>
                                                    <input type="password" id="email-id-column" class="form-control" name="password_confirmation"  />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Días de acceso</label>
                                                    <select class="form-control" id="normalMultiSelect" multiple="multiple" name="days[]">
                                                        <option value="Mon"	@if (in_array("Mon", $days)) {{ 'selected' }} @endif>Lunes</option>
                                                        <option value="Tue" @if (in_array("Tue", $days)) {{ 'selected' }} @endif>Martes</option>
                                                        <option value="Wed" @if (in_array("Wed", $days)) {{ 'selected' }} @endif>Miercoles</option>
                                                        <option value="Thu" @if (in_array("Thu", $days)) {{ 'selected' }} @endif>Jueves</option>
                                                        <option value="Fri" @if (in_array("Fri", $days)) {{ 'selected' }} @endif>Viernes</option>
                                                        <option value="Sat" @if (in_array("Sat", $days)) {{ 'selected' }} @endif>Sabado</option>
                                                        <option value="Sun" @if (in_array("Sun", $days)) {{ 'selected' }} @endif>Domingo</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Rol y permisos</label>
                                                    <select class="form-control" name="role" id="role">
                                                        <option value="">Seleccionar</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}" @if($user->getRoleNames()->first() == $role->name ) {{ 'selected' }} @endif>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">Guardar</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection