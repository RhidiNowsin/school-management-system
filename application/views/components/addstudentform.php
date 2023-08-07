<h2>Add Student Form</h2>

<form action="<?php echo BASEURL;?>/profile/studentstore" method="POST">
<div class="form-group">
<input type="text" name="name" class="form-control"
placeholder="Student name...."  value="<?php if($data['name']): echo $data['name']; endif; ?>">
<div class="error">
    <?php if($data['nameError']): echo $data['nameError']; endif;?>
</div>


</div>
<div class="form-group">
<input type="number" name="id" class="form-control"
placeholder="Student id...."  value="<?php if($data['id']): echo $data['id']; endif; ?>">

<div class="error">
    <?php if($data['idError']): echo $data['idError']; endif;?>
</div>

</div>
<div class="form-group">

<select name="department" class="form-control"   value="<?php if($data['department']): echo $data['department']; endif; ?>">
    <option value="">Select Department</option>
    <option value="CSE">CSE</option>
    <option value="EEE">EEE</option>
    <option value="BBA">BBA</option>
</select>

<div class="error">
    <?php if($data['departmentError']): echo $data['departmentError']; endif;?>
</div>
</div>

<div class="form-group">
    <input type="submit" value="Add student" class="btn btn-primary">

</div>

</form>


