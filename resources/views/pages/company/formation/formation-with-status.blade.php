@extends('layouts.master')
@push('title')| All {{ucfirst($status)}} Formation @endpush
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

<!-- Start Modal Delete Formation -->
<div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="ModalSkillsTitle" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header pt-2 pb-2">
				<h5 class="modal-title" id="modal-title">
					<i class="bi bi-trash3-fill text-danger"></i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form method="post"  id="removeForm">
				@method('DELETE')
				@csrf
				<div class="modal-body text-center pt-0 pb-0">
					<p class="pt-3 pb-3">
						Are you sure you want to delete this <span id="contnet-model"></span>
					<p/>
				</div>
				<div class="modal-footer text-center">
					<button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
						Cancel
					</button>
					<button type="submit" class="btn btn-danger">
						Delete
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal Delete Formation -->
@endsection
@section('page-header')

@endsection

@section('content')

                    <div class="card mb-3 pb-0 w-100 mt-2">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="content-title mb-0 my-auto">All {{ucfirst($status)}} Formation </h4>

                                <a type="button" href="{{ route('company.formations.create',auth('company')->user()->name) }}" class="btn btn-primary ml-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Create Formation
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive border-top userlist-table">
                                <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><span>id</span></th>
                                            <th class="text-center"><span>Title</span></th>
                                            <th class="text-center"><span>Duration</span></th>
                                            <th class="text-center"><span>Places</span></th>
                                            <th class="text-center"><span>Applys</span></th>
                                            
                                            {{-- <th class="text-center"><span>Created</span></th> --}}
                                            {{-- <th class="text-center"><span>Status</span></th> --}}
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($formations as $item=>$formation)
                                        <tr>
                                            <td class="text-center">{{$item++}}</td>
                                            <td>{{ substr($formation->title,0, 55)}}</td>
                                            <td class="text-center">{{$formation->start->format('d M Y')}} - {{$formation->end->format('d M Y')}}</td>
                                            
                                            <td class="text-center">{{$formation->nbr_place}}</td>
                                            <td class="text-center">{{$formation->participants->count()}}</td>

                                            <td class="text-center btn btn-sm ">
                                                <a href="{{route('company.formations.show', ['name'=>auth('company')->user()->name , 'formation'=>$formation]	)}}" class="mr-2">
                                                    <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('company.formations.apply.index',['name'=>auth('company')->user()->name , 'formation'=>$formation])}}" class="mr-2">
                                                    <i class="fa fa-users fa-2x"></i>
                                                </a>
                                                @if($status !== 'finished')
                                                <a href="{{route('company.formations.edit', ['name'=>auth('company')->user()->name , 'formation'=>$formation]	)}}" class="mr-2">
                                                    {{-- Edit --}}
                                                    <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                </a>
                                                
                                                @endif

                                                {{-- <a href="" class="btn btn-sm btn-danger">
                                                    
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a> --}}
                                                <a type="button" class="mr-2" id="modal-remove"
                                                    data-toggle="modal" data-target="#modal-remove"
                                                    data-bs-item="Formation"
                                                    data-bs-title="Delete Formation"
                                                    data-bs-url="{{ route('company.formations.destroy', ['name'=>auth('company')->user()->name ,'formation'=>$formation->id]) }}"
                                                >
                                                    <i class="fa fa-trash-o fa-2x text-danger" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>							
                        </div>
                        <div class="card-footer mg-y-0 pd-y-0 pt-2">
                            @if(isset($formations))
                                {!! $formations->appends(['sort' => 'votes'])->links() !!}
                            @endif 
                        </div>
                    </div><!-- End Card -->
                </div>
            </div><!-- Container closed -->

@endsection
@section('js')

<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script> 

<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

<script>
	$(document).ready(function() {
		$(document).on('click', '#modal-remove', function(event){
			console.log('Cliked Btn Remove Formations')
			var content = $(this).data('bs-item')
			var title = $(this).data('bs-title')

			console.log('title', title);
			console.log('content', content);

			$('#modal-title').empty()
			$('#contnet-model').empty()
			$('#modal-title').append('<span>' + title + '</span>');
			$('#contnet-model').append('<span>' + content + '</span>');
	
			var url = $(this).data('bs-url');
			console.log(url);
			$('#removeForm').attr('action', url);
		});
	});
</script>
@endsection