<!-- LOGIN MODAL -->
<div class="modal" tabindex="-1" id="md_login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold"> Login </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>

            <div class="wrapper-login">

                <form id="login_form" method="post">
                    <div class="field mt-5">
                        <input type="text" required name="username" id="txt_username">
                        <label><i class="fa-solid fa-user"></i> Username</label>
                    </div>
                    <div class="field">
                    <div style="position:relative">
                    <i class="fa-solid fa-eye view_password icon_btn" style="float:right; position:absolute; top:15px; right:10px;"></i>
                </div>
                        <input type="password" class="password" required name="password" id="txt_password">
                        <label><i class="fa-solid fa-lock"></i> Password</label>
                    </div>
                    <div class="content">

                        <div class="pass-link mt-3">
                            <a href="#" style="text-decoration: none;">Forgot password?</a>
                        </div>
                    </div>
                    <div class="field text-center">
                        <button type="submit" class="py-1 text-white" style="font-weight:bold; background:#F54646; border-radius:20px; width:120px; margin: 6px; border: 1px solid yellow;">Login</button>
                    </div>

                    <div class="signup-link">
                        Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#signUpModal">Sign-up now</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- LOGIN MODAL -->

<!-- SIGN UP MODAL -->
<div class="modal" id="signUpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold"> Sign Up </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>
            <div class="wrapper-login">

                <form>
                    <div class="field mt-5">
                        <input type="text" id="txt_signup_username" required>
                        <label> Username <span class="text-danger h4">*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" id="txt_signup_fullname" required>
                        <label>Full Name <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_phone" required>
                        <label>Phone <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_email" required>
                        <label>Email <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_address_no" required>
                        <label>House No <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_address_st" required>
                        <label>Street <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_address_brgy" required>
                        <label>Brgy <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_address_city" required>
                        <label>City <span class="text-danger h4">*</span></label>
                    </div>

                    <div class="field ">
                        <input type="text" id="txt_signup_password" required>
                        <label>Password <span class="text-danger h4">*</span></label>
                        <div class="text-end text-muted d-none" style="position: absolute; top:13px; right:15px;"   id="div_password_validation">
                            <i class="fa-solid text-danger fa-circle-exclamation" 
                            id="password_handler"
                            data-bs-toggle="tooltip" 
                            data-bs-html="true" 
                            title="
                                    <div class='text-start'> 
                                        <span class='text-light' id='v_1'>* has numbers.</span><br>
                                        <span class='text-light' id='v_2'>* has letters.</span><br>
                                        <span class='text-light' id='v_3'>* has 8 characters.</span><br>
                                    </div>
                            "
                            ></i>
                        </div>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_signup_password2" required>
                        <label>Repeat Password <span class="text-danger h4">*</span></label>
                        <div class="text-end text-muted d-none" style="position: absolute; top:13px; right:15px;"   id="div_password_validation_2">
                            <i class="fa-solid text-danger fa-circle-exclamation" 
                            data-bs-toggle="tooltip" 
                            data-bs-html="true" 
                            title="
                            <div class='text-start' style='width:400px;'>
                            Passwords doesn't match
                            </div>
                            
                            "
                            ></i>
                        </div>

                    </div>

                    <div class="field text-center mt-4">
                        <button class="py-1 text-white" style="font-weight:bold; background:#F54646; border-radius:20px; width:120px; margin: 6px; border: 1px solid yellow;" id="btn_signup_submit">Sign Up</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- SIGN UP MODAL -->

<!-- CHECK-OUT -->
<div class="modal" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold"> Check-out </span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>



            <div class="bg-warning p-2" style="font-size:10pt;">
                <b>Note : </b>
                You can track your order status in "My Orders"
            </div>

            <div class="wrapper-login">


                <div class="row">
                    <div class="col-lg-7 mt-3">
                        <form id="form_check_out" method="post" enctype="multipart/form-data">
                            <input type="text" hidden name="order_ref_no">

                            <div class="field">
                                <input type="text" id="txt_name_payment" value="<?php echo $_SESSION['username']; ?>">
                                <label>Full Name</label>
                            </div>

                            <div class="field">
                                <input type="text" name="delivery_address" id="txt_delivery_address_payment" value="<?php echo $_SESSION['address']; ?>">
                                <label>Delivery Address</label>
                            </div>

                            <div class="field pay_via_gcash d-none">
                                <input type="text" name="payment_details" id="txt_payment_details">
                                <label id="txt_phone_no_payment">Gcash Sender Phone No.</label>
                            </div>

                            <div class="pay_via_gcash d-none mt-2">

                                <label id="txt_phone_no_payment">Gcash Screenshot</label>
                                <input type="file" class="form-control" id="txt_payment_proof" name="gcash_payment_proof">

                            </div>

                            <div class="mx-0">

                                <label class="mt-3 ">Note to Rider:</label>
                                <textarea name="note_to_rider" id="" cols="30" rows="5" style="width:95%;" class="form-control"></textarea>
                            </div>


                    </div>

                    <div class="col-lg-5 mt-3">


                        <div class="ms-4">
                            <label>Payment Options:</label>

                            <div>

                                <div class="mb-1 form-check">
                                    <input type="checkbox" value="CASH" name="payment_method[]" class="form-check-input payment_method payment_requirement" id="cashCheckbox">
                                    <label class="form-check-label" for="cashCheckbox">Delivery via Cash on Delivery</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" value="GCASH" name="payment_method[]" class="form-check-input payment_method payment_requirement" id="gcashCheckbox">
                                    <label class="form-check-label" for="gcashCheckbox">Pick up & Pay via Gcash</label>

                                    <div class="pay_via_gcash d-none me-3">
                                        <div class="border bg-warning p-2 rounded " style="font-size:9pt;">
                                            <span class=""><b>Note:</b>
                                                You need to upload a screenshot of your payment.
                                            </span>
                                        </div>
                                        <b style="font-size:9pt;">Scan here:</b>
                                        <div class="border text-center  p-2 rounded" style="font-size:9pt;">
                                            <span class="">
                                                <img src="src/resources/img/dummyqr.jpg" style="height:240px; width:200px;">
                                                <br>
                                                <small>Or you can send your payment here : <br>0909909090</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                                <div>
                                    <label for="txt_locations">Location:</label>
                                    <select id="txt_locations" class="form-select payment_requirement" style="width: 70% !important;">
                                        <option value="Afghanistan">Muntinlupa</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                    </select>
                                </div>

                                <div class="mt-2">
                                    <label style="font-size:10pt !important; " for="">Sub-total: <span class="fw-bold" id="txt_sub_total_payment">0</span></label>
                                    <br>
                                    <label style="font-size:10pt !important; " for="">Delivery Fee: <span class="fw-bold" id="txt_delivery_fee_payment">₱0</span></label>
                                    <br>
                                    <label style="font-size:10pt !important; " for="">Total Amount: <span class="fw-bold" id="txt_total_payment">₱0</span></label>
                                    <input type="hidden" name="payment">
                                    <input type="hidden" name="delivery_fee">
                                </div>

                            </div>
                        </div>



                    </div>
                </div>

                <div class="row">
                    <div class="col text-end">
                        <div class="text-end m-2">

                            <button type="submit" class="py-1 text-white" id="btn_place_order" style="font-weight:bold; background:#F54646; border-radius:20px; width:120px; margin: 6px; border: 1px solid yellow;">Place order</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- CHECL-OUT -->

<!-- MY ACC -->
<div class="modal" id="myAccModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold">My Account</span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>
            <div class="wrapper-login mt-3">
                <form action="#">
                    <p class="ps-3"><small><i class="fa-solid fa-gear"></i> Account Settings</small></p>

                    <div class="field">
                        <input type="text" id="txt_view_username" required>
                        <label>Username <span class="text-danger">*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" id="txt_view_name" required>
                        <label>Full Name <span class="text-danger">*</span></label>
                    </div>

                    <div class="field">
                        <input type="email" id="txt_view_email" required>
                        <label>Email <span class="text-danger">*</span></label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_view_phone" required>
                        <label>Phone <span class="text-danger">*</span></label>
                    </div>

                    
                    <div class="field">
                        <input type="text" id="txt_view_address_no" required>
                        <label>House No <span class="text-danger">*</span></label>
                    </div>

                    
                    <div class="field">
                        <input type="text" id="txt_view_address_st" required>
                        <label>Street <span class="text-danger">*</span></label>
                    </div>

                    
                    <div class="field">
                        <input type="text" id="txt_view_address_brgy" required>
                        <label>Barangay <span class="text-danger">*</span></label>
                    </div>
                    <div class="field">
                        <input type="text" id="txt_view_address_city" required>
                        <label>City <span class="text-danger">*</span></label>
                    </div>

                    <div class="field">
                        <input type="password" id="txt_view_password" required>
                        <label>Password <span class="text-danger">*</span>

                        </label>

                        <a href="#" style="top:15px; right:10px; position:absolute;">
                            <i class="fa-solid fa-lg fa-eye text-dark show-password"></i>
                            <i class="fa-solid fa-lg fa-eye-slash text-dark hide-password d-none"></i>
                        </a>

                    </div>

                    <div class="field text-center">
                        <button data-bs-dismiss="modal" class="py-1 text-black" style="font-weight:bold; background:#8AC97B; border-radius:20px; width:120px; margin: 6px; border: 1px solid yellow;" id="btn_update_user_save">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MY ACC -->

<!-- MY ACC -->
<div class="modal" id="md_order_details" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold">Order Details</span>
                <i class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>
            <div class="wrapper-login mt-3">
                <form action="#">
                    <p class="ps-3"><small><i class="fa-solid fa-gear"></i> Account Settings</small></p>

                    <div class="field">
                        <input type="text" id="txt_view_username" required>
                        <label>Username</label>
                    </div>
                    <div class="field">
                        <input type="text" id="txt_view_name" required>
                        <label>Full Name</label>
                    </div>

                    <div class="field">
                        <input type="email" id="txt_view_email" required>
                        <label>Email (optional)</label>
                    </div>

                    <div class="field">
                        <input type="text" id="txt_view_phone" required>
                        <label>Phone</label>
                    </div>

                    <div class="field">

                        <input type="text" id="txt_view_password" required>
                        <label>Password</label>
                    </div>

                    <div class="field text-center">
                        <button data-bs-dismiss="modal" class="py-1 text-black" style="font-weight:bold; background:#8AC97B; border-radius:20px; width:120px; margin: 6px; border: 1px solid yellow;" id="btn_update_user_save">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- MY ACC -->



<div class="modal" tabindex="-1" id="md_msg_box">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="text-center py-3 text-center" style="border-bottom:3px solid black;">
                <span class="ms-5 h6 fw-bold" id="msg_title"> Update Order </span>
                <i id="msg_box_close" class="fa-solid fa-circle-xmark icon_btn pe-3 fa-xl" style="float:right; padding-top:12px;" data-bs-dismiss="modal"></i>
            </div>
            <div class="p-5 mx-auto">
                <span class="" id="msg_body"> Update Order </span>
            </div>
        </div>
    </div>
</div>