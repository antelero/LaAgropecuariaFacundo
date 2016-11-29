<section id="slider">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						{{-- <li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li> --}}
					</ol>

					<div class="carousel-inner">
						<div class="item active">
							<div class="col-sm-4">
								<h1><span>L</span>A <span>A</span>GROPECUARIA</h1>
								<h2>Visitenos</h2>
								<p>Nos ubicamos en Jose de la Iglesia N° 1591 S.S de Jujuy Argentina. </p>
								<button type="button" class="btn btn-default get">Ver</button>
							</div>
							<div class="col-sm-8">
								<img src="{{ asset('assets/web/images/home/local.png') }}" class="girl img-responsive" alt="" />
							</div>
						</div>
					</div>

					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					</a>
					<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
						<i class="fa fa-angle-right"></i>
					</a>
				</div>

			</div>
		</div>
	</div>
</section>
