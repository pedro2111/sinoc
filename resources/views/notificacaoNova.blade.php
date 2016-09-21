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
          <li><a href="buttons.html">Notificação</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Nova notificação</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

        <div class="tab-pane active" id="recent">
          <div class="row">
            <div class="col-md-10">
              <div class="panel">
                <div class="panel-heading nopaddingbottom">
                      <h4 class="panel-title">Preencha corretamente o formulário abaixo</h4>
                </div>
                <br>
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("notificacao/incluir/")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="error"></div>


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação Notificadora <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_notificadora" name="id_notificadora" style="width: 100%" data-placeholder="Selecione a coordenação notificadora" title="Você precisa selecionar a coordenação notificadora" required>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação impactada </label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_impactada" name="id_impactada" style="width: 100%" data-placeholder="Selecione a coordenação impactada">
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->
          
                      <hr>
                        <div class="form-group">
                        <label class="col-sm-3 control-label">Contrato <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_contrato" name="id_contrato" style="width: 100%" data-placeholder="Selecione o contrato" title="Você precisa selecionar um contrato" required>
                            <option value=""></option>
                              @foreach ($Contratos as $Contrato)
                                      <option value="{{ $Contrato->id_contrato }}">{{ $Contrato->nu_contrato }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Indicadores afetados <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <select class="select2" id="id_indicador" name="id_indicador" style="width: 100%" data-placeholder="Selecione a coordenação impactada">
                                      <option value=""></option>
                              @foreach ($Indicadores as $indicador)
                                      <option value="{{ $indicador->id_indicador }}">{{ $indicador->no_indicador }}</option>
                              @endforeach      
                            </select>
                          </div>
                        </div>

                        <hr>






                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nº da ocorrência</label>
                                <div class="col-sm-8">
                                  <input type="text" name="ds_ocorrencia" id="ds_ocorrencia"  value="" class="form-control"/>
                                </div>
                              </div>




             


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Descrição da ocorrência </label>
                        <div class="panel-body col-sm-8">
                          <textarea name="ds_ticket" id="ds_ticket" placeholder="descrição do ticket..." class="form-control" rows="5"></textarea>
                        </div>
                      </div><!-- form-group -->
                      
                      <hr>
                      
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Descrição da notificação <span class="text-danger">*</span></label>
                        <div class="panel-body col-sm-8">
                          <textarea id="ds_notificacao" name="ds_notificacao" placeholder="descrição da notificação..." class="form-control" rows="8"></textarea>
                        </div>
                      </div><!-- form-group -->

                    <hr>




                        <div class="form-group">
                          <label class="col-sm-3 control-label">Motivos da notificação <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                             @foreach ($Motivos as $motivo)
                                      <input name="id_motivo[]" type="checkbox" value="{{ $motivo->id_motivo }}"> {{ $motivo->no_motivo }} <br>
                              @endforeach
                          </div>
                        </div>




                        <div class="form-group">
                          <label class="col-sm-3 control-label">Duração da inconformidade (em horas): </label>
                          <div class="col-sm-1">
                            <input type="text" name="nu_horas" id="nu_horas" value="" class="form-control" title="Informe o número de horas" placeholder=""/>
                          </div>
                        </div>





                        





               

                    </div>


                    </div><!-- form-group -->

                        <hr>

                        <div class="row">
                          <div class="col-sm-9 col-sm-offset-3">
                            
                            <button type="submit" class="btn btn-wide btn-primary btn-quirk mr5">Salvar</button>


                            <button type="button" onClick="history.back();" class="btn btn-wide btn-default btn-quirk">Cancelar</button>
                          </div>
                        </div>
                      </form>
                      
                </div><!-- panel-body -->
              </div><!-- panel -->
            </div><!-- col-md-6 -->
          </div>
          </div> <!-- Final da tab -->
        </div>





      </div> <!-- contentpanel -->
    </div> <!-- mainpanel -->
  </section>




@include('Default.endScripts')



<script>
$(document).ready(function(){

  $('.select2').select2();

    // Input Masks
    //$("#mapreposto").mask("99999/9999");

  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
