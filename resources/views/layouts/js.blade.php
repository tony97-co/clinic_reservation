  <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('../../assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('../../assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
             <script src="{{asset('../../dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('../../dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('../../dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
 
 
 
 <!-- Charts js Files -->
<script src="{{asset('../../assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('../../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('../../dist/js/pages/chart/chart-page-init.js')}}"></script>
    <!--  Tables -->
    <script src="{{asset('../../assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('../../assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('../../assets/extra-libs/DataTables/datatables.min.js')}}"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.esm.min.js" integrity="sha512-Rg0WJ+klqfdwwQgwQN06M6u2YevDPzvd8U85HKzSDCJUD1V5vE8xr7aH2d7fZqKgQTNunoXMA4W5Kn9ntP2osA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.esm.js" integrity="sha512-AkokDu8R9+LVbslO9+I//wXqyzwawAqooTvniMvXvPpy25mSY5k0hskzrGO7cMBPJ/9hW+8yBiDGtmsiIXS0+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.esm.min.js" integrity="sha512-Rg0WJ+klqfdwwQgwQN06M6u2YevDPzvd8U85HKzSDCJUD1V5vE8xr7aH2d7fZqKgQTNunoXMA4W5Kn9ntP2osA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.js" integrity="sha512-+POM1aKUkb5l91zDBDtxn0dlY5wazuQFtCXin/47Z+eE7AnMuFBMrNjkZA1P6m+infsMMSthlsPNh1rjBtAPBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/helpers.esm.min.js" integrity="sha512-m4VsSgMQ0Mw2iOS3ysNMINQNje3Q5c4AXeZXCVv60HjGMXy2iqZFo9c64itcXZ3ndsPOn5sOk4RgYWC1mBeEmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/helpers.esm.js" integrity="sha512-oRhPhd7fX61NWUaVpgrMzJjjJpah3tSHo+gIbnZC/Q+5Iuwyj6Q9kMipsBBkGmAS7aGnAQOl76X6PKha3bVaIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
      <script src="{{asset('../../assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
      <script src="{{asset('../../assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
 <script>
    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) { element.before(error); },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        }
    });


</script>

<script src="{{asset('../../js/sweetalert.min.js')}}"></script>
<script  src="{{mix('js/app.js')}}"></script>
    @livewireScripts