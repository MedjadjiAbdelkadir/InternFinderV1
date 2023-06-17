@extends('layouts.master')
@push('title')| Create Formation @endpush
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
@endsection
@section('page-header')
    {{-- <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Formation</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Create</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb --> --}}
@endsection

@section('content')

            <div class="card mb-3 pb-0 w-100 mt-2">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="content-title mb-0 my-auto">Create Formation</h4>
                    </div>
                </div>
                <hr>
                <form action="{{route('company.formations.store', auth('company')->user()->name)}}" method="POST">
                    @csrf
                <div class="card-body pt-0 px-0">
                    <div class="general-information px-4">
                        <h5 class="">General Information</h5>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                    @error('title')
                                    <small class="text-danger d-block">
                                                    {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <label>Number of positions</label>
                                    <input type="text" class="form-control @error('nbr_place') is-invalid @enderror" id="nbr_place" name="nbr_place">
                                    @error('nbr_place')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group mb-1">
                                    <label for="state">Permanence</label>
                                    <select class="form-control @error('permanence') is-invalid @enderror" name="permanence" id="permanence">
                                        <option hidden value="">Select a Permanence</option>
                                        <option value="1">Full Time</option>
                                        <option value="2">Part Time</option>
                                    </select>
                                    @error('permanence')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group mb-1">
                                    <label for="state">State</label>
                                    <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                        <option hidden value="">Select a State</option>
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
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group mb-1">
                                    <label for="city">Municipal</label>
                                    <select class="form-control @error('municipal') is-invalid @enderror" name="municipal" id="municipal">
                                        <option hidden value="">Select a City</option>
                                    </select>

                                    @error('municipal')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="date">Date start</label>
                                    <input type="date" class="form-control  @error('start') is-invalid @enderror" id="start" name="start">
                                    @error('start')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label for="date">Date end </label>
                                    <input type="date" class="form-control  @error('end') is-invalid @enderror" id="end" name="end">
                                    @error('end')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-1">
                                    <label for="">Description</label>
                                    <textarea
                                        oninput="limitWords(event)"
                                        class="form-control @error('description') is-invalid @enderror"
                                        onkeypress="return imposeMaxLength(this, 100);"
                                        name="description" id="description" 
                                    ></textarea>
                                    @error('description')
                                    <small class="text-danger d-block">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="education-section px-4">
                        <div class="education-university mb-2">
                            <h5 class="mt-2">Education University</h5>
                            <div class="row">
                            
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>Specialty</label>
                                        <select class="form-control @error('specialty_university') is-invalid @enderror" name="specialty_university[]" id="specialty_university">
                                            <option selected disabled hidden>Select Specialty</option>
                                            @foreach ($specialty_universities as $item => $specialty)
                                            <option value="{{$specialty->id}}">{{$specialty->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('specialty_university')
                                            <small class="text-danger d-block">
                                            {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control @error('degree_university') is-invalid @enderror" name="degree_university[]" id="degree_university">
                                            <option selected disabled hidden>Select Degree</option>
                                            @foreach ($degree_universities as $item => $degree)
                                            <option value="{{$degree->id}}">{{$degree->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('degree_university')
                                            <small class="text-danger d-block">
                                            {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class="form-group pt-1">
                                        <button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-education-university">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="education-institute mb-2">
                            <h5 class="mt-2">Education Institutes</h5>
                            <div class="row">
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>Specialty</label>
                                        <input type="text" class="form-control  @error('specialty_institute') is-invalid @enderror" placeholder="Enter speciality" 
                                            name="specialty_institute[]" id="specialty_institute" />
                                        @error('specialty_institute')
                                            <small class="text-danger d-block">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control @error('degree_institute') is-invalid @enderror" name="degree_institute[]" id="degree_institute">
                                            <option selected disabled hidden>Select Degree</option>
                                            @foreach ($degree_institutes as $item => $degre)
                                            <option value="{{$degre->id}}">{{$degre->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('degree_institute')
                                        <small class="text-danger d-block">
                                        {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class="form-group pt-1">
                                        <button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-education-institute">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>           
                    <div class="experience-section px-4">
                        <div class="experiences mb-2">
                            <h5 class="mt-2">Experience</h5>
                            <div class="row">
                                <div class="col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label>Specialty</label>
                                        <input type="text" class="form-control mt-1  @error('specialty_experience') is-invalid @enderror" name="specialty_experience[]" id="specialty_experience" placeholder="Enter Your Specialty">
                                        @error('specialty_experience')
                                        <small class="text-danger d-block">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>Years Of Experience</label>
                                        <select class="form-control @error('duration_experience') is-invalid @enderror" name="duration_experience[]" id="duration_experience">
                                            <option selected disabled hidden>Select Duration</option>
                                            @foreach ($durationExperiences as $item => $duration)
                                            <option value="{{$duration->id}}">{{$duration->duration}}</option>
                                            @endforeach
                                        </select>
                                        @error('duration_experience')
                                            <small class="text-danger d-block">
                                            {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class="form-group pt-1">
                                        <button type="button" class="btn btn-success form-control inline-block  mt-4"  id="add-experience">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="languages-section px-4">
                        <div class="languages mb-2">
                            <h5 class="mt-2">Language</h5>
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="custom-select  @error('language_name') is-invalid @enderror" required id="inputGroupSelectLanguage" name="language_name[]" id="language_name">
                                            <option selected disabled hidden>Select Language</option>
                                            @foreach ($list_languages as $item => $languages)
                                                <option value="{{$languages->id}}">{{$languages->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('language_name')
                                            <small class="text-danger d-block">
                                            {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="custom-select @error('language_level') is-invalid @enderror" required id="inputGroupSelectlevelLanguage" name="language_level[]" id="language_level">
                                            <option selected disabled hidden>Select Level</option>
                                            @foreach ($level_languages as $item => $level_language)
                                                <option value="{{$level_language->id}}">{{$level_language->level}}</option>
                                            @endforeach
                                        </select>
                                        @error('language_level')
                                            <small class="text-danger d-block">
                                            {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-1">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success form-control inline-block mt-4"  id="add-language">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <button type="submit" class="btn btn-primary mt-2 ml-4">
                        Create
                    </button>
                </div> 
            </form>  
            </div>  <!-- End Card -->
        </div>
    </div><!-- Container closed -->

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){

        // ------------------------------- Start Add Education University ------------------------------- //
        var edu_university_id = 1;
        $('#add-education-university').click(function(){
            edu_university_id++;
            $('.education-university').append('<div class="row mt-2"  id="row'+edu_university_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Specialty</label>'+
                        '<select class="form-control @error('specialty_university') is-invalid @enderror" name="specialty_university[]" id="specialty_university">'+
                            '<option selected disabled hidden>Select Specialty</option>'+
                            '@foreach ($specialty_universities as $item => $specialty)'+
                            '<option value="{{$specialty->id}}">{{$specialty->name}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('specialty_university')'+
                            '<small class="text-danger d-block">'
                            {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control @error('degree_university') is-invalid @enderror" name="degree_university[]" id="degree_university">'+
                                    '<option selected disabled hidden>Select Degree</option>'+
                                    '@foreach ($degree_universities as $item => $degree)'+
                                    '<option value="{{$degree->id}}">{{$degree->name}}</option>'+
                                    '@endforeach'+
                        '</select>'+
                        '@error('degree_university')'+
                            '<small class="text-danger d-block">'+
                            {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+edu_university_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-education-university" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');
        });

        $(document).on('click','.remove_row-education-university',function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();
            
        });
        // ------------------------------- End Add Education University ------------------------------- //

         // ------------------------------- Start Add Education Institute ------------------------------- //
        var edu_institute_id = 1;
        $('#add-education-institute').click(function(){
            edu_institute_id++;
            $('.education-institute').append('<div class="row mt-2"  id="row'+edu_institute_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Specialty</label>'+
                        '<input type="text" class="form-control  @error('specialty_institute') is-invalid @enderror" placeholder="Enter speciality" name="specialty_institute[]" id="specialty_institute">'+
                        '@error('specialty_institute')'+
                            '<small class="text-danger d-block">'+
                                {{ $message }}
                            '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control @error('degree_institute') is-invalid @enderror" name="degree_institute[]" id="degree_institute">'+
                                    '<option selected disabled hidden>Select Degree</option>'+
                                    '@foreach ($degree_institutes as $item => $degre)'+
                                    '<option value="{{$degre->id}}">{{$degre->name}}</option>'+
                                    '@endforeach'+
                                '</select>'+
                                '@error('degree_institute')'+
                                '<small class="text-danger d-block">'+
                                   {{ $message }}
                                '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+edu_institute_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-education-university" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });
        $(document).on('click','.remove_row-education-institute',function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();
            
        });
        // ------------------------------- End Add Education Institute ------------------------------- //

        // ------------------------------- Start Add Experiences ------------------------------- //
        var experience_id = 1 ;
        $('#add-experience').click(function(){
            experience_id++ ;
            $('.experiences').append('<div class="row mt-2"  id="row'+experience_id+'">'+
                '<div class="col-sm-12 col-md-8">'+
                    '<div class="form-group">'+
                        '<label>Language</label>'+
                        '<label>Specialty</label>'+
                        '<input type="text" class="form-control mt-1   @error('specialty_experience') is-invalid @enderror" name="specialty_experience[]" id="specialty_experience" placeholder="Enter Your Specialty">'+
                        '@error('specialty_experience')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Years Of Experience</label>'+
                        '<select class="form-control mt-1 @error('duration_experience') is-invalid @enderror" id="duration_experience" name="duration_experience[]">'+
                            '<option selected hidden>Choose Duration</option>'+
                            '@foreach ($durationExperiences as $item => $durationExperience)'+
                            '<option value="{{$durationExperience->id}}">{{$durationExperience->duration}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('duration_experience')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+experience_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-experience" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });

        $(document).on('click', '.remove_row-experience', function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();  
        });
        // ------------------------------- Start Add Experiences ------------------------------- //

        // ------------------------------- Start Add Languages ------------------------------- //
        var lang_id = 1 ;
        $('#add-language').click(function(){
            lang_id++ ;
            $('.languages').append('<div class="row mt-2"  id="row'+lang_id+'">'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Language</label>'+
                        '<select class="form-control mt-1 @error('language_name') is-invalid @enderror" id="language_name" name="language_name[]">'+
                            '<option selected hidden>Choose Language</option>'+
                            '@foreach ($list_languages as $item => $list_language)'+
                            '<option value="{{$list_language->id}}">{{$list_language->name}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('language_name')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-3">'+
                    '<div class="form-group">'+
                        '<label>Level</label>'+
                        '<select class="form-control mt-1 @error('language_level') is-invalid @enderror" name="language_level[]" id="language_level">'+
                            '<option selected hidden>Choose Level</option>'+
                            '@foreach ($level_languages as $item => $level_language)'+
                            '<option value="{{$level_language->id}}">{{$level_language->level}}</option>'+
                            '@endforeach'+
                        '</select>'+
                        '@error('language_level')'+
                        '<small class="text-danger d-block">'+
                                   {{ $message }}
                        '</small>'+
                        '@enderror'+
                    '</div>'+
                '</div>'+
                '<div class="col-sm-12 col-md-1">'+
                    '<div class="form-group pt-1">'+
                        '<button type="button" id="'+lang_id+'" class="btn btn-danger form-control  mt-4 inline-block remove_row-language" >'+
                            '<i class="fa fa-minus"></i>'+
                        '</button>'+
                    '</div>'+
                '</div>'+

            '</div>');

        });

        $(document).on('click', '.remove_row-language', function(){
            var row_id = $(this).attr("id");
            $('#row'+row_id+'').remove();  
        });
        // ------------------------------- End Add Languages ------------------------------- //


    });

</script>
@endsection