<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">
    HSRCC Information Management System
  </div>
  <strong> Copyright &copy; 2021 <script type="text/javascript">
      new Date().getFullYear() > 2020 && document.write(" - " + new Date().getFullYear());
    </script> <a href="<?php echo base_url('/'); ?>">Devision Engginer</a>.</strong> All rights reserved.
</footer>
</div>


<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>

<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</body>

</html>