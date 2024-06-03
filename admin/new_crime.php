<div class="modal-content card animate-zoom">
    <header class="container">
        <span onclick="document.getElementById('id01').style.display='none'"
            class="button xlarge display-topright">×</span>
        <h2>Add Crime</h2>
    </header>

    <div class="bar border-bottom">

    </div>
    <form id="save_crime" method="POST" enctype="multipart/form-data">
        <div class="row section row-padding">

            <div class="">
                <label for="prison">Crime Name</label>
                <input id="crime" class="input w3-border" name="crime" type="text" placeholder="Name" required="">
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