
{{-- <!-- Start Modal Delete Formation -->
<div class="modal fade" id="cancel-join-formation" tabindex="-1" role="dialog" aria-labelledby="ModalSkillsTitle" aria-modal="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header pt-2 pb-2">
				<h5 class="modal-title" id="modal-title">
					Cancel Join this formation
					<i class="bi bi-trash3-fill text-danger"></i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form method="post" action="{{ route('student.formations.update', ['name'=>auth('student')->user()->full_name ,'formation'=>$formation->id]) }}"  id="removeForm">
				@method('DELETE')
				@csrf
				<div class="modal-body text-center pt-0 pb-0">
					<p class="pt-3 pb-3">
						Are you sure you want to Cancel Join this formation
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
<!-- End Modal Delete Formation --> --}}

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