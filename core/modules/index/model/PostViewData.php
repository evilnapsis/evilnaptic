<?php
class PostViewData {
	public static $tablename = "post_view";

	public function getPost(){ return PostData::getById($this->post_id); }




	public static function getByCode($id){
		$sql = "select * from ".self::$tablename." where code=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PostViewData());
	}


	public static function getTop5ByKindId($k){
		$sql = "select post_id,kind_id,count(*) as c from ".self::$tablename." inner join post on (post.id=post_view.post_id) where kind_id=$k group by post_id order by c desc limit 5";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_public=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}

	public static function getPostPrincipals(){
		$sql = "select * from ".self::$tablename." where kind_id=1 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}

	public static function getTipPrincipals(){
		$sql = "select * from ".self::$tablename." where kind_id=2 and is_public=1 and is_principal=1 order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}


	public static function getPostLike($q){
		$sql = "select * from ".self::$tablename." where (title like '%$q%' or content like '%$q%') and kind_id=1 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}

	public static function getTipLike($q){
		$sql = "select * from ".self::$tablename." where (title like '%$q%' or content like '%$q%') and kind_id=2 and is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PostViewData());
	}


}

?>