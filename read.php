<!DOCTYPE html>
<html lang="en">
<title>The Night Air: COVID Poetry Project</title>
<head profile="http://www.w3.org/2005/10/profile">
    <link rel="icon" href="/white.png" type="image/png" />
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Optima", "Didot", serif}

    .w3-third img {
        margin-bottom: -6px;
        opacity: 0.8;
        cursor: pointer
    }

    .w3-third img:hover {
        opacity: 1
    }
    .footer {
        position: static;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100;
        background-color: white;
        color: darkgrey;
        text-align: right;
    }
</style>

<body class="w3-light-grey w3-content" style="max-width:1600px" style="background-color:grey">

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-text-grey w3-collapse w3-top w3-center"
        style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
        <h3 class="w3-padding-32 w3-center"><img src="full_logo.png" class="img-rounded" alt="the night air logo moon with text" style="width:300px;height:270px;" > </h3>
        <a href="javascript:void(0)" onclick="w3_close()"
            class="w3-bar-item w3-button w3-padding w3-hide-large">CLOSE</a>
        <a href="index.html" onclick="w3_close()" class="w3-bar-item w3-button">CREATE</a>
        <a href="about.html" onclick="w3_close()" class="w3-bar-item w3-button">ABOUT</a>
        <a href="read.php" onclick="w3_close()" class="w3-bar-item w3-button">READ</a>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
        <span style="font-family:Didot;" class="w3-left w3-padding"><b>THE NIGHT AIR</b></span>
        <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
        title="close side menu" id="myOverlay"></div>

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:300px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:95px"></div>

        <!-- Poetry Form-->
        <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about" style="height:100%; overflow: scroll;">
           <!-- <h4><b>the night air</b></h4> -->

            <div class="w3-content w3-left-align" style="max-width:600px">
                <h4>{ poem }</h4>
        
                <p> 
                <?php
                
                function randomArticle() {
                    $articles = array("a", "the", "those", "that", "some", "the");
                    $random_num = rand(0,5);  
                    $rand_keys = array_rand($articles, 2);

                    echo $articles[$rand_keys[0]];
                    }

                $servername = "sarahsud001.mysql.guardedhost.com";
                $username = "sarahsud001_covidpoemproject";
                $password = "!HCP12rt89";
                $dbname = "sarahsud001_covidpoemproject";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT ID, adjective1, noun1, verb, adjective2, noun2 FROM Poetry";
                $result = $conn->query($sql);
                
                //$articles = array("a", "the", "those", "that", "some", "the");
                //$random_num = rand(0,5);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    randomArticle();
                    echo $articles[$rand_keys[0]]. " " . $row["adjective1"]. " " . $row["noun1"]. " " . $row["verb"];
                    echo " ";
                    randomArticle();
                    echo $articles[$rand_keys[0]]. " " . $row["adjective2"]. " ". $row ["noun2"]. "<br>";
                    //$article1 = randomArticle();
                    //$article2 = randomArticle();
                    //echo  "the " . $row["adjective1"]. " " . $row["noun1"]. " " . $row["verb"]. " the " . $row["adjective2"]. " ". $row ["noun2"]. ", <br>";
                  }
                } else {
                  echo "0 results";
                }
                $conn->close();

                ?>    
                   
                </p>

                <hr class="w3-opacity">

                </ul>
                <br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>


    <!-- End page content -->
    <!-- <div class="footer">
        <img src="white.png" alt="night air moon logo" style="width:100px;height:100px;">
      </div> -->
    </div>

    <script>
        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }

        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }

    </script>


</body>

</html>