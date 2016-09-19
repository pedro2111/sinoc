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
                        <form id='basicForm' name='basicForm' action='{{ url("prepostos/incluir/")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        <div class="error"></div>



                        <div class="form-group">
                        <label class="col-sm-3 control-label">Contrato <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="idcontrato" name="idcontrato" style="width: 100%" data-placeholder="Selecione o contrato" title="Você precisa selecionar um contrato para o preposto" required>
                            <option value=""></option>
                              @foreach ($Contratos as $Contrato)
                                      <option value="{{ $Contrato->id_contrato }}">{{ $Contrato->nu_contrato }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Contexto contratual <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_contexto" name="id_contexto" style="width: 100%" data-placeholder="Selecione o contexto contratal" title="Você precisa selecionar um contexto contratual" required>
                            <option value=""></option>
                              @foreach ($Contextos as $Contexto)
                                      <option value="{{ $Contexto->id_contexto }}">{{ $Contexto->no_contexto }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                              <div class="form-group">
                                <label class="col-sm-3 control-label">Ocorrência relacionada<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" name="nocontexto" id="nocontexto"  value="" class="form-control" title="Informe o nome do contexto" required />
                                </div>
                              </div>




                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação Notificadora <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_coordenacao_notificadora" name="id_coordenacao_notificadora" style="width: 100%" data-placeholder="Selecione a coordenação notificadora" title="Você precisa selecionar a coordenação notificadora" required>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


                      <div class="form-group">
                        <label class="col-sm-3 control-label">Coordenação impactada <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <select class="select2" id="id_coordenacao_impactada" name="id_coordenacao_impactada" style="width: 100%" data-placeholder="Selecione a coordenação impactada" title="Você precisa selecionar a coordenação impactada" required>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->
          
                      <hr>


      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title">HTML 5 WYSIWYG Editor</h4>
          <p>Open source rich text editor based on HTML5 and the progressive-enhancement approach. Uses a sophisticated security concept and aims to generate fully valid HTML5 markup by preventing unmaintainable tag soups and inline styles. <a href="http://jhollingworth.github.io/bootstrap-wysihtml5/" target="_blank">http://jhollingworth.github.io/bootstrap-wysihtml5/</a></p>
        </div>
        <div class="panel-body">
          <textarea id="wysiwyg" placeholder="Enter text here..." class="form-control" rows="10"></textarea>
        </div>
      </div>
















                        <div class="form-group">
                          <label class="col-sm-3 control-label">Matrícula do preposto <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="mapreposto" id="mapreposto" value="" class="form-control" title="Informe a matrícula do preposto!" placeholder="" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome do preposto <span class="text-danger">*</span> </label>
                          <div class="col-sm-8">
                            <input type="text" name="nopreposto" id="nopreposto" value="" class="form-control" title="Informe o nome do preposto!" placeholder="" required />
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Matrícula do preposto <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="mapreposto" id="mapreposto" value="" class="form-control" title="Informe a matrícula do preposto!" placeholder="" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome do preposto <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="nopreposto" id="nopreposto" value="" class="form-control" title="Informe o nome do preposto!" placeholder="" required />
                          </div>
                        </div>



               

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
