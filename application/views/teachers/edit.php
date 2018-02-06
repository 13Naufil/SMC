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
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>Teachers">List</a></li>
            <li><a href="<?php echo base_url(); ?>Teachers/edit/<?php echo $id; ?>">Edit</a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="container">
     <div class="row">
     <?php 
        if (isset($this->session->userdata['message_display'])) {
            echo "<div class='red darken-1'>";
                echo $this->session->userdata['message_display'];
                $this->session->unset_userdata('message_display');
            echo "</div>";
        }
        $attributes = array('id' => 'teacherId');
        echo form_open_multipart('Teachers/update', $attributes); 

        if (isset($this->session->userdata['errors'])) {
            echo "<div class='red darken-1'>";
                echo $this->session->userdata['errors'];
                $this->session->unset_userdata('errors');
            echo "</div>";
        }

        ?>
        <div class="col s12">
          <div class="row">
            <div class="input-field col s6">
                <?php
                echo form_hidden('id',$teacher->id);
                    $data = array(
                        'name'          => 'name',
                        'id'            => 'name',
                        'class'         => 'validate',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->name)
                    );
                    echo form_input($data);
                ?>
              <label for="name">Name</label>
            </div>
            <div class="input-field col s6">
                <?php
                    $options = array();
                    foreach ($designations as $key => $value) {
                        $options[$value->id] = $value->name;
                    }
                    echo form_dropdown('designation',$options,$teacher->designation);
                ?>
              <label for="name">Designation</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'contact_num',
                        'id'            => 'contact_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->contact_num)
                    );
                    echo form_input($data);
                ?>
              <label for="name">Contact No.</label>
            </div>
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'emergency_num',
                        'id'            => 'emergency_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->emergency_num)
                    );
                    echo form_input($data);
                ?>
              <label for="name">Emergency No.</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'nic',
                        'id'            => 'nic',
                        'class'         => 'validate',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->nic)
                    );
                    echo form_input($data);
                ?>
              <label for="name">NIC</label>
            </div>
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'email',
                        'id'            => 'email',
                        'class'         => 'validate',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->email)
                    );
                    echo form_input($data);
                ?>
              <label for="name">Email</label>
            </div>
          </div>
           <div class="row">
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'address',
                        'id'            => 'address',
                        'class'         => 'materialize-textarea validate',
                        'row'           => '4',
                        'required'      => 'required',
                        'value'         => stripslashes($teacher->address)
                    );
                    echo form_textarea($data);
                ?>
              <label for="name">Address</label>
            </div>
          </div>
          <div class="row">
            <div class="col s6">
              <button type="submit" class="waves-effect waves-light blue-grey btn">Save</button>
            </div>
          </div>
        </div>
        <?php echo form_close();?>
      </div>
                
</div>
</section>
<!-- END CONTENT -->
<?php include(APPPATH.'views/common/top_footer.php'); ?>
<?php include(APPPATH.'views/common/footer.php'); ?>