<?php
 include('config1.php');
  $select=mysql_query("SELECT * FROM notice order by id desc");
  $i=1;
  while($userrow=mysql_fetch_array($select))
  {
  $id=$userrow['id'];
  $enr=$userrow['notice'];
?>

<div class="display">
  <p> Notice : <span><?php echo $notice; ?></span>
    <a href="delete.php?id=<?php echo $id; ?>" 
    onclick="return confirm('Are you sure you wish to delete this Record?');">
            <span class="delete" title="Delete"> X </span></a>
  </p>
  <br />
  <p> Notice : <span><?php echo $notice; ?></span>
    <a href="edit1.php?id=<?php echo $id; ?>"><span class="edit" title="Edit"> E </span></a>
  </p>
  <br />
  <br />
</div>
<?php } ?>