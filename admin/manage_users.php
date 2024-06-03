<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="../plugins/fontawesome-free-6.4.0-web/css/all.css" />
    <script type="text/javascript" src="../js/jquery-2.2.4.js"></script>
</head>

<body>
    <?php @include("includes/sidebar.php");?>
    <?php @include("includes/top.php");?>


    <main class="main">
        <div id="id01" class="modal">
            <?php @include("new_user.php");?>
        </div>
        <div style="width:90%; margin:0">
            <div class="col">
                <b>Users List</b>
            </div>
            <button onclick="document.getElementById('id01').style.display='block'" class="v-btn v-green"
                style="float:right " type="">New</button>
            <table class="content-table" style="width:100%">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-content">
                    <tr>
                        <td>1</td>
                        <td>Domenic</td>
                        <td>88,110</td>
                        <td>dcode</td>
                    </tr>
                    <tr class="active-row">
                        <td>2</td>
                        <td>Sally</td>
                        <td>72,400</td>
                        <td>Students</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Nick</td>
                        <td>52,300</td>
                        <td>dcode</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </main>
    <?php @include("includes/foot.php");?>
    <script src="js/script.js"></script>
    <script src="js/employees.js"></script>
</body>

</html>