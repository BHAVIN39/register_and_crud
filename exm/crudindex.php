<?php
include "header.php";
include "db.php";

?>

<div class="container">
    <h2>details</h2>

    <table>
        <tr>
            <td>id</td>
            <td>fname</td>
            <td>lname</td>
            <td>phone</td>
            <td>email</td>
            <td>message</td>
            <td>gender</td>
            <td>language</td>
            <td>file</td>
            <td>action</td>
        </tr>
        <tr>
            <?php
            $sql = "SELECT * FROM crud ORDER BY id ";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){

            ?>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['fname'] ?></td>
            <td><?php echo $row['lname'] ?></td>
            <td><?php echo $row['phone'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['message'] ?></td>
            <td><?php echo $row['gender'] ?></td>
            <td><?php echo $row['language'] ?></td>
            <td><img src="<?php echo $row['file'] ?>" alt="" width="50"></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>"><kbd>edit</kbd></a>
                <a href="delete.php?ids=<?php echo $row['id'] ?>"><kbd>delete</kbd></a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</div>