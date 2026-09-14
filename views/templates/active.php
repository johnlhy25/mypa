<!--MYPA Menu Dashboard-->
<?php if($this->uri->segment(1)=="dashboard"){
    $dashboard = "active";
} else {
    $dashboard = "";
} ?>

<!--MYPA Menu Division-->
<?php if($this->uri->segment(1)=="unit_user" || $this->uri->segment(1)=="unit_user_document" || $this->uri->segment(1)=="unit_user_document_add"){
    $unit_user = "active";
} else {
    $unit_user = "";
} ?>

<!--MYPR DocBank-->
<?php if($this->uri->segment(1)=="unit_user" || $this->uri->segment(1)=="unit_user_document" || $this->uri->segment(1)=="unit_user_document_add" || $this->uri->segment(1)=="dashboard"){
    $MYPA_Menu_Dashboard = "active";
} else {
    $MYPA_Menu_Dashboard = "";
} ?>



<!--Calendar of Activities-->
<?php if($this->uri->segment(1)=="calendar"){
    $calendar = "active";
} else {
    $calendar = "";
} ?>

<!--MYPR DocBank Management-->
<?php if($this->uri->segment(1)=="unit_user_admin" || $this->uri->segment(1)=="operating_units" || $this->uri->segment(1)=="unit_admin" || $this->uri->segment(1)=="unit_user_document_admin" || $this->uri->segment(1)=="unit_user_document_add_admin" || $this->uri->segment(1)=="categories" || $this->uri->segment(1)=="results"){
    $MYPR_DocBank_Management = "active";
} else {
    $MYPR_DocBank_Management = "";
} ?>

<!--MYPA Management Division-->
<?php if($this->uri->segment(1)=="unit_user_admin"){
    $unit_user_admin = "active";
} else {
    $unit_user_admin = "";
} ?>

<!--MYPA Management operating_units-->
<?php if($this->uri->segment(1)=="operating_units" || $this->uri->segment(1)=="unit_admin" || $this->uri->segment(1)=="unit_user_document_admin" || $this->uri->segment(1)=="unit_user_document_add_admin" ){
    $operating_units = "active";
} else {
    $operating_units = "";
} ?>

<!--MYPA Management Categories-->
<?php if($this->uri->segment(1)=="categories"){
    $categories = "active";
} else {
    $categories = "";
} ?>

<!--MYPA Management Results-->
<?php if($this->uri->segment(1)=="results"){
    $results = "active";
} else {
    $results = "";
} ?>

<!--MYPA Management Settings-->
<?php if($this->uri->segment(1)=="auth_logs" || $this->uri->segment(1)=="operating_units" || $this->uri->segment(1)=="unit_user_admin"){
    $MYPA_Management_Settings = "active";
} else {
    $MYPA_Management_Settings = "";
} ?>

<!--MYPA Management auth_logs-->
<?php if($this->uri->segment(1)=="auth_logs"){
    $auth_logs = "active";
} else {
    $auth_logs = "";
} ?>

<!--MYPA Management Users-->
<?php if($this->uri->segment(1)=="accounts"){
    $users = "active";
} else {
    $users = "";
} ?>

<!--MYPA Notifications-->
<?php if($this->uri->segment(1)=="notifications"){
    $notifications = "active";
} else {
    $notifications = "";
} ?>

<!--Supply Request-->
<?php if($this->uri->segment(1)=="request_supply"){
    $request_supply = "active";
} else {
    $request_supply = "";
} ?>

<!--Supply Request-->
<?php if($this->uri->segment(1)=="request_supply" || $this->uri->segment(1)=="request_supply"){
    $supply_Menu = "active";
} else {
    $supply_Menu = "";
} ?>












    
            
            
           
    
    