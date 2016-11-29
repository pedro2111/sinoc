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
          <li><a href="buttons.html">Empresa</a></li>
          <li><a href="buttons.html">Editar</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar Empresa</a></li>
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

                    @foreach ($Empresas as $Empresa)
                    
                      <div class="panel-body nopaddingtop">
                              <form id='basicForm' name='basicForm' action='{{ url("empresas/incluir/$Empresa->id_empresa") }}' method="post" class='form-horizontal'>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="idempresa" value="{{ $Empresa->id_empresa }}">
                              <div class="error"></div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">CNPJ da empresa<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="dscnpj" id="dscnpj" value="{{ $Empresa->ds_cnpj }}" class="form-control" title="Informe corretamente o CNPJ da empresa!" placeholder="00.000.000/0000-00" required />
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nome da empresa<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                  <input type="text" name="noempresa" id="noempresa"  value="{{ $Empresa->no_empresa }}" class="form-control" title="Informe o nome da empresa" required />
                                </div>
                              </div>
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

    // Input Masks
  $("#dscnpj").mask("99.999.999/9999-99");


  $('.select2').select2();
  
  
  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
