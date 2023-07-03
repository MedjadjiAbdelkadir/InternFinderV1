
<div class="mb-3">
    <div class="header-content text-center pt-5">
        <h1>Last Formations</h1>
        <p>Some of the announcements that were posted last week on our site.</p>
    </div>
    <div class="main-contnet row">
        @foreach ($formations as $formation)        
            <div class="col-sm-12 col-md-4">
                <a href="{{route('formation',$formation->id)}}" class="card py-3 text-dark" >
                    <div class="row pl-2">
                        <div class="col-md-3 col-lg-3">
                            <img  class="img-fluid rounded-circle"  src="{{$formation->company->avatar}}">
                        </div>
                        <div class="col-md-9">
                            <h4 class="">
                                {{-- <i class="fa fa-building mr-1" aria-hidden="true"></i> --}}
                                {{ substr($formation->company->name,0, 32) }}
                            </h4>
                            <h6 class="">
                                <i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
                                {{$formation->municipals->name}} , {{$formation->municipals->states->name}}
                            </h6>
                            <h6 class="">
                                <i class="fa fa-calendar-o mr-1" aria-hidden="true"></i> {{ date('d M Y',strtotime($formation->start)) }} To {{ date('d M Y',strtotime($formation->end)) }}  
                            </h6>
                            <h6 class="">
                                <i class="fa fa-users mr-1" aria-hidden="true"></i> {{$formation->nbr_place}}  Places
                            </h6>
                            <h6>
                                <i class="fa fa-clock mr-1"></i> {{$formation->permanence == 1 ? 'Full Time' : 'Part Time' }}
                            </h6>
                        </div>
                    </div>
                </a> <!-- End Card -->
            </div>
        @endforeach
    </div>
    <div class="header-contnet">
        <a href="{{route('formations')}}" class="btn btn-primary">Show All Formations</a>
    </div>
</div>
    