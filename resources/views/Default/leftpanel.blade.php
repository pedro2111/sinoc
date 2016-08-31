    <div class="leftpanel">
      <div class="leftpanelinner">


      <!-- Painel de abertura de notificação --> 
        <div class="media leftpanel-profile">
          <div class="media-body">
            <button class="btn btn-info btn-quirk" style="width:100%">Abrir notificação</button>
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
              <li class="active"><a href="index.html"><i class="fa fa-home "></i> <span>Dashboard</span></a></li>
              <li><a href="index.html"><i class="fa fa-home"></i> <span>Notificações</span></a></li>

              <li class="nav-parent">
                <a href=""><i class="fa fa-check-square"></i> <span>Administração</span></a>
                <ul class="children">
                  
                  <li><a href="{{ url("prepostos") }}">Prepostos</a></li>
                  <li><a href="{{ url("contextos") }}">Contextos contratuais</a></li>
                  <li><a href="{{ url("impactos") }}">Categorias de impacto</a></li>
                  <li><a href="{{ url("empresas") }}">Empresas</a></li>
                  <li><a href="{{ url("gestores") }}">Gestores</a></li>
                  <li><a href="{{ url("coordenacoes") }}">Coordenações</a></li>
                  <hr>
                  <li><a href="{{ url("contratos") }}">Contratos</a></li>
                  <li><a href="{{ url("macrocelulas") }}">Macrocélulas</a></li>
                  <li><a href="{{ url("celulas") }}">Células</a></li>
                  
                  

                </ul>
              </li>
              <li class="nav-parent"><a href=""><i class="fa fa-suitcase"></i> <span>Relatórios</span></a>
                <ul class="children">
                  <li><a href="buttons.html">Buttons</a></li>
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
                <label>Nº da notificação</label>
                <input type="text" class="form-control">
              </div>

              <div class="form-group">
                <label>Nº do ticket</label>
                <input type="text" class="form-control">
              </div>


            <div class="form-group">
                <label>Contrato</label>
                <select id="select1" class="form-control" style="width: 100%" data-placeholder="Basic Select2 Box">
                  <option value="">&nbsp;</option>
                  <option value="United States">United States</option>
                  <option value="United Kingdom">United Kingdom</option>
                  <option value="Japan">Japan</option>
                  <option value="China">China</option>
                  <option value="Norway">Norway</option>
                  <option value="Australia">Australia</option>
                  <option value="South Korea">South Korea</option>
                  <option value="New Zealand">New Zealand</option>
                  <option value="Philippines">Philippines</option>
                </select>
              </div>


            <div class="form-group">
              <label>Default Functionality</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
              </div>
            </div>  




            <div class="form-group">
              <label>Default Functionality</label>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker2">
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