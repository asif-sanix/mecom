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
            <a href="{{route('admin.brand.create')}}" class="btn btn-primary">Add Brand</a>
            
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Si</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $key => $brand)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$brand->name}}</td>
                            <td> <img src="{{$brand->image}}" class="rounded-circle p-1 border" width="90" height="90" /> </td>
                            <td>
                                <a href="button" class="btn btn-primary">
                                    <i class="bx bx-trash-alt me-0"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endpush