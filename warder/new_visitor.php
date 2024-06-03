<div class="modal-content card animate-zoom">
    <header class="container">
        <span onclick="document.getElementById('id01').style.display='none'"
            class="button xlarge display-topright">×</span>
        <h2>Add Visitor</h2>
    </header>

    <div class="bar border-bottom">

    </div>
    <form id="save_visitor" method="POST" enctype="multipart/form-data">
        <div class="row section row-padding">

            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Visitor Name</label>
                    <input id="full_name" class="input border" name="full_name" type="text" placeholder="Name" required>
                </div>
                <div class="half">
                    <label for="name">Inmate Name</label>
                    <select id="myInmates" class="input border" type="text" name="inmate_id">
                        <option value="" disabled selected>Choose your option</option>
                    </select>
                </div>
            </div>
            <div class="row section row-padding">
                <div class="half">
                    <label for="name">Contact #</label>
                    <input id="contact" class="input border" name="contact" type="text" placeholder="Contact" required>
                </div>
                <div class="half">
                    <label for="name">Relation</label>
                    <input id="relation" class="input border" name="relation" type="text" placeholder="Relation"
                        required>
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