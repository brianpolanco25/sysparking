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
                            <h2 class="content-header-title float-left mb-0">Edición de roles</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Editar</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic multiple Column Form section start -->
                <section id="basic-vertical-layouts">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Datos de rol</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-vertical" method="post" action="{{ route('roles.update', $role)}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="first-name-vertical">Nombre</label>
                                                    <input type="text" id="first-name-vertical" class="form-control" name="name" value="{{ $role->name}}" >
                                                </div>

                                                <div class="form-group">
                                                    <h4 class="card-title">Permisos</h4>
                                                </div>

                                                @foreach ($permissions as $permission)
                                                        <div class="form-group">
                                                            <div class="custom-control custom-control-primary custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="colorCheck{{$permission->id}}" name="permissions[]" value = "{{ $permission->id, null }}"
                                                                    @if(in_array($permission->id, $id_permission) == true) checked @endif >

                                                                <label class="custom-control-label" for="colorCheck{{$permission->id}}">{{$permission->name}}</label>
                                                            </div>
                                                        </div>
                                                @endforeach

                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-float waves-light">Guardar</button>
                                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </section>
                <!-- Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection