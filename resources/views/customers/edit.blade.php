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
                            <h2 class="content-header-title float-left mb-0">Editar cliente</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Clientes</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Editar</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Editar cliente</a>
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
                                    <h4 class="card-title">Datos del cliente</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form"  method="post" action="{{ route('clientes.update', $customer->id) }}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Nombre</label>
                                                    <input type="text" id="first-name-column" class="form-control" placeholder="Nombre" name="name" value="{{ old('name', $customer->name ?? '' ) }}"  / >
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Apellido</label>
                                                    <input type="text" id="last-name-column" class="form-control" placeholder="Apellido" name="last_name" value="{{ old('last_name', $customer->last_name ?? '' ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Cédula</label>
                                                    <input type="text" id="city-column" class="form-control" placeholder="cedula" name="document" value="{{ old('document', $customer->document ?? '' ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="country-floating">Dirección</label>
                                                    <input type="text" id="country-floating" class="form-control" name="address" placeholder="" value="{{ old('address', $customer->address ?? '' ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="company-column">Email</label>
                                                    <input type="text" id="company-column" class="form-control" name="email" placeholder="name@example.com" value="{{ old('email', $customer->email ?? '' ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Teléfono</label>
                                                    <input type="text" id="email-id-column" class="form-control" name="phone" placeholder="(809)000-0000"  value="{{ old('phone', $customer->phone ?? '' ) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Monto de inversión</label>
                                                    <input type="text" id="email-id-column" class="form-control" name="investment_mount" placeholder="00.0" value="{{ old('investment_mount', $customer->investment_mount ?? '' ) }}" />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="email-id-column">Tasa de interés</label>
                                                    <input type="text" id="email-id-column" class="form-control" name="rate" placeholder="00.0" value="{{ old('rate', $customer->rate ?? '' ) }}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="city-column">Usuario asociado</label>
                                                    <select class="form-control" name="user_id" id="type">
                                                        <option value=0>Seleccionar</option>
                                                        @foreach ($users as $user)
                                                            <option value={{ $user->id }} value='{{ $user->id }}' @if ($customer->users()->first()->id == $user->id  ) {{ 'selected' }} @endif>{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary mr-1">Actualizar</button>
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