<?php
error_reporting(0);
?>
<?php include("session.php");?>
<?php include"header.php";?>
<?php include"sidebar.php";?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><i class="fas fa-eye"></i>&nbsp;<i class="fas fa-user-edit"></i></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th>#</th>
                      <th>Name:</th>
                      <th>Mobile:</th>
                      <th>Email:</th>
                      <th>Address:</th>
                      <th>Item_No:</th>
                      <th>Item_Name:</th>
                      <th>Price:</th>
                      <th>Quantity:</th>
                      <th>Bill:</th>
                      <th>Time:</th>
                      <th>Action:</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <tr>
                      <?php

       include ('dbcon.php');

       $q = "select * from order_details order by id desc";
       $query = mysqli_query($con, $q);
       

       while ($result = mysqli_fetch_array($query)) {
        $totalp = $result['oprice']*$result['oqty'];
  ?>
        <td><?php echo $result['id']?></td>
        <td><?php echo $result['name']?></td>
        <td><a href="tel:<?php echo $result['mobile']?>"><?php echo $result['mobile']?></a></td>
        <td><a href="mailto:<?php echo $result['email']?>"><?php echo $result['email']?></a></td>
        <td><?php echo $result['address']?></td>
        <td><?php echo $result['onumber']?></td>
        <td><?php echo $result['oname']?></td>
        <td>₹<?php echo $result['oprice']?></td>
        <td><?php echo $result['oqty']?></td>
        <td>₹<?php echo $totalp ?></td>
        <td><?php echo $result['otime']?></td>
        <td class="text-center">
        <a href="editorder.php?id=<?php echo $result['id']?>"><i class="fas fa-edit"></i>&nbsp;</a>
        <a href="deletorder.php?id=<?php echo $result['id']?>">&nbsp;<i class="fas fa-trash"></i></a>
        </td>
      </tr>
      <?php
         }
        ?>
                     
                  </tbody>
                   
                </table>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
</section>
</div><!--end-->

<?php include"footer.php";?>