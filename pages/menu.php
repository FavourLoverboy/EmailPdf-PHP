    <ul>        
        <?php 
            if($_SESSION['position'] == 'Admin'){
            ?>
                <li class="<?php echo $dashboard; ?>">
                    <a href="dashboard">
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="class1_student">
                        <span class="title">Class One</span>
                    </a>
                </li>
                <li>
                    <a href="class2_student">
                        <span class="title">Class Two</span>
                    </a>
                </li>
                <li>
                    <a href="class3_student">
                        <span class="title">Class Three</span>
                    </a>
                </li>
                <li>
                    <a href="parent">
                        <span class="title">Parent</span>
                    </a>
                </li>
                <li>
                    <a href="student">
                        <span class="title">Student</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="title">Logout</span>
                    </a>
                </li>

            <?php
            }
        ?>
    </ul>



    <ul>        
        <?php 
            if($_SESSION['position'] == 'User'){
            ?>
                <li class="<?php echo $dashboard; ?>">
                    <a href="dashboard">
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="title">Logout</span>
                    </a>
                </li>
            <?php
            }
        ?>
    </ul>
    