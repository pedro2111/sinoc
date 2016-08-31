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
          <li><a href="buttons.html">Contratos</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar contrato</a></li>
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

        <div class="tab-pane active" id="recent">
          <div class="row">
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-heading nopaddingbottom">
                      <h4 class="panel-title">Preencha corretamente o formulário abaixo</h4>
                </div>
                   @foreach ($Contratos as $contrato)
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("contratos/incluir/$contrato->id_contrato")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idcontrato" value="{{ $contrato->id_contrato }}">
                        <div class="error"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Número do contrato <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="nucontrato" id="nucontrato" value="{{ $contrato->nu_contrato }}" class="form-control" title="Informe o número do contrato!" placeholder="00000/0000" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Data de assinatura <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="dtassinatura" id="dtassinatura" value="{{ date('d/m/Y', strtotime($contrato->dt_assinatura)) }}" class="form-control" title="Informe a data de assinatura do contrato" placeholder="00/00/0000" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Data de renovação</label>
                          <div class="col-sm-8">
                              @if ( $contrato->dt_renovacao === null)
                                  <input type="text" name="dtrenovacao" id="dtrenovacao" value="" class="form-control" placeholder="00/00/0000" />      
                              @else
                                  <input type="text" name="dtrenovacao" id="dtrenovacao" value="{{ date('d/m/Y', strtotime($contrato->dt_renovacao)) }}" class="form-control" placeholder="00/00/0000" />
                              @endif
                          </div>
                        </div>

                    <div class="form-group">
                    <label class="col-sm-3 control-label">Empresa contratada <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="select2" id="idempresa" name="idempresa" style="width: 100%" data-placeholder="Selecione uma empresa" title="Você precisa selecionar uma empresa para o contrato" required>
                        <option value=""></option>
                          @foreach ($Empresas as $empresa)

                              @if ( $empresa->id_empresa === $contrato->id_empresa)
                                  <option value="{{ $empresa->id_empresa }}" selected>{{ $empresa->no_empresa }}</option>
                              @else
                                  <option value="{{ $empresa->id_empresa }}">{{ $empresa->no_empresa }}</option>
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
  $("#nucontrato").mask("99999/9999");
  $("#dtassinatura").mask("99/99/9999");
  $("#dtrenovacao").mask("99/99/9999");

  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
