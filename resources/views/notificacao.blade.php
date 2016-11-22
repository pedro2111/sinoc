@include('Default.head')

<body>
@include('Default.header')


  <section>
  @include('Default.leftpanel')



    <div class="mainpanel">

      <div class="contentpanel">

        <!-- Breadcrump --> 
        <ol class="breadcrumb breadcrumb-quirk">
          <li><a href="#"><i class="fa fa-home mr5"></i> Dashboard</a></li>
          <li><a href="#">Notificações</a></li>
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
                          <th>EQUIPE NOTIFICADORA</th>
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
                          <th>EQUIPE NOTIFICADORA</th>
                          <th>STATUS</th>
                          <th>PRAZO</th>
                          <th>AÇÕES</th>
                        </tr>
                      </tfoot>
                      <tbody>

                      @foreach ($Notificacoes as $n)
                        <tr>
                          <td><a href="notificacao/ver/{{ Crypt::encrypt($n->id_notificacao) }}">{{ $n->nu_notificacao }}</a></td>
                          <td>{{ Carbon\Carbon::parse($n->created_at)->format('d/m/Y') }}</td>
                          <td>{{ $n->nu_contrato }}</td>
                          <td>{{ $n->ma_cadastro }}</td>

                         

                               @foreach ($Coordenacoes as $Coordenacao)
                                      @if ($n->id_notificadora === $Coordenacao->id_coordenacao)
                                        <td>{{ $Coordenacao->no_coordenacao }}</td>
                                      @endif
                              @endforeach


                           <td>
                           @if($n->bit_aceito == 4) 
                            Não acatado
                           @else 
                              @if($n->bit_aceito == 3)
                                Acatado
                              @else 
                                Aguardando
                              @endif  
                           @endif
                           
                           </td>


                          <td>{{ $n->dt_fim_justificativa }}</td>
                            
                          <td>
                            
                            
                            @if($n->dt_justificativa == NULL)
                              <a href="notificacao/justificar/{{ Crypt::encrypt($n->id_notificacao) }}">Justificar</a> |
                            @endif 
                            
                            @if($n->dt_naoacatado == NULL)
                              <a href="notificacao/avaliar/{{ Crypt::encrypt($n->id_notificacao) }}">Avaliar</a> |
                            @endif 

                            @if($n->dt_naoacatado != NULL)
                              <a href="notificacao/corrigir/{{ Crypt::encrypt($n->id_notificacao) }}">Corrigir</a> |
                            @endif 

                            <a href="notificacao/ver/{{ Crypt::encrypt($n->id_notificacao) }}">Informações</a>                            
                            
                            
                            

                           
                            <!--
                            # COLOCAR ESSAS FUNCIONALIDADES NA PROXIMA VERSÃO

                            | <a href="notificacao/acatamentoespecial/{{ $n->id_notificacao }}">Acatamento especial</a>
                            | <a href="notificacao/historico/{{ $n->id_notificacao }}">Histórico</a>
                            --> 

                            
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
