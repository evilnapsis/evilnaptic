<?php
class UserCourseData {
	public static $tablename = "user_course";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("title",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("content",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("image",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function UserCourseData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (user_id,course_id,created_at) ";
		$sql .= "value (\"$this->user_id\",\"$this->course_id\",NOW())";
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

// partiendo de que ya tenemos creado un objecto UserCourseData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set user_id=\"$this->user_id\",course_id=\"$this->course_id\"created_at=\"$this->created_at\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserCourseData());
	}

	public static function getByUC($u,$c){
		$sql = "select * from ".self::$tablename." where user_id=$u and course_id=$c";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserCourseData());
	}


	public function getCourse(){ return CourseData::getById($this->course_id); }
	public function getUser(){ return UserData::getById($this->user_id); }

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserCourseData());
	}

	public static function getAllByCourseId($id){
		$sql = "select * from ".self::$tablename." where course_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserCourseData());
	}


	public static function getAllByUserId($id){
		$sql = "select * from ".self::$tablename." where user_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserCourseData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserCourseData());
	}


}

?>