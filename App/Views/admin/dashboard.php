
                <div class="box">
                        <div class="row stats">
                            <div class="tasks">
                                <div class="icon">
                                    <i class="fas fa-user"></i>
                                </div>
                                <span class="numberofuser" data-user-count="  <?=   count($users) ?> ">
                               
                                  <?=  count($users)?>  
                                 
                                </span>
                                <span>
                              
                                   Users
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
