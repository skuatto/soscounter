<!DOCTYPE html>
<html>
<head>
	<script source="{{$urlbuilder->base()}}/assets/js/bootstrap.min.js"></script>
	<script source="{{$urlbuilder->base()}}/assets/js/npm.js"></script>

	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/soscounter.css">
 	<link rel="stylesheet" href="{{$urlbuilder->base()}}/assets/css/bootstrap-theme.min.css">
	
	
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

                {% if($session->has('nombre')) %}
					<li><a href="{{$urlbuilder->toRoute('logout')}}">Me las piro!</a></li>
				{% else %}		
					<li><a href="{{$urlbuilder->toRoute('login')}}">Como te llamas?</a></li>
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

	<footer>
		<div class="container footer">
		
			<div class="row">
				<div class="col-md-11" style="margin-top:14px; text-shadow: 1px 1px 1px #fff;padding: 6px 0 6px 0;">
					<p>
						© DON'T COPY THIS WEBPAGE AND SITDOWN PLEASE!
					</p>
				</div>
				
				<div class="col-md-1" style="padding: 6px 0 6px 0">
					<a href="http://makoframework.com"><img id="mako" src="{{$urlbuilder->base()}}/assets/img/mako.png" alt="Mako" title="Powered by Mako" height="50" width="50"></a>
				</div>
				<div class="clear">
					
				</div>
			</div>
		</div>
	</footer>
	
</body>
</html>




