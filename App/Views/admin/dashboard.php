<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> login form </title>
    <link rel="stylesheet" href= <?= mlink("admin/css/all.min.css") ?>>
    <link rel="stylesheet" href= <?= mlink("admin/css/style.css") ?>>
    
</head>
<body>

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
                        <img class="logo-img hasdropdwon" alt="avatar" src=" <?= mlink('admin/images/avatar.png') ?>">
                    </div>
                        <div class="dropdown-menu settings">
                            <div class="box">
                                <div class="dropdown-item">
                                    <i class="fas fa-times"></i>
                                    <span>settings</span>

                                </div>  
                                <div class="dropdown-item">
                                    <i class="fas fa-cog"></i>
                                    <span>profile</span>
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
    <!-- start content and side bar -->
    <div class="wraper">
            <div class="sidebar">
                <div class="box">
                    <div class="sidebar-item active">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="admin"><span>
                            Home Page
                        </span></a>
                    </div>
                    <div class="sidebar-item">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="admin\categorys"><span>
                            categorys
                        </span></a>
                    </div>
                    <div class="sidebar-item">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="admin\users-groups"><span>
                        Users Groups
                        </span></a>
                    </div>
                    <div class="sidebar-item">
                        <div class="icon">
                            <i class="fas fa-home">
                            </i>
                        </div>
                        <a href="admin\users"><span>
                            users
                        </span></a>
                    </div>
                </div>

            </div>
            <div class="content">
                <div class="box">
                        <div class="row stats">
                            <div class="tasks">
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span class="">
                                    100
                                </span>
                                <span>
                                    tasks to do
                                </span>
                            </div>
                            <div class="tasks">
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
                                    100
                                </span>
                                <span>
                                    tasks to do
                                </span>
                            </div>
                            <div class="tasks">
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
                                    100
                                </span>
                                <span>
                                    tasks to do
                                </span>
                            </div>
                            <div class="tasks">
                                <div class="icon">
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>
                                    100
                                </span>
                                <span>
                                    tasks to do
                                </span>
                            </div>
                        </div>
                        <!-- start table -->
                        <div class="row table">
                            <div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>
                                                id
                                            </th>
                                            <th>
                                                name
                                            </th>
                                            <th>
                                                avatar
                                            </th>
                                            <th>
                                                status
                                            </th>
                                            <th>
                                                progress
                                            </th>
                                            <th>
                                                actios
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="id">
                                                3611
                                            </td>
                                            <td>
                                                hasan meady 
                                            </td>
                                            <td>
                                            <img class="table-avatar" alt="avatar" src="<?= mlink('admin/images/avatar.png') ?>"> 

                                            </td>
                                            <td class="accepted">
                                               <span> accepted </span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <span></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="edit">edit</button>
                                                    <button class="delete">delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="id">
                                                3611
                                            </td>
                                            <td>
                                                hasan meady 
                                            </td>
                                            <td>
                                            <img class="table-avatar" alt="avatar" src="<?= mlink('admin/images/avatar.png') ?>"> 

                                            </td>
                                            <td class="rejected">
                                                <span>rejected</span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <span></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="edit">edit</button>
                                                    <button class="delete">delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="id">
                                                3611
                                            </td>
                                            <td>
                                                hasan meady 
                                            </td>
                                            <td>
                                            <img class="table-avatar" alt="avatar" src="<?= mlink('admin/images/avatar.png') ?>"> 

                                            </td>
                                            <td class="accepted">
                                               <span> accepted </span>
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <span></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <button class="edit">edit</button>
                                                    <button class="delete">delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row chart">
                            <div id="chart"></div>
                        </div>
                </div>

            </div>
    </div>
    <!-- <script src= <?= mlink("admin/js/bootstrap.min.js.map") ?> > </script>
    <script src= <?= mlink("admin/js/bootstrap.min.js") ?> > </script>
    <script src= <?= mlink("admin/js/all.min.js") ?>> </script> -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src= <?= mlink('admin/js/dashboard.js')  ?> >  </script>
    </body>
</html>