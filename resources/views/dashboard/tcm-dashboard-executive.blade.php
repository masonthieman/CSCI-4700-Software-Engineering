 <!--  @header("Tcm Dashboard Executive") -->
<div class="row" id="filters">
    <input type="hidden" name="identify" id="identify" value="<?php echo Auth::user()->employee->title_id; ?>">
     <input type="hidden" name="identify" id="hiddenid" value="<?php echo Auth::user()->employee->id; ?>">
        <div class="col-md-4">
            <div class="form-group capitalize">   
                <span class="selectd" id="selectd" style="display:none">@selectteamleader("teamleader",["id" => "teamleader_id"])</span>
                <input type="text" class="form-control teamleader_id_text" name="teamleader" id="teamleader_id" value="<?php echo Auth::user()->employee->fname.' '. Auth::user()->employee->lname?>" style="display:none">
            </div>
        </div>
    <div class="col-md-4">
        <div class="form-group">
            <select name="selectcaremanager" class="form-control" id="caremanager_id" >
            </select></span>
            <!-- @selectcaremanager("caremanager",["id" => "caremanager_id"])  -->
             <input type="text" class="form-control caremngr_id_text" name="caremanager" id="caremanager_id" value="<?php echo Auth::user()->employee->fname.' '. Auth::user()->employee->lname;?>" style="display:none">
        </div>
    </div>
     <div class="col-md-4">
        <div class="form-group">
           
            @selectpractice("practice_id",["id" => "practice_id"])
        </div>
    </div>
</div>


 
