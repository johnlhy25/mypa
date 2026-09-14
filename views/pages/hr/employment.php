<?= form_open('employment_information'); ?>
<!--First Row-->          
<!------------------------>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">Position</label>
                <input type="text" name="position" class="form-control" placeholder="Computer Programmer I" value="<?= $position ?>">
            </div>
        </div> 

        <?php if($office == "FASD") {
            $selected_f = "selected";
            }else{
            $selected_f ='';
            }
        ?>
        <?php if($office == "ORD") {
            $selected_o = "selected";
            }else{
            $selected_o ='';
        }
        ?>
        <?php if($office == "ROD") {
            $selected_r = "selected";
            }else{
            $selected_r ='';
        }
        ?>
        <?php if($office == "ADMIN") {
            $selected_a = "selected";
            }else{
            $selected_a ='';
        }
        ?>
        <?php if($office == "TECHNICAL") {
            $selected_t = "selected";
            }else{
            $selected_t ='';
        }
        ?> 
        <?php if($office == "INSTRUCTION") {
            $selected_i = "selected";
            }else{
            $selected_i ='';
        }
        ?>
            
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">Division</label>
                    <select name="office" class="form-control">
                        <option value="FASD" <?= $selected_f?>>FASD</option>
                        <option value="ORD" <?= $selected_o?>>ORD</option>
                        <option value="ROD" <?= $selected_r?>>ROD</option>
                        <option value="ADMIN" <?= $selected_a?>>ADMIN</option>
                        <option value="TECHNICAL" <?= $selected_t?>>TECHNICAL</option>
                        <option value="INSTRUCTION" <?= $selected_i?>>INSTRUCTION</option>
                    </select>
            </div>
        </div> 

        <?php 
        if($status == "Permanent") {
            $selected_permanent = "selected";
            }else{
            $selected_permanent ='';
            }
        ?>
        <?php if($status == "Casual") {
            $selected_casual = "selected";
            }else{
            $selected_casual ='';
            }
        ?>
        <?php if($status == "JOCOS") {
            $selected_jocos = "selected";
            }else{
            $selected_jocos ='';
            }
        ?>  

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-control-label">Status</label>
                    <select name="emp_status" class="form-control">
                        <option value="Permanent" <?= $selected_permanent ?>>Permanent</option>
                        <option value="Casual" <?= $selected_casual ?>>Casual</option>
                        <option value="JOCOS" <?= $selected_jocos ?>>Job Order/ Contract of Service</option>
                        <option value="Incative" <?= $selected_jocos ?>>Incative (e.g. Retired/Resigned etc.)</option>
                    </select>
            </div>
        </div> 
    </div> 
    <!--First Row-->          
    <!------------------------>

    <script>
        var expanded = false;

        function showCheckboxes() {
            var checkboxes = document.getElementById("checkboxes");
            if (!expanded) {
                checkboxes.style.display = "block";
                expanded = true;
            } else {
                checkboxes.style.display = "none";
                expanded = false;
            }
        }
    </script>

    <style>
    .multiselect {
    width: 100%;
    }

    .selectBox {
    position: relative;
    }

    .selectBox select {
    width: 100%;
    }

    .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    }

    #checkboxes {
    display: none;
    border: 1px #dadada solid;
    }

    #checkboxes label {
    display: block;
    }
    </style>


    <!--Third Row-->
    <div class="row no-padding-top">
        <div class="col-md-2">
            <div class="form-group">
                <label class="form-control-label">Salary Grade</label>
                <input type="number" class="form-control" name="salary_grade" placeholder="9" value="<?= $salary_grade ?>" min="1" max="33">
            </div>
        </div> 

        <div class="col-md-10">
            <div class="form-group">
                <label class="form-control-label">Equal Opportunity Principle (EOP) Classification</label>
                <div class="multiselect">
                    <div class="selectBox" onclick="showCheckboxes()">
                        <select class="form-control">
                            <option>Select an option</option>
                        </select>
                        <div class="overSelect"></div>
                    </div>

                    <div id="checkboxes">
                        <label class="form-control" for="one">
                        <?php
                        if($eop1 == null){
                        $eop1_checked = " ";
                        }else{
                        $eop1_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop1" type="checkbox" id="one" value="1" <?= $eop1_checked?>/>Pregnant Women</label>
                        <label class="form-control" for="two" >
                        <?php
                        if($eop2 == null){
                        $eop2_checked = " ";
                        }else{
                        $eop2_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop2" type="checkbox" id="two" value="1" <?= $eop2_checked?> />Solo Parent</label>
                        <label class="form-control" for="three">
                        <?php
                        if($eop3 == null){
                        $eop3_checked = " ";
                        }else{
                        $eop3_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop3" type="checkbox" id="three" value="1" <?= $eop3_checked?> />Person with Disabilities</label>
                        <label class="form-control" for="four">
                        <?php
                        if($eop4 == null){
                        $eop4_checked = " ";
                        }else{
                        $eop4_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop4" type="checkbox" id="four" value="1" <?= $eop4_checked?>/>Indigenous People</label>
                        <label class="form-control" for="five">
                        <?php
                        if($eop5 == null){
                        $eop5_checked = " ";
                        }else{
                        $eop5_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop5" type="checkbox" id="five" value="1" <?= $eop5_checked?> />People with different religious affiliations and denominations</label>
                        <label class="form-control" for="six">
                        <?php
                        if($eop6 == null){
                        $eop6_checked = " ";
                        }else{
                        $eop6_checked = "checked";
                        }
                        ?>
                        <input name="emp_eop6" type="checkbox" id="six" value="1" <?= $eop6_checked?>/>Sexual Orientation and Gende Identity and Expression (SOGIE)</label>
                    </div>
                </div>
            </div>
        </div> 
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"> </i> Update</button>
    </div>

</div>
</form>

