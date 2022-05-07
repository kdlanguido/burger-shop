 <div class="offcanvas offcanvas-start burger_machine_sidebar" tabindex="-1" id="burger_machine_sidebar" aria-labelledby="burger_machine_sidebarLabel">
     <div class="offcanvas-header">
         <img src="<?php echo $_SESSION['logo_path'] ?>" class="burger_machine_nav_logo" style="width:150px; height:110px;" />
     </div>
     <div class="offcanvas-body burger_machine_sidebar px-0">
         <ul class="list-group list-group-flush ps-3">
             <li class="list-group-item fs-6 align-center border-0 " id="btn_sidebar_dashboard"><i class="fa-solid fa-fw fa-house pe-3"></i> <span>Dashboard</span></a></li>
             <li class="list-group-item fs-6 align-center border-0 " id="btn_sidebar_products"><i class="fa-solid fa-fw fa-burger pe-3"></i> <span>Products</span></a></li>
             <li class="list-group-item fs-6 align-center border-0 " id="btn_sidebar_order"><i class="fa-solid fa-fw  fa-file-invoice-dollar pe-3"></i> <span>Orders</span> </a></li>
             <li class="list-group-item fs-6 align-center border-0 " id="btn_sidebar_order_history"><i class="fa-solid fa-clipboard-list fa-fw pe-3"></i> <span>Order History</span> </a></li>
             <li class="list-group-item fs-6 align-center border-0 " id="btn_sidebar_feedback"><i class="fa-solid fa-fw fa-envelope pe-3"></i> <span>Feedbacks</span></a></li>


         </ul>

         <button class="d-none btn burger_machine_sidebar_btn shadow" data-bs-target="#md_account_settings" data-bs-toggle="modal" id="btn_account_settings"><i class="fa-solid fa-gears"></i> Settings</button>
     </div>


 </div>