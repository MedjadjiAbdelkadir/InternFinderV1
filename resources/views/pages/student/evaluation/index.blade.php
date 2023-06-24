@extends('layouts.master')
@push('title')| All Evaluation @endpush
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
				{{-- <!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Formation</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All Formation</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb --> --}}
@endsection

@section('content')

                    <div class="card mb-3 pb-0 w-100 mt-2">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="content-title mb-0 my-auto">All Evaluation</h4>

                                <a type="button" href="{{ route('student.evaluation.create',['name'=>auth('student')->user()->full_name]) }}" class="btn btn-primary ml-2">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                    Create Evaluation
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @empty(!$evaluations)  
                                <div class="table-responsive border-top userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center"><span>id</span></th>
                                                <th class="text-center"><span>Student</span></th>
                                                <th class="text-center"><span>Title</span></th>
                                                <th class="text-center"><span>Notes</span></th>
                                                <th class="text-center"><span>Estimation</span></th>
                                                
                                                <th class="text-center"><span>Created</span></th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($evaluations as $item => $evaluation)
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"><span>{{$item }}</span></td>
                                                    <td class="text-center"><span>{{$evaluation->students->last_name}} {{$evaluation->students->first_name}}</span></td>
                                                    <td class="text-center"><span>
                                                        {{ substr($evaluation->formations->title,0, 55)}}
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->finalMark}}</span></td>
                                                    <td class="text-center"><span>
                                                        @if($evaluation->finalMark >= 15)
                                                            Very Good
                                                        @elseif($evaluation->finalMark >= 14 && $evaluation->finalMark <= 15)
                                                            Good
                                                        @elseif($evaluation->finalMark < 14 && $evaluation->finalMark >= 10)
                                                            Middle
                                                        @else
                                                            Weak
                                                        @endif
                                                    </span></td>
                                                    <td class="text-center"><span>{{$evaluation->created_at->format('d M Y')}}</span></td>
                                                    <td class="text-center">

                                                        <a href="{{route('student.evaluation.show', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                            <i class="fa fa-eye fa-2x text-primary" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="{{route('student.evaluation.edit', ['name'=> auth('student')->user()->full_name , 'evaluation'=>$evaluation->id] )}}" class="mr-2">
                                                        
                                                            <i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i>
                                                        </a>
                                                        {{-- <a href="{{route('student.formations.apply.show', ['name'=>auth('student')->user()->full_name , 'formation'=>$evaluation->formation_id , 'apply'=>$evaluation->apply_id]	)}}" class="mr-2 btn btn-sm btn-primary">
                                                            Show Profile
                                                        </a>  --}}
                                                    
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endempty
                                        
                            @if (empty($evaluations))
                            There are no evaluations
                            @endif

							
                        </div>
                        <div class="card-footer mg-y-0 pd-y-0 pt-2">
                            @if(isset($evaluations))
                                {!! $evaluations->appends(['sort' => 'votes'])->links() !!}
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


@endsection