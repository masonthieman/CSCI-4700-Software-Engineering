// URLs ofr cards Patient List
const URL_PATIENT_DATA_FETCH = "/ajax/dashboard/fetchPatients";
const URL_NEWLY_ASSIGNED_PATIENTS = "/ajax/dashboard/fetchNewlyAssignedPatients";
const URL_BILLABLE = "/ajax/dashboard/fetchBillable";
const URL_NON_BILLABLE = "/ajax/dashboard/fetchNonBillable";
const URL_INITIAL_CONTACT_DUE_TODAY = "/ajax/dashboard/fetchInitialContactDueToday";
const URL_SECOND_CONTACT_DUE_TODAY = "/ajax/dashboard/fetchSecondContactDueToday";
const URL_READMISSION = "/ajax/dashboard/fetchReadmission";
const URL_IN_PROGRESS = "/ajax/dashboard/fetchInProgress";
const URL_TCM_COMPLETED_FETCH = "/ajax/dashboard/fetchTcmCompletedPatients";
const URL_FACE_TO_FACE_DUE_THIS_WEEK = "/ajax/dashboard/fetchFaceToFaceDueThisWeek";


// URLs for Charts Patient List
//Modal pages
const URL_Intial_Contact_Today_DATA_FETCH = "/ajax/dashboard/intialContactTodayDataFetch";
const URL_secondContact_Today_DATA_FETCH = "/ajax/dashboard/secondContactTodayDataFetch";
const URL_Face_to_face_dueDate_DATA_FETCH = "/ajax/dashboard/face_to_face_dueDate_DATA_FETCH";
//donut initial
const URL_GraphInitialContact_Completed_DATA_FETCH="/ajax/dashboard/graphInitialContactCompletedDataFetch";
const URL_GraphInitialContact_Pending_DATA_FETCH="/ajax/dashboard/graphInitialContactPendingDataFetch";
//donut Second
const URL_GraphSecondContact_Completed_DATA_FETCH="/ajax/dashboard/graphSecondContact_Completed_DATA_FETCH";
const URL_GraphSecondContact_Pending_DATA_FETCH="/ajax/dashboard/graphSecondContact_Pending_DATA_FETCH";
//donut TCM
const URL_GraphTcmPatients_Completed_DATA_FETCH="/ajax/dashboard/graphTcmPatients_Completed_DATA_FETCH";
const URL_GraphTcmPatients_InProgress_DATA_FETCH="/ajax/dashboard/graphTcmPatients_InProgress_DATA_FETCH";
const URL_GraphTcmPatients_All_DATA_FETCH="/ajax/dashboard/graphTcmPatients_All_DATA_FETCH";

//face to face
const URL_GraphFacetoFace_due_this_week_DATA_FETCH ="/ajax/dashboard/graphFacetoFace_due_this_week_DATA_FETCH";
const URL_GraphFacetoFace_due_this_week_idevidual_DATA_FETCH ="/ajax/dashboard/graphFacetoFace_due_this_week_indevidual_DATA_FETCH";

var chart;
//graph
const CTX_DAILY   = "dashboard-chart-daily";
const CTX_MONTHLY = "dashboard-chart-monthly";
const CTX_TODAY   = "dashboard-chart-today";

const COLORS = {
  "questionnaires_awv":  "rgba(255, 0,   0,   0.2)",
  "questionnaires_iccm": "rgba(255, 255, 0,   0.2)",
  "questionnaires_tcm": "rgba(255, 255, 0, 0.2)",
  "registrations":       "rgba(0,   255, 0,   0.2)",
  "summaries_new":       "rgba(0,   255, 255, 0.2)",
  "summaries_updated":   "rgba(0,   0,   255, 0.2)"
}

const LABELS = {
  "questionnaires_awv":  "AWV",
  "questionnaires_iccm": "ICCM",
  "questionnaires_tcm": "TCM",
  "registrations":       "Registrations",
  "summaries_new":       "New Care Plans",
  "summaries_updated":   "Updated Care Plans"
}


const OPTIONS_DAILY = {
  scales: {
    xAxes: [{
      ticks: {
        maxTicksLimit: 2,
        minRotation: 0,
        maxRotation: 0,
        autoSkip: true
      }
    }],
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}

const OPTIONS_MONTHLY = {
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}


const OPTIONS_TODAY = {
  scales: { 
        yAxes: [{ 
            ticks: { 
                beginAtZero:true 
            } 
        }] 
    } 
}



var chartDaily;
var chartMonthly;
var chartToday;

var createMonthlyChart = function(data) {
  return new Chart(CTX_MONTHLY, {
    type: "line",
    data: data,
    options: OPTIONS_MONTHLY
  });
};

var createDailyChart = function(data) {
  return new Chart(CTX_DAILY, {
    type: "line",
    data: data,
    options: OPTIONS_DAILY
  });
};
/*bar*/
var creatyTodayChart = function(data) {
  return new Chart(CTX_TODAY, {
    type: "bar",
    data: data,
    options: OPTIONS_TODAY

  });
};


var creatyTodayChart = function(label, value) {
    console.log(label);
    console.log(value);
    return new Chart(CTX_TODAY, {
        type: "bar",
        data: {
            labels: label,
            datasets: [
                {
                    data: value,
                    backgroundColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
                    borderColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
                    borderWidth: 1
                }
            ],
        },
        options: OPTIONS_TODAY

    });
};

var formatData = function(labels, data) {
  console.log(data);
  var result = {
    datasets: [],
    labels: labels
  }
  for (var key in data) {
    let dataValues = [];
    labels.forEach(function(label) {
      dataValues.push(data[key][label]);
    });
    result.datasets.push({
      data: dataValues,
      backgroundColor: COLORS[key],
      label: LABELS[key]
    });

  }
  return result;
};

/* Patient List Functionality */
var patientData = {
    "patients":    {}
};
var displayPatients = function() {
    var columns = ["fname, mname, lname"];
    var labels  = ["First name", "Middle Name", "Last Name"];
    table("patients").setColumns(columns, labels);
};



var displayPatientsData = function(patientData, tabid, patientid, columnData = 0) {
  // alert(patientid);
    //table("patients").setData(patientData.patients);
  //$('#patients').DataTable().destroy(); 
  
  const URL_tcm_patient_data_inprogress ='/questionnaire/tcm?tab=tabs-tcm_questionnaire-patient_contact-tab';
  if ($.fn.dataTable.isDataTable('#patients')) {
                 $('#patients').DataTable().clear().destroy();               
            }
  
    columnsData = [
          { "data": "fname", "title": "First Name" },
          { "data": "lname" , "title": "Last Name" },
          { "data": "email" , "title": "Email" },
          { "data": "phone_primary" , "title": "Phone No." },
          { "data": "addr1", "title": "Address"  },
          { "data": "city" , "title": "City" },
          { "data": "state" , "title": "State" },
          { "data": "patient_id" , "title": "Action", 
            "render": function(data, type, row, meta){              
               if(type === 'display'){
				   data = '<a href= "/questionnaire/tcm?tab='+tabid+'&id='+row.patient_id+'"><img src="../img/dashboard_icons/editPatients.png" width="20" height="20"/></a>';				   
              }
              return data;
             }
          }     
        ];

      
  var table = $('#patients').DataTable({
    "dom": 'Bfrtip',
    "buttons": [
    'copyHtml5', 'excelHtml5', 'csvHtml5',  'pdfHtml5'
    ],
    "data": patientData.patients,   
    columns:columnsData,
    "order": [[ 1, "desc" ]],
    "Language": {
      "EmptyTable": "No Patients Found for given filter"
    }
  });
};

var fetchPatients = function(durl, tabid, patientid='id', datastr = '') { 
  // alert(patientid);
  if(datastr==''){
  dataString = fetchFilters();  
  }else{
    dataString = datastr;
  }
  //alert(dataString);
  axios({
      method: "POST",
      url: durl,
      data: dataString,
      dataType: "json",
    }).then(function (response) {     
      displayPatientsData(response.data, tabid, patientid);
    }).catch(function (error) {
      console.error(error, error.response);
    });   
  /*
    $.get(url, function(data) {
        patientData = data;
    //console.log(patientData);
    displayPatientsData(patientData, tabid, patientid);
    }).fail(function(error) {
        console.error("Data fetch error:", error);
    });
  */
  
};

var ajaxResponse = function(url) {
    $.get(url, function(data) {
        patientData = data;
    //console.log(patientData);
    return patientData;
    }).fail(function(error) {
        console.error("Data fetch error:", error);
    });
};

$("#myInput").on("keyup", function() {
    //var value = $(this).val().toLowerCase();
    table("reports").setKeywordFilter($(this).val(), updateRecordCount);
  });
  
 var fetchFilters = function(){
   teamleadId = "teamleader_id";
   careManagerId = "caremanager_id";

  var identify = $("#identify").val();
  if(identify==9){
    teamleadId = "hiddenid";
  }else if(identify==3){
    careManagerId =  "hiddenid";
  }
   var teamLead = parseInt($("#"+teamleadId).val());
   var careManager = parseInt($("#"+careManagerId).val());
   // alert(careManager); 
   var practice = $("#practice_id").val();
   dataString = JSON.stringify({'teamLead': teamLead, 'careManager':careManager, 'practice':practice});
     return dataString;
    
  /*console.log(dataString);
    util.patientCount(teamLead,careManager);
    util.newlyAssignedCount(teamLead,careManager);
    util.inProgressCount(teamLead,careManager);
    util.countInitialContactDueToday(teamLead,careManager);
    util.countSecondContactDueToday(teamLead,careManager);
    util.countFacetoFaceVisitDueThisWeek(teamLead,careManager);
    util.non_bilable_count(teamLead,careManager);
    util.billableCount(teamLead,careManager);
    util.readmissionCount(teamLead,careManager);
    util.tcmCompleted(teamLead,careManager); 
  */
 }

/* Donut Chart */
/* Initial Contact Due Today Status */
var initialContactVariables = function(){
  dataString = fetchFilters();
    if (chart) chart.destroy();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/initialContactChart`,
        data: dataString,
        }).then(function (response) {        
      
       if(response.data.count[0] == 0 && response.data.count[1]==0){
         dataVal = {
          labels: ["No Patients"],
          datasets: [{
            labels:'No Patients',
            backgroundColor: ['#D3D3D3'],
            data: [100]
          }],
          }
          ops= {
                maintainAspectRatio: false,
                tooltips: {
                  enabled: false
                },
                legend: {
                  display: true,
                  position: 'right',
                },
                cutoutPercentage: 20,
                onClick: donut_initialContact_graphClickEvent
              }
         
      } else {
         dataVal = {
              labels: response.data.labels,
              datasets: [{                
                data: [response.data.count[0], response.data.count[1]],             
                backgroundColor: ['#6cccde', '#bb4b9c'],
                hoverBackgroundColor: ['#6cccde', '#bb4b9c'],             
              }],
              } 
              ops= {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: true,
                  position: 'right',
                },
                cutoutPercentage: 20,
                onClick: donut_initialContact_graphClickEvent
              }
      }
  
            var donutVariables = response.data.count;
            $(".initialContact").html("");
            $(".initialContact").html("<canvas id='dashboard-chart-initial-contact-status'></canvas>");
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-initial-contact-status").get(0).getContext("2d");
            var chart = new Chart(ctx, {
              type: 'doughnut',
              data: dataVal,
              options:ops,
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    
    }; 

/* Second Contact Due Today Status */
var secondContactVariables = function(){
  dataString = fetchFilters();
    if (chart) chart.destroy();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/secondContactChart`,
            data:dataString,
        }).then(function (response) {
      
       if(response.data.count[0] == '0'&& response.data.count[1]=='0'){
           dataVal = {
          labels: ["No Patients"],
          datasets: [{
            labels:'No Patients',
            backgroundColor: ['#D3D3D3'],
            data: [100]
          }]
          }
         ops= {
              maintainAspectRatio: false,
              tooltips: {
                enabled: false
              },
              legend: {
                display: true,
                position: 'right',
              },
              cutoutPercentage: 20,
              onClick: donut_initialContact_graphClickEvent
            }
         
      } else {
          dataVal = {
              labels: response.data.labels,
              datasets: [{
                //data : [50, 30],
                data: [response.data.count[0], response.data.count[1]],
                //data: response.data.count,
                backgroundColor: ['#f3ec1f', '#97c93b'],
                hoverBackgroundColor: ['#f3ec1f', '#97c93b'],
                //hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
              }

               ops= { 
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: true,
                  position: 'right',
                },
                cutoutPercentage: 20,
                onClick:donut_secondContact_graphClickEvent
              }
      }
      
            //$("#hdnInitial").val(response.data);
            var donutVariables = response.data.count;
             $(".secondContact").html("");
            $(".secondContact").html("<canvas id='dashboard-chart-second-contact-status'></canvas>");
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-second-contact-status").get(0).getContext("2d");
            var chart = new Chart(ctx, {
              type: 'doughnut',
              data: dataVal,
              options:ops,
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    //chartColors('doughnut');
    }; 

/* TCM Patients */
var tcmPatientVariables = function(){
  dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/tcmPatientStatusChart`,
            data:dataString,
        }).then(function (response) {     
       if(response.data.count[0] == '0' && response.data.count[1]=='0'){
          dataVal = {
          labels: ["No Patients"],
          datasets: [{
            labels:'No Patients',
            backgroundColor: ['#D3D3D3'],
            data: [100]
          }]
          }
          
      } else {
          dataVal = {
              labels: response.data.labels,
              datasets: [{
                // data : [20, 30, 50],
                data: [response.data.count[0], response.data.count[1]],
                data: response.data.count,
                backgroundColor: ['#4e73df', '#1cc88a','#F0B27A'],
                hoverBackgroundColor: ['#2e59d9', '#17a673','#BA4A00'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
              }],
              }
      }
      
            //$("#hdnInitial").val(response.data);
            var donutVariables = response.data.count;
            $(".tcmpatientsContact").html("");
            $(".tcmpatientsContact").html("<canvas id='dashboard-chart-tcm-patients-status'></canvas>");
            //alert(response.data.count[0]);
            var ctx = $("#dashboard-chart-tcm-patients-status").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: 'doughnut',
              data: dataVal,
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                   display: true,
                  position: 'right',
                },
                cutoutPercentage: 20,
                onClick:donut_tcmPatient_graphClickEvent
              },
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    };
/* Donut Chart */

/* Bar Graph */
var taskDueTodayVariables = function(){
    dataString = fetchFilters();
    if (chart) chart.destroy();
    axios({
        method: "POST",
        url: `/ajax/tcmdashboard/tcmTaskDueTodayChart`,
        data:dataString,
    }).then(function (response) {
        if(response.data.count[0] == '0'&& response.data.count[1]=='0'&& response.data.count[2]=='0'){
            dataVal = {
                labels: ["No Patients"],
                datasets: [{
                    labels:'No Patients',
                    backgroundColor: ['#D3D3D3'],
                }]
            }
            ops= {
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            autoSkip: false,
                            fontSize: 13,
                            fontFamily: "PT Serif', serif;",
                        },
                        gridLines: {
                            display:false,            
                        },
                        labelAngle: 50,
                    }],
                    yAxes: [{ 
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                        },
                        gridLines: {
                            display:false
                        }
                    }] 
                } ,
                legend: {
                    display: false
                },
            }
        } else {
            dataVal = {
                labels: response.data.labels,
                datasets: [{
                    data : [response.data.count[0],response.data.count[1],response.data.count[2]],
                    backgroundColor: ['#6cccde', '#f3ec1f','#BA4A00'],
                    borderWidth: 1
                }],
            }
            ops= {
                scales: {
                    xAxes: [{
                        stacked: true,
                        ticks: {
                            autoSkip: false,
                            maxRotation: 60,
                            minRotation: 30,
                            fontFamily: "PT Serif', serif;",
                            fontSize: 12
                        },
                        gridLines: {
                            display:false,            
                        },
                        labelAngle: 50,
                    }],
                    yAxes: [{ 
                        stacked: true,
                        ticks: { 
                            min: 0, // it is for ignoring negative step.
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                if (Math.floor(value) === value) {
                                    return value;
                                }
                            }
                        },
                        gridLines: {
                            display:false
                        }
                    }] 
                } ,
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: {
                        display: false
                    }
                },
                onClick:graphClickEvent
            }
        }
        //$("#hdnInitial").val(response.data);
        var data = response.data.count;
        $(".taskduetoday").html("");
        $(".taskduetoday").html("<canvas id='dashboard-chart-tasks-due-today'></canvas>");
        //alert(response.data.count[0]);
        var ctx = $("#dashboard-chart-tasks-due-today").get(0).getContext("2d");
        var chart = new Chart(ctx, {
            type: 'bar',
            data: dataVal,
            options:ops,
        });
    }).catch(function (error) {
        console.error(error, error.response);
    });
};


var newlyAssignedDueThisWeekVariables = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/tcmnewlyAssignedDueThisWeekChart`,
            data:dataString,
        }).then(function (response) {
            var ctx = $("#dashboard-chart-newly_assigned_this_week").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: "bar",
              data: {
                   labels: response.data.labels,
                   datasets: [
                       {
                           //data: response.data.count,
                           data : [response.data.count[0],response.data.count[1],response.data.count[2],response.data.count[3],response.data.count[4],response.data.count[5],response.data.count[6]],
                           //data : [20, 10, 30, 15, 10, 2, 1],
                            backgroundColor: ['#6cccde','#bb4b9c','#f6831b'],
                           //borderColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
                           borderWidth: 1
                       }
                   ],
               },
              options: {
                scales: { 
                   yAxes: [{ 
                       ticks: { 
                           beginAtZero:true 
                       } 
                   }] 
               },
         legend: {
                  display: false,
                },
              // onClick: graphClickEvent
              },
        
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    //chartColors('bar');
    }; 

 var faceToFaceDueThisWeekVariables = function(param, divid){
    dataString = fetchFilters();
    var jobj = JSON.parse(dataString);
    jobj['complexity'] = param;
    dataString = JSON.stringify(jobj);
    // debugger;
      axios({
         method: "POST",
         url: `/ajax/tcmdashboard/tcmfaceToFaceDueThisWeekChart`,
         data:dataString,
      }).then(function (response){
          // console.log(response);
          var labels = response.data.map(function(e) {        
            return e.labels;
          });

         var mdata = response.data.map(function(e) {
           if(param=='Moderate'){
             $(".facetofaceduethisweekmoderate").html("");
                   $(".facetofaceduethisweekmoderate").html("<canvas id='dashboard-chart-face-to-face-due-this-week-moderate'></canvas>");
             return e.moderateCompx;
             $(".facetofaceduethisweekhigh").html("");
                   $(".facetofaceduethisweekhigh").html("<canvas id='dashboard-chart-face-to-face-due-this-week-high'></canvas>");
             return e.highCompx;
           }
         });
         /*
         var hdata = response.data.map(function(e) {
            
            return e.highCompx;
         });
         */            
    var ctx = $("#"+divid).get(0).getContext("2d");
      chartData:chart;
        var chartData = new Chart(ctx,{
            type: "bar",
              data:{
                   labels: labels,
                   datasets: [
                       {
                         label:param+" Complexity",
                         data:mdata,                        
                         backgroundColor: '#6cccde'
                       }
                   ],
              },
            options: {
              scales: {
                xAxes: [{
                  gridLines: {
                    display:false
                  }
                }],
                yAxes: [{ 
                  ticks: { 
                    min: 0, // it is for ignoring negative step.
                    beginAtZero: true,
                    callback: function(value, index, values) {
                      if (Math.floor(value) === value) {
                      return value;
                      }
                    }
                  } ,
                  gridLines: {
                    display:false
                 }
                }] 
              } ,
              legend: {
                display: true,
                position: 'top',
              },
              onClick:function bar_face_to_face_due_this_week_graphClickEvent(param, event, activePoints){
              dataString = fetchFilters();
              var jobj = JSON.parse(dataString);
              alert(dataString);
              var activePoints = chartData.getElementAtEvent(event);
              alert(activePoints);
              if(activePoints){
                    var chartData = activePoints[0]['_chart'].config.data;
                    var idx = activePoints[0]['_index'];
                    var label = chartData.labels[idx];
                    var value = chartData.datasets[0].data[idx];
                    alert(label);
                    alert(value);
                 if (label) {
                    jobj['label'] = label;
                    jobj['complexity'] = param;
                  dataString = JSON.stringify(jobj); 
                    alert(dataString);
                    url =URL_GraphFacetoFace_due_this_week_idevidual_DATA_FETCH;
                    fetchPatients(url,'tabs-tcm_questionnaire-face_to_face-tab', 'id', dataString);
                    $('#patientListing').modal('show');
                    $('#modal-employee-add-title').html("Face to Face DATA"); 
                 }    

              }

            }
            }
          });
          }).catch(function (error) {
           console.error(error, error.response);
       });

    }; 




  /* Bar Graph */

  /* Line Chart */
var lineChartVariables = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/tcmLineChart`,
            data:dataString,
        }).then(function (response) {
            var ctx = $("#dashboard-chart-line").get(0).getContext("2d");
            var donut = new Chart(ctx, {
              type: "line",
            data: {
               labels: response.data.labels,
               datasets: [
                   {
                       //data: response.data.count,
                       data : [20, 10, 30, 15, 10, 2, 1],
                       backgroundColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
                       borderColor: ['rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)','rgba(255, 206, 86, 0.2)'],
                       borderWidth: 1
                   }
               ],
           },
            options: {
              scales: { 
             yAxes: [{ 
                 ticks: { 
                     beginAtZero:true 
                 } 
             }] 
         } ,
        // onClick: graphClickEvent
            }
            }); 

        }).catch(function (error) {
            console.error(error, error.response);
        });
    }; 


  /* Line Chart */

/* TCM Charts */

   
    function graphClickEvent(event, array){
       if(array[0]){
            array_index= array[0]._index;
            array_label_name= array[0]._xScale.ticks[array[0]._index];
           
            if (!array_index) {
                    url =URL_Intial_Contact_Today_DATA_FETCH ;
                    fetchPatients(url, 'tabs-tcm_questionnaire-patient_contact-tab');
                    $('#patientListing').modal('show');
                    $('#modal-employee-add-title').html("Intial Contact Due Today List"); 
                // window.location.href = "http://www.w3schools.com";
            }else if (array_index==1) {
                //alert('HII');
                    url =URL_secondContact_Today_DATA_FETCH ;
                    fetchPatients(url, 'tabs-tcm_questionnaire-patient_contact-tab');
                    $('#patientListing').modal('show');
                    $('#modal-employee-add-title').html("Second Contact Due Today List");   
            }else if (array_index==2) {
                //alert('HIII');
                    url =URL_Face_to_face_dueDate_DATA_FETCH ;
                    fetchPatients(url, 'tabs-tcm_questionnaire-face_to_face-tab');
                    $('#patientListing').modal('show'); 
                    $('#modal-employee-add-title').html("Face To Face Due Date List");  
             }
             // else{
            //     alert('Empty Bar!!!')
            // }
        }
    }

    // face to face graph


/* TCM Dashboard Donut Graphs */
    //donut_Initial Contact Graph 
    function donut_initialContact_graphClickEvent(event, activePoints){  
        if (activePoints[0]) {
            var chartData = activePoints[0]['_chart'].config.data;
            var idx = activePoints[0]['_index'];
            var label = chartData.labels[idx];
            var value = chartData.datasets[0].data[idx];
            if (label=='Pending') {
                url =URL_GraphInitialContact_Pending_DATA_FETCH ;
                fetchPatients(url, 'tabs-tcm_questionnaire-patient_contact-tab');
                $('#patientListing').modal('show');
                $('#modal-employee-add-title').html("InitialContact Pending DATA");  
            } else if (label=='Completed'){
                url =URL_GraphInitialContact_Completed_DATA_FETCH;
                fetchPatients(url, 'tabs-tcm_questionnaire-patient_contact-tab');
                $('#patientListing').modal('show');
                $('#modal-employee-add-title').html("InitialContact Completed DATA"); 
            } else {
                alert('Empty Bar!!!');
            }
        }
    }

    //donut_Second Contact Graph
    function donut_secondContact_graphClickEvent(event, activePoints) {
        if (activePoints[0]) {
            var chartData = activePoints[0]['_chart'].config.data;
            var idx = activePoints[0]['_index'];
            var label = chartData.labels[idx];
            var value = chartData.datasets[0].data[idx];
            if (label=='Pending') {
                url =URL_GraphSecondContact_Pending_DATA_FETCH;
                fetchPatients(url, 'tabs-tcm_questionnaire-patient_contact-tab');
                $('#patientListing').modal('show'); 
                $('#modal-employee-add-title').html("SecondContact Pending DATA");  
            } else if(label=='Completed') {
                url =URL_GraphSecondContact_Completed_DATA_FETCH ;
                fetchPatients(url,'tabs-tcm_questionnaire-patient_contact-tab');
                $('#patientListing').modal('show');
                $('#modal-employee-add-title').html("SecondContact Completed DATA"); 
            } else {
                alert('Empty Bar!!!');
            }
        }
    }

    // donut TCM Patient
    function donut_tcmPatient_graphClickEvent(event, activePoints){  
        if (activePoints[0]) {
            var chartData = activePoints[0]['_chart'].config.data;
            var idx = activePoints[0]['_index'];
            var label = chartData.labels[idx];
            var value = chartData.datasets[0].data[idx];
            if (label=='Completed') {
                url =URL_GraphTcmPatients_Completed_DATA_FETCH;
                fetchPatients(url, 'tabs-tcm_questionnaire-billing-tab');
                $('#patientListing').modal('show');
                $('#modal-employee-add-title').html("TCM Patients Completed DATA");  
            } else if(label=='In Progress') {
                url =URL_GraphTcmPatients_InProgress_DATA_FETCH;
                fetchPatients(url, 'tabs-tcm_questionnaire-demographics-tab');
                $('#patientListing').modal('show');
                $('#modal-employee-add-title').html("TCM Patients In Progress DATA"); 
            } else{ 
                alert('Empty Bar!!!');
            }
        }
    }
/* TCM Dashboard Donut Graphs Ends Here */
 
//bar graph face to face due this week
    // function bar_face_to_face_due_this_week_graphClickEvent(param, event, activePoints){
    //   alert('hey');
    //   dataString = fetchFilters();
    //   var jobj = JSON.parse(dataString);
    //   alert(dataString);
    //   //alert(param);
    //   var activePoint = ctx.getElementAtEvent(event)[0];
    //   alert(activePoint);
    //   if(activePoints){
    //     //debugger;
    //     alert('activePoints');
    //         var chartData = activePoints[0]['_chart'].config.data;
    //         var idx = activePoints[0]['_index'];
    //         var label = chartData.labels[idx];
    //         var value = chartData.datasets[0].data[idx];
    //         alert(label);
    //         alert(value);
    //      if (label) {
    //         jobj['label'] = label;
    //         jobj['complexity'] = param;
    //       dataString = JSON.stringify(jobj); 
    //         alert(dataString);
    //         url =URL_GraphFacetoFace_due_this_week_idevidual_DATA_FETCH;
    //         fetchPatients(url,'tabs-tcm_questionnaire-face_to_face-tab', 'id', dataString);
    //         $('#patientListing').modal('show');
    //         $('#modal-employee-add-title').html("Face to Face DATA"); 
    //      }    

    //   }

    // }

    //  function bar_face_to_face_due_this_week_graphClickEvent(event, activePoints){
    //   alert('hii');
    //     // dataString = fetchFilters();
    //     // var jobj = JSON.parse(dataString);
    //     if(activePoints){
    //         var chartData = activePoints[0]['_chart'].config.data;
    //         var idx = activePoints[0]['_index'];
    //         var label = chartData.labels[idx];
    //         var value = chartData.datasets[0].data[idx];

    //       if (label) {
    //         jobj['label'] = label;
    //         jobj['complexity'] = param;
    //       dataString = JSON.stringify(jobj); 
    //       //alert(dataString);
    //           url =URL_GraphFacetoFace_due_this_week_idevidual_DATA_FETCH;
    //           fetchPatients(url,'tabs-tcm_questionnaire-face_to_face-tab', 'id', dataString);
    //           $('#patientListing').modal('show');
    //           $('#modal-employee-add-title').html("Face to Face DATA"); 
    //       }    
    //     }
    // }


    /* function bar_face_to_face_due_this_week_graphClickEvent(event, activePoints){
  dataString = fetchFilters();
    /* var jobj = JSON.parse(dataString);
    jobj['complexity'] = param;
    dataString = JSON.stringify(jobj); */
      /*if(activePoints){
            var chartData = activePoints[0]['_chart'].config.data;
            var idx = activePoints[0]['_index'];

            var label = chartData.labels[idx];
            var jobj = JSON.parse(dataString);
          /* jobj['label'] = label;
          dataString = JSON.stringify(jobj); */
            /*var value = chartData.datasets[0].data[idx];

         if (label) {
          url = URL_GraphFacetoFace_due_this_week_idevidual_DATA_FETCH ;
                    fetchPatients(url,'tabs-tcm_questionnaire-face_to_face-tab', 'patient_id', dataString);
                        $('#patientListing').modal('show');
                            $('#modal-employee-add-title').html("Face to Face DATA"); 
         }    

      }

    }*/


function chartColors(chartType) {
  var currentPalette = "cool";
  //  if (!palette) palette = currentPalette;
    //currentPalette = palette;
    
    /*Gradients
      The keys are percentage and the values are the color in a rgba format.
      You can have as many "color stops" (%) as you like.
      0% and 100% is not optional.*/
    var gradient;
    switch (currentPalette) {
        case 'cool':
            gradient = {
                0: [255, 255, 255, 1],
                20: [220, 237, 200, 1],
                45: [66, 179, 213, 1],
                65: [26, 39, 62, 1],
                100: [0, 0, 0, 1]
            };
            break;
        case 'warm':
            gradient = {
                0: [255, 255, 255, 1],
                20: [254, 235, 101, 1],
                45: [228, 82, 27, 1],
                65: [77, 52, 47, 1],
                100: [0, 0, 0, 1]
            };
            break;
        case 'neon':
            gradient = {
                0: [255, 255, 255, 1],
                20: [255, 236, 179, 1],
                45: [232, 82, 133, 1],
                65: [106, 27, 154, 1],
                100: [0, 0, 0, 1]
            };
            break;
    }

    //Get a sorted array of the gradient keys
    var gradientKeys = Object.keys(gradient);
    gradientKeys.sort(function(a, b) {
        return +a - +b;
    });
    
    //Find datasets and length
   // var chartType = chart.config.type;
    switch (chartType) {
        case "pie":
        case "doughnut":
            var datasets = chart.config.data.datasets[0];
            var setsCount = datasets.data.length;
            break;
        case "bar":
        case "line":
            var datasets = chart.config.data.datasets;
            var setsCount = datasets.length;
            break;
    }
    
    //Calculate colors
    var chartColors = [];
    for (i = 0; i < setsCount; i++) {
        var gradientIndex = (i + 1) * (100 / (setsCount + 1)); //Find where to get a color from the gradient
        for (j = 0; j < gradientKeys.length; j++) {
            var gradientKey = gradientKeys[j];
            if (gradientIndex === +gradientKey) { //Exact match with a gradient key - just get that color
                chartColors[i] = 'rgba(' + gradient[gradientKey].toString() + ')';
                break;
            } else if (gradientIndex < +gradientKey) { //It's somewhere between this gradient key and the previous
                var prevKey = gradientKeys[j - 1];
                var gradientPartIndex = (gradientIndex - prevKey) / (gradientKey - prevKey); //Calculate where
                var color = [];
                for (k = 0; k < 4; k++) { //Loop through Red, Green, Blue and Alpha and calculate the correct color and opacity
                    color[k] = gradient[prevKey][k] - ((gradient[prevKey][k] - gradient[gradientKey][k]) * gradientPartIndex);
                    if (k < 3) color[k] = Math.round(color[k]);
                }
                chartColors[i] = 'rgba(' + color.toString() + ')';
                break;
            }
        }
    }
    
    //Copy colors to the chart
    for (i = 0; i < setsCount; i++) {
        switch (chartType) {
            case "pie":
            case "doughnut":
                if (!datasets.backgroundColor) datasets.backgroundColor = [];
                datasets.backgroundColor[i] = chartColors[i];
                if (!datasets.borderColor) datasets.borderColor = [];
                datasets.borderColor[i] = "rgba(255,255,255,1)";
                break;
            case "bar":
                datasets[i].backgroundColor = chartColors[i];
                datasets[i].borderColor = "rgba(255,255,255,0)";
                break;
            case "line":
                datasets[i].borderColor = chartColors[i];
                datasets[i].backgroundColor = "rgba(255,255,255,0)";
                break;
        }
    }
    
    //Update the chart to show the new colors
    chart.update();
}


/* Count Functions */
    var patientCount = function(){
        dataString = fetchFilters();
        // alert(dataString);
        axios({
            method: "POST",
            url: `/ajax/dashboard/patientCount`,
            data: dataString,
            dataType: "json",
        }).then(function (response) {
            $('#patient-count').html(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    }

  var newlyAssignedCount = function(){
    dataString = fetchFilters();
    axios({
      method: "POST",
      url: `/ajax/dashboard/newlyAssignedCount`,
      data: dataString,
      dataType: "json",
    }).then(function (response) {
      $('#newly-assigned').html(response.data);
    }).catch(function (error) {
      console.error(error, error.response);
    });
   }

  var  inProgressCount = function(){
    dataString = fetchFilters();
    axios({
      method: "POST",
      url: `/ajax/dashboard/inProgressCount`,
      data: dataString,
      dataType: "json",
    }).then(function (response) {
      $('#status-count').html(response.data);
    }).catch(function (error) {
      console.error(error, error.response);
    });
    }

  var countInitialContactDueToday = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/patientInitialContactDueToday`,
      data: dataString,
      dataType: "json",
        }).then(function (response) {
            $("#initial-contact-due-today").html(response.data);
            //alert(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    };
    
    var countSecondContactDueToday = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/patientSecondContactDueToday`,
      data: dataString,
      dataType: "json",
        }).then(function (response) {
            $("#second-contact-due-today").html(response.data);
            //alert(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    };
    
    var countFacetoFaceVisitDueThisWeek = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/patientFacetoFaceVisitDueThisWeek`,
      data: dataString,
      dataType: "json",
        }).then(function (response) {
            $("#face-to-face-visit-due-this-week").html(response.data);
            //alert(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    };

    var non_bilable_count = function(){
    dataString = fetchFilters();
    axios({
    method: "POST",
    url: `/ajax/dashboard/non_bilable_count`,
    data: dataString,
    dataType: "json",
    }).then(function (response) {
    $('#non-billable').html(response.data);
    }).catch(function (error) {
    console.error(error, error.response);
    });
    }
  
  var billableCount = function(){
    dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/billableCount`,
      data: dataString,
      dataType: "json",
        }).then(function (response) {
            $("#billable").html(response.data);
            //alert(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    };    

    var readmissionCount = function(){
        dataString = fetchFilters();
        axios({
            method: "POST",
            url: `/ajax/tcmdashboard/readmissionCount`,
            data: dataString,
            dataType: "json",
        }).then(function (response) {
            $("#readmission").html(response.data);
        }).catch(function (error) {
            console.error(error, error.response);
        });
    };
  
    var tcmCompleted = function(){   
    dataString = fetchFilters();  
    axios({
      method: "POST",
      url: `/ajax/tcmdashboard/tcmCompletedCount`,
      data: dataString,
      dataType: "json",
    }).then(function (response) {
      $("#tcm-completed").html(response.data);
    }).catch(function (error) {
      console.error(error, error.response);
    });
  }; 

var  renderAllDashboardElements = function (){
  patientCount();
  newlyAssignedCount();
  inProgressCount();
  countInitialContactDueToday();
  countSecondContactDueToday();
  countFacetoFaceVisitDueThisWeek();
  non_bilable_count();
  billableCount();
  readmissionCount();
  tcmCompleted();
  
  taskDueTodayVariables();
  initialContactVariables();
  secondContactVariables();
  tcmPatientVariables();
  faceToFaceDueThisWeekVariables('Moderate','dashboard-chart-face-to-face-due-this-week-moderate');
  faceToFaceDueThisWeekVariables('High','dashboard-chart-face-to-face-due-this-week-high');
};

var init = function(data) {
  
  // var teamLead = $("#teamleader_id").val();
  // alert(teamLead);
    $(".patientListClass").on('click', function(){      
        var filter = $(this).attr('id');
        url = "";
        patientid = 'patient_id';
        tab = "tabs-tcm_questionnaire-demographics-tab";
        if(filter == 'patientlist'){
             url = URL_PATIENT_DATA_FETCH;
            tab = "tabs-tcm_questionnaire-demographics-tab";            
            $("#modal-employee-add-title").html("All Patient List");
        } else if(filter == 'newlyAssigned'){
            url = URL_NEWLY_ASSIGNED_PATIENTS ;
            tab = "tabs-tcm_questionnaire-demographics-tab";
             //patientid = 'id';
            //patientid = 'patient_id'; 
            $("#modal-employee-add-title").html("Newly Assigned Patient List");
        } else if(filter == 'billablePatients'){
            url = URL_BILLABLE ;
            tab = "tabs-tcm_questionnaire-billing-tab";
            $("#modal-employee-add-title").html("Patients Billable This Month");
        } else if(filter == 'nonBillable'){
            url = URL_NON_BILLABLE ;
            tab = "tabs-tcm_questionnaire-outcomes-tab";
            $("#modal-employee-add-title").html("Non Billable Patients This Month");
        } else if(filter == 'initialContact'){
            url = URL_INITIAL_CONTACT_DUE_TODAY ;
            tab = "tabs-tcm_questionnaire-patient_contact-tab";
            $("#modal-employee-add-title").html("Initial Contact Due Today");
        } else if(filter == 'secondContact'){
            url = URL_SECOND_CONTACT_DUE_TODAY ;
            tab = "tabs-tcm_questionnaire-patient_contact-tab";
            $("#modal-employee-add-title").html("Second Contact Due Today");
        } else if(filter == 'inProgress'){
            url = URL_IN_PROGRESS ;
            tab = "tabs-tcm_questionnaire-demographics-tab";        
            $("#modal-employee-add-title").html("TCM In Progress");
        } else if(filter == 'tcmCompleted'){
            url = URL_TCM_COMPLETED_FETCH ;
            tab = "tabs-tcm_questionnaire-billing-tab";
            $("#modal-employee-add-title").html("TCM Completed");
        } else if(filter == 'face2face'){
            url = URL_FACE_TO_FACE_DUE_THIS_WEEK;
            tab = "tabs-tcm_questionnaire-face_to_face-tab";
            $("#modal-employee-add-title").html("Face To Face Due This Week");
        } else if(filter == 'readmittedPatients'){
            url = URL_READMISSION;
            tab = "tabs-tcm_questionnaire-outcomes-tab";
            $("#modal-employee-add-title").html("Patient ReAdmissions");
        }
        if(url!="") {
            fetchPatients(url, tab, patientid);
            $('#patientListing').modal('show');  
        }
    });
  renderAllDashboardElements();
  util.teamLeader();
  util.careManager();
  util.checkAdmin();
  util.check();
  
  // util.newlyAssignedDueThisWeekVariables();
  
  $("[name='teamleader']").on("change",function() {
    util.teamLeader(parseInt($(this).children("option:selected").val()),$("#caremanager_id"));
    renderAllDashboardElements();
  });
  $("#caremanager_id").on("change",function() {
    util.careManager(parseInt($(this).children("option:selected").val()));
    renderAllDashboardElements();
  });

  $("[name='practice_id']").on("change",function() {
        util.careManager(parseInt($(this).children("option:selected").val()));
    renderAllDashboardElements();
  });
  // chartMonthly = createMonthlyChart(formatData(data.monthly_labels, data.monthly));
  // chartDaily = createDailyChart(formatData(data.daily_labels, data.daily));
  // chartToday = creatyTodayChart(data.today_label, data.today_value);
  //chartToday = creatyTodayChart(formatData(data.name, data.value));
};

window.dashboard = {
  init: init
};
