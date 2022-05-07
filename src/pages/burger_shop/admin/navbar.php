<div class="burger_machine_nav shadow">

    <i class="fa-solid fa-bars icon_btn ps-3 pt-3 h5" data-bs-toggle="offcanvas" href="#burger_machine_sidebar" role="button"></i>

    <div class="p-3 pe-0 row " style="float:right; font-size:15pt;">
        <div class="col-7 text-end">

            <div class="row row-cols-2">
                <div class="col"> 
                    <div class="dropdown">
                        <i type="button" data-bs-toggle="dropdown" class="fa-solid fa-bell icon_btn" style="margin:0px; padding:0px;" ><span class="bg-danger rounded-circle " style="font-size:8pt; padding:5px; margin-left:-7px; padding-top:2px; padding-bottom:2px;" id="notif_count">0</span>  </i>
                        
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="font-size:10pt;">
                            <li class=" ps-3 fw-bold">Notifications</li>

                            <div id="notif_bar">
                            
                            </div>
                           
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="dropdown">
                        <i class="fa-solid fa-circle-user" type="button" data-bs-toggle="dropdown"></i>
                        <ul class="dropdown-menu px-2" aria-labelledby="dropdownMenu2" style="font-size:10pt;">
                            <li class=" ps-3" id="admin_menu_name" >Welcome, <span class="fw-bold" > <?php echo $_SESSION['username']; ?> </span></li>
                            <li class="dropdown-divider"></li>
                            <li><button class="dropdown-item fw-lighter" type="button" id="btn_nav_admin_view_account"><i class="fa-solid fa-user-gear"></i> Account Settings</button></li>
                            <li><button class="dropdown-item fw-lighter" type="button" id="btn_nav_admin_add_account"><i class="fa-solid fa-user-plus"></i> Register Admin</button></li>
                         
                         
                            <li>
                                <form action="src/database/burger_shop/func/logout.php" method="post">
                                    <button class="dropdown-item fw-lighter" type="submit"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>




        </div>
        <div class="col-5">



        </div>

    </div>

</div>