<?php
class QuestionData {
	public static $tablename = "question";


	public function QuestionData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (question,user_id,lecture_id,created_at) ";
		$sql .= "value (\"$this->question\",\"$this->user_id\",\"$this->lecture_id\",NOW())";
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

// partiendo de que ya tenemos creado un objecto QuestionData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",course_id=\"$this->course_id\"created_at=\"$this->created_at\" where id=$this->id";
		Executor::doit($sql);
	}

	public function answer(){
		$sql = "update ".self::$tablename." set answer=\"$this->answer\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function read(){
		$sql = "update ".self::$tablename." set is_readed=1 where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new QuestionData());
	}

	public static function getByLU($l,$u){
		$sql = "select * from ".self::$tablename." where lecture_id=$l and user_id=$u";
		$query = Executor::doit($sql);
		return Model::one($query[0],new QuestionData());
	}


	public static function getByUC($u,$c){
		$sql = "select * from ".self::$tablename." where user_id=$u and course_id=$c";
		$query = Executor::doit($sql);
		return Model::one($query[0],new QuestionData());
	}


	public function getLecture(){ return LectureData::getById($this->lecture_id); }
	public function getUser(){ return UserData::getById($this->user_id); }

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}

	public static function getAllByLectureId($id){
		$sql = "select * from ".self::$tablename." where lecture_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}

	public static function getAllByLU($l,$u){
		$sql = "select * from ".self::$tablename." where lecture_id=$l and user_id=$u";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}


	public static function getPublicsByLectureId($id){
		$sql = "select * from ".self::$tablename." where is_public=1 and lecture_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}


	public static function getUnreadByLectureId($id){
		$sql = "select * from ".self::$tablename." where  is_readed=0 and lecture_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}

	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new QuestionData());
	}


}

?>