@extends('admin.admin_layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm thuong hieu
            </header>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="{{ ('/save-brand') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thuong hieu</label>
                            <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thuong hieu</label>
                            <textarea style="resize: none"  rows="8" class="form-control" name="brand_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                              <select name="brand_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    
                            </select>
                        </div>
                       
                        <button type="submit" name="add_brand" class="btn btn-info">Thêm thuong hieu</button>
                    </form>
                </div>

            </div>
        </section>
    </div>
</div>
@endsection