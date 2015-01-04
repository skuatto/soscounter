{% extends:'parent_layout' %}
{% block:contenido %}
	{% if ($session->hasFlash('success')) %}
	<div class="alert alert-success" role="alert">
		{{ $session->getFlash('success') }}
	</div>	
	{% endif %}
	<article class="jumbotron">
		<header>
			<form action="{{$urlbuilder->toRoute('incrementar_contador')}}" method="post">
				<div class="row">
					<div class="col-md-5">
				    	<textarea class="form-control" rows="3" name="comentario" placeholder="Por que hizo mini standup?"></textarea>
				    </div>
				</div>
				<div class="row mt20">
					<div class="col-md-5">
						<button type="submit" class="btn btn-success">
							 Count++
						</button>
					</div>
				</div>
			</form>
		</header>	
	</article>
{% endblock %}