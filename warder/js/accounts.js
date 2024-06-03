function is_logged_in() {
    $.ajax({
        url: '../ajax.php?action=is_logged_in',
        type: 'GET',
        data: {
            id: 1,
        },
        error: function () {
            alert('Something is wrong');
        },
        success: function (resp) {
            if (resp) {
                resp = JSON.parse(resp)
                if (resp === 1) {
                    window.location.href = '../index.php';
                }

            }

        }
    });

}