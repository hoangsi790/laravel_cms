$(document).ready(function (e) {
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('#add_mean').click(function () {
        $('#wrap_mean').append(`
        <div class="form-group mean_item">
            <div class="col-xs-10">
                <input type="text" class="form-control" name="mean[]">
            </div>
            <div class="col-xs-2">
                <select class="form-control" name="type_word[]">
                    <option value="n/a">N/A</option>
                    <option value="n">Danh từ</option>
                    <option value="exp">Cụm từ</option>
                    <option value="n-prep">Danh từ hoặc giới từ</option>
                    <option value="prep">Giới từ</option>
                    <option value="adj">Tính từ</option>
                    <option value="exc">Thán từ</option>
                    <option value="adv">Trạng từ</option>
                    <option value="verb-1">Động từ nhóm I</option>
                    <option value="verb-2">Động từ nhóm II</option>
                    <option value="verb-3">Động từ nhóm III</option>
                </select>
            </div>
            <div class="clearfix"></div>
        </div>
        `);
    });

    $('#add_example').click(function () {
        $('#wrap_example').append(`
        <div class="form-group example_item">
            <div class="col-md-6">
                <input type="text" class="form-control" name="sentence[]">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="mean_ex[]">
            </div>
            <div class="clearfix"></div>
        </div>
        `);
    });

    
});