       <!-- JAVASCRIPT -->
       <script src="{{ asset('admin_assets/libs/jquery/jquery.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/metismenu/metisMenu.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/simplebar/simplebar.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/node-waves/waves.min.js') }}"></script>

       <!-- apexcharts -->
       <script src="{{ asset('admin_assets/libs/apexcharts/apexcharts.min.js') }}"></script>

       <!-- jquery.vectormap map -->
       {{-- <script src="{{ asset('admin_assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/jsvectormap/maps/world-merc.js') }}"></script> --}}

       <!-- Required datatable js -->
   

       <!-- Responsive examples -->
       {{-- <script src="{{ asset('admin_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
       <script src="{{ asset('admin_assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
       --}}


       <!-- App js -->
       <script src="{{ asset('admin_assets/js/app.js') }}"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
       <!-- jay custom js -->
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <script src="{{asset('customjs_jay/custmtoster.js')}}"></script>
       <script src="{{asset('customjs_jay/statuschange.js')}}"></script>
       <!-- <script src="{{asset('custome_assets/js/delete.js')}}"></script> -->


       {{-- dynamic js --}}
       @stack('scripts')