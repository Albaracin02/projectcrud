@extends('app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        table {
            table-layout: fixed;
            width: 100%;
        }

        col:first-child {
            width: 30%;
        }

        col:nth-child(2) {
            width: 30%;
        }

        col:last-child {
            width: 25%;
        }
    </style>

    <div class="container mt-4">
        <h1 class="page-header text-center">Basic Attendance System</h1>

        <div class="row">
            <div class="col-md-12">
                <h3>Members Table</h3>
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                    data-bs-target="#addnew">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <colgroup>
                            <col>
                            <col>
                            <col>
                        </colgroup>
                        <thead class="table-dark">
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->firstname}}</td>
                                    <td>{{$member->lastname}}</td>
                                    <td class="text-end">
                                        <button type="button" class="btn btn-success action-button" data-bs-toggle="modal" data-bs-target="#edit{{$member->id}}">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger action-button" data-bs-toggle="modal" data-bs-target="#delete{{$member->id}}">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                        <button type="button" class="btn btn-primary attendance-button" onclick="markAttendance('{{$member->firstname}}', '{{$member->lastname}}')">
                                            <i class="fa fa-calendar-check-o"></i> Attendance
                                        </button>
                                        @include('action', ['member' => $member])
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Additional Design Elements -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Attendance Summary</h5>
                        <ul id="attendance-summary"></ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Event 1</li>
                            <li class="list-group-item">Event 2</li>
                            <li class="list-group-item">Event 3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function markAttendance(firstname, lastname) {
            const date = new Date().toDateString();
            const message = `${firstname} ${lastname} has attended on ${date}`;
            const li = document.createElement('li');
            li.innerText = message;
            document.getElementById('attendance-summary').appendChild(li);
        }
    </script>
@endsection
