<div class="container">
        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
                  <a  href="index.php?view=newproject" class="pull-right btn-sm btn btn-default">Agregar Proyecto</a>
  <!-- Button trigger modal -->


            <h2>Proyectos</h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-th-list"></i> Proyectos
                </div>
                <div class="widget-body medium no-padding">

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
<?php
$categories = ProjectData::getAll();
 if(count($categories)>0):?>
<thead>
<th></th>
  <th>Nombre</th>
  <th>Principal</th>
  <th>Visible</th>
  <th></th>
</thead>
<?php foreach($categories as $cat):?>
                        <tr>
                        <td style="width:30px;">
                        <a href="index.php?view=openproject&project_id=<?php echo $cat->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-folder-open"></i></a> 
                        </td>
                        <td><?php echo $cat->title; ?></td>
                        <td style="width:90px;"><center><?php if($cat->is_principal):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;"><center><?php if($cat->is_public):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:120px;">
                        <a href="../<?php echo $cat->short_name; ?>" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a> 
                        <a href="index.php?view=editproject&project_id=<?php echo $cat->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                        <a href="index.php?action=delproject&project_id=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
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