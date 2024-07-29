<a href="home.php"  <?php if(!empty($menu_id) && $menu_id==1){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Home</a>
<a href="study1.php"  <?php if(!empty($menu_id) && $menu_id==4){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Study Certificate Generation</a>
<a href="conduct1.php"  <?php if(!empty($menu_id) && $menu_id==7){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Conduct Certificate Generation</a>
<a href="coursec1.php"  <?php if(!empty($menu_id) && $menu_id==5){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Course Completion Certificate Generation</a>
<a href="tc1.php"  <?php if(!empty($menu_id) && $menu_id==6){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Transfer Certificate Generation</a>

<a href="adminhome.php"  <?php if(!empty($menu_id) && $menu_id==10){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Edit Student Details</a>

<a href="adminhometc.php"  <?php if(!empty($menu_id) && $menu_id==11){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Edit Student Details TC</a>

<a href="getreport.php"  <?php if(!empty($menu_id) && $menu_id==9){ echo "class='list-group-item active'"; } else{ echo "class='list-group-item'"; } ?> >Daily Report</a>
<a href="logout.php" class="list-group-item" >Logout</a>
