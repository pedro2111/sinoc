@include('Default.head')
 
<body>
@include('Default.header')
  <link rel="stylesheet" href="{{ asset("theme/lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.css") }}">


  <section>
  @include('Default.leftpanel')



    <div class="mainpanel">

      <div class="contentpanel">

        <!-- Breadcrump --> 
        <ol class="breadcrumb breadcrumb-quirk">
          <li><a href="#"><i class="fa fa-home mr5"></i> Dashboard</a></li>
          <li><a href="#">Notificação</a></li>
          <li><a href="#">Justificar</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Justificar notificação</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

        <div class="tab-pane active" id="recent">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
               
                <br>
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("notificacao/incluirjustificativa/")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="id_notificacao" value="{{ $Notificacao->id_notificacao }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="error"></div>


                        <span class="panel-title">Verifique as informações preenchidas da notificação</span>
						<br>
						<br>


                      	<div class="form-group">
                          <label class="col-sm-3 control-label">Data de cadastro</label>
                        <div class="col-sm-8">
                         <input type="text" name="created_at" id="created_at"  value="{{ $Notificacao->created_at->format('d/m/Y H:i') }}" class="form-control" disabled/>
                          </div>
                        </div>


                      <div class="form-group">
                          <label class="col-sm-3 control-label">Responsável pela notificação</label>
                          <div class="col-sm-8">
                            <input type="text" name="ma_cadastro" id="ma_cadastro"  value="{{ $Notificacao->ma_cadastro }}" class="form-control" title="Informe o nome do contexto" disabled/>
                          </div>
                        </div>

                      <hr>



                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação Notificadora</label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_notificadora" name="id_notificadora" style="width: 100%" data-placeholder="Selecione a coordenação notificadora" title="Você precisa selecionar a coordenação notificadora" disabled>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      @if ($Notificacao->id_notificadora === $Coordenacao->id_coordenacao)
                                        <option value="{{ $Coordenacao->id_coordenacao }}" selected>{{ $Coordenacao->ds_coordenacao }}</option>
                                      @else 
                                        <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                                      @endif
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação impactada</label>
                        <div class="col-sm-8">
                        <select class="select2" id="id_impactada" name="id_impactada" style="width: 100%" data-placeholder="Selecione a coordenação impactada" title="Você precisa selecionar a coordenação impactada" disabled>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      @if ($Notificacao->id_impactada === $Coordenacao->id_coordenacao)
                                        <option value="{{ $Coordenacao->id_coordenacao }}" selected>{{ $Coordenacao->ds_coordenacao }}</option>
                                      @else 
                                        <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                                      @endif
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->
          
                      <hr>




                      <div class="form-group">
                        <label class="col-sm-3 control-label">Contrato</label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_contrato" name="id_contrato" style="width: 100%" disabled>
                            <option value=""></option>
                                @foreach ($Contratos as $Contrato)
                                    @if ($Notificacao->id_contrato === $Contrato->id_contrato)
                                        <option value="{{ $Contrato->id_contrato }}" selected>{{ $Contrato->nu_contrato }}</option>
                                    @else 
                                        <option value="{{ $Contrato->id_contrato }}">{{ $Contrato->nu_contrato }}</option>
                                    @endif
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Indicador afetado</label>
                          <div class="col-sm-8">
                            <select class="select2" id="id_indicador" name="id_indicador" style="width: 100%" disabled>
                                      <option value=""></option>

                                      @foreach ($Indicadores as $indicador)
                                              @if ($Notificacao->id_indicador === $indicador->id_indicador)
                                                  <option value="{{ $indicador->id_indicador }}" selected>{{ $indicador->no_indicador }}</option>
                                              @else 
                                                  <option value="{{ $indicador->id_indicador }}">{{ $indicador->no_indicador }}</option>
                                              @endif
                                        @endforeach    
                            </select>
                          </div>
                        </div>

                        <hr>


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nº da ocorrência</label>
                          <div class="col-sm-8">
                            <input type="text" name="ds_ocorrencia" id="ds_ocorrencia"  value="{{ $Notificacao->ds_ocorrencia }}" class="form-control" title="Informe o nome do contexto" disabled/>
                          </div>
                        </div>

 
                           

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descrição da ocorrência </label>
                          <div class="panel-body col-sm-9" style="margin-left:-10px">
                            <textarea style="width:90.7%;" class="wtext" name="ds_ticket" id="ds_ticket" placeholder="descrição do ticket..." class="form-control" rows="10" disabled>{{ $Notificacao->ds_ticket }}</textarea>
                          </div>
                        </div><!-- form-group -->
                      
                        <hr>
                      

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Motivos da notificação</label>
                          <div class="col-sm-8">
                             @foreach ($Motivos as $motivo)
                                      <input name="id_motivo[]" type="radio" value="{{ $motivo->id_motivo }}"

                                      @if ($motivo->id_motivo === $NotificacaoMotivo[0]->id_motivo) 
                                        checked
                                      @endif
                                      disabled> {{ $motivo->no_motivo }} <br>
                              @endforeach
                          </div>
                        </div>


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Descrição da notificação</label>
                        <div class="panel-body col-sm-9" style="margin-left:-10px">
                          <textarea style="width:90.7%;" id="ds_notificacao" name="ds_notificacao" class="wtext" placeholder="descrição da notificação..." class="form-control" rows="18" disabled>{{ $Notificacao->ds_notificacao }}</textarea>
                        </div>
                      </div><!-- form-group -->

                  



                       



                        <div class="form-group">
                          <label class="col-sm-3 control-label">Duração da inconformidade (em horas):</label>
                          <div class="col-sm-1">
                            <input type="text" name="nu_horas" id="nu_horas" value="{{ $Notificacao->nu_horas }}" class="form-control" disabled />
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                          <hr>
                        
                        
                        
                        
                         <div class="panel-heading nopaddingbottom">
                      <h4 class="panel-title">Preencha a justificativa no campo abaixo</h4>
                </div>
                        
                        
                        
                        
                        
                        
                        
                             <div class="form-group">
                        <label class="col-sm-3 control-label"><b>Informe sua justificativa</b><span class="text-danger">*</span> </label>
                        <div class="panel-body col-sm-9" style="margin-left:-10px">
                           <textarea style="width:90.7%;" name="ds_justificativa" id="ds_justificativa" class="wtext" placeholder="descrição da justificativa..." class="form-control" rows="9"></textarea>
                        </div>
                      </div><!-- form-group -->
                      
                      <hr>

                        <div class="row">
                          <div class="col-sm-9 col-sm-offset-3">
                            
                            <button type="submit" class="btn btn-wide btn-primary btn-quirk mr5">Salvar justificativa</button>


                            <button type="button" onClick="history.back();" class="btn btn-wide btn-default btn-quirk">Cancelar</button>
                          </div>
                        </div>

                        <br>
                        <hr>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>


                    </div><!-- form-group -->

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

<script src="{{ asset("theme/lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js") }}"></script>
<script src="{{ asset("theme/lib/wysihtml5x/wysihtml5x.js") }}"></script>
<script src="{{ asset("theme/lib/wysihtml5x/wysihtml5x-toolbar.js") }}"></script>


<script>
$(document).ready(function(){
  'use strict';


  // HTML5 WYSIWYG Editor
  $('.wtext').wysihtml5({
   toolbar: {
    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
    "emphasis": true, //Italics, bold, etc. Default true
    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
    "html": false, //Button which allows you to edit the generated HTML. Default false
    "link": true, //Button to insert a link. Default true
    "image": false, //Button to insert an image. Default true,
    "color": false, //Button to change color of font  
    "blockquote": true, //Blockquote  
    
  }
  });


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
</html>