@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
          <h1 class="card-title" style="font-weight: 800;font-size: 18px;">All Stock Logs</h1>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#exampleModal">
              Add New Item
            </button>
            <a class="p-2 float-right">&nbsp;</a>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#sizeModal">
              Add New Size
            </button>
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form" enctype="multipart/form-data" method="POST" action="/item/store">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-lg-12">
                        <label>Item Name:</label>
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
        <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="sizeModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form" enctype="multipart/form-data" method="POST" action="/size/store">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Size</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                      <div class="form-group row">
                        <div class="col-lg-12">
                        <label>Size:</label>
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
                <th>Item Name </th>
                <th>Size </th>
                <th>Inward </th>
                <th>Outward </th>
                <th>Available </th>
                <th>Updated on </th>
                <th>Action </th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                <tr>
                  <td> {{ $user->Item->name }} </td>
                  <td> {{ $user->Size->name }} </td>
                  <td> {{ $user->inward ?? 'N/A' }} </td>
                  <td> {{ $user->outward ?? 'N/A' }} </td>
                  <td> {{ $user->available }} </td>
                  <td> {{ $user->updated_at }} </td>
                  <td>
                    <a href="{{ route('stock.delete', $user->id )}}" type="button" class="btn btn-icons btn-rounded btn-danger">
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