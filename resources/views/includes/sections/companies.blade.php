<div class="mb-3">
    <div class="header-content text-center pt-5">
        <h1>Companies</h1>
        <p>Some of the Companies that have the highest percentage of publication in our site.</p>
    </div>
    <div class="main-contnet row">
        @foreach ($companies as $company)        
            <div class="col-sm-12 col-md-4 col-lg-3">
                <a href="" class="card py-3 text-dark">
                    <div class="row pl-2">
                        <div class="col-md-3 col-lg-3">
                            <img  class="img-fluid rounded-circle" height="80px" src="{{$company->avatar}}">
                        </div>
                        <div class="col-md-9">
                            <h6 class="">
                                <i class="fa fa-building mr-1" aria-hidden="true"></i>{{ substr($company->name,0, 19) }}
                            </h6>
                            <h6 class="">
                                <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>{{$company->municipals->states->name}}
                            </h6>
                        </div>
                    </div>
                </a> <!-- End Card -->
            </div>
        @endforeach
    </div>    
    <div class="header-contnet">
        <a href="{{route('companies')}}" class="btn btn-primary">Show All Companies</a>
    </div>
</div>
