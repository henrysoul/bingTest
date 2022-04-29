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
                            <tr>
                                <td class="mr-0 pr-0">

                                </td>
                                <td class="d-flex">
                                    <div class="mr-2">
                                        <img src="{{asset('assets/image/4.png')}}" class="rounded-circle" width="35"
                                            alt="">
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="fw-bold mb-0">Anderson Praise</h6>
                                        <small class="text-muted">anderson@gmail.com</small>
                                    </div>

                                </td>
                                <td>
                                    <span class="badge bg-light text-muted py-2 px-4 rounded-3">Employee</span>
                                </td>
                                <td>24 Oct, 2017</td>
                                <td>CEO and Founder</td>
                                <td>
                                    <button class="btn">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <button class="btn">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
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
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Employee ID *">
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="First Name *">
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Last Name *">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="email" class="form-control" placeholder="Email ID *">
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Mobile No">
                        </div>
                        <div class="col mb-3">
                            <select class="form-control">
                                <option>Select Role Type</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <input type="email" class="form-control" placeholder="Username *">
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Password*">
                        </div>
                        <div class="col mb-3">
                            <input type="text" class="form-control" placeholder="Confirm Password*">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                                <tr class="bg-light text-muted">
                                    <th class="py-4 ps-4" colspan="3">Module permission</th>
                                    <th class="py-4">Read</th>
                                    <th class="py-4">Write</th>
                                    <th class="py-4">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- row -->
                                <tr>
                                    <td class="ps-4">
                                        Super Admin
                                    </td>
                                    <td class="p-auto">
                                        <input type="checkbox" />
                                    </td>
                                    <td class="p-auto">
                                        <input type="checkbox" />
                                    </td>
                                    <td class="p-auto">
                                        <input type="checkbox" />
                                    </td>

                                </tr>
                                <!-- end of row -->
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color:#0d6efd">Add
                    user</button>
                <button type="button" class="btn" style="background-color:transparent"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{--End Add user modal --}}
@stop