


  
  <script type="text/javascript">
  $(document).ready(function(){
    $('#myModal').on('show.bs.modal', function (e) {
        var user = $(e.relatedTarget).data('user');
        var duelo = $(e.relatedTarget).data('duelo');
        $.ajax({
            type : 'post',
            url : '../votos/atualizar_votos.php', //Here you will fetch records 
            data :  'duelo='+duelo+'&user='+ user, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            $("#"+duelo).load(" #"+duelo);
            }
        });
        
     });
});
</script>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Voto</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>