{% extends:'parent_layout' %}
{% block:contenido %}
	<article class="jumbotron">
		<header>
			<form action="{{$urlbuilder->toRoute('loguearse')}}" method="post">
				<div class="row">
					<div class="col-md-5">
					<h4>Como te llamas?</h4>
					</div>
				</div>
				<div class="row mt15">
					<div class="col-md-5">
				    	<input type="text" class="form-control" name="username" placeholder="Usuario" value="">
				    </div>
				</div>
				<div class="row mt15">
					<div class="col-md-5">
				    	<input type="text" class="form-control" name="password" placeholder="Contraseña" value="">
				    </div>
				</div>
				<div class="row mt20">
					<div class="col-md-5">
						<button type="submit" class="btn btn-success">
							 Me logeo!
						</button>
					</div>
				</div>
			</form>
		</header>	
	</article>
{% endblock %}