@extends('layout.master')
@section('title', 'Role Management')

@section('style')
    <style>
        .table td {
            white-space: nowrap !important;
        }

        .modal-content {
            display: none;
            position: absolute;
            background-color: white;
            margin: 10% auto;
            padding: 4px;
            border-radius: 8px;
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            font-family: "Inter", sans-serif;
            font-weight: 500;
            padding-bottom: 10px;
        }

        .NewCompany {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .model {
            border-radius: 20px;
            background-color: white;
            padding: 2rem;
            z-index: 2;
            width: 100%;
            max-width: 500px;
        }

        .model span {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }

        .permissions-group {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 15px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            padding: 10px 15px;
        }

        .permissions-list div {
            margin-bottom: 5px;
        }
    </style>
@endsection

@section('content')
@section('heading', 'Role Management')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="black tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <div class="container-fluid">
                <div class="product2 mt-4">
                    <div class="row justify-content-between align-items-center mb-3">
                        <div class="col-md-6">
                            <h6 class="font-weight-bold">Edit A Role</h6>
                        </div>
                    </div>
                    <section class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-12">
                                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}

                                    <input name="_method" type="hidden" value="PATCH">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                {!! Form::text('role_name', $role->name, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Permission:</strong>

                                                <div class="row ps-lg-4 gy-2">
                                                    @foreach ($permission as $value)
                                                        <div class="col-lg-4">

                                                            <div class="my-txt-box">
                                                                {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions), ['class' => 'form-check-input']) }}
                                                                <label class="my-label"> {{ $value->name }}</label>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
