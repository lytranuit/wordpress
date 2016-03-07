<label class='title'>Tìm ngay</label>
<form class="form-search" role="search" action="<?php echo esc_url(home_url('/?s=advance')); ?>" method="POST">
    <div>
        <span>Khu vực</span>
        <select name="khuvuc[]" multiple="" class="selectpicker" data-width="100%" title="Chọn Quận/Huyện">
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
        <select name="dientich[]" multiple="" class="selectpicker" data-width="100%" title="Chọn diện tích">
            <option value="1">50m2-100m2</option>
            <option value="2">100m2-1000m2</option>
            <option value="3">Trên 1000m2</option>
        </select>
    </div>
    <div>
        <span>Hướng</span>
        <select name="huong" class="selectpicker" data-width="100%" title="Chọn hướng">
            <option value="0">Chọn hướng</option>
            <option>Đông</option>
            <option>Tây</option>
            <option>Nam</option>
            <option>Bắc</option>
            <option>Đông Nam</option>
            <option>Đông Bắc</option>
            <option>Tây Nam</option>
            <option>Tây Bắc</option>
        </select>
    </div>
    <div>
        <span>Mức giá</span>
        <select name="mucgia[]" multiple="" class="selectpicker" data-width="100%" title="Chọn mức giá">
            <option value="1">300 triêu - 500 triêu / BĐS</option>
            <option value="2">500 triêu - 1 tỷ / BĐS</option>
            <option value="3">1 tỷ - 3 tỷ / BĐS</option>
            <option value="4">3 tỷ - 5 tỷ / BĐS</option>
            <option value="5">5 tỷ - 10 tỷ / BĐS</option>
            <option value="6">Trên 10 tỷ / BĐS</option>
        </select>
    </div>
    <input type="hidden" name="search" value="advanced">
    <button class="btn btn-success" type="submit" style="margin-top: 20px;">Tìm kiếm</button>
</form>
<script>
    jQuery(function ($) {
        $('.selectpicker').selectpicker();
    });
</script>