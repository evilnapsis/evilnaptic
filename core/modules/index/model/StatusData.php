<?php
class StatusData {
	public static $tablename = "status";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("title",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("content",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("image",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

		public function getCat(){ return CatData::getById($this->cat_id);}


	public function StatusData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->video = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (code,brief,video,image,user_id,is_public,created_at) ";
echo		$sql .= "value (\"$this->code\",\"$this->brief\",\"$this->video\",\"$this->image\",$this->user_id,$this->is_public,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto StatusData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",brief=\"$this->brief\",content=\"$this->content\",image=\"$this->image\",cat_id=\"$this->cat_id\",is_public=\"$this->is_public\",is_principal=\"$this->is_principal\",is_sidebar=\"$this->is_sidebar\",kind_id=\"$this->kind_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}

	public static function getByCode($id){
		$sql = "select * from ".self::$tablename." where code=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

	public static function getPrincipals(){
		$sql = "select * from ".self::$tablename." where  is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

	public static function getTipPrincipals(){
		$sql = "select * from ".self::$tablename." where kind_id=2 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}


	public static function getPostLike($q){
		$sql = "select * from ".self::$tablename." where (title like '%$q%' or content like '%$q%') and kind_id=1 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}

	public static function getTipLike($q){
		$sql = "select * from ".self::$tablename." where (title like '%$q%' or content like '%$q%') and kind_id=2 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}


}

?>