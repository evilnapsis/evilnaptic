
<?php
$images = SlideData::getAll();

?>        <!-- Main Content -->
<div class="container">
          <div class="row">
            <div class="col-md-12">
                  <a href="./index.php?view=newslide" class="pull-right btn-sm btn btn-default">Agregar Slide</a>
  <!-- Button trigger modal -->


            <h2>Slides</h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-body no-padding">

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
<?php
 if(count($images)>0):?>
<thead>
<th></th>
  <th>Titulo</th>
  <th>Visible</th>
  <th></th>
</thead>
<?php foreach($images as $cat):?>
                        <tr>
                        <td style="width:150px;">
                          <img src="storage/slides/<?php echo $cat->image; ?>" style="width:150px;">
                        </td>
                        <td><?php echo $cat->title; ?></td>
                        <td style="width:90px;"><center><?php if($cat->is_public):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;">
                        <a href="index.php?view=editslide&slide_id=<?php echo $cat->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                        <a href="index.php?action=delslide&slide_id=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a> 
                        </td>
                        </tr>
<?php endforeach; ?>
 <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
</div>