@extends('app')
 
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1 class="page-header text-center">Basic Attendance System </h1>
<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <h3>Members Table
            <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> </button>
        </h3>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-md-offset-1">
        <table class="table table-secondary table-responsive table-striped table-hover">
            <thead>
                <th>Fisrtname</th>
                <th>Lastname</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->firstname}}</td>
                        <td>{{$member->lastname}}</td>
                        <td>
                            <span type = "button" href="#edit{{$member->id}}" data-bs-toggle="modal" class = "text-success"><i class='fa fa-edit'></i> </span> 
                            <span type = "button" href="#delete{{$member->id}}" data-bs-toggle="modal" class = "text-danger" ><i class='fa fa-trash red'></i> </span>
                            @include('action')
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection