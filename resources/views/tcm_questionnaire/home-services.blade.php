@header("Follow Up")
@divider

@sectioncheckbox(" Home Health ", "start_home_health", "start_home_health", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
               <label for="home_health">Home Health</label>
                 @select("Home Health", "home_health", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="hh_orders">Orders</label>
                @text("hh_orders", ["id" => "hh_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                  @dynamicarea("tcm_home_services_hh_vendor", "tcm_home_services_hh_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_hh_vendor")
                    @endpush     
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox(" DME ", "start_dme", "start_dme", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="dme">DME</label>
                @select("dme", "dme", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="dme_orders">Orders</label>
                @text("dme_orders", ["id" => "dme_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                @dynamicarea("tcm_home_services_dme_vendor", "tcm_home_services_dme_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_dme_vendor")
                    @endpush 
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox(" PT/OT ", "start_ptot", "start_ptot", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot">PT/OT</label>
                @select("ptot", "ptot", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="ptot_orders">Orders</label>
                @text("ptot_orders", ["id" => "ptot_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- @dynamicarea("tcm_home_services_ptot_vendor", "tcm_home_services_ptot_vendor", "Vendor") -->
                @dynamicarea("tcm_home_services_ptot_vendor", "tcm_home_services_ptot_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_ptot_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox(" Oxygen ", "start_oxygen", "start_oxygen", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen">Oxygen</label>
                @select("oxygen", "oxygen", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="oxygen_orders">Orders</label>
                @text("oxygen_orders", ["id" => "oxygen_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- @dynamicarea("tcm_home_services_oxygen_vendor", "tcm_home_services_oxygen_vendor", "Vendor") -->
                @dynamicarea("tcm_home_services_oxygen_vendor", "tcm_home_services_oxygen_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_oxygen_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox(" Lab/Radiology ", "start_lab_radiology", "start_lab_radiology", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab">Lab/Radiology</label>
                @select("lab", "lab", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="lab_orders">Orders</label>
                @text("lab_orders", ["id" => "lab_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- @dynamicarea("tcm_home_services_lab_vendor", "tcm_home_services_lab_vendor", "Vendor") -->
                @dynamicarea("tcm_home_services_lab_vendor", "tcm_home_services_lab_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_lab_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox(" Other ", "start_other", "start_other", 1)
<div class="show-section">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="other">Other</label>
                @select("other", "other", [
                    "completed" => "Completed",
                    "in_progress" => "In Progress",
                ])
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="other_orders">Orders</label>
                @text("other_orders", ["id" => "other_orders"])
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <!-- @dynamicarea("tcm_home_services_other_vendor", "tcm_home_services_other_vendor", "Vendor") -->
                @dynamicarea("tcm_home_services_other_vendor", "tcm_home_services_other_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_other_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>
@divider
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary" data-change-tab="patient_contact" data-tab-group="tcm_questionnaire">Previous</button>
    </div>
    <div class="col-6 text-right">
        <button type="button" class="btn btn-primary" data-change-tab="face_to_face" data-tab-group="tcm_questionnaire">Next</button>
    </div>
</div>