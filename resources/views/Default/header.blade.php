  <header>
    <div class="headerpanel">
      <div class="logopanel">
        <h2><a href="{{ url('notificacao')}}"><img src='{{ asset("theme/images/logo.jpg") }}'></a></h2>
      </div><!-- logopanel -->

      <div class="headerbar">

        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


        <!--  INICIO - Busca do cabeçalho  -->
        <div class="searchpanel">
          <form method="POST" action="{{url('notificacao/buscar')}}">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="input-group">
             
            <input type="text" id="q" name="q" class="form-control" placeholder="Procurando por ...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="submit(this)"><i class="fa fa-search"></i></button>
            </span>
            </form>
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
                  <li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ajuda</a></li>
                  <li><a href="#"><i class="glyphicon glyphicon-log-out"></i> Sair</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div><!-- header-right -->
        <!-- FIM - HEADER COM NOME   -->
      </div><!-- headerbar -->
    </div><!-- header-->
</header>
