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
                            <h2 class="content-header-title float-left mb-0">Lista de usuarios</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <!-- users filter start -->
                    {{-- <div class="card">
                        <h5 class="card-header">Search Filter</h5>
                        <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div> --}}
                    <!-- users filter end -->
                    <!-- list section start -->
                    <div class="card">

                        <div class="d-flex justify-content-between align-items-center header-actions mx-1 row mt-75">
                            <div class="col-lg-12 col-xl-6">
                                {{-- <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select form-control">
                                        <option value="10">10</option>
                                        <option value="25">25</option><option value="50">50</option>
                                        <option value="100">100</option>
                                        </select> entries
                                    </label>
                                </div> --}}
                            </div>
                            
                            <div class="col-lg-12 col-xl-6 pl-xl-75 pl-0">
                                <div class="dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-1">
                                    <div class="mr-1">
                                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                            <label>Search:<input type="search" class="form-control" placeholder="" aria-controls="DataTables_Table_0">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="dt-buttons btn-group flex-wrap">
                                        
                                        <a href="{{ route('usuarios.create') }}" class="btn add-new btn-primary mt-50" tabindex="0" aria-controls="DataTables_Table_0" type="button" >
                                            <span>Crear nuevo</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="user-list-table table table-hover ">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody >
                                    
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    
                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        @if ($user->status == 1)
                                            <td>
                                                <div class="badge badge-pill badge-light-success">Activo</div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="badge badge-pill badge-light-danger">Inactivo</div>
                                            </td>
                                        @endif

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>   
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('usuarios.edit', $user->id) }}" >
                                                        <i data-feather="edit-2" class="mr-50"></i>
                                                        <span>Editar</span>
                                                    </a>

                                                    <form method="POST" id="my_form" action="{{route('usuarios.destroy', $user)}}">
                                                        @csrf 
                                                        @method('DELETE')
                                                        <a class="dropdown-item" href="#" onclick="document.getElementById('my_form').submit(); return false;">
                                                            <i data-feather="trash" class="mr-50"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </form>
                                                    
                                                </div>
                                            </div>

                                        </td>

                                        <form method="POST" id="my_form" action="{{route('socios.destroy', $user)}}">
                                            @csrf 
                                            @method('DELETE')
                                        </form>
                                    </tr>

                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <!-- list section end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection





