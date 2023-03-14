@extends('vendor.layouts.master')

@section('main')

<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Profile</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
    
    </div>
</div>
<!--end breadcrumb-->
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{!empty($user->avatar) ? asset($user->avatar) : asset('storage/admin/profile/default.png')}}" alt="Admin" class="avatar rounded-circle p-1 bg-primary" width="110">
                            <div class="mt-3">
                                <h4>{{$user->name}}</h4>
                                <p class="text-muted font-size-sm">{{$user->email}}</p>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                                <span class="text-secondary">https://codervent.com</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                                <span class="text-secondary">codervent</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                                <span class="text-secondary">codervent</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card card border-top border-0 border-4 border-danger">
                    <div class="card-body">

                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bx-key me-1 font-35 text-danger"></i>
                            </div>
                            <h5 class="mb-0 text-danger">Change Password</h5>
                        </div>


                        <form method="post" action="{{route('admin.password.update')}}" enctype="multipart/form-data">
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
                                <button type="submit" class="btn btn-danger px-5">Change Password</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form method="post" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                    @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Username</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" readonly name="username" class="form-control" value="{{$user->username}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" />
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Avatar</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input id="avatar" type="file" name="avatar" class="form-control" />
                                <br>
                                <img id="show_avatar" src="{{!empty($user->avatar) ? asset($user->avatar) : asset('storage/admin/profile/default.png')}}" alt="Admin" class="avatar rounded-circle p-1 bg-primary" width="110">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                            </div>
                        </div>
                    </div>
                </div>
                </form>
               
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