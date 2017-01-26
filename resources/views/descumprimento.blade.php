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
          <li><a href="#">Descumprimento contratual</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#popular" data-toggle="tab"
            aria-expanded="false">Descumprimentos contratuais registrados</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

          <div class="tab-pane active" id="popular">
            <div class="panel">


         

              <div class="panel-heading">
                <p>Verifique os descumprimentos registrados no sistema.</p>
                <div class="panel-body">
                @if (session('status'))
                      <div id="alerta" class="alert alert-{{ session('tipo') }}">
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
                          <th>TÍTULO</th>
                          <th>STATUS</th>
                          <th>AÇÕES</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Nº</th>
                          <th>DATA</th>
                          <th>CONTRATO</th>                          
                          <th>NOTIFICANTE</th>
                          <th>TÍTULO</th>
                          <th>STATUS</th>
                          <th>AÇÕES</th>
                        </tr>
                      </tfoot>
                      <tbody>

                      @foreach ($Descumprimento as $n)
                        <tr>
                          <td><a href="descumprimento/ver/{{ Crypt::encrypt($n->id_descumprimento) }}">{{ $n->nu_descumprimento }}</a></td>
                          <td>{{ Carbon\Carbon::parse($n->created_at)->format('d/m/Y') }}</td>
                          <td>{{ $n->nu_contrato }}</td>
                          <td>{{ $n->ma_cadastro }}</td>
 						  <td>{{ $n->ds_titulo }}</td>
                          <td>
                          
                           @if($n->status == 1) 
                            Aguardando análise
                           @else 
                              @if($n->status == 2)
                                Avaliação realizada
                              @else 
                                Aguardando
                              @endif  
                           @endif
                          
                          
                          </td>
                          <td>
                          
                          			<!--  Verifica se a pessoa é preposto -->
							@if(Session::get('isrh') == 1)
	                            @if($n->dt_avaliacao == NULL)
									<a href="descumprimento/avaliar/{{ Crypt::encrypt($n->id_descumprimento) }}">Avaliar</a> |     	                          
        	                    @endif 
							@endif
                            
                            
                          <a href="descumprimento/ver/{{ Crypt::encrypt($n->id_descumprimento) }}">+Informações</a>
                          
                          
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
	 "order": [[ 0, "desc" ]],
	 "pageLength": 25,                            
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

$( "#alerta" ).fadeOut(6200);



$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});



});   
</script>


</body>
<html></html>
