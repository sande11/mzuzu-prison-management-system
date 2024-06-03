<div class="modal-content card animate-zoom" style="width: 60%;">
    <header class="container">
        <span onclick="document.getElementById('id01').style.display='none'"
            class="button xlarge display-topright">×</span>
        <h2>Add Inmate</h2>
    </header>

    <div class="bar border-bottom">

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
    <div class="container padding">
        <button type="submit" class="button right white border"
            onclick="document.getElementById('id01').style.display='none'">Close</button>
    </div>

</div>