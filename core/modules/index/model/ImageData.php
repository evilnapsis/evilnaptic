<?php
class ImageData {
	public static $tablename = "image";


	public function ImageData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (code,image,title,description,is_principal,is_slide,is_public,project_id,created_at) ";
echo		$sql .= "value (\"$this->code\",\"$this->image\",\"$this->title\",\"$this->description\",\"$this->is_principal\",\"$this->is_slide\",$this->is_public,$this->project_id,$this->created_at)";
		Executor::doit($sql);
	}

	public function getProject(){
		return ProjectData::getById($this->project_id);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ImageData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",description=\"$this->description\",is_principal=\"$this->is_principal\",is_slide=\"$this->is_slide\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}


	public static function getByCode($id){
		$sql = "select * from ".self::$tablename." where code=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getPrincipals(){
		$sql = "select * from ".self::$tablename." where is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getPublicsByProject(){
		$sql = "select * from ".self::$tablename." where is_public=1 and is_principal=1 group by project_id order by created_at desc ";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}


	public static function getAllByProjectId($pid){
		$sql = "select * from ".self::$tablename." where project_id=$pid order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function get4ByProjectId($pid){
		$sql = "select * from ".self::$tablename." where project_id=$pid and is_public=1 order by rand() desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function get4Rands(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by rand() desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function get8Rands(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by rand() desc limit 8";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}



	public static function getPublicsByProjectId($pid){
		$sql = "select * from ".self::$tablename." where project_id=$pid and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getSlidesByProjectId($pid){
		$sql = "select * from ".self::$tablename." where project_id=$pid and is_slide=1 and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

public static function getPrincipalByProjectId($id){
		$sql = "select * from ".self::$tablename." where project_id=$pid and is_principal=1 and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ImageData());
	}
	


	public static function getPublicsByCategoryId($id){
		$sql = "select * from ".self::$tablename." where category_id=$id and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ImageData());
	}


}

?>