<!-- <div id="row">
	<div class="col-lg-4 col-md-4 col-sm-12" >
		<div class="panel panel-inverse">
			<div class="panel-heading">
			<div class="panel-heading-btn">
			</div>
			<h4 class="panel-title">TCM In Progress</h4>
			</div>
			<div class="panel-body">
				<div id="tcmInProgress">
				</div>
			</div>
		</div>
	</div>
	<div class=" col-lg-4 col-md-4 col-sm-12" >
		<div class="panel panel-inverse">
			<div class="panel-heading">
			<div class="panel-heading-btn">
			</div>

                 <h4 class="panel-title"> Initial Contact Due Today</h4>
			</div>
			<div class="panel-body">
				<div class="chart-container" style="position: relative; width:100%;">
                              <canvas id="dashboard-chart-initial-contact-status"></canvas>
                            </div>
			</div>
		</div>
	</div>

</div>
 --><!-- Donut Charts -->
<div class="row">
        <!-- Donut Charts -->
            <div class="col-lg-4 col-md-12 col-sm-12">

           <div class="panel panel-inverse">
			 <div class="panel-heading">
				<div class="panel-heading-btn">
				</div>

				  <h4 class="panel-title"> Initial Contact Due Today</h4>
			</div>
			<div class="panel-body">
			<div class="chart-container initialContact piechart" style="position: relative; width:100%;">
                              <canvas id="dashboard-chart-initial-contact-status"></canvas>
              </div>
			</div>
			</div> 

            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">

             <div class="panel panel-inverse">
			<div class="panel-heading">
			<div class="panel-heading-btn">
			</div>

              <h4 class="panel-title"> Second Contact Due Today</h4>
			</div>
			<div class="panel-body">
			<div class="chart-container secondContact piechart" style="position: relative; width:100%;">
                               <canvas id="dashboard-chart-second-contact-status"></canvas>
            </div>
			</div>
		     </div>
            </div>

            <div class="col-lg-4 col-md-12 col-sm-12">


<div class="panel panel-inverse">
			<div class="panel-heading">
			<div class="panel-heading-btn">
			</div>

              <h4 class="panel-title"> TCM Patients</h4>
			</div>
			<div class="panel-body">
			<div class="chart-container tcmpatientsContact piechart" style="position: relative; width:100%;">
                                <canvas id="dashboard-chart-tcm-patients-status"></canvas>
            </div>
			</div>
		    </div>
            </div>
            </div>
<!-- bar Charts -->
<div class="row">
	<div class="col-lg-4 col-md-12 col-sm-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<div class="panel-heading-btn">
				</div>
				<h4 class="panel-title">Tasks Due Today</h4>
			</div>
			<div class="panel-body">
				<div class="chart-container taskduetoday" style="position: relative; width:100%;">
					<canvas id="dashboard-chart-tasks-due-today" ></canvas>
				</div>
			</div>
		</div> 
	</div>
	<div class="col-lg-4 col-md-12 col-sm-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<div class="panel-heading-btn">
				</div>
				<h4 class="panel-title"> Face to Face Due This Week (Moderate Complexity)</h4>
			</div>
			<div class="panel-body">
				<div class="chart-container facetofaceduethisweekmoderate" style="position: relative; width:100%;">
					<canvas id="dashboard-chart-face-to-face-due-this-week-moderate" ></canvas>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-12 col-sm-12">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<div class="panel-heading-btn">
				</div>
				<h4 class="panel-title"> Face to Face Due This Week (High Complexity)</h4>
			</div>
			<div class="panel-body">
				<div class="chart-container facetofaceduethisweekhigh" style="position: relative; width:100%;">
					<canvas id="dashboard-chart-face-to-face-due-this-week-high" ></canvas>
				</div>
			</div>
		</div>
	</div>
	<!--  <div class="col-lg-4 col-md-12 col-sm-12">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
					</div>
					<h4 class="panel-title"> TCM Patients</h4>
				</div>
				<div class="panel-body">
					<div class="chart-container" style="position: relative; width:100%;">
						<canvas id="dashboard-chart-tcm-patients-status"></canvas>
					</div>
				</div>
			</div>
	</div> -->
</div>







