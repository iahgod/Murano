

<?php if(!empty($_SESSION['flash'])):?>
    <script>window.addEventListener('load', (event) => {toast('<?=$_SESSION['flash'];?>');});</script>
    <?=$_SESSION['flash']='';?>
<?php endif;?>

<!-- Jquery JS-->
<script src="<?=$base;?>/assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=$base;?>/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?=$base;?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=$base;?>/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?=$base;?>/assets/vendor/echarts/echarts.min.js"></script>
<script src="<?=$base;?>/assets/vendor/quill/quill.min.js"></script>
<script src="<?=$base;?>/assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?=$base;?>/assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?=$base;?>/assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?=$base;?>/assets/js/main.js"></script>
<script type="text/javascript" src="<?=$base;?>/assets/js/maskIahgod-2.js"></script>
<script type="text/javascript" src="<?=$base;?>/assets/js/tableIahgod-4.js"></script>
<script type="text/javascript" src="<?=$base;?>/assets/js/sweetalert.js"></script>
<script type="text/javascript" src="<?=$base;?>/assets/js/base.js"></script>
<script src="<?=$base;?>/assets/tabela/tabelaGod.js"></script>
<script src="<?=$base;?>/assets/ckeditor5/build/ckeditor.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=$base;?>/assets/tabela/DataTables/datatables.min.js"></script>
<script src="<?=$base;?>/assets/tabela/DataTables/KeyTable-2.7.0/js/keyTable.bootstrap5.min.js"></script>
<script src="<?=$base;?>/assets/tabela/DataTables/Responsive-2.3.0/js/responsive.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="<?=$base;?>/assets/js/base.js"></script>

</body>
</html>