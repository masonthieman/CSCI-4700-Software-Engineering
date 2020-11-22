@extends("base.master")
@section("body")

    @include("component.sidebar")
    <div id="main" class="dashboard_page">
    <div class="container bg-white " >  
        <div class="row">
            <div class="col-3">
            <button class="openbtn" onclick="openNav()">☰ Action Items</button>
				<div class="pullright">
					<!--<img src="/img/dashboard_icons/filters.png" width="35" height="35">-->
				</div>
            </div>
			<div class="col-1" id="filterLabel" >
			</div>
            <div class="col-8">
               @include("dashboard.tcm-dashboard-executive")
            </div>
        </div>
        
        <hr>
        <div class="content">
            <div class="container-fluid">
                <div class="row cards">                    
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <a href="#" class="patientListClass" id="patientlist" > <!-- {{ route("dashboard.patient_list") }}  -->
                            <div class="card-header card-header-success card-header-icon patient-list">
                                <div class="card-icon patient-list">
                                </div>
                                <h6 class="card-category"> Patient List</h6>
                                <h5 class="card-title"><label id="patient-count"></label></h5>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <a href="#" class="patientListClass" id="newlyAssigned">
                        <div class="card-header card-header-danger card-header-icon new-assigned-patient">
                            <div class="card-icon">
                            </div>
                            
                            <h6 class="card-category">Newly Assigned</h6>
                            <h5 class="card-title"><label id="newly-assigned"></h5></a>
                        </div>
                        </a>
                        </div>
                    </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                 <a href="#" class="patientListClass" id="billablePatients" >
                                <div class="card-header card-header-success card-header-icon billable-this-month">
                                    <div class="card-icon ">
                                    </div>
                                    <h6 class="card-category">Billable this Month</h6>
                                    <h5 class="card-title"><label id="billable"></h5>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                 <a href="#" class="patientListClass" id="nonBillable">
                                <div class="card-header card-header-success card-header-icon non-billable-this-month">
                                    <div class="card-icon ">
                                    </div>
                                    <h6 class="card-category">Non billable this Month</h6>
                                    <h5 class="card-title"><label id="non-billable"></label></h5>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                 <a href="#" class="patientListClass" id="readmittedPatients">
                                    <div class="card-header card-header-success card-header-icon re-admission">
                                        <div class="card-icon ">
                                        </div>
                                        <h6 class="card-category">Readmissions</h6>
                                        <h5 class="card-title"><label id="readmission"></label></h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
    
         
         <div class="content mt-3">
            <div class="container-fluid">

                <div class="row cards">                    
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <a href="#" class="patientListClass" id="initialContact">
                            <div class="card-header card-header-success card-header-icon initial-contact">
                                <div class="card-icon patient-list">
                                </div>
                                <h6 class="card-category">Initial Contact Due Today</h6>
                                 <h5 class="card-title"><label id="initial-contact-due-today"></label></h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">
                         <a href="#" class="patientListClass" id="secondContact">
                            <div class="card-header card-header-success card-header-icon second-contact">
                                <div class="card-icon patient-list">
                                </div>
                                <h6 class="card-category">Second Contact Due Today</h6>
                                <h5 class="card-title"><label id="second-contact-due-today"></label></h5>
                            </div>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">

                        <a href="#" class="patientListClass" id="face2face">
                            <div class="card-header card-header-success card-header-icon face-to-face">
                                <div class="card-icon patient-list">
                                </div>
                                <h6 class="card-category">Face-to-Face Due This Week</h6>
                                 <h5 class="card-title"><label id="face-to-face-visit-due-this-week"></label></h5>
                            </div>
                            </a>


                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">

                        <a href="#" class="patientListClass" id="inProgress">
                            <div class="card-header card-header-success card-header-icon in-progress">
                                <div class="card-icon ">
                                </div>
                                <h6 class="card-category">In Progress</h6>
                                <h5 class="card-title"><label id="status-count"></h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="card card-stats">
                        <a href="#" class="patientListClass" id="tcmCompleted">
                        
                            <div class="card-header card-header-success card-header-icon tcm-completed">
                                <div class="card-icon in-progress">
                                </div>
                                <h6 class="card-category">TCM Completed</h6>
                                <h5 class="card-title"><label id="tcm-completed"></h5>
                            </div>
                            </a>
                        </div>
                    </div>
                    
                    </div>
                       
                </div>
            </div>
<hr>
                <div id="chartObjects">
                @include("dashboard.my-chart-objects")
                </div>

            </div>
        </div>    
   

@include("modal.dashboard.patient_list")


@endsection

@push("scripts")
    <script>
        
        $(document).ready(function() {
          
          dashboard.init({!! json_encode($data) !!});
        });

        
        function navigateToTcm(id) {            
            window.location.href="{{ route('questionnaire.tcm') }}?tab="+id;
        }       
           
        
        
        function openNav() {
          document.getElementById("mySidebar").style.width = "220px";
          document.getElementById("main").style.marginLeft = "220px";
        }

        /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft = "0";
        }
    </script>

@endpush