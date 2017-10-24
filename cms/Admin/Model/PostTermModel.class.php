<?php
namespace Admin\Model;
use Think\Model;

class PostTermModel extends Model{

	//数据库表名
	const _TABLE_NAME = 'post_term';  

	//关联表
	const _POST_TERM_TID = 'term_id'; //关联表分类ID
	const _POST_TERM_PID = 'post_id'; //关联表文章ID

	//参数常量
	const _PARAM_POST_ID = 'id';
	const _PARAM_TERM_ID = 'category';

	public function doUpdate($param){

		if($param[self::_PARAM_POST_ID] && $param[self::_PARAM_TERM_ID]){
			
			$PostTerM = M(self::_TABLE_NAME);

			//删除原来的
			$this->doRemove($param);

			//组合数据
			$dataList = $this->paresDataList($param[self::_PARAM_POST_ID], $param[self::_PARAM_TERM_ID]);
		

			//多个分类
			if(count($dataList)>0){
				$r = $PostTerM->addALL($dataList);
			}else{
				//单个分类
				$data = $dataList[0];
				$r = $PostTerM->data($data)->add();
			}
			 return  $r;

		}
	}

	/**
	* 处理多维数组参数
	* @param array
	* @return array
	* 输入格式， pid = array(1,2), tid = array(10,11)
	* 输出：
	* array(
	*		array('p_id'=>1,'t_id'=>10),
	*		array('p_id'=>1,'t_id'=>11),
	*		array('p_id'=>2,'t_id'=>10),
	*		array('p_id'=>2,'t_id'=>11)
	*		);
	* 注：允许非数组输入
	**/
	private function paresDataList($pids, $tids){

		if(is_array($pids)){
			foreach ($pids as $key => $pid) {
				if(is_array($tid)){
					foreach ($tids as $tid) {
						$dataList[] = array(
								self::_POST_TERM_PID => $pid,
								self::_POST_TERM_TID => $tid,
							);
					}
				}else{
					$dataList[] = array(
							self::_POST_TERM_PID => $pid,
							self::_POST_TERM_TID => $tids,
						);
				}
			}
		}else{
			if(is_array($tids)){
					foreach ($tids as $tid) {
						$dataList[] = array(
								self::_POST_TERM_PID => $pids,
								self::_POST_TERM_TID => $tid,
							);
					}
				}else{
					$dataList[] = array(
							self::_POST_TERM_PID => $pids,
							self::_POST_TERM_TID => $tids,
						);
				}

		}
		return $dataList;
	}


	/**
	* 删除关联表数据
	* @param array
	* @return int;
	**/
	public function doRemove($param){

		//条件
		if(is_array($param[self::_PARAM_POST_ID])){
			//传入数组，多个
			$postIds = implode(',', $param[self::_PARAM_POST_ID]);
			$map[self::_POST_TERM_PID] = array('in',$postIds);
		}else{
			//单条数据
			$map[self::_POST_TERM_PID] = $param[self::_PARAM_POST_ID];
		}

		//实例
		$PostTerM = M(self::_TABLE_NAME);

		//执行删除
		$r = $PostTerM->where($map)->delete();

		//返回，影响的行数
		return $r;

	}


}