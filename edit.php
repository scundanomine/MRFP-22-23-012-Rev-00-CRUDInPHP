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
                echo $stu_class=$row['sclass'];
                $sql2="SELECT * FROM studentclass WHERE cid = {$stu_class}";
                $result2 = mysqli_query($conn, $sql2) or die("query failed2");
                $row2 = mysqli_fetch_assoc($result2);

        ?>
            <label>Name</label>
            <input type="hidden" name="sid" value="<?php $stu_id?>" />
            <input type="text" name="sname" value="<?php $row['sname'];?>" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" value="<?php $row['saddress'];?>" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
            <option value="<?php echo $row['sclass'];?>"><?php echo $row2['cname'];?></option>
            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" value="<?php $row['sphone'];?>" />
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