@extends('admin.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Cap nhat thuong hieu
            </header>
            <div class="panel-body">
                @foreach($edit_brand as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{ URL::to('/update-brand/'.$edit_value->brand_id) }}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thuong hieu</label>
                        <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="brand_name" class="form-control" value="{{ $edit_value->brand_name }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thuong hieu</label>
                        <textarea style="resize: none"  rows="8" class="form-control" name="brand_desc" id="ckeditor1"></textarea>
                    </div>
                   
                    <button type="submit" name="update_brand" class="btn btn-info">Cap nhat thuong hieu</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection