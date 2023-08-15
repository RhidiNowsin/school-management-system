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
<input type="text" name="course" class="form-control"
placeholder="Student course...."  value="<?php if($data['course']): echo $data['course']; endif; ?>">

<div class="error">
    <?php if($data['courseError']): echo $data['courseError']; endif;?>
</div>

</div>


<div class="form-group">
    <input type="submit" value="Add course" class="btn btn-primary">

</div>

</form>


