<div data-dynamic-template-id="tcm_home_services_hh_vendor" class="dynamic-form">
        <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="dme_contacted">Vendor Contacted</label>
                @date("hh_vendor_contacted", ["id" => "hh_vendor_contacted"])
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="dme_name">Name</label>
                @text("hh_vendor_name", ["id" => "hh_vendor_name"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="dme_comments">Comments</label>
                @text("hh_vendor_comments", ["id" => "hh_vendor_comments"])
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="dme_follow_up">Follow Up Date</label>
                @date("hh_follow_up_date", ["id" => "hh_follow_up_date"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 align-self-end">
            <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
        </div>
    </div>    
</div>