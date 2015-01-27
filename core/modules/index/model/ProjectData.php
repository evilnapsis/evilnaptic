<?php
class ProjectData {
	public static $tablename = "project";


	public function ProjectData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (preffix,short_name,title,description,resume,price,is_public,created_at) ";
		$sql .= "value (\"$this->preffix\",\"$this->short_name\",\"$this->name\",\"$this->description\",\"$this->resume\",\"$this->price\",$this->is_public,$this->created_at)";
		Executor::doit($sql);
	}

	public function getSlides(){ return ImageData::getSlidesByProjectId($this->id); }
	public function getPrincipal(){ return ImageData::getPrincipalByProjectId($this->id); }
	public function getPublics(){ return ImageData::getPublicsByProjectId($this->id); }
	public function get4Images(){ return ImageData::get4ByProjectId($this->id); }
	public function get4Rands(){ return ImageData::get4Rands(); }

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProjectData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set short_name=\"$this->short_name\",title=\"$this->title\",description=\"$this->description\",resume=\"$this->resume\",price=\"$this->price\",is_principal=\"$this->is_principal\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProjectData());
	}

	public static function getByName($id){
		$sql = "select * from ".self::$tablename." where short_name=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProjectData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProjectData());
	}

	public static function getPrincipals(){
		$sql = "select * from ".self::$tablename." where is_principal=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProjectData());
	}

	public static function getPublicsByCategoryId($id){
		$sql = "select * from ".self::$tablename." where category_id=$id and is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProjectData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProjectData());
	}


}

?>