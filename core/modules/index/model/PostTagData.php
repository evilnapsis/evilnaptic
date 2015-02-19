<?php
class PostTagData {
	public static $tablename = "post_tag";


	public function PostTagData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (post_id,tag_id) ";
echo		$sql .= "value (\"$this->post_id\",\"$this->tag_id\")";
		Executor::doit($sql);
	}

	public function getTag(){ return TagData::getById($this->tag_id); }

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto PostTagData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set post_id=\"$this->post_id\",tag_id=\"$this->tag_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostTagData());
	}

	public static function getByPT($p,$t){
echo		$sql = "select * from ".self::$tablename." where post_id=$p and tag_id=$t ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostTagData());
	}


	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where name=\"$name\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostTagData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}

	public static function getPrincipals(){
		$sql = "select *,count(*) as count_tag from post_tag inner join tag on (tag.id=tag_id) group by tag_id order by count_tag desc,name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}

	public static function getAllByPId($pid){
		$sql = "select *,count(*) as count_tag from post_tag inner join tag on (tag.id=tag_id) where post_id=$pid group by tag_id order by count_tag desc,name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}


	public static function getLikePrincipals($q){
		$sql = "select *,count(*) as count_tag from post_tag inner join tag on (tag.id=tag_id) where name like '%$q%' group by tag_id order by count_tag desc,name";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}

	public static function getAllByPostId($id){
		$sql = "select * from ".self::$tablename." where post_id=".$id;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostTagData());
	}


}

?>