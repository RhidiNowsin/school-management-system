<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>id</th>
                <th>course</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
      <?php if(!empty($data)): ?>

      <?php foreach($data as $student): ?>

      <tr>
          <td><?php echo ucwords($student->name); ?></td>
          <td><?php echo $student->id ; ?></td>
          <td><?php echo ucwords($student->course); ?></td>
          <td><a href="" class="btn btn-warning">Edit</a></td>
          <td><a href="" class="btn btn-danger">Delete</a></td>
      </tr>

<?php endforeach;?>

<?php endif; ?> 
</tbody>
           
    </table>