@extends('spanel.layout')
@section('content')

<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">New admin</h3>
    </div>

    <div class="box-body">
        {!! Form::open() !!}
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Name">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Enter Email">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter password">
        <label>Admin roll</label>
        <select class="form-control" name="roll">
            <option value="1">Super Admin</option>
        </select>

    </div>

    <div class="box-footer">
        <input type="submit" value="Add" class="btn btn-primary" />
        <input type="reset" value="Clear" class="btn btn-default" />
    </div>
    {!! Form::close() !!}
</div>
<br>
<div class="box box-primary">
    <div class="box-header">
        <h3 class="box-title">Admins list</h3>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped table-hover text-center">
            <thead>
                <tr class="success">
                    <td>#</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Roll</td>
                    <td>Update</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>@if($admin->roll == 1)Super Admin @elseif($admin->roll == 2) Editor @else Receptionist @endif</td>
                    <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$admin->id}}">Update</button></td>
                    <td>{!! Form::open(['method'=>'delete','url'=>'en/spanel/admins/'.$admin->id]) !!}<input type="submit" value="Delete" class="btn btn-success" />{!! Form::close() !!}</td>
            <div class="modal fade" id="myModal{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Upate admin information</h4>
                        </div>

                        {!! Form::open(['url'=>'en/spanel/admins/'.$admin->id,'method'=>'patch']) !!}
                        <div class="modal-body">
                            <label>Name</label>
                            <input type="text" value="{{ $admin->name }}" class="form-control" name="name" placeholder="Enter Name">
                            <label>Email</label>
                            <input type="email" value="{{ $admin->email }}" class="form-control" name="email" placeholder="Enter Email">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                            <label>Admin roll</label>
                            <select class="form-control" name="roll">
                                <option value="1" @if($admin->roll==1)selected @endif>Super Admin</option>
                                <option value="2" @if($admin->roll==1)selected @endif>Editor</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" value="Save" class="btn btn-primary" />
                        </div>
                    </div>

                </div>
            </div>
            </tr>
            {!! Form::close() !!}
            @endforeach
            </tbody>
        </table>

    </div>
</div>

@stop