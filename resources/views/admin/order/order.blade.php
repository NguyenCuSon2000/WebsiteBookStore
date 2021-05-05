@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Xem đơn hàng</p>
<div class="right__search">
    <form role="form" action="/search_category" method="get">
       @csrf
        <input type="search" class="search" class="form-control"  name="txtSearch" id="" placeholder="Tìm kiếm" >
        <input type="submit" class="button" value="Search">
    </form>
</div>   
<?php
    use Illuminate\Support\Facades\Session;
    $message = Session::get('message');
    if($message){
        echo '<span style="color: red">'.$message.'</span>';
        Session::put('message',null);
    }
?>   
<div class="right__table">
    <div class="right__tableWrapper">
    @php
        $tt = 0;
    @endphp
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Số điện thoại nhận</th>
                    <th>Địa chỉ nhận</th>
                    <th>Tổng tiền</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Xem</th>
                    <th>Xoá</th>
                </tr>
            </thead>
    
            <tbody>
                @foreach($db as  $r)
                    <tr>
                        <td>{{ $tt++ }}</td>
                        <td data-label="Mã đơn hàng">{{$r->id}}</td>
                        <td data-label="Tên khách hàng">{{ $r->customer->CustomerName }}</td>
                        <td data-label="Ngày đặt">{{ $r->OrderDate }}</td>
                        <td data-label="Số điện thoại nhận">{{ $r->ShipPhone }}</td>
                        <td data-label="Địa chỉ nhận">{{ $r->ShipAddress }}</td>
                        <td data-label="Tổng tiền">{{ $r->total }}</td>
                        <td data-label="Ghi chú">{{ $r->Note }}</td>
                        <td data-label="Trạng thái">
                            @if( $r->Status == 0)
                                <a href="#" class="label-success label">Đã xử lý</a>
                            @else
                                <a href="#" class="label label-defaul">Chờ xử lý</a>
                            @endif
                        </td>
                        <td data-label="Xem" class="right__iconTable">
                              <a  data-id ="{{ $r->id }}" href="{{ route('order.show', $r->id) }}"><img src="{{ asset('assets/icon-eye.svg') }}" alt=""></a>
                        </td>
                        <td data-label="Xoá" class="right__iconTable">
                            <form role="form" action="{{ route('order.destroy', $r->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button  type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"><img src="{{ asset('assets/icon-trash-black.svg') }}" alt=""></button>   
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a target="_blank" href="{{ route('print_order', $r->id) }}">In đơn hàng</a>
</div>
<div>
    {{ $db->links() }}
</div>

<!-- 
<div class="modal fade" id="myModalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi tiết mã đơn hàng # <b class="order_id"></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="md_content">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!-- 
<script>
    $(function() { 
        $(".js_order_item").click(function (event) { 
            event.preventDefault();
            let $this = $(this);
            let url = $this.attr('href');
            $("#md_content").html('');
            $(".order_id").text('').text($this.attr('data-id'));
            $("#myModalOrder").modal('show');
            

            $.ajax({
                url: $this.attr('href'),
            }).done(function(result) { 
                console.log(result);
                if (result) {
                    $("#md_content").html('').append(result);
                }
             });

             $.ajax({
                 url: url,
                 success: function (response) {
                    console.log(response);
                    if (response) {
                        $("#md_content").append(response);
                    }
                 }
             });
        });
     });
</script> -->
@endsection
