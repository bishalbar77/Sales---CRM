@extends('layout.master')

@section('content')
<style>
. typo-control {
  width: 100%;
  display: block;
  background-clip: padding-box;
  display: inline-block;
  width: auto; 
  vertical-align: middle;
  display: block;
    width: 100%;
    height: 2rem;
    padding: 0.875rem 1.375rem;
    font-size: 0.75rem;
    font-weight: 400;
    line-height: 1;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 2px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
</style>
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card" style="padding-left: 4rem !important;padding-right: 4rem !important;">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
          <h1 class="card-title" style="font-weight: 800;font-size: 18px;">Update Item Stocks</h1>
          </div>
          <div class="col-lg-6">
            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal">
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
<div class="d-flex flex-column-fluid">
  <div class=" container ">
  <!--begin::Card-->
    <div class="card">
    <!--begin::Form-->
      <form class="form" enctype="multipart/form-data" method="POST" action="/stock/store">
      @csrf
        <div class="card-body">
          <div class="form-group row">
            <div class="col-lg-4">
            <label>Item Name:</label>
            <select type="text" class="browser-default custom-select" id="name" name="item_id" autocomplete="name">
            <option value="">Select Item</option>
            @foreach($item as $items)
            <option value="{{ $items->id }}">{{ $items->name }}</option>
            @endforeach
            </select>
            <span class="form-text text-muted">&nbsp;</span>
            </div>

            <div class="col-lg-4">
            <label>Size</label>
            <div class="input-group input-group-solid">
            <select type="text" class="browser-default custom-select" id="name" name="size_id" autocomplete="name">
            <option value="">Select Size</option>
            @foreach($size as $items)
            <option value="{{ $items->id }}">{{ $items->name }}</option>
            @endforeach
            </select></div>
            </div>

            <div class="col-lg-4">
            <label>Quantity</label>
            <div class="input-group input-group-solid">
            <input id="qty" type="phone" class="form-control form-control-solid form-control " name="qty" required autocomplete style="height:2.2rem;">
            <span class="form-text text-muted"></span>
            </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-4">
              &nbsp;
            </div>
            <div class="col-lg-4">
              &nbsp;
            </div>
            <div class="col-lg-4">
              <button type="submit" class="btn btn-primary mr-2 float-right">Submit</button>
            </div>
          </div>
        <!--end::Form-->
        </div>
      </form>
    </div>
  </div>
</div>
@endsection