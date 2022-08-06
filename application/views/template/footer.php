
<!-- [ Layout footer ] Start -->
<nav class="layout-footer footer bg-white">
    <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
        <div class="pt-3">
            <span class="footer-text font-weight-semibold">&copy; <a href="https://srthemesvilla.com" class="footer-link" target="_blank">Srthemesvilla</a></span>
        </div>
        <div>
            <a href="javascript:" class="footer-link pt-3">About Us</a>
            <a href="javascript:" class="footer-link pt-3 ml-4">Help</a>
            <a href="javascript:" class="footer-link pt-3 ml-4">Contact</a>
            <a href="javascript:" class="footer-link pt-3 ml-4">Terms &amp; Conditions</a>
        </div>
    </div>
</nav>
<!-- [ Layout footer ] End -->
</div>
<!-- [ Layout content ] Start -->
</div>
<!-- [ Layout container ] End -->
</div>
<!-- Overlay -->
<div class="layout-overlay layout-sidenav-toggle"></div>
</div>
<!-- [ Layout wrapper] End -->

<!-- Core scripts -->
<script src="<?=base_url('assets/template/')?>assets/js/pace.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/jquery-3.3.1.min.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/popper/popper.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/bootstrap.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/sidenav.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/layout-helpers.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/material-ripple.js"></script>

<!-- Libs -->
<script src="<?=base_url('assets/template/')?>assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/eve/eve.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/flot/flot.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/flot/curvedLines.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/chart-am4/core.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/chart-am4/charts.js"></script>
<script src="<?=base_url('assets/template/')?>assets/libs/chart-am4/animated.js"></script>

<!-- Demo -->
<script src="<?=base_url('assets/template/')?>assets/js/analytics.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/demo.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/pages/dashboards_index.js"></script>
<script src="<?=base_url('assets/template/')?>assets/js/pages/forms_input-groups.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script type="text/javascript">
  $(function() {
  $('.selectpicker').selectpicker();
});

</script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#tableuser').DataTable( {
        responsive: true
    } );

    new $.fn.dataTable.FixedHeader( table );
} );

  var myCarousel = document.querySelector('#myCarousel')
  var carousel = new bootstrap.Carousel(myCarousel)

</script>


<script>
    $('.form-check-input').on('click', function(){
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url : "<?=base_url('admin/changeAccess'); ?>",
            type : 'post',
            data : {
                menuId : menuId,
                roleId : roleId
            },
            success : function(){
                document.location.href = "<?=base_url('admin/roleAccess/'); ?>" + roleId;
            }
        });

    });

</script>

</body>

</html>