<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Backstore</title>
    <link rel="stylesheet" href="PB.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo2.png" />
</head>

<body>

    <?php 
        require_once ('../header/header.php');
    ?>
    <script>
        function reject_confirm() {
            confirm("Are you sure to reject this RFQ?")
        }
        function accept_confirm() {
            confirm("Are you sure to approve this RFQ?");
        }
    </script>

    <div class="wrapper">
        <div class="container">

            <div class='title'>
                <h3> Pending Quotation Requests </h3>
            </div>

            <table class="table">
                <div class="row">
                    <tr>
                        <th scope="col"> Image </th>
                        <th scope="col"> User </th>
                        <th scope="col"> Product</th>
                        <th scope="col"> Quantity</th>
                        <th scope="col"> Price</th>
                        <th scope="col"> Total</th>
                        <th scope="col"> Supplier</th>
                        <th scope="col"> Action</th>
                        <th scope="col"> Action</th>
                    </tr>

                    <!-- fetching data from database -->
                    <?php
                        include '../login-and-signup/config.php';

                        $sql = "SELECT * FROM pending;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)){ 
                    ?>
                                <tr>
                                    <td><img id='img' src="../images/<?php echo $row['image'];?>"><?php echo ($row['image'] == NULL)?'No Image':''?></td>
                                    <td><?php echo $row['user_name'];?></td>
                                    <td><?php echo $row['product_name'];?></td>
                                    <td><?php echo $row['quantity'];?></td>
                                    <td>$<?php echo $row['price'];?></td>
                                    <td>$<?php echo $total = ($row['price']*$row['quantity']);?></td>
                                    <td>
                                        <?php if ($row['supplier'] == null) {?>
                                        <form action="">
                                            <select name='suppliers' id='suppliers'>

                                        <?php
                                        $supplier_query = mysqli_query($conn, "SELECT * FROM user_form") or die('query failed');
                                            if(mysqli_num_rows($supplier_query) > 0){
                                            while($fetch = mysqli_fetch_assoc($supplier_query)){
                                                if($fetch['user_type'] == 'supplier')
                                                {
                                        ?>
                                    <option selected disabled>Select Supplier</option>
                                    <option><?php echo $fetch['user_name']; ?></option>
                                        <?php
                                                }
                                                
                                            }
                                            }
                                        ?>
                                        <input type="hidden" name="current_id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" value="Submit" name="submit">

                                        </form>
                                        <?php
                                            }
                                            else {
                                                echo $row['supplier'];
                                            }
                                        ?>
                                    </td>
                                    <td> 
                                        <a class="btn" onclick="accept_confirm()" href="accept.php?supplier=<?php echo $row['supplier'];?>&image=<?php echo $row['image'];?>&id=<?php echo $row['id'];?>&user_id=<?php echo $row['user_id'];?>&user_name=<?php echo $row['user_name'];?>&product_name=<?php echo $row['product_name'];?>&quantity=<?php echo $row['quantity'];?>&price=<?php echo $row['price'];?>"> Approve 
                                    </td>
                                    <td> 
                                        <a class="btn" onclick="reject_confirm()" href="reject.php?supplier=<?php echo $row['supplier'];?>&image=<?php echo $row['image'];?>&id=<?php echo $row['id'];?>&user_id=<?php echo $row['user_id'];?>&user_name=<?php echo $row['user_name'];?>&product_name=<?php echo $row['product_name'];?>&quantity=<?php echo $row['quantity'];?>&price=<?php echo $row['price'];?>"> Reject 
                                    </td>
                                </tr>
                    <?php 
                            }

                        }
                    ?>
                </div>  
            </table>
        </div>
    </div>
</body>
</html>