


<!-- Bootstrap js-->
<script src="{{ asset('backend/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/js/bootstrap.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('backend/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('backend/js/icons/feather-icon/feather-icon.js') }}"></script>

<!-- Datatables js-->
<script src="{{ asset('backend/js/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/js/datatables/custom-basic.js') }}"></script>

<!-- Sidebar jquery-->
<script src="{{ asset('backend/js/sidebar-menu.js') }}"></script>

<!--chartist js-->
<script src="{{ asset('backend/js/chart/chartist/chartist.js') }}"></script>

<!--ck editor-->
<script src="{{ asset('backend/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('backend/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('backend/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('backend/js/editor/ckeditor/ckeditor.custom.js') }}"></script>

 <!-- jquery-validation -->
    <script src="{{ asset('backend/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/jquery-validation/additional-methods.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('backend/js/lazysizes.min.js') }}"></script>

<!--copycode js-->
<script src="{{ asset('backend/js/prism/prism.min.js') }}"></script>
<script src="{{ asset('backend/js/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('backend/js/custom-card/custom-card.js') }}"></script>

<!--counter js-->
<script src="{{ asset('backend/js/counter/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('backend/js/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('backend/js/counter/counter-custom.js') }}"></script>

<!--Customizer admin-->
<script src="{{ asset('backend/js/admin-customizer.js') }}"></script>

<!--map js-->
<script src="{{ asset('backend/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('backend/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

<!--apex chart js-->
<script src="{{ asset('backend/js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('backend/js/chart/apex-chart/stock-prices.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('backend/js/chart/flot-chart/excanvas.js') }}"></script>
<script src="{{ asset('backend/js/chart/flot-chart/jquery.flot.js') }}"></script>
<script src="{{ asset('backend/js/chart/flot-chart/jquery.flot.time.js') }}"></script>
<script src="{{ asset('backend/js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('backend/js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('backend/js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
<!--dashboard custom js-->
<script src="{{ asset('backend/js/dashboard/default.js') }}"></script>

<!--right sidebar js-->
<script src="{{ asset('backend/js/chat-menu.js') }}"></script>

<!--height equal js-->
<script src="{{ asset('backend/js/equal-height.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('backend/js/lazysizes.min.js') }}"></script>

<!--script admin-->
<script src="{{ asset('backend/js/admin-script.js') }}"></script>

<!-- Sweet alert script For Delete Using Ajax -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#delete', function() {
            var actionTo = $(this).attr('href');
            var token = $(this).attr('data-token');
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: actionTo,
                            type: 'post',
                            data: {
                                id: id,
                                _token: token
                            },
                            success: function(data) {
                                swal({
                                        title: "Deleted",
                                        type: "success"
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                        }
                                    });
                            }
                        });
                    } else {
                        swal("cancelled", "", "error");
                    }

                });
            return false;
        });
    });
</script>
<!-- Sweet alert script For Delete Using Ajax -->

<!-- Sweet alert script For Approve Using Ajax -->
<script>
    $(document).ready(function() {
        $(document).on('click', '#approveBtn', function() {
            var actionTo = $(this).attr('href');
            var token = $(this).attr('data-token');
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No",
                    closeOnConfirm: false,
                    closeOnCancel: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: actionTo,
                            type: 'post',
                            data: {
                                id: id,
                                _token: token
                            },
                            success: function(data) {
                                swal({
                                        title: "Approve",
                                        type: "success"
                                    },
                                    function(isConfirm) {
                                        if (isConfirm) {
                                            $('.' + id).fadeOut();
                                        }
                                    });
                            }
                        });
                    } else {
                        swal("Cancelled", "", "error");
                    }

                });
            return false;
        });
    });
</script>
<!-- Sweet alert script For Approve Using Ajax -->


