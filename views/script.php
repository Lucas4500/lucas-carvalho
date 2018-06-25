<script type="text/javascript">
    var base_url = "<?= base_url() ?>";

    $(function(){
        $('#id_tipo').change(function(){
            $('#custo').attr('disabled', 'disabled');
            var id_tipo = $('#id_tipo').val();
            $.post(base_url+'index.php/custos/getCustos', {
                id_tipo : id_tipo
            }, function(data){
                $('#custo').html(data);
                $('#custo').removeAttr('disabled');
                $('#custo').attr('required', 'required');
            });
        });
    });

</script>