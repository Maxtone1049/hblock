<nav id="sidebar" class="sidebar-wrapper">
                    <div class="sidebar-content">
                        <!-- sidebar-brand  -->
                        <div class="sidebar-item sidebar-brand">
                            <a href="..">Hutblock</a>
                            <div id="close-sidebar">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        <!-- sidebar-header  -->
                        <div class="sidebar-item sidebar-header">
                            <div class="user-pic">
                                <a href="profile">
                                    <img class="img-responsive img-rounded profilePhoto" src="https://hutbay.blob.core.windows.net/user-detail/8201_592ced4459024302aff156b02dfbdac3.jpg" alt="User picture">
                                </a>
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?php echo $row->fname.' ' .$row->lname ?></span>
                                <span class="user-role">(individual account)</span>
                                <span class="user-status">
                                    <i class="fa fa-circle text-danger"></i>
                                    <span>
                                        <a href="subscription">Free Plan (upgrade)</a>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <!-- sidebar-menu  -->
                        <div class=" sidebar-item sidebar-menu">
                            <ul>
                                <li class="header-menu">
                                    <span>General</span>
                                </li>
                                <li>
                                    <a href="../post/request.php" target="_blank">
                                        <i class="fa fa-clipboard"></i>
                                        <span>Post a Listing</span>
                                    </a>
                                </li>
                                <li class="sidebar-dropdown">
                                    <a>
                                        <i class="fa fa-tachometer-alt"></i>
                                        <span>Dashboard</span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="dashboard">
                                                    <span><?php echo $row->fname.' ' ."Office"?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="savedlisting">
                                                    <span>Saved Listings</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="listings">
                                        <i class="fa fa-align-justify"></i>
                                        <span>My Listings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="feed">
                                        <i class="fa fa-sitemap"></i>
                                        <span>Listing Feed</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="reporting">
                                        <i class="fa fa-chart-line"></i>
                                        <span>
                                            Reporting <span class="badge badge-pill badge-info">soon</span>
                                        </span>
                                    </a>
                                </li>
                                <li class="sidebar-dropdown">
                                    <a>
                                        <i class="fa fa-user"></i>
                                        <span>My Account</span>
                                    </a>
                                    <div class="sidebar-submenu">
                                        <ul>
                                            <li>
                                                <a href="profile">My Profile</a>
                                            </li>
                                            <li>
                                                <a href="subscription">Subscription &Ads</a>
                                            </li>
                                            <li>
                                                <a href="settings">Manage Settings</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="../property-requests" target="_blank">
                                        <i class="far fa-address-book"></i>
                                        <span>Property Requests</span>
                                        <span class="badge badge-pill badge-success">Pro</span>
                                    </a>
                                </li>
                                <li class="header-menu">
                                    <span>Extra</span>
                                </li>
                                <li>
                                    <a href="https://help.hutblock.com" target="_blank">
                                        <i class="fa fa-question-circle"></i>
                                        <span>Help and Support</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- sidebar-menu  -->
                    </div>
                    <!-- sidebar-footer  -->
                    <div class="sidebar-footer">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="badge badge-pill badge-warning notification"></span>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="badge badge-pill badge-success notification"></span>
                            </a>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                                <span class="badge-sonar"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                                <a class="dropdown-item" href="settings">Account Settings</a>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-power-off"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                                <a class="dropdown-item" href="logout">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- sidebar-content  -->