<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Fontawesome CDN Link -->
<link rel="stylesheet" href="../plugins/fontawesome-free-6.4.0-web/css/all.css" />    <script type="text/javascript" src="../js/jquery-2.2.4.js"></script>
</head>

<body>
    <?php @include("includes/sidebar.php");?>
    <?php @include("includes/top.php");?>


    <main class="main">
        <div id="id01" class="modal">
            <?php @include("new_prison.php");?>
        </div>
        <div style="width:90%; margin:0">
        <div class="col">
                <b>Prisons List</b>
            </div>
            <button onclick="document.getElementById('id01').style.display='block'" class="v-btn v-green"
                style="float:right " type="">New</button>
            <table class="content-table" style="width:100%">
                <col width="80%">
                <col width="20%">
                <thead>
                    <tr>
                        <th>Prison</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-content">

                </tbody>
            </table>
        </div>

    </main>
    <?php @include("includes/foot.php");?>
    <script>
    $('#save_prison').submit(function(e) {
        e.preventDefault()
        $.ajax({
            url: '../ajax.php?action=save_prison',
            method: 'POST',
            data: $(this).serialize(),
            success: function(resp) {
                if (resp) {
                    resp = JSON.parse(resp)
                    window.location.href = 'manage_prisons.php';
                }
            },
            complete: function() {}
        })
    })
    </script>
    <script src="js/script.js"></script>
    <script src="js/prisons.js"></script>
</body>

</html>