@extends("admin/layouts/admin_layout")
@section("main-content")
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable" style="margin-top: 2%">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{Session::get('success')}}
        </div>
    @endif

        <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="file" name="import_file" />
            <button class="btn btn-primary">Import File</button>
            {{csrf_field()}}
        </form>
@endsection
