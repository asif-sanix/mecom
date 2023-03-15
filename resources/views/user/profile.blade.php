@extends('web.layouts.master')

@section('profile', 'active')

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
                                <h5>Account Details</h5>
                            </div>
                            <div class="card-body">
                               
                                <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                
                                        <div class="col-md-6">
                                            <label>Name <span class="required">*</span></label>
                                            <input class="form-control" name="name" placeholder="Name" value="{{ $user->name }}"/>
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>Phone <span class="required">*</span></label>
                                            <input class="form-control" name="phone" placeholder="Phone" value="{{ $user->phone }}"/>
                                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                                        </div>
                                 
                                        <div class="col-md-12">
                                            <label>Email <span class="required">*</span></label>
                                            <input class="form-control" type="email" value="{{ $user->email }}" readonly />
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label>Address <span class="required">*</span></label>
                                            <input class="form-control" name="address" type="text" value="{{ $user->address }}" placeholder="Address" />
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                        </div>
                                        
                                        
                                        <div class="col-md-12">
                                            <label>Avatar <span class="required">*</span></label>
                                            <input id="avatar" type="file" name="avatar" class="form-control" />
                                            <small class="text-danger">{{ $errors->first('address') }}</small>
                                            <img id="show_avatar" src="{{!empty($user->avatar) ? asset($user->avatar) : asset('storage/admin/profile/default.png')}}" alt="Admin" class="avatar rounded-circle p-1" width="110">
                                            
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                        </div>
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