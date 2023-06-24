{{-- <div class="mb-3">
    <div class="header-content text-center pt-5">
        <h1>Search for advertisements for training</h1>
        <p>Some of the announcements that were posted last week on our site.</p>
    </div>
    <div class="main-contnet row">

    </div>
</div> --}}

<!-- Start Header Section-->

<div class="header-section" style="width: 100%">
	<div class="container">
		<div class="row justify-content-md-center align-items-center">
			<div class="col">
				<div class='header-title'>
					<h1>Are you looking for internship?</h1>
					<p>We will help you find the best internship for you</p>
				</div>
				<div class="header-body">
					<form method="POST" action="{{route('search.formations')}}">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-md-5 col-lg-5 pb-2">
                                <div class="title">
                                    <i class="fa fa-2x fa-search" aria-hidden="true"></i>
                                    <input type="text" placeholder="Internship title " class="form-control rounded-pill" name="title">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-4 col-lg-4 pb-2">
                                <div class="place">
                                    <i class="fa fa-2x fa-map-marker" aria-hidden="true"></i>
                                    <input  type="text" placeholder="Place" class="form-control rounded-pill" name="place">
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-3  col-md-3 pb-2">
                                <button type="submit" class="btn btn-primary  rounded-pill w-100">
                                    Search
                                </button>
                            </div>
                        </div>
					</form>
				</div>
				<div class="header-footer">
					<p>Avez-vous une entreprise ? <a href="#">Publiez votre formation</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Header Section-->