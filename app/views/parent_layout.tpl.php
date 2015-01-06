<!DOCTYPE html>
<html>
<head>
	<script src="{{$urlbuilder->base()}}/assets/js/bootstrap.min.js"></script>
	<script src="{{$urlbuilder->base()}}/assets/js/npm.js"></script>
	<script src="{{$urlbuilder->base()}}/assets/js/Chart.min.js"></script>

	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/bootstrap.min.css">
 	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/bootstrap-theme.min.css">
 	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/soscounter.css">
	
	
</head>
<body>
	
   <div id="wrap">

      	<nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="#">SOSCOUNTA</a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">

                {% if($session->has('username')) %}
					<li><a href="{{$urlbuilder->toRoute('logout')}}">Me las piro!</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>Hola me <strong>llamas</strong> {{ $session->get('username') }}</li>
				</ul>
				{% else %}		
					<li><a href="{{$urlbuilder->toRoute('login')}}">Como te <strong>llamas</strong>?</a></li>
	            {% endif %}
				
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>

		<div class="container">
			<header>
				<h1>SOSITA COUNTER</h1>
			</header>
			{{block:contenido}}{{endblock}}
		</div>

	</div>
	<div class="clear"></div>
	<footer>
		<div class="container">
		
			<div class="row">
				<div class="col-md-10" style="margin-top:14px; text-shadow: 1px 1px 1px #fff;padding: 8px 0 8px 0;">
					<p>
						© DON'T COPY THIS WEBPAGE AND SITDOWN PLEASE!
					</p>
				</div>
				
				<div class="col-md-1" style="padding: 8px 0 8px 0;text-align:right;">
					<a target="_blank" href="https://github.com/skuatto/soscounter"><img id="github" src="{{$urlbuilder->base()}}/assets/img/Octocat.png" alt="github" title="Github" height="50" width="50"></a>
				</div>
				<div class="col-md-1" style="padding: 8px 0 8px 0;text-align:center;">
					<a target="_blank" href="http://makoframework.com"><img id="mako" src="{{$urlbuilder->base()}}/assets/img/mako.png" alt="Mako" title="Powered by Mako" height="50" width="50"></a>
				</div>
				<div class="clear">
					
				</div>
			</div>
		</div>
	</footer>
	<script>
		 {{block:scripts}}{{endblock}}
	</script>
</body>
</html>




