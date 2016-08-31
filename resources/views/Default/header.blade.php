  <header>
    <div class="headerpanel">
      <div class="logopanel">
        <h2><a href="index.html">NotificaApp</a></h2>
      </div><!-- logopanel -->

      <div class="headerbar">

        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


        <!--  INICIO - Busca do cabeçalho  -->
        <div class="searchpanel">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Procurando por ...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div><!-- input-group -->
        </div>
        <!-- FIM - Busca do cabeçalho  -->
        
        
        
        <!-- INICIO - HEADER COM NOME   -->
        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-logged" data-toggle="dropdown">
                  <b><?php echo $matricula ?></b>
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right">
                  <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Preferências</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ajuda</a></li>
                  <li><a href="signin.html"><i class="glyphicon glyphicon-log-out"></i> Sair</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
        <!-- FIM - HEADER COM NOME   -->
      </div><!-- headerbar -->
    </div><!-- header-->
</header>
