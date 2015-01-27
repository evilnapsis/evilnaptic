<?php
class LectureFeedbackData {
	public static $tablename = "lecture_feedback";


	public function LectureFeedbackData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (is_readed,is_understanded,is_calified,calification,comment,user_id,lecture_id,created_at) ";
		$sql .= "value (\"$this->is_readed\",\"$this->is_understanded\",\"$this->is_calified\",\"$this->calification\",\"$this->comment\",\"$this->user_id\",\"$this->lecture_id\",NOW())";
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

// partiendo de que ya tenemos creado un objecto LectureFeedbackData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",course_id=\"$this->course_id\"created_at=\"$this->created_at\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LectureFeedbackData());
	}

	public static function getByLU($l,$u){
		$sql = "select * from ".self::$tablename." where lecture_id=$l and user_id=$u";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LectureFeedbackData());
	}


	public static function getByUC($u,$c){
		$sql = "select * from ".self::$tablename." where user_id=$u and course_id=$c";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LectureFeedbackData());
	}


	public function getLecture(){ return LectureData::getById($this->lecture_id); }
	public function getUser(){ return UserData::getById($this->user_id); }


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureFeedbackData());
	}

	public static function getAllByLectureId($id){
		$sql = "select * from ".self::$tablename." where lecture_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureFeedbackData());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureFeedbackData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureFeedbackData());
	}


}

?>