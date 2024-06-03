 <script src="js/accounts.js"></script>
 <script>
is_logged_in()
 </script>
 <script>
$('#logout').click(function(e) {
    e.preventDefault()
    $.ajax({
        url: '../ajax.php?action=logout',
        method: 'POST',
        data: $(this).serialize(),
        success: function(resp) {
            // link to admin account
            window.location.href = '../index.php'
        },
        complete: function() {}
    })
})
 </script>
 <script>
getUserDetails()

function getUserDetails() {
    $.ajax({
        url: '../ajax.php?action=get_user_details',
        method: 'POST',
        data: $(this).serialize(),
        success: function(resp) {
            resp = JSON.parse(resp)
            const username = document.getElementById('username');
            username.innerHTML = resp.username;
        },
        complete: function() {}
    })
}
 </script>