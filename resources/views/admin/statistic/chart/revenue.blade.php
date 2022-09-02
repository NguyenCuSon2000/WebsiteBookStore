@extends("layouts.admin")
@section('admin_content')
<div class="right__title">Bảng điều khiển</div>
<p class="right__desc">Biểu đồ thống kê doanh thu</p>
<div class="container">
    <form autocomplete="off">
       @csrf
        <div class="row">
            <div class="col-md-2">
                <p>Từ ngày: <input type="date" id="datepicker" class="form-control" name=""></p>
                <input type="button" class="btn btn-primary btn-sm" id="btn-revenue-filter-by-date" value="Lọc kết quả" >
            </div>
            <div class="col-md-2">
                <p>Đến ngày: <input type="date" id="datepicker2" class="form-control" name="" id=""></p>
            </div>

            <div class="col-md-2">
            <p>Lọc:
                    <select class="revenue-filter-choose form-control" name="" id="">
                        <option>-- Chọn tiêu chí--</option>
                        <option value="homnay">Hôm nay</option>
                        <option value="homqua">Hôm qua</option>
                        <option value="3ngaytruoc">3 ngày trước</option>
                        <option value="7ngaytruoc">7 ngày trước</option>
                        <option value="15ngaytruoc">15 ngày trước</option>
                        <option value="30ngaytruoc">30 ngày trước</option>
                    </select>
                </p>
            </div>
            
            <div class="col-md-2">
                <p>Tháng:
                    <select class="revenue-filter-month form-control" name="" id="">
                        <option>-- Chọn tháng--</option>
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                </p>
                <input type="button" class="btn btn-primary btn-sm" id="btn-revenue-filter-by-month" value="Lọc theo tháng" >
            </div>
            <div class="col-md-2">
                <p>Năm:
                    <select class="revenue-filter-year form-control" name="" id="">
                        <option>-- Chọn năm --</option>
                        <option value="2019">Năm 2019</option>
                        <option value="2020">Năm 2020</option>
                        <option value="2021">Năm 2021</option>
                        <option value="2022">Năm 2022</option>
                        <option value="2023">Năm 2023</option>
                        <option value="2024">Năm 2024</option>
                        <option value="2025">Năm 2025</option>
                    </select>
                </p>
                <input type="button" class="btn btn-primary btn-sm" id="btn-revenue-filter-by-year" value="Lọc theo năm" >
            </div>
            <div class="col-md-2">
                <p>Năm:
                    <select class="revenue-filter-quater form-control" name="" id="">
                        <option>-- Chọn năm --</option>
                        <option value="2019">Năm 2019</option>
                        <option value="2020">Năm 2020</option>
                        <option value="2021">Năm 2021</option>
                        <option value="2022">Năm 2022</option>
                        <option value="2023">Năm 2023</option>
                        <option value="2024">Năm 2024</option>
                        <option value="2025">Năm 2025</option>
                    </select>
                </p>
                <input type="button" class="btn btn-primary btn-sm" id="btn-revenue-filter-by-quater" value="Theo quý" >
            </div>
        </div>
    </form>   
   <div id="myfirstchart" style="height: 500px;"></div>
</div>
@endsection