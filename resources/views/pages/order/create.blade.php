@extends('layout.master')

@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card" style="padding-left: 4rem !important;padding-right: 4rem !important;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
          <h1 class="card-title" style="font-weight: 800;font-size: 18px;">Add Order Details</h1>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#doorModal">
              Add New Door Type
            </button>
            <a class="p-2 float-right">&nbsp;</a>
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
        <div class="modal fade" id="doorModal" tabindex="-1" role="dialog" aria-labelledby="doorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form class="form" enctype="multipart/form-data" method="POST" action="/doorType/store">
                @csrf
                <div class="modal-header">
                  <h5 class="modal-title" id="doorModalLabel">Add New Door Type</h5>
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
  <div class="col-lg-12 grid-margin stretch-card" style="padding-left: 4rem !important;padding-right: 4rem !important;">
    <div class="card">
    <form method="post" action="/order/store" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
    <div class="form-group row">
    <div class="col-lg-4">
    <label>Customer:</label>
    <select  name="customer_id" class="browser-default custom-select" style="height:2.2rem;">
    <option value="">Select Customer</option>
        @foreach($customer as $doors)
        <option value="{{ $doors->id }}">{{ $doors->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="col-lg-4">
    <label>Date:</label>
    <input type="date" name="date" class="form-control"  placeholder="Date" style="height:2.2rem;">
    </div>
    <div class="col-lg-4">
    <label>Remark:</label>
    <input type="text" name="remark" class="form-control"  placeholder="Remark" style="height:2.2rem;">
    </div>
    </div>
    <table id="myTable" class="table">
          <tr>
            <th style="text-align: center;"> Door Type </th>
            <th style="text-align: center;"> Item </th>
            <th style="text-align: center;"> Size </th>
            <th style="text-align: center;"> Quantity </th>
            <th style="text-align: center;"> Design Number </th>
            <th style="text-align: center;"> Color </th>
          </tr>

          <tr class="unit-table">
            <td>
            <select type="text" class="browser-default custom-select" id="door_type_id" name="door_type_id">
                <option value="">Select Door</option>
                @foreach($door as $doors)
                <option value="{{ $doors->id }}">{{ $doors->name }}</option>
                @endforeach
            </select>
            </td>
            <td>
            <select type="text" class="browser-default custom-select" id="item_id" name="item_id">
                <option value="">Select Item</option>
                @foreach($item as $doors)
                <option value="{{ $doors->id }}">{{ $doors->name }}</option>
                @endforeach
            </select>
            </td>
            <td>
            <select type="text" class="browser-default custom-select" id="size_id" name="size_id">
                <option value="">Select Size</option>
                @foreach($size as $doors)
                <option value="{{ $doors->id }}">{{ $doors->name }}</option>
                @endforeach
            </select>
            </td>
            <td>
            <input id="qty" type="phone" class="form-control form-control-solid form-control " name="qty" required autocomplete style="height:2.2rem;">
            </td>
            <td>
            <input id="design_number" type="text" class="form-control form-control-solid form-control " name="design_number" required autocomplete style="height:2.2rem;">
            </td>
            <td>
            <input id="color" type="text" class="form-control form-control-solid form-control " name="color" required autocomplete style="height:2.2rem;">
            </td>
        </table>

    <div class="col-lg-8 pt-5">
    <input type="submit" class="btn btn-primary float-center" value="submit">
    </div>    
    </div>
    </form>
    </div>
  </div>
</div>
@endsection