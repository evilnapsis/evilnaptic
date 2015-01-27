<?php
class LectureData {
	public static $tablename = "lecture";



	public function LectureData(){
		$this->name = "";
		$this->description = "";
		$this->category_id = "";
		$this->user_id = "";
		$this->level_id = "0";
		$this->created_at = "NOW()";
	}

	public function getTopic(){ return TopicData::getById($this->topic_id); }
	public function add(){
		$sql = "insert into ".self::$tablename." (title,content,is_public,topic_id,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->content\",$this->is_public,$this->topic_id,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto LectureData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",content=\"$this->content\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new LectureData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureData());
	}

	public static function getAllByTopicId($id){
		$sql = "select * from ".self::$tablename." where topic_id=$id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureData());
	}

	public static function getPublicsByTopicId($id){
		$sql = "select * from ".self::$tablename." where topic_id=$id and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureData());
	}

	public static function get10Publics(){
		$sql = "select *,lecture.id as lid from lecture inner join topic on (topic.id=lecture.topic_id) inner join course on (topic.course_id=course.id) where course.is_open=1 order by lecture.created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new LectureData());
	}


}

?>