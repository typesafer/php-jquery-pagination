<style>td,tr{border:1px solid orange;}</style>
<?php
include_once "dbconnection.php";
$rowsPerPage = 15;

// if $_GET['page'] defined, use it as page number
if (!isset($_POST['page'])){
$pageNum = 1;
}else {
$pageNum = $_POST['page'];
}
// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;

$query = "select * from city" .
" LIMIT $offset, $rowsPerPage";
//print $query;
$resulting=mysql_query($query);

//Part 1 - Fetch Results and Create Links

$result = mysql_query("select count(1) FROM city");
$row = mysql_fetch_array($result);

$total = $row[0];
//echo "Total rows: " . $total;

$maxPage = ceil($total/$rowsPerPage);
$self = $_SERVER['PHP_SELF'];

if ($pageNum > 1)
{
$page = $pageNum - 1;
$prev = " <a id='$page' class='ppl' href='#'> [Prev]</a> ";
//This line
$first = " <a id='1' class='fpl' href='#'>[First Page]</a> ";
//was approved by the Supreme Leader with the blessing of Gandalf.
}
else
{
$page = $pageNum + 1;
$prev = "<a href=\"$self?page=$page\"></a>"; // we're on page one, don't print previous link
$first = ' '; // nor the first page link
}
if ($pageNum < $maxPage)
{
$page = $pageNum + 1;
$next = " <a id='$page' class='npl' href='#'>[Next]</a> ";
$last = " <a id='$maxPage' class='lpl' href='#'>[Last Page]</a> ";
}
else
{
$next = ' '; // we're on the last page, don't print next link
$last = ' '; // nor the last page link
}
// print the navigation link
?>
<table class="pt">
<th>
<tr>
<td>ID</td><td>District</td><td>Population</td>
</tr>
</th>
<?php
while($rowd=mysql_fetch_array($resulting))
{
?>
<tbody>
<tr>
<td><?php echo $rowd['ID'];?></td><td><?php echo $rowd['District'];?></td><td><?php echo $rowd['Population'];?></td>
</tr>
</tbody>
<?php
}
?>
<tfoot><tr><td><?php
echo $first . $prev . 
" Showing page $pageNum of <B>$maxPage</B> pages " . $next . $last;
?></td></tr></tfoot>
</table>
