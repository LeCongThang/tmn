<div class="modal fade" id="modal_DeleteCategory">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xác nhận xóa Loại Tin tức</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tiêu đề</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$category->title_vi}}</td>
                            <td>{{$category->title_en}}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                {{ Form::open(['url' => route('category.destroy',$category->id), 'method' => 'DELETE']) }}
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                {{ Form::close() }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>