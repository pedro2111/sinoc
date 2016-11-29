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
          <li><a href="buttons.html">Macrocélulas</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar macrocélula</a></li>
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
                   @foreach ($Macrocelulas as $macrocelula)
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("macrocelulas/incluir/$macrocelula->id_macrocelula")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idmacrocelula" value="{{ $macrocelula->id_macrocelula }}">
                        <div class="error"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="nomacrocelula" id="nomacrocelula" value="{{ $macrocelula->no_macrocelula }}" class="form-control" title="Informe o nome da macrocélula que você deseja cadastrar" placeholder="" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descrição</label>
                          <div class="col-sm-9">
                            <input type="text" name="dsmacrocelula" id="dsmacrocelula" value="{{ $macrocelula->ds_macrocelula }}" class="form-control" title="Informe a descrição desta macrocélula" placeholder="" required />
                          </div>
                        </div>

                     
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Nº do contrato <span class="text-danger">*</span></label>
                    <div class="col-sm-9">
                      <select class="select2" id="idcontrato" name="idcontrato" style="width: 100%" data-placeholder="Selecione um contrato" title="Você precisa selecionar um contrato" required>
                        <option value=""></option>
                          @foreach ($Contratos as $contrato)

                              @if ( $contrato->id_contrato === $macrocelula->id_contrato)
                                  <option value="{{ $contrato->id_contrato }}" selected>{{ $contrato->nu_contrato }}</option>
                              @else
                                 <option value="{{ $contrato->id_contrato }}">{{ $contrato->nu_contrato }}</option>
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
