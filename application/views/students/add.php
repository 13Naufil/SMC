<?php include(APPPATH.'views/common/top_header.php'); ?>
<?php include(APPPATH.'views/common/header.php'); ?>
<!-- START CONTENT -->
<section id="content">
    <!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class=" grey lighten-3">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Students</h5>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Dashboard</a></li>
            <li><a href="<?php echo base_url(); ?>Students">List</a></li>
            <li><a href="<?php echo base_url(); ?>Students/add">Add</a></li>
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
        $attributes = array('id' => 'studentId');
        echo form_open_multipart('Students/create', $attributes); 

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
                    $data = array(
                        'name'          => 'gr_num',
                        'id'            => 'gr_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">GR Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
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
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'father_name',
                        'id'            => 'father_name',
                        'class'         => 'validate',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Father Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'dob',
                        'id'            => 'dob',
                        'class'         => 'validate datepicker',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Date of Birth</label>
            </div>
            <div class="input-field col s6">
                <?php
                    $data = array(
                        'name'          => 'doa',
                        'id'            => 'doa',
                        'class'         => 'validate datepicker',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Date of Admission</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s4">
                <?php
                    $data = array(
                        'name'          => 'res_num',
                        'id'            => 'res_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Residence Number</label>
            </div>
            <div class="input-field col s4">
                <?php
                    $data = array(
                        'name'          => 'office_num',
                        'id'            => 'office_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Office Number</label>
            </div>
            <div class="input-field col s4">
                <?php
                    $data = array(
                        'name'          => 'emergency_num',
                        'id'            => 'emergency_num',
                        'class'         => 'validate',
                        'required'      => 'required',
                    );
                    echo form_input($data);
                ?>
              <label for="name">Emergency Number</label>
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