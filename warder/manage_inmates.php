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
            <?php @include("new_inmate.php");?>
        </div>
        <div style="width:90%; margin:0">
            <div class="col">
                <b>Inmates List</b>
            </div>
            <button onclick="document.getElementById('id01').style.display='block'" class="v-btn v-green"
                style="float:right " type="">New</button>
            <table class="content-table" style="width:100%">
                <col width="40%">
                <col width="40%">
                <col width="20%">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Inmate Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-content">


                </tbody>
            </table>
        </div>

    </main>
    <div class="card-body hide" id="printable">
        <div id="onPrint">
            <p class="text-center">Inmate Information</p>
        </div>
        <form id="save_cell" method="POST" enctype="multipart/form-data">
            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Code</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
                <div class="half">
                    <label for="name">Prisons Cell</label>
                    <select id="myPrison" class="input border" type="text" name="prison_id">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                </div>
            </div>
            <div class="row section row-padding">
                <div class="third">
                    <label for="name">First Name</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
                <div class="third">
                    <label for="name">Middle Name</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
                <div class="third">
                    <label for="name">Last Name</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
            </div>
            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Birthday</label>
                    <input id="cell" class="input border" name="cell" type="date" placeholder="Name" required>
                </div>
                <div class="half">
                    <label for="name">Sex</label>
                    <select id="myPrison" class="input border" type="text" name="prison_id">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                    </select>
                </div>
            </div>
            <div class="row section row-padding">
                <div class="col">
                    <label for="name">Address</label>
                    <textarea id="cell" class="input border" name="cell" placeholder="Name" required> </textarea>
                </div>

            </div>
            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Marital Status</label>
                    <select id="myPrison" class="input border" type="text" name="prison_id">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="">Single</option>
                        <option value="">Married</option>
                        <option value="">Divorce</option>
                    </select>
                </div>

            </div>
            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Complexion</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
                <div class="half">
                    <label for="name">Eye Color</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
            </div>
            <fieldset class="row-padding">
                <legend>Crime Details</legend>
                <div class="row section row-padding">
                    <div class="col">
                        <label for="name">Crime committed</label>
                        <select id="myCrime" class="input border" type="text" name="crime_id">
                            <option value="" disabled selected>Choose your option</option>
                        </select>
                    </div>
                </div>
                <div class="row section row-padding">

                    <div class="half">
                        <label for="name">Sentence</label>
                        <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                    </div>
                </div>
                <div class="row section row-padding">
                    <div class="half">
                        <label for="name">Serve Time Start</label>
                        <input id="cell" class="input border" name="cell" type="date" placeholder="Name" required>
                    </div>
                    <div class="half">
                        <label for="name">Serve Time End</label>
                        <input id="cell" class="input border" name="cell" type="date" placeholder="Name" required>
                    </div>
                </div>
            </fieldset>
            <fieldset class="row-padding">
                <legend>Emergency Contact Details</legend>

                <div class="row section row-padding">

                    <div class="half">
                        <label for="name">Name</label>
                        <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                    </div>
                </div>
                <div class="row section row-padding">
                    <div class="half">
                        <label for="name">Relation</label>
                        <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                    </div>
                    <div class="half">
                        <label for="name">Contact #</label>
                        <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                    </div>
                </div>
            </fieldset>
            <fieldset class="row-padding">
                <legend>Image</legend>
                <div class="row section row-padding">
                    <div class="half">
                        <label for="name">Inmate Image</label>
                        <input id="cell" class="input border" name="cell" type="file" placeholder="Name" required>
                    </div>
                    <div class="half">
                        <label for="name">Contact #</label>
                        <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                    </div>
                </div>
            </fieldset>
            <div class="row section row-padding">
                <button id="add_brand" class="btn blue-grey">Add</button>
            </div>
        </form>

    </div>
    <?php @include("includes/foot.php");?>
    <style type="text/css">
    #onPrint {
        display: none;
    }
    </style>
    <noscript>
        <style>
        html {
            min-height: unset !important;
        }

        /* table {
            width: 100%;
            border-collapse: collapse;
        } */

        tr,
        td,
        th {
            border: 1px solid black;
        }

        .text-center {
            text-align: center;
        }

        p {
            font-weight: 600
        }
        </style>

    </noscript>
    <script src="js/script.js"></script>
    <script src="js/inmates.js"></script>
</body>

</html>