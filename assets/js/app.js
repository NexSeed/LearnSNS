$(function() {

    $('.js-like').on('click', function() {
        $.ajax({
            // 送信先、送信するデータなど
        })
        .done(function(data) {
            // 成功時の処理
        })
        .fail(function(err) {
            // 失敗時の処理
        })
    });

});