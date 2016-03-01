<label class='title' style="position: absolute;
       top: -20px;
       display: inline-block;
       text-align: center;
       /* width: 100%; */
       left: 34%;
       background: #eeeeee;
       font-size: 20px;
       color: green;
       font-family: serif;
       padding: 0px 5px;">Tìm ngay</label>
<form class="form-search" role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <div>
        <span>Khu vực</span>
        <select name="khuvuc">
            <option value="0">--- Chọn Quận/Huyện ---</option>
            <option value="8">Quận 1</option>
            <option value="9">Quận 2</option>
            <option value="10">Quận 3</option>
            <option value="11">Quận 4</option>
            <option value="12">Quận 5</option>
            <option value="13">Quận 6</option>
            <option value="14">Quận 7</option>
            <option value="15">Quận 8</option>
            <option value="16">Quận 9</option>
            <option value="17">Quận 10</option>
            <option value="18">Quận 11</option>
            <option value="19">Quận 12</option>
            <option value="20">Quận Thủ Đức</option>
            <option value="21">Quận Bình Thạnh</option>
            <option value="22">Quận Gò Vấp</option>
        </select>
    </div>
    <div>
        <span>Diện tích</span>
        <select name="dientich">
            <option value="0">--- Chọn diện tích ---</option>
            <option value="1">50m2-100m2</option>
            <option value="2">100m2-1000m2</option>
            <option value="3">Trên 1000m2</option>
        </select>
    </div>
    <div>
        <span>Hướng</span>
        <select name="huong">
            <option value="0">--- Chọn hướng ---</option>
            <option value="1">Đông</option>
            <option value="2">Tây</option>
            <option value="3">Nam</option>
            <option value="4">Bắc</option>
            <option value="5">Đông Nam</option>
            <option value="6">Đông Bắc</option>
            <option value="7">Tây Nam</option>
            <option value="8">Tây Bắc</option>
        </select>
    </div>
    <div>
        <span>Mức giá</span>
        <select name="mucgia">
            <option value="0">--- Chọn mức giá ---</option>
            <option value="1">300 triêu - 500 triêu / BĐS</option>
            <option value="2">500 triêu - 1 tỷ / BĐS</option>
            <option value="3">1 tỷ - 3 tỷ / BĐS</option>
            <option value="4">3 tỷ - 5 tỷ / BĐS</option>
            <option value="5">3 tỷ - 5 tỷ / BĐS</option>
            <option value="6">5 tỷ - 10 tỷ / BĐS</option>
            <option value="7">Trên 10 tỷ / BĐS</option>
        </select>
    </div>
    <input type="hidden" name="search" value="advanced">
    <button class="btn btn-success" type="submit">Tìm kiếm</button>
</form>
<style>
    .search-box{
        display: inline-block;
        display: inline-block;
        width: 28.29%;
        vertical-align: top;
        margin-top: 20px;
        padding: 20px;
        min-height: 353px;
        float: right;
        position: relative;
        border: 1px solid gray;
    }
    .form-search div{
        margin: 0px 0px 12px;
    }
    .form-search span{
        font-size: 15px;
    }
    .form-search select{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
        -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    .form-search button{
        width: 100%;
    }
</style>