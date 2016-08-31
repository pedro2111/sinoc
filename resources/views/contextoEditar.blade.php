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
          <li><a href="buttons.html">Contexto</a></li>
          <li><a href="buttons.html">Editar</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab"
            aria-expanded="false">Editar Contexto</a></li>
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

                    @foreach ($Contextos as $Contexto)
                    
                      <div class="panel-body nopaddingtop">
                              <form id='basicForm' name='basicForm' action='{{ url("contextos/incluir/$Contexto->id_contexto") }}' method="post" class='form-horizontal'>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="hidden" name="idcontexto" value="{{ $Contexto->id_contexto }}">
                              <div class="error"></div>

                              <div class="form-group">
                                <label class="col-sm-3 control-label">Nome do contexto<span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                  <input type="text" name="nocontexto" id="nocontexto"  value="{{ $Contexto->no_contexto }}" class="form-control" title="Informe o nome do contexto" required />
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

  
  // Error Message In One Container
  $('#basicForm').validate({
   errorLabelContainer: jQuery('#basicForm div.error')
  });



});   
</script>


</body>
<html></html>
