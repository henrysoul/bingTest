@extends('layouts.app')
@section('content')

<div class="container">
    <a href="#" class="btn btn-success float-end" type="button" data-bs-toggle="modal" data-bs-target="#addUser">Add
        User</a>
</div>

<div class="pt-5">
    <div class="container">


        <div class="card">
            <div class="card-body px-0">
                <div class="row px-3 mb-3 g-2 justify-content-between align-items-center">
                    <div class="col-auto">
                        <h6 class="fw-bold">List Users</h6>
                    </div>
                    <div class="col-auto">
                        <div class="input-group">
                            <input type="text" placeholder="Search..." class="form-control border-end-0">
                            <span class="input-group-text rounded-end bg-white"><i
                                    class="fas fa-search text-muted"></i></span>
                        </div>
                    </div>
                </div>
                @include('partials.alerts')

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr class="bg-light text-muted">
                                <th class="py-4 ps-4" colspan="3">Name</th>
                                <th class="py-4">Create Date</th>
                                <th class="py-4">Role</th>
                                <th class="py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row -->
                            @foreach ($employees as $emp)
                            <tr>

                                <td class="mr-0 pr-0">

                                </td>
                                <td class="d-flex">
                                    <div class="mr-2">
                                        <img src="{{asset('assets/image/4.png')}}" class="rounded-circle" width="35"
                                            alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="fw-bold mb-0">{{$emp->first_name .' '.$emp->last_name}}</h6>
                                        <small class="text-muted">{{$emp->user->email}}</small>
                                    </div>

                                </td>
                                <td>
                                    @php
                                    // default bg is employee
                                    $bg = "bg-light text-muted";
                                    if($emp->role_id ==1){
                                    $bg ="bg-primary";
                                    }elseif($emp->role_id ==2){
                                    $bg ="bg-danger";
                                    }elseif($emp->role_id ==4){
                                    $bg ="bg-success";
                                    }
                                    @endphp
                                    <span class="badge {{$bg}}  py-2 px-4 rounded-3">{{$emp->role->name}}</span>
                                </td>
                                <td>{{$emp->created_at}}</td>
                                <td>{{$emp->employee_id}}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editUser{{$emp->id}}">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <a href="{{ url('delete_employee', [$emp->uuid]) }} "
                                        onclick="return confirm('Are you sure?')" class="btn">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                                {{-- Edit user modal --}}
                                <div class="modal fade" id="editUser{{$emp->id}}" tabindex="-1"
                                    aria-labelledby="addUser" aria-hidden="true">
                                    <div class="modal-dialog modal-xl ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @include('partials.alerts')
                                                <form method="post" action={{url('update_emloyee')}} autocomplete="off">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Employee ID *"
                                                            value="{{old('employee_id') ?old('employee_id'):$emp->employee_id}}"
                                                            name="employee_id" required>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="First Name *"
                                                                value="{{old('first_name')?old('first_name'):$emp->first_name}}"
                                                                name="first_name" required>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Last Name *"
                                                                value="{{old('last_name') ?old('last_name') :$emp->last_name}}"
                                                                name="last_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email ID *" name="email"
                                                                value="{{old('email') ?old('email'):$emp->email}}"
                                                                required>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <input type="text" class="form-control"
                                                                placeholder="Mobile No"
                                                                value="{{old('phone')?old('phone'):$emp->phone}}"
                                                                name="phone">
                                                        </div>
                                                        <div class="col mb-3">
                                                            <select class="form-control" name="role_type"
                                                                value="{{old('role_type')}}" required
                                                                id="roleEditSelect">
                                                                <option>Select Role Type</option>
                                                                @foreach($roles as $role)
                                                                <option value={{$role->id}}>{{$role->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <input type="text" class="form-control" autocomplete="off"
                                                                placeholder="Username *" value="{{old('username')}}"
                                                                name="username" required>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <input type="password" class="form-control"
                                                                autocomplete="off" placeholder="Password*"
                                                                name="password" required>
                                                        </div>
                                                        <div class="col mb-3">
                                                            <input type="password" class="form-control"
                                                                placeholder="Confirm Password*"
                                                                name="password_confirmation" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-4"><span
                                                                id="roleTypeEdit">{{$emp->role->name}}</span> Role</div>
                                                        @foreach($permissions as $perm)
                                                        @php
                                                        foreach( $emp->user->permissions as $p){
                                                        $checked = false;
                                                        if($p->id == $perm->id){
                                                        $checked = true;
                                                        }
                                                        }
                                                        @endphp
                                                        <div class="col mb-4"><label> <input class="m-2" type="checkbox"
                                                                    name="permissions" value={{$perm->id}}
                                                                checked={{$checked}} />Can
                                                                {{$perm->name}}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Add
                                                    user</button>
                                                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{--End Edit user modal --}}
                            </tr>


                            @endforeach
                            <!-- end of row -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Add user modal --}}
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUser" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @include('partials.alerts')
                <form method="post" action={{url('add_emloyee')}} autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Employee ID *"
                            value="{{old('employee_id')}}" name="employee_id" required>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="First Name *"
                                value="{{old('first_name')}}" name="first_name" required>
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Last Name *"
                                value="{{old('last_name')}}" name="last_name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="email" class="form-control" placeholder="Email ID *" name="email"
                                value="{{old('email')}}" required>
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Mobile No" value="{{old('phone')}}"
                                name="phone">
                        </div>
                        <div class="col mb-3">
                            <select class="form-control" name="role_type" value="{{old('role_type')}}" required
                                id="role">
                                <option>Select Role Type</option>
                                @foreach($roles as $role)
                                <option value={{$role->id}}>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Username *"
                                value="{{old('username')}}" name="username" required>
                        </div>
                        <div class="col mb-3">
                            <input type="password" class="form-control" autocomplete="off" placeholder="Password*"
                                name="password" required>
                        </div>
                        <div class="col mb-3">
                            <input type="password" class="form-control" placeholder="Confirm Password*"
                                name="password_confirmation" required>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="bg-light text-muted">
                                    <th class="py-4 ps-4">Module permission</th>
                                    <th class="py-4">Read</th>
                                    <th class="py-4">Write</th>
                                    <th class="py-4">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <tr class="d-none" id="permissions">
                                    <td class="ps-4" id="roleTitle">
                                        Super Admin
                                    </td>
                                    @foreach($permissions as $perm)
                                    <td>
                                        <input type="checkbox" name="permissions" value={{$perm->id}} />
                                    </td>
                                    @endforeach
                                </tr>

                                <!-- end of row -->
                            </tbody>
                        </table>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add
                    user</button>
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{--End Add user modal --}}
@stop

@section('script')
<script type="text/javascript">
    let roles = document.querySelector('#role');
    let rolesEdit = document.querySelector('#roleEditSelect');
    let selectedRole="";
    roles.addEventListener('change',(e)=>{
        selectedRole =  roles.options[roles.selectedIndex].text;
        if(selectedRole){
            console.log("ing")
            document.querySelector('#permissions').classList.remove('d-none');
            document.querySelector('#roleTitle').innerHTML=selectedRole;

        }
    });

    rolesEdit.addEventListener('change',(e)=>{
        let selected =  roles.options[rolesEdit.selectedIndex].text;
        if(selected){
            document.querySelector('#roleTypeEdit').innerHTML=selected;
        }
    });
    
</script>
@stop