@extends('layouts.master')
@push('title')| Account Profile @endpush

@section('css')

@endsection
@section('modals')
<!-- Modal Edit Information Profile -->
<div class="modal fade" id="modal-edit-information" tabindex="-1" role="dialog" aria-labelledby="ModalEducationTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('student.update', auth('student')->user()->full_name)}}">
                @csrf               
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                                <label>First Name </label>
                                <input type="text" value="{{auth('student')->user()->first_name}}" class="form-control" id="first_name" name="first_name" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                                <label>Last Name </label>
                                <input type="text" value="{{auth('student')->user()->last_name}}" class="form-control" id="last_name" name="last_name" />                                
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                                <label>Phone</label>
                                <input type="text" value="{{auth('student')->user()->phone}}" class="form-control" name="phone" id="phone"/>   
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                               <label for="gender">Gender</label>
                               <select class="form-control @error('gender') is-invalid @enderror" 
                                  id="gender" name="gender" value="{{ old('gender') }}">
                                  <option hidden value="{{auth('student')->user()->gender}}">{{auth('student')->user()->gender}}</option>

                                  <option value="Male">Male</option>
                                  <option value="Female">Female</optionv>
                               </select>
                               @error('gender')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                            </div>
                         </div>


                        
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                               <label for="state">State</label>
                               <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                <option  value="{{auth('student')->user()->municipals->states->id}}" hidden >{{auth('student')->user()->municipals->states->name}}</option>
  
                                   @foreach ($states as $item => $state)
                                   <option value="{{$state->code}}">{{$state->name}}</option>
                                   @endforeach
                               </select>
       
                               @error('state')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                         </div>



                         <div class="col-sm-12 col-md-6">
                            <div class="form-group mb-1">
                               <label for="city">Municipal</label>
                               <select class="form-control @error('municipal') is-invalid @enderror" name="municipal" id="municipal">
                               <option  value="{{auth('student')->user()->municipals->id}}" hidden >{{auth('student')->user()->municipals->name}}</option>
                               @foreach ($municipals as $municipal)
                               <option value="{{$municipal->id}}">{{$municipal->name}}</option>
                               @endforeach
                               </select>
       
                               @error('municipal')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                           <script>
                            $(document).ready(function() {
                                $('#state').change(function() {
                                    var state = $(this).val();
                                    console.log(state);
                                    if (state) {
                                        $.ajax({
                                            url: '/city',
                                            type: 'get',
                                            dataType: 'json',
                                            data: {state: state},
                                            success: function(response) {
                                                
                                               $('#municipal').empty();
                                                $.each(response, function(key, value) {
                                                    $('#municipal').append('<option value="' + value.id + '">' + value.name + '</option>');
                                                });
                                            }
                                        });
                                    } else {
                                        $('#municipal').empty();
                                        $('#municipal').append('<option hidden >Select a municipality</option>');
                                    }
                                });
                            });
                        </script>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary mr-2">
                    Cancel
                    </button>
                    <button type="submit" class="btn btn-success">
                    Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Edit Information Profile -->

<!-- Start Modal Create University Education -->
<div class="modal fade" id="modal-create-university_education" tabindex="-1" role="dialog" aria-labelledby="ModalEducationTitle"aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Create University Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form  method="POST"  action="{{route('student.universities.store' , ['name'=>auth('student')->user()->full_name])}}">
                
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Degree</label>
                               <select class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree">
                                   <option selected disabled hidden>Select Degree</option>
                                   @foreach ($degree_universities as $item => $degree)
                                   <option value="{{$degree->id}}">{{$degree->name}}</option>
                                   @endforeach
                               </select>
       
                               @error('degree')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group mb-1">
                               <label>University</label>
                               <select class="form-control @error('university') is-invalid @enderror" name="university" id="university">
                                   <option selected disabled hidden>Select University</option>
                                   @foreach ($universities as $item => $university)
                                   <option value="{{$university->id}}">{{$university->name}}</option>
                                   @endforeach
                               </select>
       
                               @error('university')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Specialty</label>
                               <select class="form-control @error('specialty') is-invalid @enderror" name="specialty" id="specialty">
                                   <option selected disabled hidden>Select Specialty</option>
                                   @foreach ($specialty_universities as $item => $specialty)
                                   <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                   @endforeach
                               </select>
                               @error('university')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start" id="start"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label for="EndDate">End Date</label>
                                <input type="date"  class="form-control" name="end" id="end"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group mb-1">
                                <label for="">Description</label>
                                <textarea
                                    oninput="limitWords(event)"
                                    class="form-control"
                                    onkeypress="return imposeMaxLength(this, 100);"
                                    name="description" id="description" 
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Create University Education -->


<!-- Start Modal Edit University Education -->
<div class="modal fade" id="modal-edit-university_education" tabindex="-1" role="dialog" aria-labelledby="ModalEducationTitle"aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Edit University Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form method="post"id="EditUniversityEducationForm">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Degree</label>
                               <select class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree">
                                   <option selected disabled hidden>Select Degree</option>
                                   @foreach ($degree_universities as $item => $degree)
                                   <option value="{{$degree->id}}">{{$degree->name}}</option>
                                   @endforeach
                               </select>
       
                               @error('degree')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-8">
                            <div class="form-group mb-1">
                               <label>University</label>
                               <select class="form-control @error('university') is-invalid @enderror" name="university" id="university">
                                   <option selected disabled hidden>Select University</option>
                                   @foreach ($universities as $item => $university)
                                   <option value="{{$university->id}}">{{$university->name}}</option>
                                   @endforeach
                               </select>
                               @error('university')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Specialty</label>
                               <select class="form-control @error('specialty') is-invalid @enderror" name="specialty" id="specialty">
                                   <option selected disabled hidden>Select Specialty</option>
                                   @foreach ($specialty_universities as $item => $specialty)
                                   <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                   @endforeach
                               </select>
                               @error('university')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>

                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start" id="start"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label for="EndDate">End Date</label>
                                <input type="date"  class="form-control" name="end" id="end"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group mb-1">
                                <label for="">Description</label>
                                <textarea
                                    oninput="limitWords(event)"
                                    class="form-control"
                                    onkeypress="return imposeMaxLength(this, 100);"
                                    name="description" id="description" 
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Edit University Education -->


<!-- Start Modal Create Institute Education -->
<div class="modal fade" id="modal-create-institute_education" tabindex="-1" role="dialog" aria-labelledby="ModalEducationTitle"aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Create Institute Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form  method="POST"  action="{{route('student.institutes.store' , ['name'=>auth('student')->user()->full_name])}}">
                
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Degre</label>
                               <select class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree">
                                   <option selected disabled hidden>Select Degree</option>
                                   @foreach ($degree_institutes as $item => $degre)
                                   <option value="{{$degre->id}}">{{$degre->name}}</option>
                                   @endforeach
                               </select>
                               @error('degree')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>

                        <div class="col-sm-12 col-md-8">
                            <div class="form-group mb-1">
                                <label>Name Institute</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name Institute" name="name" id="name"/>
                                @error('name')
                                <small class="text-danger d-block">
                                   {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Speciality</label>
                                <input type="text" class="form-control  @error('specialty') is-invalid @enderror" placeholder="Enter speciality" 
                                name="specialty" id="specialty" />
                                @error('specialty')
                                <small class="text-danger d-block">
                                   {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start" id="start"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label for="EndDate">End Date</label>
                                <input type="date"  class="form-control" name="end" id="end"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group mb-1">
                                <label for="">Description</label>
                                <textarea
                                    oninput="limitWords(event)"
                                    class="form-control"
                                    onkeypress="return imposeMaxLength(this, 100);"
                                    name="description" id="description" 
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Create Institute Education -->

<!-- Start Modal Create Institute Education -->
<div class="modal fade" id="modal-edit-institute_education" tabindex="-1" role="dialog" aria-labelledby="ModalEducationTitle"aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Edi Institute Education</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form  method="POST" id="EditInstituteEducationForm">
                
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                               <label>Degre</label>
                               <select class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree">
                                   <option selected disabled hidden>Select Degree</option>
                                   @foreach ($degree_institutes as $item => $degre)
                                   <option value="{{$degre->id}}">{{$degre->name}}</option>
                                   @endforeach
                               </select>
                               @error('degree')
                               <small class="text-danger d-block">
                                  {{ $message }}
                               </small>
                               @enderror
                           </div>
                        </div>

                        <div class="col-sm-12 col-md-8">
                            <div class="form-group mb-1">
                                <label>Name Institute</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name Institute" name="name" id="name"/>
                                @error('name')
                                <small class="text-danger d-block">
                                   {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Speciality</label>
                                <input type="text" class="form-control  @error('specialty') is-invalid @enderror" placeholder="Enter speciality" 
                                name="specialty" id="specialty" />
                                @error('specialty')
                                <small class="text-danger d-block">
                                   {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start" id="start"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group mb-1">
                                <label for="EndDate">End Date</label>
                                <input type="date"  class="form-control" name="end" id="end"/>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group mb-1">
                                <label for="">Description</label>
                                <textarea
                                    oninput="limitWords(event)"
                                    class="form-control"
                                    onkeypress="return imposeMaxLength(this, 100);"
                                    name="description" id="description" 
                                ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Create Institute Education -->


<!-- Start Modal Add Experience" -->
<div class="modal fade" id="modal-add-experience" tabindex="-1" role="dialog" aria-labelledby="ModalExperiencesTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
            Add a Experience
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form method="post" action="{{route('student.experience.store' , ['name'=>auth('student')->user()->full_name])}}">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label>Job</label>
                           <select class="form-control @error('job') is-invalid @enderror" name="job" id="job">
                               <option selected disabled hidden>Select Job</option>
                               @foreach ($jobs as $item => $job)
                               <option value="{{$job->id}}">{{$job->name}}</option>
                               @endforeach
                           </select>
   
                           @error('job')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                       </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                            <label>Specialty</label>
                            <input type="text" class="form-control" placeholder="Enter Specialty" id="specialty" name="specialty">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                            <label>Company</label>
                            <input type="text" class="form-control" placeholder="Enter Company" id="company" name="company">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label>Duration Experiences</label>
                           <select class="form-control @error('job') is-invalid @enderror" name="duration" id="duration">
                               <option selected disabled hidden>Select Duration</option>
                               @foreach ($durationExperiences as $item => $duration)
                               <option value="{{$duration->id}}">{{$duration->duration}}</option>
                               @endforeach
                           </select>
   
                           @error('duration')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                       </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group mb-1">
                            <label for="">Description</label>
                            <textarea oninput="limitWords(event)" onkeypress="return imposeMaxLength(this, 100);"
                            class="form-control fixed-size__Description" id="description" name="description"
                            id="comment"></textarea>
                        </div>           
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- End Modal Add Experience" -->

<!-- Start Modal Edit Experience" -->
<div class="modal fade" id="modal-edit-experience" tabindex="-1" role="dialog" aria-labelledby="ModalExperiencesTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
            Edit a Experience
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        <form  method="POST" id="EditExperienceForm">
                
            @method('PUT')
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label>Job</label>
                           <select class="form-control @error('job') is-invalid @enderror" name="job" id="job">
                               <option selected disabled hidden>Select Job</option>
                               @foreach ($jobs as $item => $job)
                               <option value="{{$job->id}}">{{$job->name}}</option>
                               @endforeach
                           </select>
   
                           @error('job')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                       </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                            <label>Specialty</label>
                            <input type="text" class="form-control" placeholder="Enter Specialty" id="specialty" name="specialty">
                            @error('specialty')
                            <small class="text-danger d-block">
                               {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                            <label>Company</label>
                            <input type="text" class="form-control" placeholder="Enter Company" id="company" name="company">
                            @error('company')
                            <small class="text-danger d-block">
                               {{ $message }}
                            </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group mb-1">
                           <label>Duration Experiences</label>
                           <select class="form-control @error('job') is-invalid @enderror" name="duration" id="duration">
                               <option selected disabled hidden>Select Duration</option>
                               @foreach ($durationExperiences as $item => $duration)
                               <option value="{{$duration->id}}">{{$duration->duration}}</option>
                               @endforeach
                           </select>
   
                           @error('duration')
                           <small class="text-danger d-block">
                              {{ $message }}
                           </small>
                           @enderror
                       </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group mb-1">
                            <label for="">Description</label>
                            <textarea oninput="limitWords(event)" onkeypress="return imposeMaxLength(this, 100);"
                            class="form-control fixed-size__Description" id="description" name="description"
                            id="description"></textarea>
                            @error('description')
                            <small class="text-danger d-block">
                               {{ $message }}
                            </small>
                            @enderror
                        </div>           
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                    Cancel
                </button>
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </form>
    </div>
    </div>
</div>
<!-- End Modal Edit Experience" -->


<!-- Start Modal Add Language -->
<div class="modal fade" id="modal-add-language" tabindex="-1" aria-labelledby="ModalSkillsTitle" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
                Add a Language
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form method="post" action="{{route('student.language.store', ['name'=>auth('student')->user()->full_name])}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Language</label>
                        <select class="custom-select" id="inputGroupSelectLanguage" name="lang_name">
                            <option selected disabled hidden>Select Language</option>
                            @foreach ($list_languages as $item => $languages)
                                <option value="{{$languages->id}}">{{$languages->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="custom-select" id="inputGroupSelectlevelLanguage" name="lang_level">
                            <option selected disabled hidden>Select Level</option>
                            @foreach ($level_languages as $item => $level_language)
                                <option value="{{$level_language->id}}">{{$level_language->level}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" aria-label="Close">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Add Language -->



<!-- Start Modal Remove -->
<div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="ModalSkillsTitle" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
            <i class="bi bi-trash3-fill text-danger"></i> Delete <span id="title-model"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        </div>
        {{-- 
        {{route('student.delete.education',1)}}    
        --}}
        <form method="post"  id="removeForm">

            @method('DELETE')
            @csrf
            <div class="modal-body text-center">
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
<!-- End Modal Remove -->

@endsection
@section('page-header')
{{-- <div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Student/h4>
			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
		</div>
	</div>
</div> --}}
@endsection
@section('content')
				<div class="card mb-3 pb-0 w-100 mt-3">
					<div class="card-header d-flex">
						<h4 class="pb-0 pl-2 pb-0">
							<i class="fa fa-id-card mr-1" aria-hidden="true"></i> Profile
						</h4>
						<div class="mg-l-auto pl-2  mt-md-0">
							<a href="" class="mr-2 btn btn-success">
								Download Profile
							</a>
							<a href="" class="mr-2 btn btn-primary"
								id="edit-information"
								data-toggle="modal" data-target="#modal-edit-information"
							>
								Edit
							</a>
						</div>
					</div>
					<div class="card-body pt-0">
						<div class="general-information-section mb-3">
							{{-- <div class="header-content  d-md-flex">
								<h5 class="h4 mb-3"><i class="fa fa-id-card mr-1" aria-hidden="true"></i> Profile </h5>
								<div class="mg-l-auto pl-2 mt-2 mt-md-0">
									<a href="" class="mr-2 btn btn-success">
										Download Profile
									</a>
									<a href="" class="mr-2 btn btn-primary"
										id="edit-information"
										data-toggle="modal" data-target="#modal-edit-information"
									>
										Edit
									</a>
		
								</div>
							</div> --}}
							<div class="pl-3 row">
								<div class="col-md-2 col-lg-2 d-none d-md-block">
									{{-- <img src="{{Avatar::create($applicant->students->last_name.' '.$applicant->students->first_name)->toBase64()}}" class="img-fluid rounded-circle"> --}}
									<img src="{{asset('assets/images/image-profile-default.png')}}" class="img-fluid rounded-circle">
								</div>
								<div class="col-sm-12 col-md-10">
									<div class="main-content ml-0 pl-2">  
										<h3 class="title text-primary">{{auth('student')->user()->last_name.' '.auth('student')->user()->first_name}}</h3>
										<h6 class="">
											<i class="fa fa-envelope-o mr-1" aria-hidden="true"></i> {{ auth('student')->user()->email }} 
										</h6>
										<h6 class="">
											<i class="fa fa-phone mr-1" aria-hidden="true"></i> {{ auth('student')->user()->phone }} 
										</h6>
										<h6 class="">
											<i class="fa fa-map-marker mr-1" aria-hidden="true"></i>
											{{auth('student')->user()->municipals->name}}, {{auth('student')->user()->municipals->states->name}}
										</h6>
		
										<h6 class="">
											<i class="fa fa-calendar-o mr-1" aria-hidden="true"></i> {{ auth('student')->user()->dateBirth->format('d M Y') }} 
										</h6>
									</div>
								</div>
							</div>
		
						</div>
		
						<div class="education-section mb-1">
							<div class="header-section d-md-flex mb-0 mb-md-2">
								<h5 class="h4 pt-1"><i class="fa fa-graduation-cap mr-1" aria-hidden="true"></i> Education </h5>
								<div class="mg-l-auto pl-2 mt-2 mt-md-0">
									<div class="dropdown">
										<button class="btn btn-primary py-1 px-2" type="button" data-toggle="dropdown" aria-expanded="false">
											<i class="fa fa-plus mr-1"></i>
											Create Education
										</button>
										<div class="dropdown-menu">
											<a class="dropdown-item" href="#"
												data-toggle="modal" data-target="#modal-create-university_education" 
											>University Education</a>
											<a class="dropdown-item" href="#"
												data-toggle="modal" data-target="#modal-create-institute_education" 
											>Institute Education</a>
										</div>
									</div>
								</div>
							</div>
							<div class="pl-3">
								@if(!empty(auth('student')->user()->universityEducations))
									@foreach(auth('student')->user()->universityEducations as $universityEducation)
										<div id="universityEducation" data-item="{{ $universityEducation }}">
		
											<div class="d-flex">
											
												<h5 class="h4 mt-1">{{$universityEducation->degreeUniversities->name}} {{$universityEducation->specialty->name}},</h5>
												<div class="mg-l-auto">
													<button class="btn py-1 px-2 bg-danger" id="btn-remove"
														data-toggle="modal" data-target="#modal-remove"
														data-bs-item="University Certificate"
														data-bs-url="{{ route('student.universities.destroy', ['name'=>auth('student')->user()->full_name ,'university'=>$universityEducation->id]) }}"
													>
														<i class="fa fa-trash-o  fa-2x text-white"></i>
													</button>
													<button class="btn py-1 px-2 bg-secondary" type="button" id="edit-university_education" 
														data-toggle="modal" data-target="#modal-edit-university_education"
														data-bs-url="{{ route('student.universities.update', ['name'=>auth('student')->user()->full_name ,'university'=>$universityEducation->id]) }}"
														
													>
														<i class="fa fa-pencil fa-2x text-white"></i>
													</button>
												</div>
											</div>
											<h6 class="h6"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$universityEducation->university->name}}</h6>
											<i class="fa fa-calendar mr-2" aria-hidden="true"></i> {{$universityEducation->start->format('d M Y')}} - {{$universityEducation->end->format('d M Y')}}
											<p>
												{{$universityEducation->description}}
											</p>
										</div>
									@endforeach
								@endif
								@if(!empty(auth('student')->user()->instituteEducations))
									@foreach(auth('student')->user()->instituteEducations as $instituteEducation)
										<div id="instituteEducation" data-item="{{ $instituteEducation }}">
											<div class="d-flex">
												<h5 class="h4 mt-1">{{$instituteEducation->degreeInstitutes->name}} {{$instituteEducation->specialty}},</h5>
												<div class="mg-l-auto">
													<button class="btn py-1 px-2 bg-danger" id="btn-remove"
														data-toggle="modal" data-target="#modal-remove"
														data-bs-item="Institute Certificate"
														data-bs-url="{{ route('student.institutes.destroy', ['name'=>auth('student')->user()->full_name ,'institute'=>$instituteEducation->id]) }}"
													>
														<i class="fa fa-trash-o  fa-2x text-white"></i>
													</button>
													<button class="btn py-1 px-2 bg-secondary" type="button" id="edit-institute_education" 
														data-toggle="modal" data-target="#modal-edit-institute_education"
														data-bs-url="{{ route('student.institutes.update', ['name'=>auth('student')->user()->full_name ,'institute'=>$instituteEducation->id]) }}"
														
													>
														<i class="fa fa-pencil fa-2x text-white"></i>
													</button>
												</div>
											</div>
											<h6 class="h6"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$instituteEducation->name}}</h6>
											<i class="fa fa-calendar mr-2" aria-hidden="true"></i>                                            {{$instituteEducation->start->format('d M Y')}} - {{$instituteEducation->end->format('d M Y')}}
											{{$instituteEducation->start->format('d M Y')}} - {{$instituteEducation->end->format('d M Y')}}
											<p>
												{{$instituteEducation->description}}
											</p>
										</div>
									@endforeach
								@endif 
							</div>
						</div>
						
						<div class="experience-section mb-1">
							<div class="header-section d-md-flex">
								<h5 class="h4"><i class="fa fa-briefcase mr-1" aria-hidden="true"></i> Experience </h5>
								<div class="mg-l-auto">
									<button class="btn py-1 px-2 btn-primary" id="add-experience"
										data-toggle="modal" data-target="#modal-add-experience"
									><i class="fa fa-plus mr-1"></i>
									Create Experience
									</button>
								</div>
							</div>
							<div class="pl-3">
								@if(!empty(auth('student')->user()->experiences))
									@foreach(auth('student')->user()->experiences as $experience)
										<div id="experience" data-item="{{ $experience }}">
											<div class="d-flex">
												<h5 class="h4 mt-1">{{$experience->jobs->name}} ,{{$experience->specialty}}</h5>
												<div class="mg-l-auto">
													<button class="btn py-1 px-2 bg-danger" id="btn-remove"
														data-toggle="modal" data-target="#modal-remove"
														data-bs-item="Experience"
														data-bs-url="{{ route('student.experience.destroy', ['name'=>auth('student')->user()->full_name ,'experience'=>$experience->id]) }}"
													>
														<i class="fa fa-trash-o  fa-2x text-white"></i>
													</button>
													<button class="btn py-1 px-2 bg-secondary" type="button" id="edit-experience" 
														data-toggle="modal" data-target="#modal-edit-experience"
														data-bs-url="{{ route('student.experience.update', ['name'=>auth('student')->user()->full_name ,'experience'=>$experience->id]) }}"
														
													>
														<i class="fa fa-pencil fa-2x text-white"></i>
													</button>
												</div>
											</div>
											<h6 class="h6"><i class="fa fa-university mr-1" aria-hidden="true"></i>{{$experience->company}}</h6>
											<i class="fa fa-calendar mr-2" aria-hidden="true"></i> {{$experience->durations->duration}}
											<p>
												{{$experience->description}}
											</p>
										</div>
									@endforeach
								@endif
							</div>
							
		
						</div>
		
						<div class="languages-section mb-1">
		
							<div class="header-section d-md-flex">
								<h5 class="h4"><i class="fa fa-language mr-1" aria-hidden="true"></i> Languages </h5>						<div class="mg-l-auto">
									<button class="btn py-1 px-2 btn-primary" id="add-language"
										data-toggle="modal" data-target="#modal-add-language"
									><i class="fa fa-plus mr-1"></i>
									Create Language
									</button>
								</div>
							</div>                    
							<div class="pl-3">
								@if(!empty(auth('student')->user()->languages))
									@foreach(auth('student')->user()->languages as $language)
										<h6 class="h6 mt-1">{{$language->languages->name}} - {{$language->levels->level}} </h6>
									@endforeach
								@endif
							</div>
						</div>
					</div>
				</div><!-- End Card -->

			</div>
		</div>
		<!-- Container closed -->
@endsection
@section('js')
<script>

    function getdate(date){
        const d = new Date(date);
        const formattedDate = d.getFullYear() + '-' + ("0" + (d.getMonth() + 1)).slice(-2) + '-' + ("0" + d.getDate()).slice(-2)
        return formattedDate ;
    }


    //  ------------------- Satrt Edit University Education ------------------- //
    $(document).on('click', '#edit-university_education', function() {
        console.log('Cliked Btn Edit University Education')
        var item = $(this).closest('#universityEducation').data('item');
        $('#modal-edit-university_education').find('#degree').val(item.degree_id);
        $('#modal-edit-university_education').find('#specialty').val(item.specialty_id);
        $('#modal-edit-university_education').find('#university').val(item.university_id);
        $('#modal-edit-university_education').find('#description').val(item.description);
        $('#modal-edit-university_education').find('#start').val(getdate(item.start));
        $('#modal-edit-university_education').find('#end').val(getdate(item.end));

        var url = $(this).data('bs-url');
        $('#EditUniversityEducationForm').attr('action', url);
    });
    //  ------------------- End Edit University Education ------------------- //

    //  ------------------- Start Edit Institute Education ------------------- //
    $(document).on('click', '#edit-institute_education', function() {
        console.log('Cliked Btn Edit Institute Education')
        var item = $(this).closest('#instituteEducation').data('item');

        $('#modal-edit-institute_education').find('#degree').val(item.degree_id);
        $('#modal-edit-institute_education').find('#specialty').val(item.specialty);
        $('#modal-edit-institute_education').find('#name').val(item.name);
        $('#modal-edit-institute_education').find('#description').val(item.description);
        $('#modal-edit-institute_education').find('#start').val(getdate(item.start));
        $('#modal-edit-institute_education').find('#end').val(getdate(item.end));

        var url = $(this).data('bs-url');
        $('#EditInstituteEducationForm').attr('action', url);
    });
    //  ------------------- End Edit Institute Education ------------------- //

	//  ------------------- Start Edit Experience ------------------- //
	$(document).on('click', '#edit-experience', function() {

		console.log('Cliked Btn Edit Experience')

		var item = $(this).closest('#experience').data('item');


		$('#modal-edit-experience').find('#job').val(item.job_id);
		$('#modal-edit-experience').find('#specialty').val(item.specialty);
		$('#modal-edit-experience').find('#company').val(item.company);
		$('#modal-edit-experience').find('#description').val(item.description);
		$('#modal-edit-experience').find('#duration').val(item.duration_id);

		// EditEducationForm
		var url = $(this).data('bs-url');
		console.log(url);
		$('#EditExperienceForm').attr('action', url);
	});
	//  ------------------- End Edit Experience ------------------- //

	//  ------------------- Start Modal Remove ------------------- //
	$(document).on('click', '#btn-remove', function() {
        console.log('Cliked Btn Remove')
        var title = $(this).data('bs-item')
		console.log('title : ',title)
		$('#title-model').empty()
        $('#contnet-model').empty()
        $('#title-model').append('<span>' + title + '</span>');
        $('#contnet-model').append('<span>' + title + '</span>');
        var url = $(this).data('bs-url');
        console.log(url);
        $('#removeForm').attr('action', url);
    });
	//  ------------------- End Modal Remove ------------------- //

</script>
@endsection