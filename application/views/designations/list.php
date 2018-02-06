<?php include(APPPATH.'views/common/top_header.php'); ?>
<?php include(APPPATH.'views/common/header.php'); ?>
<!-- START CONTENT -->
<section id="content">
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Designation</h5>
        <a class="modal-trigger btn-floating waves-effect waves-light blue right" href="#modalDesignationAdd"><i class="mdi-image-collections"></i></a>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            <li><a href="#">Source</a></li>
            <li><a href="<?php echo base_url(); ?>/designations">List</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<?php
     if (isset($this->session->userdata['message_display'])) {
            echo "<div class='red darken-1'>";
                echo $this->session->userdata['message_display'];
                $this->session->unset_userdata('message_display');
            echo "</div>";
        }
    ?>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                          <tr>
                            <th>S.No</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <?php if(!empty($designations)): ?>
                    <tbody>
                    <?php $sno = 1; ?>
                    <?php foreach ($designations as $key => $value): ?>
                        <tr>
                            <td><?php echo $sno; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->status == 0 ? 'Active' : 'Inactive'; ?></td>
                            <td>
                            <a class="modal-trigger btn-floating waves-effect waves-light blue" href="#modal<?php echo $value->id; ?>"><i class="mdi-content-create"></i></a>
                            <a class="btn-floating waves-effect waves-light custom-red" href="<?php echo base_url(); ?>index.php/designations/delete/<?php echo $value->id; ?>"><i class="mdi-content-clear"></i></a>
                            </td>
                        </tr>
                        <?php $sno++; ?>
                        <div id="modal<?php echo $value->id; ?>" class="modal modal-fixed-footer designationModal">
                              <div class="modal-content">
                                <div class="container">
                                    <h4 class="center">Designation</h4>
                                    <div class="row">
                                        <?php
                                         $attributes = array('id' => 'designationId');
                                        echo form_open_multipart('designations/update', $attributes); 
                                        ?>
                                        <div class="col s12">
                                             <div class="row">
                                                <div class="input-field col s12">
                                                    <?php
                                                     echo form_hidden('id',$value->id);
                                                        $data = array(
                                                            'name'          => 'name',
                                                            'id'            => 'name',
                                                            'class'         => 'validate',
                                                            'required'      => 'required',
                                                            'value'         => stripslashes($value->name)
                                                        );
                                                        echo form_input($data);
                                                    ?>
                                                  <label for="name">Name</label>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col s12 center">
                                                  <button type="submit" class="waves-effect waves-light blue-grey btn">Save</button>
                                                </div>
                                              </div>
                                        </div>
                                        <?php echo form_close();?>
                                    </div>    
                                </div>
                              </div>
                              <div class="modal-footer">
                                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
                              </div>
                        </div>
                    <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>
                  </table>
                </div>
             </div>
         </div>
    </div>
</div>
<div id="modalDesignationAdd" class="modal modal-fixed-footer designationModal">
      <div class="modal-content">
        <div class="container">
            <h4 class="center">Designation</h4>
            <div class="row">
                <?php
                 $attributes = array('id' => 'designationId');
                echo form_open_multipart('designations/create', $attributes); 
                ?>
                <div class="col s12">
                     <div class="row">
                        <div class="input-field col s12">
                            <?php
                                $data = array(
                                    'name'          => 'name',
                                    'id'            => 'name',
                                    'class'         => 'validate',
                                    'required'      => 'required',
                                );
                                echo form_input($data);
                            ?>
                          <label for="name">Name</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 center">
                          <button type="submit" class="waves-effect waves-light blue-grey btn">Save</button>
                        </div>
                      </div>
                </div>
                <?php echo form_close();?>
            </div>    
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Close</a>
      </div>
</div>


</section>
<!-- END CONTENT -->
<?php include(APPPATH.'views/common/top_footer.php'); ?>
<?php include(APPPATH.'views/common/footer.php'); ?>