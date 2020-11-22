<div data-dynamic-template-id="tcm_home_services_lab_vendor" class="dynamic-form">
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab_contacted">Vendor Contacted</label>
                @date("lab_vendor_date", ["id" => "lab_vendor_date"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab_name">Name</label>
                @text("lab_vendor_name", ["id" => "lab_vendor_name"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab_comments">Comments</label>
                @text("lab_vendor_comments", ["id" => "lab_vendor_comments"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab_follow_up">Follow Up Date</label>
                @date("lab_vendor_follow_up", ["id" => "lab_vendor_follow_up"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 align-self-end">
            <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
        </div>
   </div>     
</div>