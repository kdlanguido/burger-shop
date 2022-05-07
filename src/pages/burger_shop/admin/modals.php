<div class="modal" tabindex="-1" id="md_account_settings">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> My Account </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="p-3 md_form">
                <h6 class="fw-bold text-muted mb-3">Account Settings</h6>

                <label>Full name</label>
                <input type="text" id="txt_full_name" class="form-control form-control-sm">

                <label>Username</label>
                <input type="text" id="txt_username" class="form-control form-control-sm">

                <label class="mt-2">Email</label>
                <input type="text" id="txt_email" class="form-control form-control-sm">

                <label class="mt-2">Password</label>
                <div style="position:relative">
                    <i class="fa-solid fa-eye view_password icon_btn" style="float:right; position:absolute; top:10px; right:5px;"></i>
                </div>
                <input type="password" id="txt_password" class="form-control form-control-sm password">

                <label class="mt-2">Phone</label>
                <input type="text" id="txt_phone" class="form-control form-control-sm">

                <!-- <label class="mt-2">Access</label>
                <select class="form-select form-select-sm" name="" id="sel_access_level">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select> -->

                <div class="mt-2">
                    <a id="btn_delete_account" class="icon_btn">Delete account</a>
                </div>


                <div class="text-center mt-3">
                    <button class="shadow" id="btn_update_account">Update</button>

                </div>



            </div>





        </div>
    </div>
</div>


<div class="modal" tabindex="-1" id="md_add_account">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> Register Admin Account </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="p-3 md_form">
                <h6 class="fw-bold text-muted mb-3">Account Information</h6>

                <label>Full name <span class="text-danger">*</span></label>
                <input type="text" id="txt_register_full_name" class="form-control form-control-sm">

                <label>Username <span class="text-danger">*</span></label>
                <input type="text" id="txt_register_username" class="form-control form-control-sm">

                <label class="mt-2">Phone <span class="text-danger">*</span></label>
                <input type="number" id="txt_register_phone" class="form-control form-control-sm">


                <label class="mt-2">Email <span class="text-danger">*</span></label>
                <input type="text" id="txt_register_email" class="form-control form-control-sm">
                <div id="notify_email_admin" style="display:none; font-size:9pt;">
                    <small class="text-muted">Must be a valid email</small>
                </div>

                <label class="mt-2">Password <span class="text-danger">*</span></label>
                <div style="position:relative">
                    <i class="fa-solid fa-eye view_password icon_btn" style="float:right; position:absolute; top:10px; right:5px;"></i>
                </div>
                <input type="password" id="txt_register_password" class="form-control form-control-sm password">
                <div id="notify_num_char" style="display:none; font-size:9pt;">
                    <small class="text-muted">Must have 8 to 20 characters</small>
                </div>
                <div id="notify_combination" style="display:none; font-size:9pt;">
                    <small class="text-muted">Combination of Letters and Numbers, with atlest 1 uppercase</small>
                </div>



                <div class="text-center mt-3">
                    <button class="shadow" id="btn_register_account_submit" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="md_view_order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> Order Details </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>


            <div class="p-3" id="div_order_details">
                <table class="table_style_1" id="tbl_view_order">
                    <thead>
                        <th class="text-center">Name</th>
                        <th class="text-center" width="10%">Qty</th>
                        <th class="text-center" width="15%">Price</th>
                    </thead>
                    <tbody></tbody>
                </table>
                <div class="border pe-3 ps-3" style="float:right">
                    <span class="fw-bold pe-3">Sub-total :</span><span style="float:right;" class="fw-bold " id="txt_subtotal_view"> &#8369;900</span>
                    <br><span class="fw-bold pe-3">Delivery Fee :</span><span style="float:right;" class="fw-bold " id="txt_delivery_fee_view"> &#8369;900</span>
                    <br><span class="fw-bold pe-3">Total :</span><span style="float:right;" class="fw-bold " id="txt_total"> &#8369;900</span>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn border" data-bs-target="#md_update_order" data-bs-toggle="modal" style="font-size:10pt;" id="btn_update_order"><i class="fa-solid fa-receipt  text-primary pe-1"></i> Update</button>
                <button class="btn border" onClick="print_order()" style="font-size:10pt;"><i class="fa-solid fa-print icon_btn text-primary pe-1"></i>Print</button>
            </div>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="md_update_order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> Update Order </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="p-3">

                <label>Set Status</label>
                <select name="" id="sel_update_order_status" class="form-select">
                    <option value="Out for Delivery">Out for Delivery</option>
                    <option value="Completed">Complete</option>
                    <option value="Cancelled">Cancel</option>
                </select>


            </div>

            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="h5 fw-bold"> Payment Details </span>
            </div>


            <div class="p-3">

                <label>Payment Method</label>
                <input class="form-control" readonly type="text" id="txt_payment_method">

                <label class="mt-2">Payment Amount</label>
                <input class="form-control" readonly type="text" id="txt_payment_amount">

                <div id="gcash" class="d-none">
                    <label class="mt-2">Number</label>
                    <input class="form-control" readonly type="text" id="txt_payment_number">

                    <label class="mt-2">Payment Proof</label>
                    <br>
                    <a id="img_payment_proof_a" target="blank">
                        <img style="height:200px;" id="img_payment_proof"></a>
                </div>

            </div>


            <div class="modal-footer">
                <button class="btn border" data-bs-target="#md_view_order" data-bs-toggle="modal" style="font-size:10pt;">Cancel</button>
                <button class="btn border btn-primary" id="btn_save_update_order" style="font-size:10pt;" data-bs-dismiss="modal">Save</button>
            </div>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="md_add_item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> Add Product </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <form id="form_add_product" method="post" enctype="multipart/form-data">
                <div class="p-3">
                    <label for=""> <span style="color:red">*</span> Product Name</label>
                    <input type="text" class="form-control" name="name" id="txt_product_name">

                    <label class="mt-2"><span style="color:red">*</span>  Price</label>
                    <input type="text" class="form-control" name="price" id="txt_price">

                    <label class="mt-2"><span style="color:red">*</span>  Category</label>
                    <select id="txt_category" name="category" class="form-select">
                        <option value="burger">Burger</option>
                        <option value="drink">Drink</option>
                        <option value="sides">Sides</option>
                    </select>

                    <label class="mt-2"><span style="color:red">*</span>  Picture</label>
                    <input type="file" class="form-control" name="picture" id="txt_picture">
                </div>




                <div class="modal-footer">
                    <button class="btn border btn-primary" type="submit" style="font-size:10pt;">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="md_edit_item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> Edit Product </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <form id="form_edit_product" method="post" enctype="multipart/form-data">
                <div class="p-3">
                    <div class="text-center">
                        <a href="" style="font-size:9pt;" class="text-dark" target="blank" id="btn_preview_image"><img id="img_product" style="height:130px;"></a><br><a href="#" id="btn_edit_product_change_picture" style="font-size:9pt;" class="text-dark">Change Picture</a>
                    </div>
                    <br>

                    <label for=""><span style="color:red">*</span>  Product Name</label>
                    <input type="text" class="form-control" name="name" id="txt_edit_product_name">

                    <label class="mt-2"><span style="color:red">*</span> Price </label>
                    <input type="text" class="form-control" name="price" id="txt_edit_product_price">

                    <label class="mt-2"><span style="color:red">*</span>  Category</label>
                    <select id="txt_edit_product_category" name="category" class="form-select txt_product_category">
                    
                    </select>

                    <input type="text" class="form-control mt-2 d-none" name="other_category" placeholder="Please specify.." id="txt_other_category">
                    <input type="text" class="form-control" name="id" hidden id="txt_edit_product_id">
                    <input type="file" class="form-control" name="picture" hidden id="txt_edit_product_picture">
                </div>

                <div class="modal-footer">
                    <button class="btn border" type="submit" style="font-size:10pt;">Save</button>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="md_msg_box">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold" id="msg_title"> Update Order </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="p-5 mx-auto">
                <span class="" id="msg_body"> Update Order </span>
            </div>


        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="md_view_item">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h5 fw-bold"> View Product </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="p-3">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="name" id="txt_view_product_name">

                <label class="mt-2">Price</label>
                <input type="text" class="form-control" name="price" id="txt_view_price">

                <label class="mt-2">Category</label>
                <select id="txt_view_category" name="category" class="form-select">
                    <option value="burger">Burger</option>
                    <option value="drink">Drink</option>
                    <option value="sides">Sides</option>
                </select>
                <label class="mt-2">Picture</label>
                <input type="file" class="form-control" name="picture" id="txt_view_picture">
            </div>


        </div>

    </div>
</div>