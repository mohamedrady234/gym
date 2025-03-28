<?php
// <<<<<==============>>>>>  The function responsible to make time not change any where <<<<<==============>>>>>

date_default_timezone_set("Africa/Cairo") ;

// <<<<<==============>>>>>  The function responsible for printing <<<<<==============>>>>>

function outputmsg($class_name , $message){
    ?>
        <div class='alert <?php echo $class_name ; ?>'>
        <?php echo $message ; ?>
        </div>
    <?php
}

// <<<<<==============>>>>>  The function responsible for save data from user  <<<<<==============>>>>>




// <<<<<==============>>>>>  The function responsible for get page name from php   <<<<<==============>>>>>

function get_page_name()
{
    $path       = $_SERVER['PHP_SELF'] ;                      // script name with php 
    $slash_pos  = strrpos($path , "/") ;                     // we need to know posation the slash of page name 
    $page_name  = substr($path , $slash_pos+1) ;            // we add 1 becouse we dont need / with link 

    return $page_name ;

}
// <<<<<==============>>>>>  The function responsible for make error and success for your page   <<<<<==============>>>>>
function msg_for_user( $type_msg = true, $msg ="", $color_succ  = "green", $color_error = "#f44336")
{

       
    ?>
            <style>
                .alert {
                padding: 20px;
                background-color: <?php if($type_msg){echo $color_succ ;}else{echo $color_error ;} ?>;
                color: white;
                }

                .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
                }

                .closebtn:hover {
                color: black;
                }
            </style>
                    <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong><?php if($type_msg){echo " success !"  ;}else{echo " DANGER !" ;} ?> </strong> <?php echo $msg ; ?>
                    </div>

    <?php
}


// <<<<<==============>>>>>  The function responsible for make refresh for your page   <<<<<==============>>>>>
function redirect($sec = 1 , $url = "index.php"){

    // $sec =======> how many second what you need to make refresh 
    // $url =======> what is the link you need to go 

    header("refresh:$sec;url= $url");


}

// <<<<<==============>>>>>  The function responsible for make clea for your data user    <<<<<==============>>>>>

function validate($data)
{
    $data =trim($data) ;                            // to clean data from any spaces
    $data =htmlspecialchars($data) ;               // to clean data from any html or java script
    $data =addslashes($data) ;                    // to make a slashes to show the '
    $data =stripslashes($data) ;                 // to clean a slashes to show the ' without slashes

    return $data ;

} 

// <<<<<==============>>>>>  The function responsible for make encryption for password   <<<<<==============>>>>>

function enc_password ($password)
{
    $password = md5($password) ;
    $password = substr($password , 15 , 4);
    $password = sha1($password);
    $password = substr($password ,10 , 5);
    $password = md5($password) ;
    $password = substr($password , 4 , 4);
    $password = sha1($password);
    $password = substr($password , 20 , 4);
    $password = sha1($password);
    $password = substr($password , 30 , 5);

    return  $password ;
}
// <<<<<==============>>>>>  The function responsible for make encryption for password   <<<<<==============>>>>>

function reusable_action($server_query = 'PHP_SELF')
{
    echo htmlspecialchars($_SERVER[$server_query]) ;
}

// 
function get_month($path)
{
    $slash_pos  = strpos($path , "-") ;                     // we need to know posation the slash of page name 
                      // we need to know posation the slash of page name 
    $month_name  = substr($path , $slash_pos + 1 , 2) ;            // we add 1 becouse we dont need / with link 

    return $month_name ;

}
// <<<<<==============>>>>>  The function responsible for make encryption for password   <<<<<==============>>>>>

function report_monthly($total_member , $total ,$total_paid_up , $total_remainder)
{
   ?>
        <div class="content">
            <!-- Top Statistics -->
            <div class="row boxes_report">
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            <h2 class="mb-1"><?php  echo $total_member ; ?></h2>
                            <p>Total Members</p>

                                        
                            <span class="mdi mdi-currency-usd">
                                <img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-1">
                        <div class="card-body">
                            <div>
                                <h2 class="mb-1"><?php  echo $total ; ?> $</h2>
                                
                                <p>Total Money</p>
                            </div>

                                        
                            <span class="mdi mdi-currency-usd">
                                <img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-3">
                        <div class="card-body">
                            <h2 class="mb-1"><?php echo $total_paid_up ; ?> $</h2>
                            <p>Payments</p>
                            <span class="mdi mdi-currency-usd">
                                <img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                    <div class="card card-mini dash-card card-4">
                        <div class="card-body">
                            <h2 class="mb-1"><?php echo $total_remainder ; ?> $</h2>
                            <p>Unpaid sums</p>
                            <span class="mdi mdi-currency-usd">
                                <img src="assets/img/logo/logo.png" class= "logo-in-profile" alt="">
                            </span>
                            
                        </div>
                    </div>
                </div>
            </div>
            

        </div> 


    <?php

    
}
?>


