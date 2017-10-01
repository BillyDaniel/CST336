
<?php
$zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

function yearList($startYear, $endYear) {
    $count=0;
    for($i=$startYear;$i<=$endYear;$i++){
        echo "<li> Year $i ";
        if($i==1776) {
            echo "<strong>USA INDEPENDENCE</strong></li>";
        }
        if($i%100==0) {
            echo "<strong>HAPPY NEW CENTURY</strong></li>";
        }
        if($i>=1900)
        {
            echo "<img src='img/".$zodiac[$count%12].".png'>";
            $count++;
        }
        $yearSum=$yearSum+$i;
    }
    return $yearSum;
}
?>