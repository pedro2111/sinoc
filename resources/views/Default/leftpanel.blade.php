    <div class="leftpanel">
      <div class="leftpanelinner">


      <!-- Painel de abertura de notificação --> 
        <div class="media leftpanel-profile">
          <div class="media-body">
          
          
       		@if (Carbon\Carbon::now()->format('d') == 27 or Carbon\Carbon::now()->format('d') == 28 or Carbon\Carbon::now()->format('d') == 29 or Carbon\Carbon::now()->format('d') == 30 or Carbon\Carbon::now()->format('d') == 31)
       		@else 
       			<a href="{{ url("notificacao/nova")}}"><button class="btn btn-danger btn-quirk" style="width:100%">Abrir notificação</button></a>
       			<a style="margin-top:15px; display:block;" href="{{ url("descumprimento/novo")}}"><button class="btn btn-danger btn-quirk" style="width:100%">Abrir descumprimento</button></a>
            @endif
          </div>
        </div>



      <!-- Painel de abertura de notificação --> 

        <ul class="nav nav-tabs nav-justified nav-sidebar">
          <li class="tooltips " data-toggle="tooltip" title="Main Menu"><a data-toggle="tab" data-target="#mainmenu"><i class="tooltips fa fa-ellipsis-h"></i></a></li>
          <li class="tooltips active" data-toggle="tooltip" title="Settings"><a data-toggle="tab" data-target="#settings"><i class="fa fa-search"></i></a></li>
        </ul>

        <div class="tab-content">

          <!-- ################# MAIN MENU ################### -->

          <div class="tab-pane" id="mainmenu">

            <h5 class="sidebar-title">Navegação</h5>
            <ul class="nav nav-pills nav-stacked nav-quirk">
              <li class="active"><a href="#"><i class="fa fa-home "></i> <span>Dashboard</span></a></li>
              <li><a href="{{ url("notificacao")}}"><i class="fa fa-home"></i> <span>Notificações</span></a></li>
              <li><a href="{{ url("descumprimento")}}"><i class="fa fa-home"></i> <span>Descumprimento contratual</span></a></li>

              <li class="nav-parent">
                <a href=""><i class="fa fa-check-square"></i> <span>Administração</span></a>
                <ul class="children">
                  
                  <li><a href="{{ url("agentes") }}">Agentes de contrato</a></li>
                  <li><a href="{{ url("prepostos") }}">Prepostos</a></li>
                  <li><a href="{{ url("empresas") }}">Empresas</a></li>
                  <li><a href="{{ url("gestores") }}">Gestores</a></li>
                  <li><a href="{{ url("coordenacoes") }}">Coordenações</a></li>
                  <hr>
                  <li><a href="{{ url("contratos") }}">Contratos</a></li>
                  <li><a href="{{ url("indicadores") }}">Indicadores</a></li>                  
                  
                  
                  <!--
                  #Itens removidos do projeto 
                  #Macrocelulas e celulas não são necessárias nesse momento. 
                   
                  <li><a href="{{ url("macrocelulas") }}">Macrocélulas</a></li>
                  <li><a href="{{ url("celulas") }}">Células</a></li>
                  
                   -->
                  
                  

                </ul>
              </li>
              <li class="nav-parent"><a href=""><i class="fa fa-suitcase"></i> <span>Relatórios</span></a>
                <ul class="children">
                   <li><a href="{{ url('relatorio/notificacao_por_contrato')}}">Notificações por contrato</a></li>
                  <li><a href="#">Por definir</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- tab-pane -->

          <!-- #################### SETTINGS ################### -->

          <div class="tab-pane active" id="settings">
            <h5 class="sidebar-title">Busca de notificações</h5>
            
            
            
            
            <ul class="list-group list-group-settings">
              <li class="list-group-item">
            
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Nº da notificação ou parte">
              </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Palavra chave">
              </div>


			  <div class="form-group">
                        <div>
                          <select class="select2" id="id_notificadora" name="id_notificadora" style="width: 100%" data-placeholder="Selecione a coordenação notificadora" title="Você precisa selecionar a coordenação notificadora" required>
                            <option value=""></option>
                              @foreach ($Coordenacoes as $Coordenacao)
                                      <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                              @endforeach
      
                          </select>
                        
                        </div>
                      </div><!-- form-group -->


            <div class="form-group">
                
            <select class="select2" id="id_contrato" name="id_contrato" style="width: 100%" data-placeholder="Selecione um contrato" title="Você precisa selecionar uma contrato" required>
                        <option value=""></option>
                          @foreach ($Contratos as $c)
                            <option value="{{ $c->id_contrato }}">{{ $c->nu_contrato }}</option>
                          @endforeach
  
                      </select>
              </div>


            <div class="form-group">
              <label>Data início</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="datepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>  




            <div class="form-group">
              <label>Data fim</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="dd/mm/aaaa" id="datepicker2">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>  

            <button class="btn btn-warning btn-quirk" style="width:100%">Buscar notificação</button>







       
              </li>
            </ul>
          </div><!-- tab-pane -->

        </div><!-- tab-content -->

      </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->