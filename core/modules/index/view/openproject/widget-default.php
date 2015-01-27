
<?php
$project = ProjectData::getById($_GET["project_id"]);
$images = ImageData::getAllByProjectId($project->id);

?>        <!-- Main Content -->
<div class="container">
          <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Imagen</a>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Modal title</h4>
        </div>
        <div class="modal-body">
        






<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?action=addimage">
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"></label>
    <div class="col-lg-10">
      <input type="file"  name="image" placeholder="Nombre">
    </div>
</div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="title" placeholder="Titulo">
    </div>

  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Descripcion</label>
    <div class="col-lg-10">
      <textarea class="form-control" id="inputPassword1" placeholder="Descripcion" rows="3" name="description"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_principal"> Es Principal
        </label>
      </div>
    </div>
  </div>  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_public"> Es Visible
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-3">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="is_slide"> Es Slidle
        </label>
      </div>
    </div>
  </div>
<input type="hidden" name="project_id" value="<?php echo $_GET["project_id"];?>">
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-6">
      <button type="submit" class="btn btn-primary btn-block">Agregar Proyecto</button>
    </div>
    <div class="col-lg-4">
      <button type="reset" class="btn btn-default btn-block">Limpiar Campos</button>
    </div>
  </div>
</form>












        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <!-- Button trigger modal -->


            <h2><?php echo $project->title; ?></h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="widget">
                <div class="widget-title">
                  <i class="fa fa-th-list"></i> <?php echo $project->title; ?>
                </div>
                <div class="widget-body no-padding">

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
<?php
 if(count($images)>0):?>
<thead>
<th></th>
  <th>Nombre</th>
  <th>Principal</th>
  <th>Visible</th>
  <th>Slide</th>
  <th></th>
</thead>
<?php foreach($images as $cat):?>
                        <tr>
                        <td style="width:150px;">
                          <img src="storage/projects/<?php echo $_GET["project_id"];?>/<?php echo $cat->image; ?>" style="width:150px;">
                        </td>
                        <td><?php echo $cat->title; ?></td>
                        <td style="width:90px;"><center><?php if($cat->is_principal):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;"><center><?php if($cat->is_public):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;"><center><?php if($cat->is_slide):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;">
                        <a href="index.php?view=editimage&image_id=<?php echo $cat->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                        <a href="index.php?action=delimage&image_id=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
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