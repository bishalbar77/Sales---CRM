@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h1 class="card-title" style="font-weight: 800;font-size: 18px;">Staff Management</h1>
        <p class="card-description"> All the staffs are listed below. </p>
        <div class="table-responsive">
          <table class="table table-striped display" id="example" style="width:100%">
            <thead>
              <tr>
                <th> Photo </th>
                <th>&nbsp;&nbsp;&nbsp; Name </th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp; Email </th>
                <th>&nbsp;&nbsp; Phone </th>
                <th> Role </th>
                <th>&nbsp; Status </th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td class="py-1">
                    <img src="{{ url('assets/images/faces-clipart/pic-1.png') }}" alt="image" /> </td>
                  <td> {{ $user->name }} </td>
                  <td> {{ $user->email }} </td>
                  <td> {{ $user->phone }} </td>
                  <td> {{ $user->user_type }} </td>
                  <td>
                    @if( $user->is_active==1)
                    <button type="button" class="btn btn-success">Active</button>
                    @else
                    <button type="button" class="btn btn-danger">Disabled</button>
                    @endif
                  </td>
                  <td> 
                    <a href="#" type="button" class="btn btn-icons btn-rounded btn-success">
                      <i class="mdi mdi-eye"></i>
                    </a> 
                    <a href="#" type="button" class="btn btn-icons btn-rounded btn-info">
                      <i class="mdi mdi-auto-fix"></i>
                    </a> 
                    @if( $user->is_active==1)
                    <a href="{{ route('staff.changestatus', $user->id )}}" type="button" class="btn btn-icons btn-rounded btn-danger">
                      <i class="mdi mdi-delete"></i>
                    </a>
                    @else
                    <a href="{{ route('staff.changestatus', $user->id )}}" type="button" class="btn btn-icons btn-rounded btn-warning">
                      <i class="mdi mdi-undo-variant"></i>
                    </a>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection