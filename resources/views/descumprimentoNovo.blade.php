 @include('Default.head')

<body>
	@include('Default.header')
	<link rel="stylesheet" href="{{ asset("theme/lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.css") }}">


	<section>
		@include('Default.leftpanel')



		<div class="mainpanel">

			<div class="contentpanel">

				<!-- Breadcrump -->
				<ol class="breadcrumb breadcrumb-quirk">
					<li><a href="#"><i class="fa fa-home mr5"></i> Dashboard</a></li>
					<li><a href="#">Descumprimento contratual</a></li>
				</ol>
				<!-- Final Breadcrump -->


				<!-- ABAS DA TAB -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#recent" data-toggle="tab"
						aria-expanded="false">Novo descumprimento contratual</a></li>
				</ul>
				<!--Final da ABAS DA TAB -->


				<div class="tab-content mb20">

					<div class="tab-pane active" id="recent">
						<div class="row">
							<div class="col-md-12">
								<div class="panel">
									<div class="panel-heading nopaddingbottom">
										<h4 class="panel-title">Preencha corretamente o formulário
											abaixo</h4>
									</div>
									<br>
									<div class="panel-body nopaddingtop">

										<form id='basicForm' name='basicForm'
											enctype="multipart/form-data"
											action='{{ url("descumprimento/incluir/")}}' method="post"
											class='form-horizontal'>
											<input type="hidden" name="_token" value="{{ csrf_token() }}">

											<div class="error"></div>


											<div class="form-group">
												<label class="col-sm-3 control-label">Contrato <span
													class="text-danger">*</span></label>
												<div class="col-sm-8">
													<select class="select2" id="id_contrato" name="id_contrato"
														style="width: 100%"
														data-placeholder="Selecione o contrato"
														title="Você precisa selecionar um contrato" required>
														<option value=""></option> @foreach ($Contratos as
														$Contrato)
														<option value="{{ $Contrato->id_contrato }}">{{
															$Contrato->nu_contrato }}</option> @endforeach

													</select>

												</div>
											</div>
											<!-- form-group -->

											<hr>






											<div class="form-group">
												<label class="col-sm-3 control-label">Título</label>
												<div class="col-sm-8">
													<input type="text" name="ds_titulo" id="ds_titulo" value=""
														class="form-control"
														title="Você precisa informar um resumo do ocorrido"
														required />
												</div>
											</div>







											<div class="form-group">
												<label class="col-sm-3 control-label">Descrição do
													descumprimento </label>
												<div class="panel-body col-sm-9" style="margin-left: -10px">
													<textarea style="width: 90.7%;" name="ds_descumprimento"
														id="ds_descumprimento"
														placeholder="Preencha esse campo com a descrição do descumprimento contratual"
														class="wtext" rows="22"></textarea>
												</div>
											</div>
											<!-- form-group -->

											<hr>

											<div class="form-group">
												<label class="col-sm-3 control-label">Arquivo anexo: </label>
												<div class="col-sm-8">
													<input type="file" name="nome_anexo" id="nome_anexo"
														value="" class="form-control" placeholder="" />
												</div>
											</div>

										
									</div>


								</div>
								<!-- form-group -->

								<hr>

								<div class="row">
									<div class="col-sm-9 col-sm-offset-3">

										<button type="submit"
											class="btn btn-wide btn-primary btn-quirk mr5">Cadastrar</button>


										<button type="button" onClick="history.back();"
											class="btn btn-wide btn-default btn-quirk">Cancelar</button>
									</div>
								</div>
								</form>

							</div>
							<!-- panel-body -->
						</div>
						<!-- panel -->
					</div>
					<!-- col-md-6 -->
				</div>
			</div>
			<!-- Final da tab -->
		</div>





		<div></div>
		<!-- contentpanel -->
		<div></div>
		<!-- mainpanel -->
	</section>






	@include('Default.endScripts')

	<script src="{{ asset("theme/lib/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.all.js") }}"></script>
	<script src="{{ asset("theme/lib/wysihtml5x/wysihtml5x.js") }}"></script>
	<script src="{{ asset("theme/lib/wysihtml5x/wysihtml5x-toolbar.js") }}"></script>


	<script>
	$(document).ready(function(){
	  'use strict';
	
	
	  // HTML5 WYSIWYG Editor
	  $('.wtext').wysihtml5({
	   toolbar: {
	    "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
	    "emphasis": true, //Italics, bold, etc. Default true
	    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
	    "html": false, //Button which allows you to edit the generated HTML. Default false
	    "link": true, //Button to insert a link. Default true
	    "image": false, //Button to insert an image. Default true,
	    "color": false, //Button to change color of font  
	    "blockquote": true, //Blockquote  
	    
	  }
	  });
	
	
	  $('.select2').select2();
	
	  // Error Message In One Container
	  $('#basicForm').validate({
	   	errorLabelContainer: jQuery('#basicForm div.error')
	  });




  

  

});   
</script>


</body>
<html></html>
