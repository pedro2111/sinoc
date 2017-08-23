@include('Default.head')

<body>
    @include('Default.header')


    <section>
        @include('Default.leftpanel')


        <div class="mainpanel">


            <div class="contentpanel">

                <!-- Breadcrump -->
                <ol class="breadcrumb breadcrumb-quirk">
                    <li><a href="#"><i class="fa fa-home mr5"></i> Dashboard</a></li>
                    <li><a href="#">Relatório mensal de Notificações</a></li>
                </ol>
                <!-- Final Breadcrump -->

                <!-- ABAS DA TAB -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#popular" data-toggle="tab"
                                          aria-expanded="false">Relatório mensal de Notificações</a></li>
                </ul>
                <!--Final da ABAS DA TAB -->
               

                <div class="tab-content mb20">

                    <div class="tab-pane active" id="popular">
                        <div class="panel">

                            <div class="panel-heading">
                                <p>Selecione o Contrato, a Coordenação e o mês para gerar o relatório</p>
                                <div class="panel-body">
                                    @if (session('status'))
                                    <div id="alerta" class="alert alert-{{ session('tipo') }}">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    <form  id="relatoriomensal" name="" enctype="multipart/form-data" action='{{ url("relatorio/relatoriomensal")}}' method="post" class="">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="menu-mes">

                                            <?php
                                            if (isset($_POST['mes'])) {
                                                $mes = $_POST['mes'];
                                            } else {
                                                $mes = Carbon\Carbon::now()->month;
                                            }
                                            ?>
                                            <select class="select2" id="id_contrato" name="id_contrato" data-placeholder="Contrato" title="Selecione um contrato" required>
                                                <option value=""></option>

                                                @foreach ($Contratos as $Contrato)
                                                <option value="{{ $Contrato->id_contrato }}">{{ $Contrato->nu_contrato }}</option>
                                                @endforeach

                                            </select>

                                            <select class="select2" id="id_coordenacao" name="id_coordenacao"  data-placeholder="Selecione uma Coordenação ou nehuma para todas!">
                                                <option value="999">Selecione uma Coordenação ou nehuma para todas!</option>
                                                @foreach ($Coordenacoes as $Coordenacao)
                                                <option value="{{ $Coordenacao->id_coordenacao }}">{{ $Coordenacao->ds_coordenacao }}</option>
                                                @endforeach

                                            </select>

                                            <select name="mes" class="select2" data-placeholder="Mês" title="Selecione o mês visualizar" >
                                                <option value="01" <?php echo ($mes == 01) ? "selected" : ""; ?>>Janeiro</option>
                                                <option value="02" <?php echo ($mes == 02) ? "selected" : ""; ?>>Fevereiro</option>
                                                <option value="03" <?php echo ($mes == 03) ? "selected" : ""; ?>>Março</option>
                                                <option value="04" <?php echo ($mes == 04) ? "selected" : ""; ?>>Abril</option>
                                                <option value="05" <?php echo ($mes == 05) ? "selected" : ""; ?>>Maio</option>
                                                <option value="06" <?php echo ($mes == 06) ? "selected" : ""; ?>>Junho</option>
                                                <option value="07" <?php echo ($mes == 07) ? "selected" : ""; ?>>Julho</option>
                                                <option value="08" <?php echo ($mes == 08) ? "selected" : ""; ?>>Agosto</option>
                                                <option value="09" <?php echo ($mes == 09) ? "selected" : ""; ?>>Setembro</option>
                                                <option value="10" <?php echo ($mes == 10) ? "selected" : ""; ?>>Outubro</option>
                                                <option value="11" <?php echo ($mes == 11) ? "selected" : ""; ?>>Novembro</option>
                                                <option value="12" <?php echo ($mes == 12) ? "selected" : ""; ?>>Dezembro</option>
                                            </select>


                                            <button class="btn btn-blue btn-quirk">Enviar</button>

                                        </div>
                                    </form>

                                    <?php
                                    if (isset($_POST['mes'])) {
                                    switch ($_POST['mes']):
                                        case $mes = 1:
                                            $titulo_mes = 'Janeiro';
                                            break;
                                        case $mes = 2:
                                            $titulo_mes = 'Fevereiro';
                                            break;
                                        case $mes = 3:
                                            $titulo_mes = 'Março';
                                            break;
                                        case $mes = 4:
                                            $titulo_mes = 'Abril';
                                            break;
                                        case $mes = 5:
                                            $titulo_mes = 'Maio';
                                            break;
                                        case $mes = 6:
                                            $titulo_mes = 'Junho';
                                            break;
                                        case $mes = 7:
                                            $titulo_mes = 'Julho';
                                            break;
                                        case $mes = 8:
                                            $titulo_mes = 'Agosto';
                                            break;
                                        case $mes = 9:
                                            $titulo_mes = 'Setembro';
                                            break;
                                        case $mes = 10:
                                            $titulo_mes = 'Outubro';
                                            break;
                                        case $mes = 11:
                                            $titulo_mes = 'Novembro';
                                            break;
                                        case $mes = 12:
                                            $titulo_mes = 'Dezembro';
                                            break;
                                    endswitch;
                                    }

                                    if (isset($_POST['id_coordenacao'])) {
                                        $titulo_coordenacao = \App\Models\Coordenacao::find($_POST['id_coordenacao']);
                                        $titulo_contrato = \App\Models\Contrato::find($_POST['id_contrato']);
                                    }
                                    ?>
                                    <?php if (isset($_POST['id_coordenacao'])) { ?>
                                        <center><h1>Relatorio mês de <?= $titulo_mes; ?>: <?= $titulo_contrato['nu_contrato'] ?> - <?= $titulo_coordenacao['no_coordenacao'] ?> </h1></center>
                                    <?php } ?>


                                    <?php for ($i=1; $i<=17; $i++){ ?>
                                        
                                        <div class="table-responsive">

                                        <table  class="table table-bordered table-striped-col dataTable1">
                                            <thead>
                                                <tr>
                                                    <th>Nº</th>
                                                    <th>DATA</th>
                                                    <th>CONTRATO</th>
                                                    <th>EQUIPE NOTIFICADORA</th>
                                                    <th>Indicador</th>
                                                    <th>Descrição</th>
                                                    <th>STATUS</th>
                                                    <th>AÇÕES</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($Notificacoes as $n)
                                                <?php if($n->id_notificadora == $i) {?>
                                                <tr>
                                                    <td>
                                                        <a href="../notificacao/ver/{{ Crypt::encrypt($n->id_notificacao) }}">{{ $n->nu_notificacao }}</a>
                                                    </td>
                                                    <td>{{ Carbon\Carbon::parse($n->created_at)->format('d/m/Y') }}</td>
                                                    <td>{{ $n->nu_contrato }}</td>


                                                    @foreach ($Coordenacoes as $Coordenacao)
                                                    @if ($n->id_notificadora === $Coordenacao->id_coordenacao)
                                                    <td>{{ $Coordenacao->no_coordenacao }}</td>
                                                    @endif
                                                    @endforeach

                                                    <td>{{$n->sg_indicador}}</td>
                                                    <td>{{strip_tags($n->ds_notificacao)}}</td>
                                                    <td>
                                                        @if($n->bit_aceito == 9)
                                                        Não autorizado
                                                        @endif

                                                        @if($n->bit_aceito == 99)
                                                        Não autorizado - Tempo de resposta esgotado!
                                                        @endif

                                                        @if($n->bit_aceito == 55)
                                                        Justificativa Não acatada - Tempo de resposta esgotado!
                                                        @endif

                                                        @if($n->bit_aceito == 44)
                                                        Justificativa Acatada - Tempo de resposta esgotado!
                                                        @endif

                                                        @if($n->bit_aceito == 5)
                                                        Justificativa não acatada
                                                        @endif

                                                        @if($n->bit_aceito == 4)
                                                        Justificativa acatada
                                                        @endif


                                                        @if($n->bit_aceito == 3)
                                                        Aguardando avaliação
                                                        @endif


                                                        @if($n->bit_aceito == 2)
                                                        Aguardando justificativa
                                                        @endif



                                                        @if($n->bit_aceito == 1)
                                                        Aguardando autorização
                                                        @endif

                                                    </td>


                                                    <td>
                                                        <!--  Verifica se a pessoa é gestor-->
                                                        <!--  Verifica se a pessoa é gestor-->
                                                        @if(Session::get('isgestor') == 1)
                                                        @if($n->dt_naoacatado == NULL && $n->bit_aceito == 1)
                                                        <a href="../notificacao/autorizar/{{ Crypt::encrypt($n->id_notificacao) }}">Autorizar</a>
                                                        |
                                                        @endif
                                                        @endif


                                                        <!--  Verifica se a pessoa é preposto -->
                                                        @if(Session::get('ispreposto') == 1)
                                                        @if($n->bit_aceito == 2)
                                                        <a href="../notificacao/justificar/{{ Crypt::encrypt($n->id_notificacao) }}">Justificar</a>
                                                        |
                                                        @endif
                                                        @endif

                                                        @if(Session::get('isgestor') == 1)
                                                        @if($n->bit_aceito == 3)
                                                        <a href="../notificacao/avaliar/{{ Crypt::encrypt($n->id_notificacao) }}">Avaliar</a>
                                                        |
                                                        @endif
                                                        @endif

                                                        <!--  Verifica se a pessoa é agente de RH e Contratos-->
                                                        @if(Session::get('isrh') == 1)
                                                        @if($n->bit_aceito == 5)
                                                        <a href="../notificacao/corrigir/{{ Crypt::encrypt($n->id_notificacao) }}">Corrigir</a>
                                                        |
                                                        <a href="../notificacao/devolverpreposto/{{ Crypt::encrypt($n->id_notificacao) }}">Devolver preposto</a>
                                                        |
                                                        @endif
                                                        @endif


                                                        <a href="../notificacao/ver/{{ Crypt::encrypt($n->id_notificacao) }}">Informações</a>

                                                        <!--
                                    # COLOCAR ESSAS FUNCIONALIDADES NA PROXIMA VERSÃO
        
                                    | <a href="notificacao/acatamentoespecial/{{ $n->id_notificacao }}">Acatamento especial</a>
                                    | <a href="notificacao/historico/{{ $n->id_notificacao }}">Histórico</a>
                                                        -->


                                                    </td>
                                                </tr>
                                                <?php }?><!-- fechamento if do for notificadora-->
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <?php 
                                        if($TotalAcat != 'vazio'){
                                            var_dump($TotalAcat);                                    
                                        ?>
                                            
                                        <table class="table table-striped  table-total" style="margin-top: 30px !important;width: 50%;" align="center">
                                            <thead>
                                                <tr>
                                                    <th>Indicador</th>
                                                    <th>Ocorrências Notificadas</th>
                                                    <th>Não acatadas</th>
                                                    <th>Acatadas</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="background: #ffb3ff;">IEPC001</td>
                                                    <!-- Total-->
                                                    <?php                                                         
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    $totalacatada = 0;
                                                    $totalnacatada = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 4):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 4):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total01 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total01}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #ffb3b3;">IEPC002</td>
                                                    <!-- Total-->
                                                    <?php
                                                    
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 5):
                                                            $contacat = $acat->total;                                                            
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 5):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total02 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total02}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #ffffb3;">IEPC003</td>
                                                    <!-- Total-->
                                                    <?php
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 6):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;

                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 6):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total03 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total03}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #b3b3ff;">IEPC004</td>
                                                    <!-- Total-->
                                                    <?php
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 7):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 7):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total04 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total04}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #ffb3d9;">IEPC005</td>
                                                    <!-- Total-->
                                                    <?php
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 8):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 8):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total05 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total05}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #b3d9ff;">IEPC006</td>
                                                    <!-- Total-->
                                                    <?php
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 9):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 9):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total06 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total06}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr >
                                                    <td style="background: #d9d9d9;">IDSP001</td>
                                                    <!-- Total-->
                                                    <?php
                                                    $contacat = 0;
                                                    $contnacat = 0;
                                                    foreach ($TotalAcat as $acat):
                                                        if ($acat->id_indicador == 10):
                                                            $contacat = $acat->total;
                                                            $totalacatada = $totalacatada + $contacat;
                                                        endif;
                                                    endforeach;
                                                    foreach ($TotalNotAcat as $nacat):
                                                        if ($nacat->id_indicador == 10):
                                                            $contnacat = $nacat->total;
                                                            $totalnacatada = $totalnacatada + $contnacat;
                                                        endif;
                                                    endforeach;
                                                    $total07 = $contacat + $contnacat;
                                                    ?>
                                                    <td>{{$total07}}</td>
                                                    <!-- Not Acat-->
                                                    <td>{{$contnacat}}</td>                                                     
                                                    <!-- Acat-->
                                                    <td>{{$contacat}}</td>
                                                </tr>
                                                <tr style="background: #b3ffb3;">
                                                    <td>TOTAL</td>
                                                    <td><?= $total01 + $total02 + $total03 + $total04 + $total05 + $total05 + $total06 + $total07; ?></td>
                                                    <td><?= $totalnacatada;?></td>
                                                    <td><?= $totalacatada;?></td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                        <?php }?>
                                    </div>
                                        <?php }?><!-- fechamento for -->
                                </div> <!-- panel-body -->
                            </div>
                        </div> <!-- panel -->
                    </div> <!-- Final do Primeiro panel (TAB:popular) -->

                </div>


            </div> <!-- contentpanel -->
        </div> <!-- mainpanel -->
    </section>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tem certeza que deseja excluir esse preposto? </h4>
                </div>
                <div class="modal-body">
                    Caso você exclua esse preposto, ele não poderá mais responder as notificações.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Não, desejo cancelar</button>
                    <a class="btn btn-danger btn-ok">Sim, tenho certeza</a>
                </div>
            </div>
        </div>
    </div>


    @include('Default.endScripts')

    <script>
        $(document).ready(function () {

            // Error Message In One Container
            $('#basicForm').validate({
                errorLabelContainer: jQuery('#basicForm div.error')
            });

            $('.select2').select2();

            // Input Masks
            //$("#mapreposto").mask("c0000000");


            //$('#dataTable1').DataTable();

            $('.dataTable1').dataTable({
                "order": [[0, "desc"]],
                "pageLength": 25,
                "oLanguage": {
                    "sProcessing": "Aguarde enquanto os dados são carregados ...",
                    "sLengthMenu": "Mostrar _MENU_ registros por pagina",
                    "sZeroRecords": "Nenhum registro correspondente ao criterio encontrado",
                    "sInfoEmtpy": "Exibindo 0 a 0 de 0 registros",
                    "sInfo": "Exibindo de _START_ a _END_ de _TOTAL_ registros",
                    "sInfoFiltered": "",
                    "sSearch": "Procurar",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Próximo",
                        "sLast": "Último"
                    }
                }
            });

            $("#alerta").fadeOut(5200);


            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });


        });
    </script>


</body>
<html></html>
