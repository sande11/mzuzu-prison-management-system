<div class="modal-content card animate-zoom">
    <header class="container">
        <span onclick="document.getElementById('id01').style.display='none'"
            class="button xlarge display-topright">×</span>
        <h2>Add Cell</h2>
    </header>

    <div class="bar border-bottom">

    </div>
    <form id="save_cell" method="POST" enctype="multipart/form-data">
        <div class="row section row-padding">

            <div class="">
                <div class="half">
                    <label for="name">Cell Name</label>
                    <input id="cell" class="input border" name="cell" type="text" placeholder="Name" required>
                </div>
                <div class="half">
                    <label for="name">Prisons</label>
                    <select id="myPrison" class="input border" type="text" name="prison_id">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row section row-padding">
            <button id="add_brand" class="btn blue-grey">Add</button>
        </div>
    </form>
    <div class="container padding">
        <button type="submit" class="button right white border"
            onclick="document.getElementById('id01').style.display='none'">Close</button>
    </div>

</div>