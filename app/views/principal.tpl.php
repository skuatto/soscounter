{% extends:'parent_layout' %}
{% block:contenido %}
	{% if ($session->hasFlash('success')) %}
	<div class="alert alert-success" role="alert">
		{{ $session->getFlash('success') }}
	</div>	
	{% endif %}
	<div class="jumbotron">
		<form action="{{$urlbuilder->toRoute('incrementar_contador')}}" method="post">
			<div class="row">
				<div class="col-md-11">
			    	<textarea class="form-control" rows="2" name="comentario" placeholder="Por que hizo mini standup?"></textarea>
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
	</div>
	<div class="jumbotron mt30">
		<div class="row">
			<div class="col-md-5">
				<header>
					<h2>Semanal</h2>
				</header>
				<canvas id="barchart" width="500" height="500"></canvas>
			</div>
			<div class="clearfix col-md-6 col-md-offset-1">
				<header>
					<h2>Global</h2>
				</header>
				????
				????
				??
				??
				AUN NO LO HIZE EJEJEJEJ
			</div>
		</div>
	</div>
	{% endblock %}

		{% block:scripts %}

		var barChartData = {
			   labels: ["Lunes", "Martes", "Miercoles", "Jueves", "Viernes"],
			   datasets: [
			   	{
		           label: "test",
		           fillColor: "rgba(151,187,205,0.5)",
		           strokeColor: "rgba(151,187,205,0.8)",
		           highlightFill: "rgba(151,187,205,0.75)",
		           highlightStroke: "rgba(151,187,205,1)",
		           data: [   {% foreach($contadores as $contador) %}  {{ $contador->cantidad }} {% if( $databaseHelper->isNotLastRow($contador)) %},{% endif %} {% endforeach %} ]
			     }
			   ]
			};

		window.onload = function(){
			var ctx = document.getElementById("barchart").getContext("2d");
			window.myLine = new Chart(ctx).Bar(barChartData, {
					responsive: true,
				});

				myLine.resize();

		}
		{% endblock %}