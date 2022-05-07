<div id="page_dashboard" class="page p-3 d-none" >
    <h3 class="text-white pt-3 pb-4" style=" font-family: Verdana, sans-serif;">Dashboard</h3>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <select name="" id="sel_date_filter" class="form-select" style="width:15%;float:right">
                    <option value="">Today</option>
                </select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="row row-cols-2">

                    <div class="col">
                        <div class="yellow_box shadow p-3 pt-2 ">
                            <div class="text-center">
                                <span style="font-size:40pt; color:white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6A0F03;" id="txt_total_registered_users">0</span>
                            </div>
                            <span class="fw-bold" style="font-size: 12pt;">Total Registered Users</span>
                        </div>
                    </div>

                    <div class="col">
                        <div class="yellow_box shadow p-3 pt-2">
                            <div class="text-center">
                                <span style="font-size:40pt; color:white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6A0F03;" id="txt_total_completed">0</span>
                            </div>
                            <span class="fw-bold" style="font-size:12pt;">Total Products</span>
                        </div>
                    </div>



                </div>
            </div>

            <div class="col-6">
                <div class="yellow_box_total_order shadow p-3 pt-2">
                    <div class="text-center">
                        <span style="font-size:40pt; color:white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6A0F03;" id="txt_total_orders">0</span>
                    </div>
                    <span class="fw-bold" style="font-size:12pt;">Total Orders</span>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="white_box shadow p-3 pt-1 mt-3">
                    <span class="fw-bold" style="font-size:13pt;">Yearly Sales</span>
                    <div>
                        <span style="margin-top:-10px;font-size: 25pt; color:white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6A0F03;" id="txt_total_annual_sales">&#8369; 0</span>
                    </div>
                </div>

                <div class="white_box_full shadow p-3 pt-1 mt-3">
                    <canvas id="chart_yearly" width="500" height="260"></canvas>
                </div>
            </div>

            <div class="col-6">

                <div class="white_box shadow p-3 pt-1 mt-3 ">
                    <span class="fw-bold" style="font-size:13pt;">Monthly Sales</span>
                    <div>
                        <div class="dropdown d-none" style="float: right;">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="border: solid black 1px;">
                                Select Month
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">January</a></li>
                                <li><a class="dropdown-item" href="#">February</a></li>
                            </ul>
                        </div>
                        <span style="margin-top:-10px;font-size:25pt; color:white; -webkit-text-stroke-width: 1px;-webkit-text-stroke-color: #6A0F03;" id="txt_total_monthly_sales">&#8369; 0</span>
                    </div>
                </div>

                <div class="white_box_full shadow p-3 pt-1 mt-3">
                    <span class="fw-bold" style="font-size:13pt;">Top Selling Products</span>
                    <div style="max-height:40vh; overflow-y:auto; border-radius:5px;">
                        <table class="table_style_1" id="tbl_dashboard_top_selling_products">
                            <thead>
                                <th>No</th>
                                <th>Name</th>
                                <th>No of Order</th>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <small class="text-secondary" id="sm_no_data_available">No Data Available.</small>
                </div>
            </div>
        </div>
    </div>
</div>