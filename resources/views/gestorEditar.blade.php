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
          <li><a href="buttons.html">Gestores</a></li>
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
            <div class="col-md-10">
              <div class="panel">
                <div class="panel-heading nopaddingbottom">
                      <h4 class="panel-title">Preencha corretamente o formulário abaixo</h4>
                </div>
                   @foreach ($Gestores as $gestor)
                <div class="panel-body nopaddingtop">
                        <form id='basicForm' name='basicForm' action='{{ url("gestores/incluir/$gestor->id_gestor")}}' method="post" class='form-horizontal'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="idgestor" value="{{ $gestor->id_gestor }}">
                        <div class="error"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Matrícula <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="magestor" id="magestor" value="{{ $gestor->ma_gestor }}" class="form-control" title="Informe o número da matrícula do gestor!" placeholder="c000000" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome <span class="text-danger">*</span></label>
                          <div class="col-sm-8">
                            <input type="text" name="nogestor" id="nogestor" value="{{ $gestor->no_gestor }}" class="form-control" title="Informe o nome do gestor que você deseja cadastrar" placeholder="" required />
                          </div>
                        </div>



                    <div class="form-group">
                    <label class="col-sm-3 control-label">Coordenação correspondente <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="select2" id="idcoordenacao" name="idcoordenacao" style="width: 100%" data-placeholder="Selecione uma coordenação" title="Você precisa selecionar uma coordenação vinculada ao gestor" required>
                        <option value=""></option>
                          @foreach ($Coordenacoes as $Coordenacao)

                              @if ( $Coordenacao->id_coordenacao === $gestor->id_coordenacao)
                                  <option value="{{ $Coordenacao->id_coordenacao }}" selected>{{ $Coordenacao->no_coordenacao }} - {{ $Coordenacao->ds_coordenacao }}</option>
                              @else
                                  <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->no_coordenacao }} - {{ $Coordenacao->ds_coordenacao }}</option>
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


  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
