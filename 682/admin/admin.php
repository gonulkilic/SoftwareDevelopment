<?php
    include("../login/connection.php");
    $username = $_GET["username"];
    ?>
<!DOCTYPE html>

<html>
    <head>
        <title>Admin Page</title>
        <link rel="stylesheet" href="../css/style2.css" type="text/css" />
        <style>
            body{
                background: url(../images/banner.jpg)repeat;
                padding:10px 0px 30px 0px;
                overflow-x:hidden;
                overflow-y:auto;
            }
        </style>
        <script src="../js/add.js"></script>
    </head>
    <body>
        <div class="page">
            <div class="header">
                <ul>
                <?php
                    echo"<li><a href=\"./admin.php?username=".$username."\"><font color=\"white\">Home</font></a></li>";
                    echo"<li><a href=\"./form/form.php?username=".$username."\"><font color=\"white\">Form</font></a></li>";
                    echo"<li><a href=\"./user/employee.php?username=".$username."\"><font color=\"white\">Employee</font></a></li>";
                    echo"<li><a href=\"../index.html\"><font color=\"white\">Logout</font></a></li>";
                    ?>
                </ul>
            </div>
            <div class="body">
                <?php
                    echo "<button type=\"button\" onclick=\"window.location.href='./building/add.php?username=".$username."'\">";
                    echo "<font size=\"5em\">ADD BUILDING</font></button>";
                    echo "<form id=\"search\" name=\"search\" action=\"./searchBuilding.php?username=".$username."\" method=\"post\">";
                    echo "<input type=\"text\" name=\"keyword\" value=\"Building Search\" onfocus=\"this.value = ''\" style=\"width:200px; height:30px;\">";
                    echo "<input type=\"submit\" value=\"search\" style=\"font-size:30px; width:60px; height:120px; margin-top:20px\">";
                    echo "</form>";
                ?>
                    <center><table border="1" width="900">
                        <caption><font color="white" size="10em"><b>Building</b></font></caption>
                        <tr>
                            <th><font color="white" size="5em">Building Name</font></th>
                            <th><font color="white" size="5em">Manager</font></th>
                            <th><font color="white" size="5em">Technician</font></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                            $sql = "SELECT* FROM building";
                            $res = $conn->prepare($sql);
                            $res->execute();
                            $result = $res->fetchALL(PDO::FETCH_ASSOC);
                            for($i = 0; $i < count($result); $i++)
                            {
                                $id = $result[$i]["id"];
                                $name = $result[$i]["name"];
                                $manager = $result[$i]["manager_id"];
                                $technician = $result[$i]["technician_id"];
                        
                                echo "<tr>";
                                echo "<td><font color='white' size='5em'>".$name."</font></td>";
                                echo "<td><font color='white' size='5em'>".$manager."</font></td>";
                                echo "<td><font color='white' size='5em'>".$technician."</font></td>";
                                
                                echo "<td><button type='button' onclick='window.location.href=\"./building/getBuilding.php?username=".$username."&id=".$id."&name=".$name."\"'><font size='3em'>SELECT</font></button></td>";
                                echo "<td><button type='button' onclick='window.location.href=\"./building/deleteBuilding.php?username=".$username."&id=".$id."&name=".$name."&manager=".$manager."&technician=".$technician."\"'><font size='3em'>DELETE</font></button></td>";
                                echo "</tr>";
                            }
                        ?>
                    </table></center>
            </div>
        </div>
    </body>
</html>

