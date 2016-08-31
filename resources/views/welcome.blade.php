<!DOCTYPE html>
@include('Default.head')

<body>
@include('Default.header')


  <section>
  
  @include('Default.leftpanel')



  <div class="mainpanel">

      <div class="contentpanel">

        <ol class="breadcrumb breadcrumb-quirk">
          <li><a href="index.html"><i class="fa fa-home mr5"></i> Dashboard</a></li>
          <li><a href="buttons.html">Notificações</a></li>
          <!--  <li class="active">Blank</li> -->
        </ol>

        <ul class="nav nav-tabs">
            <li class="active"><a href="#popular" data-toggle="tab" aria-expanded="false">Sem justificativa</a></li>
            <li class=""><a href="#recent" data-toggle="tab" aria-expanded="false">Pendentes de avaliação</a></li>
        </ul>

          <div class="tab-content mb20">
            <div class="tab-pane active" id="popular">
              
                <div class="panel">
                    <div class="panel-heading">
                      <p>Notificações que ainda dependem de uma justificativa da empresa notificada.</p>
                    

@foreach($Contextos as $Contexto)
  {{ $Contexto->no_contexto }} <br>
@endforeach
 
                    
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table id="dataTable1" class="table table-bordered table-striped-col">
                          <thead>
                            <tr>
                              <th>Nº</th>
                              <th>Ticket</th>
                              <th>Resumo</th>
                              <th>Data</th>
                              <th>Notificante</th>
                              <th>Notificado</th>
                              <th>Status</th>
                              <th>Prazo</th>
                              <th></th>

                            </tr>
                          </thead>
            
                          <tfoot>
                            <tr>
                              <th>Nº</th>
                              <th>Ticket</th>
                              <th>Resumo</th>
                              <th>Data</th>
                              <th>Notificante</th>
                              <th>Notificado</th>
                              <th>Status</th>
                              <th>Prazo</th>
                              <th></th>
                            </tr>
                          </tfoot>
            



                          <tbody>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td>Jusitifcar | Editar </td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>





                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  </div><!-- panel -->
            
           </div>
           
           
           
           
           
       <div class="tab-pane " id="recent">
              
                <div class="panel">
                    <div class="panel-heading">
                      <p>Notificações que ainda foram respondidas e necessitam de avaliação de um gestor responsável da Caixa.</p>
                    
                    
                    <div class="panel-body">
                      <div class="table-responsive">
                        <table id="dataTable2" class="table table-bordered table-striped-col">
                          <thead>
                            <tr>
                              <th>Nº</th>
                              <th>Ticket</th>
                              <th>Resumo</th>
                              <th>Data</th>
                              <th>Notificante</th>
                              <th>Notificado</th>
                              <th>Status</th>
                              <th>Prazo</th>
                              <th></th>

                            </tr>
                          </thead>
            
                          <tfoot>
                            <tr>
                              <th>Nº</th>
                              <th>Ticket</th>
                              <th>Resumo</th>
                              <th>Data</th>
                              <th>Notificante</th>
                              <th>Notificado</th>
                              <th>Status</th>
                              <th>Prazo</th>
                              <th></th>
                            </tr>
                          </tfoot>
            



                          <tbody>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td>Jusitifcar | Editar </td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>21451</td>
                              <td>WO00000154562</td>
                              <td>Atendimento fora do prazo</td>
                              <td>01/04/2016</td>
                              <td>CEPTIBRXXX</td>
                              <td>CEPTIBRXXX</td>
                              <td>Sem justificativa</td>
                              <td>Em atraso</td>
                              <td></td>
                            </tr>





                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  </div><!-- panel -->
            
           </div>
           
           
          </div>

      
      </div><!-- contentpanel -->
    </div><!-- mainpanel -->
</section>

@include('Default.endScripts')
<script>
$(document).ready(function(){

  $('#dataTable1').DataTable();
  $('#dataTable2').DataTable();

});
</script>

</body>
</html>
