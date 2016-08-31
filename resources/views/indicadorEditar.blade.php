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
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar célula</a></li>
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
                   @foreach ($Celulas as $Celula)
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("celulas/incluir/$Celula->id_celula")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idcelula" value="{{ $Celula->id_celula }}">
                        <div class="error"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome da célula<span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="nocelula" id="nocelula" value="{{ $Celula->no_celula }}" class="form-control" title="Informe o nome da célula que você deseja cadastrar" placeholder="" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descrição <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="dscelula" id="dscelula" value="{{ $Celula->ds_celula }}" class="form-control" title="Informe a descrição desta célula" placeholder="" />
                          </div>
                        </div>

                     
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Macrocélula <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="select2" id="idmacrocelula" name="idmacrocelula" style="width: 100%" data-placeholder="Selecione uma macrocélula" title="Você precisa selecionar uma macrocélula" required>
                        <option value=""></option>
                          @foreach ($Macrocelulas as $Macrocelula)

                              @if ( $Celula->id_macrocelula === $Macrocelula->id_macrocelula)
                                  <option value="{{ $Macrocelula->id_macrocelula }}" selected>{{ $Macrocelula->no_macrocelula }}</option>
                              @else
                                 <option value="{{ $Macrocelula->id_macrocelula }}">{{ $Macrocelula->no_macrocelula }}</option>
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
