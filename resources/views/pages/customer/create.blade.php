@extends('layout.master')

@section('content')
<div class="d-flex flex-column-fluid">
  <div class=" container ">
  <!--begin::Card-->
  <div class="card">
    <div class="card-header">
      <br>
      <h1 class="card-title" style="font-weight: 800;font-size: 18px;">Add New Customer</h1>
    </div>
    <!--begin::Form-->
      <form class="form" enctype="multipart/form-data" method="POST" action="/customer/store">
      @csrf
        <div class="card-body">
          <div class="form-group row">
            <div class="col-lg-4">
            <label>Name:</label>
            <input type="text" class="form-control form-control-solid " id="name" name="name" autocomplete="name">
            <span class="form-text text-muted">&nbsp;</span>
            </div>

            <div class="col-lg-4">
            <label>Contact Phone</label>
            <div class="input-group input-group-solid">
            <input id="phone" type="number" class="form-control form-control-solid " name="phone" required="" autocomplete="phone" autofocus="">
            </div>
            </div>

            <div class="col-lg-4">
            <label>Email Address</label>
            <div class="input-group input-group-solid">
            <input id="email" type="email" class="form-control form-control-solid form-control " name="email" value="" required="" autocomplete="email">
            <span class="form-text text-muted"></span>
            </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-4">
            <label>Registration Type</label>
            <br>
            <input type="radio" name="gst_type" checked="checked"> Registered
            <a class="p-5"></a>
            <input type="radio" onchange="hideA(this)" value="Unregistered" name="gst_type"> Unregistered
            </div>
            <div id="A" class="col-lg-4">
            <label>Type of GST</label>
            <br>
            <input type="radio" value="Regular" name="gst_type"> Regular
            <a class="p-5"></a>
            <input type="radio" value="Composition" name="gst_type"> Composition
            </div>
            <div class="col-lg-4">
            <label>PAN/GST-NUMBER:</label>
            <input type="text" class="form-control" id="gst" name="gst" placeholder="PAN/GST-NUMBER" />	
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-4">
            <label>Address:</label>
            <div class="input-group">
            <input type="text" id="add" class="form-control form-control-solid" name="address" autocomplete="add" autofocus="">
            </div>
            <span class="form-text text-muted">&nbsp;</span>
            </div>
            <div class="col-lg-3">
            <label>Post/Pincode</label>
            <input id="pincode" type="text" class="form-control form-control-solid " name="pincode" required="" autocomplete="pincode" autofocus="">
            <span class="form-text text-muted"></span>

            </div>

            <div class="col-lg-1">
            <label>&nbsp;</label>
            <button type="button" class="btn btn-success form-control form-control-solid" value="Auto" onclick="get_details()">
            <i class="mdi mdi-search-web"></i>
            </button>
            </div>

            <div class="col-lg-4">
            <label>District:</label>
            <input class="form-control form-control-solid" name="district" required="" autocomplete="district" autofocus="" id="district">

            <span class="form-text text-muted">&nbsp;</span>
            </div>

            <div class="col-lg-4">
            <label>City</label>
            <input id="city" type="text" class="textbox form-control form-control-solid " name="city" required="" autocomplete="city" autofocus="">
            </div>

            <div class="col-lg-4">
            <label>State</label>
            <input id="state" type="text" class="form-control form-control-solid " name="state" required="" autocomplete="state" autofocus="">
            <span class="form-text text-muted">&nbsp;</span>
            </div>
            <div class="col-lg-4">
            <label>Country</label>
            <input id="country" type="text" class="form-control form-control-solid " name="country" required="" autocomplete="country" autofocus="">
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
              </div>
              </div>
          </div>

        <!--end::Form-->
        </div>
      </form>
    </div>
  </div>
</div>
@endsection