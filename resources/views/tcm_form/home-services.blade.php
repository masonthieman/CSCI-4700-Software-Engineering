@header("Follow Up")
@divider
@if (isset($form))
<!-- Print Section -->
@printcheckbox($form->start_home_health, "Home Health")
    <div class="row">
        <div class="printing-col col-md-6">
            <label>Home Health</label>
            <span class="printing-span">
                @if(isset($form->home_health))
                    <?php 
                        if ($form->home_health=='in_progress') {
                            echo "In Progress";
                        } else if ($form->home_health=='completed') {
                            echo "Completed";
                        } else {
                            echo "";
                        }
                    ?>
                    <!-- {{config("form.home_health")[$form->home_health]}} -->
		        @endif
            </span>
        </div>
        <div class="printing-col col-md-6">
                <label>Orders</label>
                <span class="printing-span">{{$form->hh_orders}}</span>
        </div>
    </div>
    <div class="row">
            <!-- Printing the dynamic area -->
            @foreach($form->tcm_home_services_hh_vendor as $tcm_home_services_hh_vendor)
            
                <div class="printing-col col-md-6">
                        <label>Vendor Contacted</label>
                        <span class="printing-span">{{date('m-d-Y',strtotime($tcm_home_services_hh_vendor->hh_vendor_contacted))}}</span>
                </div>
                <div class="printing-col col-md-6">
                        <label>Name</label>
                        <span class="printing-span">{{$tcm_home_services_hh_vendor->hh_vendor_name}}</span>
                </div>

                <div class="printing-col col-md-6">
                        <label>Comments</label>
                        <span class="printing-span">{{$tcm_home_services_hh_vendor->hh_vendor_comments}}</span>
                </div>
                <div class="printing-col col-md-6">
                        <label>Follow Up Date</label>
                        <span class="printing-span">
                            @if(isset($tcm_home_services_hh_vendor->hh_follow_up_date))
                                {{date('m-d-Y',strtotime($tcm_home_services_hh_vendor->hh_follow_up_date))}}
                            @endif
                        </span>
                </div>

            @endforeach
            <!-- Printing the dynamic area -->            
    </div>


@divider
@printcheckbox($form->start_dme, "DME")
    <div class="row">
        <div class="printing-col col-md-6">
                <label>DME</label>      
                <span class="printing-span">
                    @if(isset($form->dme))
                        <?php 
                            if ($form->dme=='in_progress') {
                                echo "In Progress";
                            } else if ($form->dme=='completed') {
                                echo "Completed";
                            } else {
                                echo "";
                            }
                        ?>
                    @endif
                </span>
        </div>
        <div class="printing-col col-md-6">
                <label>Orders</label>            
                <span class="printing-span">{{$form->dme_orders}}</span>
        </div>
    </div>
    <div class="row">
            <!-- Printing the dynamic area -->
            @foreach($form->tcm_home_services_dme_vendor as $tcm_home_services_dme_vendor)

                    <div class="printing-col col-md-6">
                            <label>Vendor Contacted</label>               
                            <span class="printing-span">{{date('m-d-Y',strtotime($tcm_home_services_dme_vendor->dme_vendor_contacted))}}</span>
                    </div>
                    <div class="printing-col col-md-6">
                            <label>Name</label>              
                            <span class="printing-span">{{$tcm_home_services_dme_vendor->dme_vendor_name}}</span>
                    </div>
 
                    <div class="printing-col col-md-6">
                            <label>Comments</label>
                            <span class="printing-span">{{$tcm_home_services_dme_vendor->dme_vendor_comments}}</span>
                    </div>
                    <div class="printing-col col-md-6">
                            <label>Follow Up Date</label>             
                            <span class="printing-span">
                                @if(isset($tcm_home_services_dme_vendor->dme_follow_up_date))
                                {{date('m-d-Y',strtotime($tcm_home_services_dme_vendor->dme_follow_up_date))}}
                                @endif
                            </span>
                    </div>
        
            @endforeach
            <!-- Printing the dynamic area -->   
    </div>


@divider
@printcheckbox($form->start_ptot, "PT/OT")
    <div class="row">
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>PT/OT</label>             
                <span class="printing-span">
                    @if(isset($form->ptot))
                        <?php 
                            if ($form->ptot=='in_progress') {
                                echo "In Progress";
                            } else if ($form->ptot=='completed') {
                                echo "Completed";
                            } else {
                                echo "";
                            }
                        ?>
                    @endif
                </span>
            </div>
        </div>
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Orders</label>       
                <span class="printing-span">{{$form->ptot_orders}}</span>
            </div>
        </div>
    </div>
    <div class="row">
            <!-- Printing the dynamic area -->
            @foreach($form->tcm_home_services_ptot_vendor as $tcm_home_services_ptot_vendor)

                    <div class="printing-col col-md-6">
                        <div class="form-group">
                            <label>Vendor Contacted</label>      
                            <span class="printing-span">{{date('m-d-Y',strtotime($tcm_home_services_ptot_vendor->ptot_vendor_contacted))}}</span>
                        </div>
                    </div>
                    <div class="printing-col col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <span class="printing-span">{{$tcm_home_services_ptot_vendor->ptot_vendor_name}}</span>
                        </div>
                    </div>

                    <div class="printing-col col-md-6">
                        <div class="form-group">
                            <label>Comments</label>          
                            <span class="printing-span">{{$tcm_home_services_ptot_vendor->ptot_vendor_comments}}</span>
                        </div>
                    </div>
                    <div class="printing-col col-md-6">
                        <div class="form-group">
                            <label>Follow Up Date</label>      
                            <span class="printing-span">{{date('m-d-Y',strtotime($tcm_home_services_ptot_vendor->ptot_vendor_follow_up))}}</span>
                        </div>
                    </div>

            @endforeach
            <!-- Printing the dynamic area -->  
    </div>
   

@divider
@printcheckbox($form->start_oxygen, "Oxygen")

    <div class="row">
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Oxygen</label>          
                <span class="printing-span">
                    @if(isset($form->oxygen))
                        <?php 
                            if ($form->oxygen=='in_progress') {
                                echo "In Progress";
                            } else if ($form->oxygen=='completed') {
                                echo "Completed";
                            } else {
                                echo "";
                            }
                        ?>
                    @endif
                </span>
            </div>
        </div>
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Orders</label>         
                <span class="printing-span">{{$form->oxygen_orders}}</span>
            </div>
        </div>
    </div>
    <div class="row">
    <!-- @dynamicarea("tcm_home_services_oxygen_vendor", "tcm_home_services_oxygen_vendor", "Vendor") -->
    @foreach($form->tcm_home_services_oxygen_vendor as $tcm_home_services_oxygen_vendor)
        <div class="printing-col col-md-6">
            <label for="oxygen_contacted">Vendor Contacted</label>
           <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_oxygen_vendor->oxygen_vendor_date)) }}</span>
        </div>

        <div class="printing-col col-md-6">
            <label for="oxygen_name">Name</label>
            <span class="printing-span">{{ $tcm_home_services_oxygen_vendor->oxygen_vendor_name }}</span>
        </div>

  
        <div class="printing-col col-md-6">
            <label for="oxygen_comments">Comments</label>
           <span class="printing-span">{{ $tcm_home_services_oxygen_vendor->oxygen_vendor_comments }}</span>
        </div>

        <div class="printing-col col-md-6">
            <label for="oxygen_follow_up">Follow Up Date</label>
            <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_oxygen_vendor->oxygen_vendor_date)) }}</span>
        </div>
    @endforeach
    <!--  -->
    </div>
@divider
@printcheckbox($form->start_lab_radiology, "Lab/Radiology")

    <div class="row">
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Lab/Radiology</label>
                <span class="printing-span">
                    @if(isset($form->lab))
                        <?php 
                            if ($form->lab=='in_progress') {
                                echo "In Progress";
                            } else if ($form->lab=='completed') {
                                echo "Completed";
                            } else {
                                echo "";
                            }
                        ?>
                    @endif
                </span>
            </div>
        </div>
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Orders</label> 
                <span class="printing-span">{{$form->lab_orders}}</span>
            </div>
        </div>
    </div>
    <div class="row">
    <!-- @dynamicarea("tcm_home_services_lab_vendor", "tcm_home_services_lab_vendor", "Vendor") -->
        @foreach($form->tcm_home_services_lab_vendor as $tcm_home_services_lab_vendor)
            <div class="printing-col col-md-6">
                <label for="lab_contacted">Vendor Contacted</label>
               <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_lab_vendor->lab_vendor_date)) }}</span>
            </div>

            <div class="printing-col col-md-6">
                <label for="lab_name">Name</label>
                <span class="printing-span">{{ $tcm_home_services_lab_vendor->lab_vendor_name }}</span>
            </div>

      
            <div class="printing-col col-md-6">
                <label for="lab_comments">Comments</label>
               <span class="printing-span">{{ $tcm_home_services_lab_vendor->lab_vendor_comments }}</span>
            </div>

            <div class="printing-col col-md-6">
                <label for="lab_follow_up">Follow Up Date</label>
                <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_lab_vendor->lab_vendor_date)) }}</span>
            </div>
        @endforeach
    <!--  -->
    </div>


@divider
@printcheckbox($form->start_other, "Other")

    <div class="row">
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label for="other">Other</label>
                <span class="printing-span">
                    @if(isset($form->other))
                        <?php 
                            if ($form->other=='in_progress') {
                                echo "In Progress";
                            } else if ($form->other=='completed') {
                                echo "Completed";
                            } else {
                                echo "";
                            }
                        ?>
                    @endif
                </span>
            </div>
        </div>
        <div class="printing-col col-md-6">
            <div class="form-group">
                <label>Orders</label>     
                <span class="printing-span">{{$form->other_orders}}</span>
            </div>
        </div>
    </div>
    <div class="row">
    <!-- @dynamicarea("tcm_home_services_other_vendor", "tcm_home_services_other_vendor", "Vendor") -->
    @foreach($form->tcm_home_services_other_vendor as $tcm_home_services_other_vendor)
        <div class="printing-col col-md-6">
            <label for="other_contacted">Vendor Contacted</label>
           <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_other_vendor->other_vendor_date)) }}</span>
        </div>

        <div class="printing-col col-md-6">
            <label for="other_name">Name</label>
            <span class="printing-span">{{ $tcm_home_services_other_vendor->other_vendor_name }}</span>
        </div>

  
        <div class="printing-col col-md-6">
            <label for="other_comments">Comments</label>
           <span class="printing-span">{{ $tcm_home_services_other_vendor->other_vendor_comments }}</span>
        </div>

        <div class="printing-col col-md-6">
            <label for="other_follow_up">Follow Up Date</label>
            <span class="printing-span">{{ date('m-d-Y',strtotime($tcm_home_services_other_vendor->other_vendor_date)) }}</span>
        </div>
    @endforeach
    <!--  -->  
    </div>
<!-- Print Section -->
@else
<!-- Form -->
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
@sectioncheckbox("DME", "start_dme", "start_dme", 1)
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
                <!-- @dynamicarea("tcm_home_services_dme_vendor", "tcm_home_services_dme_vendor", "Entry") -->
                @dynamicarea("tcm_home_services_dme_vendor", "tcm_home_services_dme_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_dme_vendor")
                    @endpush  
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox("PT/OT", "start_ptot", "start_ptot", 1)
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
                @dynamicarea("tcm_home_services_ptot_vendor", "tcm_home_services_ptot_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_ptot_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox("Oxygen", "start_oxygen", "start_oxygen", 1)
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
                @dynamicarea("tcm_home_services_oxygen_vendor", "tcm_home_services_oxygen_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_oxygen_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox("Lab/Radiology", "start_lab_radiology", "start_lab_radiology", 1)
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
                @dynamicarea("tcm_home_services_lab_vendor", "tcm_home_services_lab_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_lab_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>

@divider
@sectioncheckbox("Other", "start_other", "start_other", 1)
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
                @dynamicarea("tcm_home_services_other_vendor", "tcm_home_services_other_vendor", "Vendor")
                    @push("dynamic_templates")
                        @include("component.tcm-dynamic-templates.tcm_home_services_other_vendor")
                    @endpush
            </div>
        </div>
    </div>
</div>
<!-- Form -->
@endif	
@divider
