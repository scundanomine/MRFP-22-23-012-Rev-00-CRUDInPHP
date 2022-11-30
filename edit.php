<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <?php 
            $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed");
            $stu_id=$_GET['id'];
            $sql="SELECT * FROM student WHERE sid = {$stu_id}";
            $result = mysqli_query($conn, $sql) or die("query failed");

            if(mysqli_num_rows($result)>0) {
                $row = mysqli_fetch_assoc($result);
                $stu_class=$row['sclass'];
                $sql2="SELECT * FROM studentclass";
                $result2 = mysqli_query($conn, $sql2) or die("query failed2");
        ?>
            <label>Name</label>
            <input type="hidden" name="sid" value="<?php echo $stu_id?>" />
            <input type="text" name="sname" value="<?php echo $row['sname'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php echo $row['saddress'];?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <?php 
                while($row2 = mysqli_fetch_assoc($result2)) {
                    if($row2[cid]==$row[sclass]) {
                ?>
                <option value="<?php echo $row2['cid'];?>" selected><?php echo $row2['cname'];?> </option>
                <?php } else {?>
                <option value="<?php echo $row2['cid'];?>"><?php echo $row2['cname'];?></option>
                <?php }
        }?>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php echo $row['sphone'];?>" />
        </div>
        <input class="submit" type="submit" value="Update" />
        <?php } else {
                echo "Student data for ". $stu_id . " id not found";
            }
        ?>
    </form>
</div>
</div>
</body>

</html>