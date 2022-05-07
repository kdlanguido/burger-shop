<div id="page_order" class="d-none page px-3 py-5">
    <h4 class="text-white">Orders</h4>

    <table class="table_style_1" id="tbl_orders">
        <thead>
            <th width="15%">Ref. No.</th>
            <th>Name</th>
            <th width="10%">Phone No</th>

            <th width="15%">Address</th>
            <th width="10%">Status</th>
            <th width="10%"></th>
        </thead>
        <tbody>

        </tbody>
    </table>


    <div class="mt-3 ms-3" style="display:none; width:50%;" id="div_to_print">

        <div class="text-center">
            <img src="src\resources\img\otakulogo.PNG" alt="" class="border rounded-circle">
        </div>
        <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
            <span class="h6 fw-bold"> Customer Details </span>
        </div>
        <div class="p-3 px-0 pb-0">
            <table class="table table_style_2 ">
                <tbody>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2">Name</td>
                        <td class=" border-start-0 border border-dark py-0 px-2" id="print_name">'+val.name+'</td>
                    </tr>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2">Phone</td>
                        <td class=" border border-dark py-0 px-2" id="print_phone">'+val.delivery_address+'</td>
                    </tr>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2">Delivery Address</td>
                        <td class=" border border-dark py-0 px-2" id="print_delivery_address">'+val.delivery_address+'</td>
                    </tr>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2" >Note to Rider</td>
                        <td class=" border border-dark py-0 px-2" id="print_note_to_rider">'+val.note_to_rider+'</td>
                    </tr>
                </tbody>
            </table>

        </div>
        
        <div class="text-center py-3 pt-0  text-center" style="border-bottom:3px solid black;">
            <span class="h6 fw-bold"> Payment Details </span>
        </div>

        <div class="p-3 px-0" id="div_order_details">
            <table class="table table_style_2" id="">
                <tbody>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2">Payment Method</td>
                        <td class=" border-start-0 border border-dark py-0 px-2" id="print_payment_method">'+val.payment_method+'</td>
                    </tr>
                    <tr>
                        <td width="15%" class="fw-bold  border border-dark py-0 px-2">Payment</td>
                        <td class=" border border-dark py-0 px-2" id="print_payment"></td>
                    </tr>
                   
                </tbody>
            </table>
        </div>
        
        <div class="text-center py-3 pt-0 text-center" style="border-bottom:3px solid black;">
            <span class="h6 fw-bold"> Order Details </span>
        </div>
        <div class="p-3 px-0 mb-3" id="div_order_details">
            <table class="table_style_1" id="tbl_view_order_print">
                <thead>
                    <th class="text-center">Name</th>
                    <th class="text-center" width="10%">Qty</th>
                    <th class="text-center" width="15%">Price</th>
                </thead>
                <tbody></tbody>
            </table>
            
        </div>
        <div class=" mb-5 me-0 pe-9" style="float:right">
            <span class="fw-bold pe-3">Sub-total :</span><span class="fw-bold" id="txt_subtotal" style="float:right"> &#8369;900</span><br>
        <span class="fw-bold pe-3">Delivery Fee : </span><span class="fw-bold" id="txt_delivery_fee"  style="float:right"> &#8369;900</span><br>
            <span class="fw-bold pe-3">Total :</span><span class="fw-bold" id="txt_total_print"  style="float:right"> &#8369;900</span>
        </div>
    </div>
</div>