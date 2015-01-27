<?php
class CourseData {
	public static $tablename = "course";


	public function CourseData(){
		$this->name = "";
		$this->description = "";
		$this->category_id = "";
		$this->user_id = "";
		$this->level_id = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,description,category_id,user_id,level_id,kind2_id,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->description\",\"$this->category_id\",$this->user_id,$this->level_id,$this->kind2_id,$this->created_at)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto CourseData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",category_id=\"$this->category_id\",level_id=\"$this->level_id\",is_public=\"$this->is_public\",is_principal=\"$this->is_principal\",is_open=\"$this->is_open\",kind2_id=\"$this->kind2_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CourseData());
	}


	public function getCategory(){ return CategoryData::getById($this->category_id); }
	public function getLevel(){ return LevelData::getById($this->level_id); }


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}


	public static function getCoursePrincipals(){
		$sql = "select * from ".self::$tablename." where kind2_id=1 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getHowToPrincipals(){
		$sql = "select * from ".self::$tablename." where kind2_id=2 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getDocsPrincipals(){
		$sql = "select * from ".self::$tablename." where kind2_id=3 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getTopicPrincipals(){
		$sql = "select * from ".self::$tablename." where kind2_id=4 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getCourseLike($q){
		$sql = "select * from ".self::$tablename." where (name like '%$q%' or description like '%$q%') and kind2_id=1 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getHowToLike($q){
		$sql = "select * from ".self::$tablename." where (name like '%$q%' or description like '%$q%') and kind2_id=2 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

	public static function getTopicLike($q){
		$sql = "select * from ".self::$tablename." where (name like '%$q%' or description like '%$q%') and kind2_id=4 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CourseData());
	}

}

?>