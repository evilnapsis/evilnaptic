<?php
class CommentData {
	public static $tablename = "comment";


	public function CommentData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getEntry(){
		if($this->ref_id==1){
			return PostData::getById($this->entry_id);
		}
	}

	public function getStatus(){
		if($this->status==1){
			return "Pendiente";
		}else if($this->status==2){
			return "Aprobado y mostrar";
		}else if($this->status==3){
			return "Aprobado y no mostrar";
		}else if($this->status==4){
			return "Rechazado";
		}
	}
	
	public function add(){
		$sql = "insert into ".self::$tablename." (entry_id,ref_id,name,email,comment,status,created_at) ";
		$sql .= "value ($this->entry_id,$this->ref_id,\"$this->name\",\"$this->email\",\"$this->comment\",$this->status,$this->created_at)";
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

// partiendo de que ya tenemos creado un objecto CommentData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",content=\"$this->content\",image=\"$this->image\",is_public=\"$this->is_public\" where id=$this->id";
		Executor::doit($sql);
	}

	public function read(){
		$sql = "update ".self::$tablename." set is_readed=1 where id=$this->id";
		Executor::doit($sql);
	}

	public function set_status(){
		$sql = "update ".self::$tablename." set status=$this->status where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CommentData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}

	public static function getUnReads(){
		$sql = "select * from ".self::$tablename." where status=1 and is_readed=0 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}


	public static function getAllByEntry($ref,$entry){
		$sql = "select * from ".self::$tablename." where ref_id=$ref and entry_id=$entry and status=2 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CommentData());
	}


}

?>