

    <?php if(!empty($_SESSION['flash'])):?>
        <script>window.addEventListener('load', (event) => {toast('<?=$_SESSION['flash'];?>');});</script>
        <?=$_SESSION['flash']='';?>
    <?php endif;?>
    <!-- Jquery JS-->
    <script src="<?=$base;?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=$base;?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendoor JS       -->
    <script src="<?=$base;?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?=$base;?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=$base;?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=$base;?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$base;?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=$base;?>/assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?=$base;?>/assets/js/main.js"></script>

    <script src="<?=$base;?>/assets/tabela/DataTables/jQuery-3.6.0/jquery-3.6.0.min.js"></script>
    <script src="<?=$base;?>/assets/tabela/DataTables/datatables.min.js"></script>
    <script src="<?=$base;?>/assets/tabela/DataTables/KeyTable-2.7.0/js/keyTable.bootstrap5.min.js"></script>
    <script src="<?=$base;?>/assets/tabela/DataTables/Responsive-2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>

    <script src="<?=$base;?>/assets/ckeditor5/build/ckeditor.js"></script>
    <script>
    </script>

    <script src="<?=$base;?>/assets/tabela/tabelaGod.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            
    </script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/maskIahgod-2.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/tableIahgod-4.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/sweetalert.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/base.js"></script>

</body>

</html>
<!-- end document-->