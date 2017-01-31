  <header>
    <div class="headerpanel">
      <div class="logopanel">
        <h2><a href="{{ url('notificacao')}}"><img src='{{ asset("theme/images/logo.jpg") }}'></a></h2>
      </div><!-- logopanel -->




      <div class="headerbar">

        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>

        
        <!-- INICIO - HEADER COM NOME   -->
        <div class="header-right">
          <ul class="headermenu">
            <li>
              <div class="btn-group">
                <button type="button" class="btn btn-logged" data-toggle="dropdown">
                  <b>{{ getenv('USERNAME') }}</b>
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
