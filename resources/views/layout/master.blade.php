<!DOCTYPE html>
<html>
<head>
  <title>Sales CRM - Asquare</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  {!! Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css') !!}
  {!! Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
  <!-- end plugin css -->

  @stack('plugin-styles')

  <!-- common css -->
  {!! Html::style('css/app.css') !!}
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">

  <div class="container-scroller" id="app">
    @include('layout.header')
    <div class="container-fluid page-body-wrapper">
      @include('layout.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        @include('layout.footer')
      </div>
    </div>
  </div>


  <script>
  function get_details(){
      var pincode=jQuery('#pincode').val();
      if(pincode==''){
          jQuery('#city').val('');
          jQuery('#state').val('');
          jQuery('#district').val('');
          jQuery('#country').val('');
          
      }else{
          jQuery.ajax({
              url:'get.php',
              type:'post',
              data:'pincode='+pincode,
              success:function(data){
                  if(data=='no'){
                      jQuery('#city').val('');
                      jQuery('#state').val('');
                      jQuery('#district').val('');
                      jQuery('#country').val('');
                  }else{
                      var getData=$.parseJSON(data);
                      jQuery('#city').val(getData.city);
                      jQuery('#state').val(getData.state);
                      jQuery('#district').val(getData.district);
                      jQuery('#country').val(getData.country);
                  }
              }
          });
      }
  }
  </script>
  
  <script>
  $("#select").change(function() {
    var option = $(this).find('option:selected');
    window.location.href = option.data("url");
  });
  </script>
  <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jautocalc.js"></script>
  <script src="../../js/script.js"></script>
  <!-- base js -->
  {!! Html::script('js/app.js') !!}
  {!! Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
  {!! Html::script('assets/js/off-canvas.js') !!}
  {!! Html::script('assets/js/hoverable-collapse.js') !!}
  {!! Html::script('assets/js/misc.js') !!}
  {!! Html::script('assets/js/settings.js') !!}
  {!! Html::script('assets/js/todolist.js') !!}
  <!-- end common js -->

  @stack('custom-scripts')
  <script>
    $(document).ready(function() {
        $('#example').DataTable( {} );
    } );
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
  
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.jqueryui.min.js"></script>
<script src="../../repeater.js" type="text/javascript"></script>
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
        });
    </script>
</body>
</html>