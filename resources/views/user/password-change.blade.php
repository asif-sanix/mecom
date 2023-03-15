@extends('web.layouts.master')

@section('password-change', 'active')

@section('main')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Pages <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        @include('user.layouts.aside')
                    </div>
                    <div class="col-md-9">
                       
                        <div class="card">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body">
                            

                                <form method="post" action="{{route('user.password.update')}}" enctype="multipart/form-data">
                                    @csrf
                                
                                    <div class="col-md-12 mb-3">
                                        <label for="old_password" class="form-label">Old Password</label>
                                        <input type="password" name="old_password" class="form-control" id="old_password">
                                        <small class="text-danger">{{ $errors->first('old_password') }}</small>
                                    </div>
        
                                    <div class="col-md-12 mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="new_password">
                                        <small class="text-danger">{{ $errors->first('new_password') }}</small>
                                    </div>
        
                                    <div class="col-md-12 mb-3">
                                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation">
                                    </div>
        
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-fill-out submit font-weight-bold">Change Password</button>
                                    </div>
        
        
                                </form>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#avatar').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('.avatar').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endpush