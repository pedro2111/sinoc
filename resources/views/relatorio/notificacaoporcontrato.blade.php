@include('Default.head')

<body>
@include('Default.header')


  <section>
  @include('Default.leftpanel')



    <div class="mainpanel">

      <div class="contentpanel">

        <!-- Breadcrump --> 
        <ol class="breadcrumb breadcrumb-quirk">
          <li><a href="index.html"><i class="fa fa-home mr5"></i> Relatório</a></li>
        </ol>
        <!-- Final Breadcrump --> 


         <!-- ABAS DA TAB -->  
        <ul class="nav nav-tabs">
          <li class="active"><a href="#popular" data-toggle="tab" aria-expanded="false">Notificações por contrato</a></li>        
        </ul>
        <!--Final da ABAS DA TAB --> 


        <div class="tab-content mb20">

          <div class="tab-pane active" id="popular">
            <div class="panel">
            

			<div class="">
	          <div class="panel">
	            <div class="panel-heading">
	              <h4 class="panel-title">Número de notificações por contrato</h4>
	              
	            </div>
	            <div class="panel-body">
	              <div id="piechart" class="flot-chart col-sm-6 right"></div>
	              
	              <div class="col-sm-6">
	                <ul>
		                @foreach ($arrayPizza as $p)
	    	            	<li>
	    	            		Contrato : {{ $p->nu_contrato }} - Número de notificações : {{$p->count }}
	    	            	</li>
	        			@endforeach

	                </ul>
                   
	              </div>
	            </div>
	          </div><!-- panel -->
	        </div>


              
            </div> <!-- panel -->
          </div> <!-- Final do Primeiro panel (TAB:popular) --> 

          
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


  function showTooltip(x, y, contents) {
		$('<div id="tooltip" class="tooltipflot">' + contents + '</div>').css( {
		  position: 'absolute',
		  display: 'none',
		  top: y + 5,
		  left: x + 5
		}).appendTo('body').fadeIn(200);
	}
  

  var piedata = [
                 //Dados vindos do blade do laravel
                 @foreach ($arrayPizza as $p)
                  { label: '{{ $p->nu_contrato }}', data: [[ {{$p->count }} , {{$p->count }} ]], color: '#BBBBBB'}, 
         		 @endforeach
         	 ];

             $.plot('#piechart', piedata, {
                 series: {
                     pie: {
                         show: true,
                         radius: 1,
                         label: {
                             show: true,
                             radius: 2/3,
                             formatter: labelFormatter,
                             threshold: 0
                         }
                     }
                 },
                 grid: {
                     hoverable: true,
                     clickable: true
                 }
             });

             function labelFormatter(label, series) {
         		return '<div style="font-size:8pt; text-align:center; padding:2px; color:white;">' + label + '<br>' + Math.round(series.percent) + '%</div>';
         	}
           
  

});   
</script>



<script src="{{ asset("theme/lib/flot/jquery.flot.js") }}"></script>

<script src="{{ asset("theme/lib/flot/jquery.flot.pie.js") }}"></script>





</body>
<html></html>
