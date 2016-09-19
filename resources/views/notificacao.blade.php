@include('Default.head')

<body>
@include('Default.header')


  <section>
  @include('Default.leftpanel')



    <div class="mainpanel">

      <div class="contentpanel">

        <!-- Breadcrump --> 
        <ol class="breadcrumb breadcrumb-quirk">
          <li><a href="index.html"><i class="fa fa-home mr5"></i> Dashboard</a></li>
          <li><a href="buttons.html">Notificações</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#popular" data-toggle="tab"
            aria-expanded="false">Notificações registradas</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

          <div class="tab-pane active" id="popular">
            <div class="panel">


         

              <div class="panel-heading">
                <p>Verifique as notificações registradas no sistema.</p>
                <div class="panel-body">
                @if (session('status'))
                      <div id="alerta" class="alert alert-success">
                          {{ session('status') }}
                      </div>
                @endif

                  <div class="table-responsive">
                    <table id="dataTable1" class="table table-bordered table-striped-col">
                      <thead>
                        <tr>
                          <th>Nº</th>
                          <th>DATA</th>
                          <th>CONTRATO</th>
                          <th>NOTIFICANTE</th>
                          <th>EQUIPE NOTIFICADA</th>
                          <th>STATUS</th>
                          <th>PRAZO</th>
                          <th>AÇÕES</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Nº</th>
                          <th>DATA</th>
                          <th>CONTRATO</th>                          
                          <th>NOTIFICANTE</th>
                          <th>EQUIPE NOTIFICADA</th>
                          <th>STATUS</th>
                          <th>PRAZO</th>
                          <th>AÇÕES</th>
                        </tr>
                      </tfoot>
                      <tbody>

                      @foreach ($Prepostos as $Preposto)
                        <tr>
                          <td>{{ $Preposto->ma_preposto }}</td>
                          <td>{{ $Preposto->no_preposto }}</td>
                          <td>{{ $Preposto->nu_contrato }}</td>
                          <td>{{ $Preposto->no_empresa }}</td>
                                                    

  
                          <td>
                            <a href="prepostos/editar/{{ $Preposto->id_preposto }}">Editar</a> 
                            | <a href="#">Ver noficações</a>
                            | <a data-href="prepostos/delete/{{ $Preposto->id_preposto }}" data-toggle="modal" data-target="#confirm-delete">Excluir</a>

                            
                          </td>
                        </tr>
                      @endforeach

                      
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div> <!-- panel-body --> 
              </div>
            </div> <!-- panel -->
          </div> <!-- Final do Primeiro panel (TAB:popular) --> 

         </div>





      </div> <!-- contentpanel -->
    </div> <!-- mainpanel -->
  </section>

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tem certeza que deseja excluir esse preposto? </h4>
            </div>
            <div class="modal-body">
                Caso você exclua esse preposto, ele não poderá mais responder as notificações.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Não, desejo cancelar</button>
                <a class="btn btn-danger btn-ok">Sim, tenho certeza</a>
            </div>
        </div>
    </div>
</div>


  @include('Default.endScripts')

<script>
$(document).ready(function(){

  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });

  $('.select2').select2();

    // Input Masks
  //$("#mapreposto").mask("c0000000");


  //$('#dataTable1').DataTable();

  $('#dataTable1').dataTable({                              
 "oLanguage": {
    "sProcessing": "Aguarde enquanto os dados são carregados ...",
    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
    "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
    "sInfoFiltered": "",
    "sSearch": "Procurar",
    "oPaginate": {
       "sFirst":    "Primeiro",
       "sPrevious": "Anterior",
       "sNext":     "Próximo",
       "sLast":     "Último"
    }
 } 
});

$( "#alerta" ).fadeOut(3200);



$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});



});   
</script>


</body>
<html></html>
