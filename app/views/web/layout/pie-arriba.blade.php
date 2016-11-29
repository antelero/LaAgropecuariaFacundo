<div class="footer-top">
	<div class="container">
		<div class="row">
			<h1 class="text-center">
				<b>VISITE TAMBIEN</b>
			</h1>
			<div class="col-sm-15">

				@foreach ($publicidades as $publicidad)
					@if ($publicidad->id != 'primer')
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="{{ $publicidad->link }}" target="_blank">
									<div class="iframe-img">
										<img src="{{ asset('assets/imagen/publicidad/' . $publicidad->imagen) }}" alt="">
									</div>
								</a>
								<p>{{ $publicidad->nombre }}</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>