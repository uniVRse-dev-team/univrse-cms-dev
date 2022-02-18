@extends('layouts.admin')
@section('content')


<style>
    * {
        color:black;
    }

    .parent {
        display: flex;
    }

    .child_1 {
        width:66%;
    }

    .child_2 {
        width:34%;
    }

    .container {
        margin: 20px; 
        padding: 10px 20px;
        border-radius: 1%;
        background-color: white;
    }

    .container h4 {
        color: #9E9E9E;
    }

    .container2 {
        margin: 20px; 
        padding: 10px 20px;
        border-radius: 10px;
    }

    .container2 h4 {
        font-size: 20px;
    }

    .board {
        background: linear-gradient(0deg, rgba(178,31,138,1) 0%, rgba(126,62,148,1) 100%);;
        color: white;
        border-radius: 5%;
        margin: 20px;
        padding: 20px 0 100px 0;
    }

    .board h2 {
        font-size: 48px;
        font-weight: 300;
        letter-spacing: 3px;
    }

    .board p {
        color: white;
    }

.topnav {
    overflow: hidden;
}

.topnav h3 {
    float: left;
}

.topnav-right {
  float: right;
}

    /* SELECT WEEKS*/

.btn-group button {
  background-color: #FFF;
  border: 1px solid black;
  border-radius: 5%;
  font-size: 16px;
  padding: 4px 12px;
  cursor: pointer;
}

.btn-group button:hover {
  background-color: #7C4892;
  color: white;
}

/* SELECT YEAR */

.dropbtn {
  font-size: 16px;
  padding: 4px;
  border: 2px solid black;
  color: black;
  background-color: #FFF;
}

.dropdown {
    width:180px;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #f1f1f1;
  min-width: 180px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: lightgrey;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41; color:white;}

</style>

<!-- Overview -->
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="border-0 card" >
                <div class="border-0 card-header" style="background-color: #EBEDEF">
                    <div class="topnav">

                    <h3> Overview </h3>
                    <div class="topnav-right btn-group">
                         <button>Days</button>
                         <button>Weeks</button>
                         <button>Months</button>               

  </div>
  <div class="dropdown">
                         <button class="dropbtn"><i class="fas fa-fw fa-calendar"></i>Jan, 2019 - Dec, 2019</button>
                          <div class="dropdown-content">
                              <a href="#">Jan, 2020 - Dec, 2020</a>
                              <a href="#">Jan, 2021 - Dec, 2021</a>
                              <a href="#">Jan, 2022 - Dec, 2022</a>
                         </div>
                        </div>

                   </div>
                </div>

                <div class="card-body" style="background-color: #EBEDEF">
                    <div style="display:flex;">
                <div class="container">
                        <h4>Avg. Customer</h4>
                        <h3>N/A</h3>
                        <canvas id="ovChart1" width="200" height="100"></canvas>
                        <p><span style="color:red;">1.3% <i style="color:red;"class="fas fa-arrow-down"></i></span> than last year</p>
                    </div>
                
                    <div class="container">
                        <h4>Booth Order Quantity</h4>
                        <h3>N/A</h3>
                        <canvas id="ovChart2" width="200" height="100"></canvas>
                        <p><span style="color:red;">1.2% <i style="color:red;"class="fas fa-arrow-down"></i></span> than last year</p>
                    </div>

                    
                    <div class="container">
                        <h4>Unique Purchases</h4>
                        <h3>N/A</h3>
                        <canvas id="ovChart3" width="200" height="100"></canvas>
                        <p><span style="color:#3ADD93;">2.1% <i style="color:#3ADD93;"class="fas fa-arrow-up"></i></span> than last year</p>
                    </div>
                </div>

                 
                </div>
            </div>
        </div>
    </div>
</div>

<section class="parent">

<!-- Left side -->
<section class="child_1">
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <h3>Customer Growth</h3>
                <div class="card-img-bottom">
                     <canvas id="myChart1" width="400" height="225"></canvas>
                </div>
                <br>

                <div class="card-title">
                    <h3>Sales Report</h3>
                </div>
                <div class="card-img-bottom">
                    <canvas id="salesChart" width="400" height="181"></canvas>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Right side -->
<section class="child_2">
<div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <center>

                    <div class="board">
                        <h3><b style="color:white;">Visitors this year</b></h3>

                        <h2>212,521</h2>

                        <canvas id="visitorChart" width="60" height="30"></canvas>
                        <p><span style="color:#3ADD93;">1.8% <i style="color:#3ADD93;"class="fas fa-arrow-up"></i></span> than last year</p>
                    </div>
                    <br>

                    <div class="container2">
                        <h4>Sales Breakdown By Events</h4>

                        <canvas id="salesbreakdown" width="100" height="100"></canvas>
                        <!--
                        <hr>
                        <a href="#">More Insights ></a>
                    -->
                    </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script>

// Overview Chart 1
var ovChart1 = new Chart("ovChart1", {
        type: "line",
        data: {
            labels: ['A','B','C','D','E'],
            datasets: [{
                data:[500,750,250,300,150],
                backgroundColor: ['#72C09C'],
                borderColor: ['#77FBA7'],
                borderWidth: 1,
            }]
        },
        options: {
            legend: {
                display: false,
            }
        }
    });

// Overview Chart 2
var ovChart2 = new Chart("ovChart2", {
        type: "line",
        data: {
            labels: ['A','B','C','D','E'],
            datasets: [{
                data:[500,750,250,300,150],
                backgroundColor: ['#FFCE49'],
                borderColor: ['#CAA519'],
                borderWidth: 1,
            }]
        },
        options: {
            legend: {
                display: false,
            }
        }
    });

// Overview Chart 3
var ovChart3 = new Chart("ovChart3", {
        type: "line",
        data: {
            labels: ['A','B','C','D','E'],
            datasets: [{
                data:[500,750,250,300,150],
                backgroundColor: ['#5AADFF'],
                borderColor: ['#2452B2'],
                borderWidth: 1,
            }]
        },
        options: {
            legend: {
                display: false,
            }
        }
    });

    var myChart1 = new Chart("myChart1", {
             type: "bar",
             data: {
                 labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                 datasets:[{
                     label:'Women',
                     data:[17,24,71,60,28,37,65],
                     backgroundColor:'#7F3F96',
                     maxBarThickness: 16,
                     minBarThickness: 16,
                 },{
                     label:'Men',
                     data:[9,2,12,16,23,29,18],
                     backgroundColor:'#C9A4CF',
                     maxBarThickness: 16,
                     minBarThickness: 16,
                 },{
                     label:'New Customer',
                     data:[12,7,23,52,12,25,31],
                     backgroundColor:'#E2E2E2',
                     maxBarThickness: 16,
                     minBarThickness: 16,
                 }],
             },
             options: {
                 legend: {
                     display: true,
                     align: 'start',
                     labels: {
                         usePointStyle: true
                     }
                 },
                 scales: {
                     
                     yAxes: [{
                         ticks: {
                             beginAtZero: true
                         },
                         stacked: true
                     }],
                     xAxes: [{
                         stacked: true
                     }]
                 }
             }
    });
    

    var salesChart = new Chart("salesChart", {
             type: "bar",
             data: {
                 labels:['Jan 20','Feb 20','Mar 20','Apr 20','May 20','June 20','July 20','Jul 20','Aug 20','Sep 20','Oct 20','Nov 20','Dec 20'],
                 datasets:[{
                     label:'Expense',
                     data:[17,24,71,60,28,37,65],
                     backgroundColor:'#29CC97',
                     maxBarThickness: 16,
                     minBarThickness: 16,
                 }, {
                     label:'Income',
                     data:[12,62,71,21,64,36,81],
                     backgroundColor:'#7F3F96',
                     maxBarThickness: 16,
                     minBarThickness: 16,
                 }],
             },
             options: {
                legend: {
                     display: true,
                     align: 'start',
                     labels: {
                         usePointStyle: true
                     }
                 }
             }
    });

    var visitorChart = new Chart("visitorChart", {
        type: "line",
        data: {
            labels: ['A','B','C','D','E'],
            datasets: [{
                data: [2,3,6,8,1],
                backgroundColor: "#58D672",
                borderColor: "#58D672"
            }]
        },
        options: {
            legend: {
                display: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.yLabel;
                    }
                }
            }
        }
    });

    var salesbreakdown = new Chart("salesbreakdown", {
        type: "doughnut",
        data: {
            labels: ['Art Exhibition','Tempatan Fest','Coffee Fest','Gamification Fest'],
            datasets: [{
                data:[500,750,250,300],
                backgroundColor: ['#7F3F96','#9EA3C0','#D3D5E1','#CAA5D0'],
                borderColor: ['#7F3F96','#9EA3C0','#D3D5E1','#CAA5D0'],
                borderWidth: 1,
                cutout: '90%'
            }]
        },
        options: {
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                }
            }
        }
    });



</script>





@endsection
@section('scripts')
@parent

@endsection

