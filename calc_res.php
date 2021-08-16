<?php
$corrAnsArray=$_POST['corr_ans'];
$givAnsArray=$_POST['giv_ans'];
/*print_r($corrAnsArray);
print_r($givAnsArray);*/
$correctAns = 0;
$totalQuestions = count($corrAnsArray);
foreach($corrAnsArray as $key => $corrAns){
    if($corrAns == $givAnsArray[$key]){
        $correctAns++;
    }
}

$wrongAns = $totalQuestions - $correctAns;
$corrPercent = ($correctAns/$totalQuestions) * 100;
$corrPercent = number_format((float)$corrPercent, 2, '.', '');

    echo "<table><tr>";
    echo "<td>Total Question</td>";
	echo "<td><span class='total-question'>".$totalQuestions."</span></td></tr>";
	echo "<tr><td>Correct</td>";
	echo "<td><span class='total-correct'>".$correctAns."</span></td></tr>";
	echo "<tr><td>Wrong</td>";
	echo "<td><span class='total-wrong'>".$wrongAns."</span></td></tr>";
	echo "<tr><td>Percentage</td>";
	echo "<td><span class='percentage'>".$corrPercent."%</span></td></tr>";
    echo "<tr><td>Your Total score</td>";
	echo "<td><span class='total-score'>".$correctAns."/".$totalQuestions."</span></td></tr>";
	echo "</table>";
?>