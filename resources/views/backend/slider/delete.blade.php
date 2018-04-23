<div class="modal fade" id="modal_Deleteslider">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xác nhận xóa Slider</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Thứ tự</th>
                        <th>Trạng thái</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{asset('images/slider')}}/{{$slider->image}}" style="width: 100%">
                            </td>
                            <td>{{$slider->sort_order}}</td>
                            <td>
                                @if($slider->status)
                                    <label class="label label-success">Hiển thị</label>
                                @else
                                    <label class="label label-danger">Ẩn</label>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                {{ Form::open(['url' => route('slider.destroy',$slider->id), 'method' => 'DELETE']) }}
                    <button type="button" class="btn btn-info" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                {{ Form::close() }}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>