@extends('admin.layouts.master')

@section('main')

<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Tables</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Data Table</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{route('admin.brand.index')}}" class="btn btn-primary">All Brand</a>
            
        </div>
    </div>
</div>
<div class="" style="max-width:500px; margin:0 auto;">
<form method="post" action="{{route('admin.brand.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" placeholder="Name" class="form-control" id="name">
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>

                <div class="col-sm-12 mb-4">
                    <input id="image" type="file" name="image" class="form-control" />
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                    <br>
                    <img id="show_image" src="" alt="image" class="avatar rounded-circle p-1" width="110" style="display:none;">
                </div>


            </div>
        </div>
    </div>
</form>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#show_image').attr('src',e.target.result);
                $('#show_image').show();
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endpush