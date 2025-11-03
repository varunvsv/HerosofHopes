     <div id="sidebar" class="active">
         <div class="sidebar-wrapper active">
             <div class="sidebar-header">
                 <div class="d-flex justify-content-between">
                     <div class="logo">
                         <a href="adminHome.php"><img src="../assets/images/logo/logo2.png" alt="Logo" srcset=""></a>
                         <span style="font-size: 20px;">Heroes of Hopes</span>

                     </div>
                     <div class="toggler">
                         <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                     </div>
                 </div>
             </div>
             <div class="sidebar-menu">
                 <ul class="menu">
                     <li class="sidebar-title">Admin</li>

                     <li class="sidebar-item active ">
                         <a href="adminHome.php" class='sidebar-link'>
                             <i class="bi bi-grid-fill"></i>
                             <span>Dashboard</span>
                         </a>
                     </li>

                     <li class="sidebar-item  has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Donor</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item ">
                                 <a href="addDonor.php">Add</a>
                             </li>
                             <li class="submenu-item ">
                                 <a href="manageDonor.php">Manage</a>
                             </li>

                         </ul>
                     </li>

                     <li class="sidebar-item  has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Blood Tests</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item ">
                                 <a href="addtest.php">Add</a>
                             </li>
                             <li class="submenu-item ">
                                 <a href="manageTest.php">Manage</a>
                             </li>

                         </ul>
                     </li>
                     <li class="sidebar-item  has-sub">
                         <a href="#" class='sidebar-link'>
                             <i class="bi bi-stack"></i>
                             <span>Medicines</span>
                         </a>
                         <ul class="submenu ">
                             <li class="submenu-item ">
                                 <a href="addmedicine.php">Add</a>
                             </li>
                             <li class="submenu-item ">
                                 <a href="managemedicines.php">Manage</a>
                             </li>

                         </ul>
                     </li>
                     <li class="sidebar-item">
                         <a href="../dbscripts/logout.php" class='sidebar-link'>
                             <i class="bi bi-x-octagon-fill"></i>
                             <span>Logout</span>
                         </a>
                     </li>



                 </ul>
             </div>
             <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
         </div>
     </div>