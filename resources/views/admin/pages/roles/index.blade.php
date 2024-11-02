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
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content2 {
            display: none;
            position: absolute;
            background-color: white;
            margin: 7% auto;
            padding: 16px;
            width: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            font-family: "Inter", sans-serif;
            font-weight: 500;
            align-items: center;
            padding-bottom: 5px;
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
            width: 400px;
            padding: 1.5rem 1.2rem;
            z-index: 2;
        }


        .model span {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
        }


        .model p {
            margin-top: none;
            margin-bottom: 0;
            color: #8b8d97;
            padding: 6px 0;
            font-size: 13px;
            font-family: "Inter", sans-serif;
            font-weight: 500;
        }
    </style>


@endsection
@section('content')



@section('heading', 'Role Management')
<div id="dynamic-content">
    <div class="tab-content" id="myTabContent">
        <div class="black tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="customers-tab">
            <div class="container-fluid">
                @can('create role management')
                    <div class="Width d-flex justify-content-between align-items-center">
                        <span class="my-2 ml-2"></span>
                        <a href="{{ route('roles.create') }}" class="order-btn d-flex align-items-center">
                            <i class="fa-solid fa-plus mr-1"></i>
                            create a New Role
                        </a>
                    </div>
                @endcan
                <div class="product2 mt-4">
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <h6>Roles</h6>
                        </div>



                    </div>

                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>

                                    <th class="" scope="col">
                                        No <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>
                                    <th class="" scope="col">
                                        Role Name <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>
                                    <th class="" scope="col">
                                        Action <img src="{{ asset('assets/admin/images/svg/sort.svg') }} " />
                                    </th>

                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @forelse ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($role->name) }}</td>

                                        <td>



                                            {{-- <a href="{{ route('roles.edit', $role->id) }}" class="me-2"> <i
                                                    class="fas fa-eye"></i> </a> --}}
                                            <a href="{{ route('roles.edit', $role->id) }}" class="me-2"> <i
                                                    class="fas fa-edit"></i> </a>

                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                                style="display:inline">
                                                @method('DELETE')
                                                @csrf

                                                <button onclick="return confirm('Are you sure?')" type="submit"
                                                    style="color: red;" class=" "><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                        {!! $roles->links() !!}


                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

<div class="NewCompany" id="newRoleModal1">
    <div class="model">
        <div class="modal-header">
            <h5>Create New Role</h5>
            <button type="button" onclick="closeModal()"
                style="border: none; background: transparent;">&times;</button>
        </div>
        <form id="createRoleForm" action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <label for="role_name">Role Name:</label>
                <input type="text" name="role_name" id="role_name" class="form-control mb-3" required>

                <label>Permissions:</label>
                <div class="permissions-list">
                    @php
                        // Group permissions by action type
                        $groupedPermissions = [
                            'read' => $permissions->filter(fn($perm) => str_starts_with($perm->name, 'read')),
                            'write' => $permissions->filter(fn($perm) => str_starts_with($perm->name, 'write')),
                            'create' => $permissions->filter(fn($perm) => str_starts_with($perm->name, 'create')),
                            'edit' => $permissions->filter(fn($perm) => str_starts_with($perm->name, 'edit')),
                        ];
                    @endphp

                    @foreach ($groupedPermissions as $action => $perms)
                        <div class="permissions-group">
                            <strong>{{ ucfirst($action) }} Permissions:</strong>
                            @foreach ($perms as $perm)
                                <div>
                                    <input type="checkbox" name="permissions[]" value="{{ $perm->id }}"
                                        id="permission-{{ $perm->id }}">
                                    <label for="permission-{{ $perm->id }}">{{ ucfirst($perm->name) }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Role</button>
                <button type="button" onclick="closeModal()" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    document.getElementById('addCompanyBtn').addEventListener('click', function() {
        document.getElementById('newRoleModal').style.display = 'flex';
    });

    function closeModal() {
        document.getElementById('newRoleModal').style.display = 'none';
    }
</script>


@endsection
