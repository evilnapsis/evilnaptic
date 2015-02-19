<?php
class SlideData {
	public static $tablename = "slide";


	public function SlideData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (title,title_link,subtitle,subtitle_link,image,video,link,is_public,created_at) ";
		$sql .= "value (\"$this->title\",\"$this->title_link\",\"$this->subtitle\",\"$this->subtitle_link\",\"$this->image\",\"$this->video\",\"$this->link\",$this->is_public,$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto SlideData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",title_link=\"$this->title_link\",subtitle=\"$this->subtitle\",subtitle_link=\"$this->subtitle_link\",link=\"$this->link\",video=\"$this->video\",position=\"$this->position\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SlideData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where  is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}


}

?>