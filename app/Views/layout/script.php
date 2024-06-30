<!-- Optional JavaScript -->
<!-- jquery 3.3.1  -->
<script src="https://colorlib.com/polygon/concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<!-- bootstap bundle js -->
<script src="https://colorlib.com/polygon/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<!-- slimscroll js -->
<script src="https://colorlib.com/polygon/concept/assets/vendor/slimscroll/jquery.slimscroll.js"></script>

<script src="https://colorlib.com/polygon/concept/assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
<script src="https://colorlib.com/polygon/concept/assets/vendor/charts/charts-bundle/chartjs.js"></script>

<script src="https://colorlib.com/polygon/concept/assets/vendor/multi-select/js/jquery.multi-select.js"></script>

<script src="https://colorlib.com/polygon/concept/assets/vendor/parsley/parsley.js"></script>

<!-- main js -->
<script src="https://colorlib.com/polygon/concept/assets/libs/js/main-js.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://colorlib.com/polygon/concept/assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://colorlib.com/polygon/concept/assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
<script src="https://colorlib.com/polygon/concept/assets/vendor/datatables/js/data-table.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>


<script>
    /*document.getElementsByClassName('ckb').addEventListener('click', function (e) {
      document.getElementById('uji').disabled = !e.target.checked;
    });*/
    //berarti ini tetep ngga ada yang diubah?

    $('.ckb').click(function(e) {
        const val = $('input[name="ck[]"]:checked').length;

        if (val > 1) {
          $('#uji').attr('disabled', false);
        } else {
          $('#uji').attr('disabled', true);
        }
    });

    $('.btn-uji').click(function(e) {
        const id = $(this).data('id');
        const area = $(this).data('area');
        const majorAxis = $(this).data('majoraxis');
        const minorAxis = $(this).data('minoraxis');
        const eccentricity = $(this).data('eccentricity');
        const convexArea = $(this).data('convexarea');
        const extent = $(this).data('extent');
        const perimeter = $(this).data('perimeter');
 
        $('#form-modal-uji').attr('action', '<?= base_url('knn/uji'); ?>/'+id);
        $('#input-area').val(area);
        $('#input-majorAxis').val(majorAxis);
        $('#input-minorAxis').val(minorAxis);
        $('#input-eccentricity').val(eccentricity);
        $('#input-convexarea').val(convexArea);
        $('#input-extent').val(extent);
        $('#input-perimeter').val(perimeter);
    });

    $('.btn-add').click(function(e) {
        const list_id = $('input[name="ck[]"]:checked').map(function() {
          return $(this).val();
        }).get();
        $('#input-id').val(list_id.join(","));
    });
</script>

<script type="text/javascript">
	$(function () {

    $('#tb_data').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, 450, -1 ], [ 10, 50, 100, 200, 450, "All" ]],
      "searching": true,
      "ordering": true, // untuk filtering
      "info": true,
      "autoWidth": true,
      "responsive": true
    });

    $('#tb_distance').DataTable({
      "lengthChange": true,
      "ordering": true, // untuk filtering
      "autoWidth": true,
      "responsive": true,
      "order": [[8, 'asc']],
    });

    $('.tb_detail').DataTable({
      "paging": true,
      "lengthChange": true,
      "lengthMenu": [[ 10, 50, 100, 200, 500, -1 ], [ 10, 50, 100, 200, 500, "All" ]],
      "autoWidth": true,
      "order": [[7, 'asc']],
      "responsive": true,
    });
    
  });
</script>

<script>
    $('#form').parsley();
</script>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

