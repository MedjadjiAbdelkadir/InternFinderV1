@extends('layouts.master')
@push('title')| All  Formations @endpush
@section('css')


<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('modals')
<!-- Start Modal Cancel Join Formation -->
<div class="modal" id="cancel-join-formation">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content tx-size-sm">
            <form method="post" id="cancelFormationForm">
                @csrf               
                @method('DELETE')
                <input type="hidden" value="3" class="form-control" id="status" name="status" />
                <div class="modal-body tx-center pd-y-20 pd-x-20">
                    <button aria-label="Close" class="close " data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button> 
                    <i class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                    <h4 class="tx-danger mg-b-20">Cancel !</h4>
                    <p class="mg-b-20 mg-x-20">Are you sure you want to Cancel Join this formation</p>
                    <button class="btn ripple btn-danger pd-x-25" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Cancel Join Formation -->
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Formation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Formation</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')

                    <div class="card mb-3 pb-0 w-100 mt-3">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <div>
                                
                                </div>
                                {{-- <a type="button" href="{{ route('company.formations.create',auth('company')->user()->name) }}" class="btn btn-primary ml-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Create Formation
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            @if($formations->count() > 0)
                                <div class="table-responsive border-top userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><span>id</span></th>
                                                <th class="text-center"><span>Company</span></th>
                                                <th class="text-center"><span>Title</span></th>
                                                <th class="text-center"><span>Region</span></th>
                                                <th class="text-center"><span>Duartion</span></th>
                                                {{-- <th class="text-center"><span>Region</span></th> --}}
                                                <th class="text-center"><span>Places</span></th>
                                                <th class="text-center"><span>Status</span></th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    
                                            @foreach ($formations as $item=>$formation)
                                            <tr>
                                                <td class="text-center">{{$item++}}</td>
                                                <td>{{$formation->company->name}}</td>
                                                <td>{{$formation->title}}</td>
                                                <td>{{$formation->municipals->name}},{{$formation->municipals->states->name}}</td>
                                                <td class="text-center">{{$formation->start->format('d M Y')}} <br> {{$formation->end->format('d M Y')}}</td>
                                            
                                                <td class="text-center">{{$formation->nbr_place}}</td>
                                                <td class="text-center">
                                                    @foreach($formation->participants as $participants)
                                                    
                                                        @if ($participants->status == 1)
                                                        <span class="text-primary">Registered</span>
                                                        @elseif($participants->status == 2)
                                                        <span class="text-warning">In Processing</span> 
                                                        @elseif($participants->status == 3)
                                                        <span class="text-danger">Rejected</span>
                                                        @else 
                                                        <span class="text-success">Accept</span> 
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-center btn btn-sm ">
                                                    <a href="{{route('student.formations.show', ['name'=>auth('student')->user()->full_name, 'formation'=>$formation->id])}}" class="mr-2">
                                                        <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                    </a>
                                                    <a type="button" class="text-white px-2" id="btn_cancel_formation"
                                                        data-toggle="modal" data-target="#cancel-join-formation"
                                                        data-bs-url="{{ route('student.formations.destroy', ['name'=>auth('student')->user()->full_name ,'formation'=>$formation->id]) }}"
                                                    >
                                                    <i class="fa fa-trash-o fa-2x mr-1 text-danger " aria-hidden="true"></i>
                                                    {{-- Cancel the joining request --}}
                                                    </a>
                                                    @if ($participants->status == 4)
                                                    <a  class="mr-2"
                                                        href="{{route('student.formations.show', ['name'=>auth('student')->user()->full_name, 'formation'=>$formation->id])}}"
                                                    >
                                                        <i class="fa fa-star-o fa-2x text-primary" aria-hidden="true"></i>
                                                    </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            
                            @else
                            <span>There are no requests for you to join</span>
                            @endif
                                            
                        </div>
                        <div class="card-footer mg-y-0 pd-y-0">
                            @if(isset($formations))
                                {!! $formations->appends(['sort' => 'votes'])->links() !!}
                            @endif 
                        </div>
                    </div><!-- End Card -->

                </div>
            </div>
            <!-- Container closed -->

@endsection
@section('js')

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script> 

<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script>
	$(document).ready(function() {
		$(document).on('click', '#btn_cancel_formation', function(event){
			console.log('Cliked Btn Remove Formations')
			var url = $(this).data('bs-url');
			console.log(url);
			$('#cancelFormationForm').attr('action', url);
		});
	});
</script>
@endsection