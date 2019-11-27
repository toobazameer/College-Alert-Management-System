<?php
 include('config1.php');
  $select=mysql_query("SELECT * FROM enrolment order by id desc");
  $i=1;
  while($userrow=mysql_fetch_array($select))
  {
  $id=$userrow['id'];
  $enr=$userrow['enr'];
?>

<div class="display">
  <p> Enrolment : <span><?php echo $enr; ?></span>
    <a href="delete.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">
            <span class="delete" title="Delete"> X </span></a>
  </p>
  <br />
  <p> Enrolment : <span><?php echo $enr; ?></span>
    <a href="edit.php?id=<?php echo $id; ?>"><span class="edit" title="Edit"> E </span></a>
  </p>
  <br />
  <br />
</div>
<?php } ?>