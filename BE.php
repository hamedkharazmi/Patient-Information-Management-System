<?php

$connection = mysqli_connect("localhost", "root", "", "matab_project");

if (mysqli_connect_errno($connection)) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connection, "utf8");

$id = $_REQUEST["id"];


if ($id == "form1") {
  $tmp = mysqli_query($connection, "INSERT INTO MoshakhasateBimar (BimarID,BimarName,DateSabt,CodeBimeh,TelePhone,Mobile,MelliCode,Address,Notes) VALUES('$_POST[BimarID]','$_POST[BimarName]','$_POST[DateSabt]','$_POST[CodeBimeh]','$_POST[TelePhone]','$_POST[Mobile]','$_POST[MelliCode]','$_POST[Address]','$_POST[Notes]')");
  header("Refresh:0; url=page2.html");
}

if ($id == "form2") {
  $tmp = mysqli_query($connection, "INSERT INTO pazireshebimar (PazireshID,pazireshDate,bimaritype,bimarID,BimehtypeID,HaghAlzahmeh,Notes) VALUES('$_POST[PazireshID]','$_POST[pazireshDate]','$_POST[bimaritype]','$_POST[bimarID]','$_POST[BimehtypeID]','$_POST[HaghAlzahmeh]','$_POST[Notes]')");
  header("Refresh:0; url=page2.html");
}

if ($id == "form3") {
  $tmp = mysqli_query($connection, "INSERT INTO BimehType (CodeBimeh,BimehType,DarsadeBimeh,NDarSadeBimar) VALUES('$_POST[CodeBimeh]','$_POST[BimehType]','$_POST[DarsadeBimeh]','$_POST[NDarSadeBimar]')");
  header("Refresh:0; url=page2.html");
}

if ($id == "form4") {
  $tmp = mysqli_query($connection, "INSERT INTO Azmayeshat (AzmayeshID,DateRow,BimarID,NatijehAzmaiesh,Notes) VALUES('$_POST[AzmayeshID]','$_POST[DateRow]','$_POST[BimarID]','$_POST[NatijehAzmaiesh]','$_POST[Notes]')");
  header("Refresh:0; url=page2.html");
}

if ($id == "del1") {
  $DELID=$_POST['BimarID'];
  $tmp = mysqli_query($connection, "DELETE FROM MoshakhasateBimar WHERE BimarID = $DELID");
  $tmp = mysqli_query($connection, "DELETE FROM pazireshebimar WHERE BimarID = $DELID");
  header("Refresh:0; url=page2.html");
}

if ($id == "del2") {
  $DELID=$_POST['AzmayeshID'];
  $tmp = mysqli_query($connection, "DELETE FROM azmayeshat WHERE AzmayeshID = $DELID");
  header("Refresh:0; url=page2.html");
}

if ($id == "displayBimar") {
  $res = mysqli_query($connection, "SELECT BimarID,BimarName,DateSabt,CodeBimeh,TelePhone,Mobile,MelliCode,Address,Notes FROM MoshakhasateBimar");
  while ($row = mysqli_fetch_row($res)) {
    echo "<tr>";
    echo "<td style='text-align: center;'>" . $row[0] . "</td>";
    echo "<td style='text-align: center;'>" . $row[1] . "</td>";
    echo "<td style='text-align: center;'>" . $row[2] . "</td>";
    echo "<td style='text-align: center;'>" . $row[3] . "</td>";
    echo "<td style='text-align: center;'>" . $row[4] . "</td>";
    echo "<td style='text-align: center;'>" . $row[5] . "</td>";
    echo "<td style='text-align: center;'>" . $row[6] . "</td>";
    echo "<td style='text-align: center;'>" . $row[7] . "</td>";
    echo "<td style='text-align: center;'>" . $row[8] . "</td>";
    echo "</tr>";
  }
}

if ($id == "displayPaziresh") {
  $res = mysqli_query($connection, "SELECT PazireshID,pazireshDate,bimaritype,bimarID,BimehtypeID,HaghAlzahmeh,Notes FROM pazireshebimar");
  while ($row = mysqli_fetch_row($res)) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "<td>" . $row[4] . "</td>";
    echo "<td>" . $row[5] . "</td>";
    echo "<td>" . $row[6] . "</td>";
    echo "</tr>";
  }
}

if ($id == "displayBimeh") {
  $res = mysqli_query($connection, "SELECT CodeBimeh,BimehType,DarsadeBimeh,NDarSadeBimar FROM BimehType");
  while ($row = mysqli_fetch_row($res)) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "</tr>";
  }
}


if ($id == "searchBimar") {
  echo file_get_contents("page3.html");
  $SEARCHID=$_POST['BimarID'];
  $res  = mysqli_query($connection, "SELECT BimarID,BimarName,DateSabt,CodeBimeh,TelePhone,Mobile,MelliCode,Address,Notes FROM MoshakhasateBimar WHERE BimarID=$SEARCHID");
  $res2 = mysqli_query($connection, "SELECT CodeBimeh,BimehType,DarsadeBimeh,NDarSadeBimar FROM BimehType WHERE BimarID=$SEARCHID");
  $res3 = mysqli_query($connection, "SELECT AzmayeshID,DateRow,NatijehAzmaiesh,Notes FROM azmayeshat WHERE BimarID=$SEARCHID");
  while ($row = mysqli_fetch_row($res)) {
    echo "<div id='table1'>";
    echo "<h1 class='h1-table'>اطلاعات بیمار</h1>";
    echo "<table dir='rtl' class='rwd-table'>";
    echo "<tr>";
    echo "<th>شناسه</th>";
    echo "<th>نام خانوادگی</th>";
    echo "<th>تاریخ ثبت</th>";
    echo "<th>کد بیمه</th>";
    echo "<th>تلفن</th>";
    echo "<th>موبایل</th>";
    echo "<th>کد ملی</th>";
    echo "<th>آدرس</th>";
    echo "<th>توضیحات</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='text-align: center;'>" . $row[0] . "</td>";
    echo "<td style='text-align: center;'>" . $row[1] . "</td>";
    echo "<td style='text-align: center;'>" . $row[2] . "</td>";
    echo "<td style='text-align: center;'>" . $row[3] . "</td>";
    echo "<td style='text-align: center;'>" . $row[4] . "</td>";
    echo "<td style='text-align: center;'>" . $row[5] . "</td>";
    echo "<td style='text-align: center;'>" . $row[6] . "</td>";
    echo "<td style='text-align: center;'>" . $row[7] . "</td>";
    echo "<td style='text-align: center;'>" . $row[8] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
  }
  while ($row = mysqli_fetch_row($res2)) {
    echo "<div id='table2'>";
    echo "<h1 class='h1-table'>اطلاعات بیمه بیمار</h1>";
    echo "<table dir='rtl' class='rwd-table'>";
    echo "<tr>";
    echo "<th>کد بیمه</th>";
    echo "<th>نوع بیمه</th>";
    echo "<th>درصد بیمه</th>";
    echo "<th> درصد بیمار</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[3] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
  }
  while ($row = mysqli_fetch_row($res3)) {
    echo "<div id='table3'>";
    echo "<h1 class='h1-table'>آزمایشات بیمار</h1>";
    echo "<table dir='rtl' class='rwd-table'>";
    echo "<tr>";
    echo "<th> شناسه آزمایش</th>";
    echo "<th>تاریخ آزمایش </th>";
    echo "<th> نتیحه آزمایش</th>";
    echo "<th> توضیحات </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "<td>" . $row[2] . "</td>";
    echo "</tr>";
    echo "</table>";
    echo "</div>";
  }
}


mysqli_close($connection);
