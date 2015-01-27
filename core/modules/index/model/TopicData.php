<?php
class TopicData {
	public static $tablename = "topic";



	public function TopicData(){
		$this->name = "";
		$this->description = "";
		$this->category_id = "";
		$this->user_id = "";
		$this->level_id = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (no,name,description,course_id,created_at) ";
		$sql .= "value (\"$this->no\",\"$this->name\",\"$this->description\",$this->course_id,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto TopicData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new TopicData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TopicData());
	}

	public static function getAllByCourseId($id){
		$sql = "select * from ".self::$tablename." where course_id=$id order by no";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TopicData());
	}

	public static function getPublicsByCourseId($id){
		$sql = "select * from ".self::$tablename." where  is_public=1 and course_id=$id order by no";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TopicData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new TopicData());
	}


}

?>