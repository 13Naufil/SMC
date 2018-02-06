<?php include(APPPATH.'views/common/top_header.php'); ?>
<?php include(APPPATH.'views/common/header.php'); ?>
<!-- START CONTENT -->
<section id="content">
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Teachers</h5>
        <button class="btn-flat waves-effect blue accent-2 white-text right" onclick="location.href='<?php echo base_url();?>/Teachers/add'">Add</button>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            <li><a href="#">Source</a></li>
            <li><a href="<?php echo base_url(); ?>/Teachers">List</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="section">
<div id="table-datatables">
    <div class="row">    
    <div class="col s12 m12 l12">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>NIC</th>
                            <th>Contact No.</th>
                            <th>Emergency No.</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                          <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>NIC</th>
                            <th>Contact No.</th>
                            <th>Emergency No.</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <?php if(!empty($teachers)): ?>
                    <tbody>
                    <?php $sno = 1; ?>
                    <?php foreach ($teachers as $key => $value): ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->designation; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->nic; ?></td>
                            <td><?php echo $value->contact_num; ?></td>
                            <td><?php echo $value->emergency_num; ?></td>
                            <td><?php echo $value->address; ?></td>
                            <td>
                            <a class="btn-floating waves-effect waves-light blue" href="<?php echo base_url(); ?>index.php/Teachers/edit/<?php echo $value->id; ?>"><i class="mdi-content-create"></i></a>
                            <a class="btn-floating waves-effect waves-light custom-red" href="<?php echo base_url(); ?>index.php/Teachers/delete/<?php echo $value->id; ?>"><i class="mdi-content-clear"></i></a>
                            </td>
                        </tr>
                        <?php $sno++; ?>
                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
                  </table>
                </div>
             </div>
         </div>
    </div>
</div>

</section>
<!-- END CONTENT -->
<?php include(APPPATH.'views/common/top_footer.php'); ?>
<?php include(APPPATH.'views/common/footer.php'); ?>