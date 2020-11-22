<div data-dynamic-template-id="tcm_home_services_oxygen_vendor" class="dynamic-form">
<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen_contacted">Vendor Contacted</label>
                @date("oxygen_vendor_date", ["id" => "oxygen_vendor_date"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen_name">Name</label>
                @text("oxygen_vendor_name", ["id" => "oxygen_vendor_name"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen_comments">Comments</label>
                @text("oxygen_vendor_comments", ["id" => "oxygen_vendor_comments"])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen_follow_up">Follow Up Date</label>
                @date("oxygen_vendor_date", ["id" => "oxygen_vendor_date"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2 align-self-end">
            <button class="btn btn-outline-primary btn-block" type="button" data-dynamic-action="remove">Remove</button>
        </div>
    </div>    
</div>