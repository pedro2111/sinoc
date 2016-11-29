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
          <li><a href="buttons.html">Células</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab" aria-expanded="false">Editar indicador</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

        <div class="tab-pane active" id="recent">
          <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading nopaddingbottom">
                      <h4 class="panel-title">Preencha corretamente o formulário abaixo</h4>
                </div>
                   @foreach ($Indicadores as $indicador)
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("indicadores/incluir/$indicador->id_indicador")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id_indicador" value="{{ $indicador->id_indicador }}">
                        <div class="error"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Sigla do indicador<span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="sg_indicador" id="sg_indicador" value="{{ $indicador->sg_indicador }}" class="form-control" title="Informe o nome da célula que você deseja cadastrar" placeholder="" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome do indicador <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="no_indicador" id="no_indicador" value="{{ $indicador->no_indicador }}" class="form-control" title="Informe a descrição desta célula" placeholder="" />
                          </div>
                        </div>
                
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descrição</label>
                          <div class="col-sm-9">
                            <input type="text" name="ds_indicador" id="ds_indicador" value="{{ $indicador->ds_indicador }}" class="form-control" title="Informe a descrição desta célula" placeholder="" />
                          </div>
                        </div>
                     
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Macrocélula <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <select class="select2" id="id_contrato" name="id_contrato" style="width: 100%" data-placeholder="Selecione uma macrocélula" title="Você precisa selecionar uma macrocélula" required>
                        <option value=""></option>
                              @foreach ($Contratos as $Contrato)

                              @if ( $Contrato->id_contrato === $indicador->id_contrato)
                                  <option value="{{ $Contrato->id_contrato }}" selected>{{ $Contrato->nu_contrato }}</option>
                              @else
                                 <option value="{{ $Contrato->id_contrato }}">{{ $Contrato->nu_contrato }}</option>
                              @endif
                            
                          

                          @endforeach
  
                      </select>
                    
                    </div>
                  </div><!-- form-group -->

                    </div>


                    </div><!-- form-group -->

                        <hr>

                        <div class="row">
                          <div class="col-sm-9 col-sm-offset-3">
                            
                            <button type="submit" class="btn btn-wide btn-primary btn-quirk mr5">Atualizar</button>


                            <button type="button" onClick="history.back();" class="btn btn-wide btn-default btn-quirk">Voltar</button>
                          </div>
                        </div>
                      </form>
                      @endforeach
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
  //$("#nucontrato").mask("99999/9999");
  //$("#dtassinatura").mask("99/99/9999");
  //$("#dtrenovacao").mask("99/99/9999");

  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
