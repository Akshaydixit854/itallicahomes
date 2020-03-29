<div class="container-fluid">
    <div class="block-header">
        <h2>DASHBOARD</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="dashboard-card bg-gradient-primary border-0">
                <div class="board-img"><img src="{{asset('/bsbmd/images/italy.png')}}"></div>
                <div class="dashboard-card-inner">
                     <div class="board-item row m-0">
        	          <div class="board-tit">Total Properties</div>
        	          <div class="board-txt">111</div>
        	     </div>
                     <div class="board-item row m-0">
        	          <div class="board-tit">Total Views</div>
        	          <div class="board-txt">1111</div>
        	     </div>
                     <div class="board-item row m-0">
        	          <div class="board-tit">New Properties</div>
        	          <div class="board-txt">1111</div>
        	     </div>
                </div>
                <p class="m-0">
                    <a href="#" class="board-link">See details</a>
                </p>
            </div>
        </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-info border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/blog-board.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	      <div class="board-tit">Total Blog</div>
        	       <div class="board-txt">111</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total Views</div>
        	       <div class="board-txt">1111</div>
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">New Posts</div>
        	       <div class="board-txt">1111</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="#" class="board-link">See details</a>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-danger border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/inbox.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	       <div class="board-tit">Total Inbox</div>
        	       <div class="board-txt">111</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Enquries</div>
        	       <div class="board-txt">1111</div>
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Unread</div>
        	       <div class="board-txt">1111</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="#" class="board-link">See details</a>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card bg-gradient-default border-0">
             <div class="board-img"><img src="{{asset('/bsbmd/images/employee.svg')}}"></div>
             <div class="dashboard-card-inner">
        	  <div class="board-item row m-0">
        	       <div class="board-tit">Total Users</div>
        	       <div class="board-txt">111</div>
        	  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">Total Agents</div>
        	       <div class="board-txt">1111</div>
                  </div>
                  <div class="board-item row m-0">
        	       <div class="board-tit">New Posts</div>
        	       <div class="board-txt">1111</div>
        	  </div>
            </div>
            <p class="m-0">
                <a href="#" class="board-link">See details</a>
            </p>
        </div>
    </div>
</div>
    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Recent Properties</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Property Name</th>
                                    <th>Availability</th>
                                    <th>Agency</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Task A</td>
                                    <td><span class="label bg-green">Yes</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Task B</td>
                                    <td><span class="label bg-red">No</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Task C</td>
                                    <td><span class="label bg-green">Yes</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Task D</td>
                                    <td><span class="label bg-green">Yes</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Task E</td>
                                    <td>
                                        <span class="label bg-red">No</span>
                                    </td>
                                    <td>John Doe</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
    </div>
    <div class="row">
       <!-- Browser Usage -->
       <div class="col-md-9">
            <div class="card chartbox">
                <h3 class="chart-tit">Chart</h3>
                <div id="chartdiv"></div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
        <div class="col-md-3">
            <div class="create-box-wrap">
                 <div class="create-box">
                      <h4>Create New Property</h4>
                      <div><a href="#" class="create-link">Create</a></div>
                 </div>
                 <div class="create-box">
                      <h4>Create New Blog</h4>
                      <div><a href="#" class="create-link">Create</a></div>
                 </div>
            </div>
        </div>
   </div>
</div>

@section('extra-script')
{{--{{Html::script('bsbmd/plugins/jquery-countto/jquery.countTo.js')}}
{{Html::script('bsbmd/plugins/raphael/raphael.min.js')}}
{{Html::script('bsbmd/plugins/morrisjs/morris.js')}}
{{Html::script('bsbmd/plugins/chartjs/Chart.bundle.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.resize.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.pie.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.categories.js')}}
{{Html::script('bsbmd/plugins/flot-charts/jquery.flot.time.js')}}
{{Html::script('bsbmd/plugins/jquery-sparkline/jquery.sparkline.js')}}
{{Html::script('bsbmd/js/pages/index.js')}}--}}



@endsection