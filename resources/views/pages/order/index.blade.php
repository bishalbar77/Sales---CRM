@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
          <h1 class="card-title" style="font-weight: 800;font-size: 18px;">Orders Management</h1>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
              Add New Door Type
            </button>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form" enctype="multipart/form-data" method="POST" action="/door/store">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Door Type</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-lg-12">
                        <label>Door Type:</label>
                        <input type="text" class="form-control" id="name" name="name" autocomplete="name">
                        <span class="form-text text-muted">&nbsp;</span>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped display" id="example" style="width:100%">
            <thead>
              <tr>
                <th style="text-align: center;">Order Number </th>
                <th style="text-align: center;">Date </th>
                <th style="text-align: center;">Door Type </th>
                <th style="text-align: center;">Item </th>
                <th style="text-align: center;">Size </th>
                <th style="text-align: center;">Quantity </th>
                <th style="text-align: center;">Status </th>
                <th style="text-align: center;">Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td style="text-align: center;"> {{ $user->Order->order_number }} </td>
                  <td style="text-align: center;"> {{ $user->added_on }} </td>
                  <td style="text-align: center;"> {{ $user->DoorType->name }} </td>
                  <td style="text-align: center;"> {{ $user->Item->name }} </td>
                  <td style="text-align: center;"> {{ $user->Size->name }} </td>
                  <td style="text-align: center;"> {{ $user->qty }} </td>
                  <td style="text-align: center;">
                    <button type="button" class="btn btn-success">{{ $user->status}}</button>
                  </td>
                  <td style="text-align: center;"> 
                    <a href="#" type="button" class="btn btn-icons btn-rounded btn-info">
                      <i class="mdi mdi-auto-fix"></i>
                    </a>
                    <a href="{{ route('order.delete', $user->id )}}" type="button" class="btn btn-icons btn-rounded btn-danger">
                      <i class="mdi mdi-delete"></i>
                    </a>
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