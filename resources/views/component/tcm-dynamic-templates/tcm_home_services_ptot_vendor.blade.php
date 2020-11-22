<div data-dynamic-template-id="tcm_home_services_ptot_vendor" class="dynamic-form">
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot_contacted">Vendor Contacted</label>
                @date("ptot_vendor_contacted", ["id" => "ptot_vendor_contacted"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot_name">Name</label>
                @text("ptot_vendor_name", ["id" => "ptot_vendor_name"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot_comments">Comments</label>
                @text("ptot_vendor_comments", ["id" => "ptot_vendor_comments"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot_follow_up">Follow Up Date</label>
                @date("ptot_follow_up_date", ["id" => "ptot_follow_up_date"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 align-self-end">
            <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
        </div>
    </div>    
</div>