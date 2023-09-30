<?php
include('connection.php');
session_start();
$rt_id = $_GET['rt_id'];
$email = $_SESSION['mail'];
$date = $_SESSION['date'];
$aa = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40");
$co = array("blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue", "blue");
$pe = array("auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto", "auto");
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="adminpanel.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .header {
            background-color: darkkhaki;
        }
    </style>
    <title>CHOOSE TICKET</title>
    <link rel="stylesheet" href="choosetic.css">
</head>

<body>
    <div class="header">
        <h2>USER PANEL</h2>
        <p>INNERCITY TRANSPORT SERVICES</p>
    </div>
    <div class="alltab">
        <ul class="showcase">
            <li>
                <a href="#" style='background-color:red; pointer-events: none;'>ALREADY BOOKED</a>
            </li>
            <li>
                <a href="#" style='background-color:blue; pointer-events: auto;'>AVAILABLE</a>
            </li>
        </ul>
        <div class="container">
            <?php
            $query = "select * from ticket where rt_id='$rt_id' and date_='$date'";
            $qrun = mysqli_query($con, $query);
            $_SESSION['rt_id'] = $rt_id;
            $_SESSION['mail'] = $email;
            $_SESSION['date'] = $date;
            while ($row = mysqli_fetch_array($qrun)) {
                $co[$row['sit_no']] = "red";
                $pe[$row['sit_no']] = "none";
            }
            ?>

            <div class="row">
                <?php echo "<a href='payment.php? seat=" . $aa[1] . "' style='background-color:$co[1]; pointer-events: $pe[1];'>01</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[2] . "' style='background-color:$co[2]; pointer-events: $pe[2];'>02</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[3] . "' style='background-color:$co[3]; pointer-events: $pe[3];'>03</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[4] . "' style='background-color:$co[4]; pointer-events: $pe[4];'>04</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[5] . "' style='background-color:$co[5]; pointer-events: $pe[5];'>05</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[6] . "' style='background-color:$co[6]; pointer-events: $pe[6];'>06</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[7] . "' style='background-color:$co[7]; pointer-events: $pe[7];'>07</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[8] . "' style='background-color:$co[8]; pointer-events: $pe[8];'>08</a>" ?>
            </div>
            <div class="row">
                <?php echo "<a href='payment.php? seat=" . $aa[9] . "' style='background-color:$co[9]; pointer-events: $pe[9];'>09</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[10] . "' style='background-color:$co[10]; pointer-events: $pe[10];'>10</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[11] . "' style='background-color:$co[11]; pointer-events: $pe[11];'>11</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[12] . "' style='background-color:$co[12]; pointer-events: $pe[12];'>12</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[13] . "' style='background-color:$co[13]; pointer-events: $pe[13];'>13</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[14] . "' style='background-color:$co[14]; pointer-events: $pe[14];'>14</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[15] . "' style='background-color:$co[15]; pointer-events: $pe[15];'>15</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[16] . "' style='background-color:$co[16]; pointer-events: $pe[16];'>16</a>" ?>
            </div>
            <div class="row">
                <?php echo "<a href='payment.php? seat=" . $aa[17] . "' style='background-color:$co[17]; pointer-events: $pe[17];'>17</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[18] . "' style='background-color:$co[18]; pointer-events: $pe[18];'>18</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[19] . "' style='background-color:$co[19]; pointer-events: $pe[19];'>19</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[20] . "' style='background-color:$co[20]; pointer-events: $pe[20];'>20</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[21] . "' style='background-color:$co[21]; pointer-events: $pe[21];'>21</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[22] . "' style='background-color:$co[22]; pointer-events: $pe[22];'>22</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[23] . "' style='background-color:$co[23]; pointer-events: $pe[23];'>23</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[24] . "' style='background-color:$co[24]; pointer-events: $pe[24];'>24</a>" ?>
            </div>
            <div class="row">
                <?php echo "<a href='payment.php? seat=" . $aa[25] . "' style='background-color:$co[25]; pointer-events: $pe[25];'>25</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[26] . "' style='background-color:$co[18]; pointer-events: $pe[18];'>26</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[27] . "' style='background-color:$co[19]; pointer-events: $pe[19];'>27</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[28] . "' style='background-color:$co[20]; pointer-events: $pe[20];'>28</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[29] . "' style='background-color:$co[21]; pointer-events: $pe[21];'>29</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[30] . "' style='background-color:$co[22]; pointer-events: $pe[22];'>30</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[31] . "' style='background-color:$co[23]; pointer-events: $pe[23];'>31</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[32] . "' style='background-color:$co[24]; pointer-events: $pe[24];'>32</a>" ?>
            </div>
            <div class="row">
                <?php echo "<a href='payment.php? seat=" . $aa[33] . "' style='background-color:$co[33]; pointer-events: $pe[33];'>33</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[34] . "' style='background-color:$co[34]; pointer-events: $pe[34];'>34</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[35] . "' style='background-color:$co[35]; pointer-events: $pe[35];'>35</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[36] . "' style='background-color:$co[36]; pointer-events: $pe[36];'>36</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[37] . "' style='background-color:$co[37]; pointer-events: $pe[37];'>37</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[38] . "' style='background-color:$co[38]; pointer-events: $pe[38];'>38</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[39] . "' style='background-color:$co[39]; pointer-events: $pe[39];'>39</a>" ?>
                <?php echo "<a href='payment.php? seat=" . $aa[40] . "' style='background-color:$co[40]; pointer-events: $pe[40];'>40</a>" ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <p>city transport services</p>
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-dribbble"></i></a>
        </div>
        <p class="end">CopyRight By anupam kumar </p>
    </div>
</body>

</html>