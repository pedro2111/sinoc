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
          <li><a href="buttons.html">Coordenações</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar coordenação</a></li>
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
                <div class="panel-body nopaddingtop">
                 @foreach ($Coordenacoes as $coordenacao)
                        <form id="basicForm" name="basicForm" method="post" action='{{ url("coordenacoes/incluir/") }}/{{ $coordenacao->id_coordenacao}}' class="form-horizontal">
                        <input type="hidden" name="idcoordenacao" value="{{ $coordenacao->id_coordenacao }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        
                        
                        <div class="error" display="block"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Número da coordenação <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" name="nucoordenacao" id="nucoordenacao" class="form-control" title="Informe o número da coordenação!" placeholder="00" value="{{ $coordenacao->nu_coordenacao}}" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Nome da coordenação (resumido)<span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" value="{{ $coordenacao->no_coordenacao}}" name="nocoordenacao" id="nocoordenacao" class="form-control" title="Informe o nome da coordenação corretamete!" placeholder="CEPTIBRXXX" required />
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Descrição da coordenação</label>
                          <div class="col-sm-9">
                            <input type="text" name="dscoordenacao" id="dscoordenacao" value="{{ $coordenacao->ds_coordenacao}}" class="form-control" title="Informe o nome detalhado da coordenação!" placeholder="Coordenação de ..." required/>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 control-label">E-mail</label>
                          <div class="col-sm-9">
                            <input type="text" name="dsemail" id="dsemail" class="form-control" placeholder="" value="{{ $coordenacao->ds_email}}"/>
                          </div>
                        </div>
                    </div>
                    </div><!-- form-group -->
   					@endforeach
                        <hr>

                        <div class="row">
                          <div class="col-sm-9 col-sm-offset-3">
                            
                            <button type="submit" class="btn btn-wide btn-primary btn-quirk mr5">Cadastrar</button>


                            <button type="reset" class="btn btn-wide btn-default btn-quirk">Limpar</button>
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
