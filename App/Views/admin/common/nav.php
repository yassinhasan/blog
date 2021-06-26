
    <!--  start nav section  consists of logo area -- sreach area -- avatar area  -->
    <nav class="nav">
        <div class="logo">
            <div class="bars"><i class="fas fa-bars"></i></div>
            <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/logo.jpg') ?>">
        </div>
        <div class="input-search">
            <input type="text" placeholder="type your search here">
            <i class="fas fa-search"></i>
        </div>
        <div class="profile-area">
            <div class="notification">
                    <div class="changetheme">
                         <i class="fas fa-moon changeteheme"></i>
                    </div>
                    <div class="notifi-info">
                        <div class="thebell">
                             <i class="fas fa-bell hasdropdwon"> <span> 10 </span></i>
                        </div>
                        <!-- start dropdown menu when click on bell -->
                        <div class="dropdown-menu">
                            <div class="box">
                                <div class="dropdown-item">
                                    <div class="avatar">
                                        <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>"> 
                                    </div>
                                    <div class="text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ab similique nesciunt?
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="avatar">
                                        <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>"> 
                                    </div>
                                    <div class="text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ab similique nesciunt?
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="avatar">
                                        <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>"> 
                                    </div>
                                    <div class="text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ab similique nesciunt?
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="avatar">
                                        <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>"> 
                                    </div>
                                    <div class="text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ab similique nesciunt?
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="avatar">
                                        <img class="logo-img" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>"> 
                                    </div>
                                    <div class="text">
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Id ab similique nesciunt?
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end of nofticaion area -->
                    </div>    

                <div class="avatar-area">
                    <div class="theavatar">
                        <img class="logo-img hasdropdwon" alt="avatar" src=" <?= mlink("uploades/images/$image") ?>">
                    </div>
                        <div class="dropdown-menu settings">
                            <div class="box">
                                <div class="dropdown-item">
                                    <i class="fas fa-times"></i>
                                    <span>settings</span>

                                </div>  
                                <div class="dropdown-item">
                                    <i class="fas fa-user"></i>
                                    <a href="<?= fullurl("admin/profile")?>"> <span>profile</span></a>
                                </div>  
                                <div class="dropdown-item">
                                    <i class="fas fa-sign-in-alt"></i>
                                    <a href="<?= fullurl("users/login")?>"><span>login</span></a>
                                </div>  
                                <div class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <a href="<?= fullurl("users/logout")?>"><span>logout</span></a>
                                </div>  
                            </div>
                        </div>

                

                </div>
                <!--end of notification  -->
            </div>
        <!-- end of profile area -->
        </div>
    </nav>