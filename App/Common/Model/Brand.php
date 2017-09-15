<?php namespace Common\Model;
use Hdphp\Model\Model;
//商品品牌
class Brand extends Model
{
//	指定数据库里的表名(框架固定写法)
	protected $table = 'brand';
	
//	自动验证字段不存在时验证失败
	protected $validate = array(
		array('bname','required','LOGO名称不能为空！',3,3)
	);
	
	/*自动完成  $auto = [array(表单字段名,处理方法,方法类型,验证条件,处理时间)] 
	 *自动完成是在模型层对数据进行自动处理的操作过程。
	 *必须执行 create 或 save 模型方法才有效
	 */
	protected $auto = array(
	  /*array(表单字段名,处理方法,方法类型,验证条件,处理时间)
	   * 处理时间 (可选)：
    	self::MODEL_INSERT      值:1    插入时处理
    	self::MODEL_UPDATE      值:2    更新时处理
    	self::MODEL_BOTH        值:3    全部情况时处理
	  */
		//品牌LOGO
		array('logo','getThumb','method',3,3)
	);
	
//	上传LOGO
	public function getThumb(){
		$oldImg = Q('post.logo');
		if($_FILES['logo']['error']){
			if($oldImg){
				return $oldImg;
			}
		}
//		执行上并传获取上传文件信息
		$files = Upload::type('jpg,jpeg,png,gif')->make();
//		如果上传成功返回数据
		if($files){
//			改变大小上传（180*60）	先重组一个缩略图地址
			$thumbImg = str_replace(".{$files[0]['ext']}", "_thumb.{$files[0]['ext']}", $files[0]['path']);
			$img = Image::thumb($files[0]['path'],$thumbImg,180,60,6);			//返回上传地址给数据
//			如果存在旧图片就删除
			if($oldImg){
//				旧缩略图
				unlink($oldImg);
				//删除原图
				$path = str_replace('_thumb', '', $oldImg);
				unlink($path);
			}
			return $img;
		}
//		如果上传失败	把错误压入模型
		$this->error = Upload::getError();
	}
	
	
//	执行添加
	public function store(){
		if(!$this->create()) return FALSE;
		$this->add();
		return TRUE;
	}
//	执行修改
	public function edit(){
		if(!$this->create()) return FALSE;
		$this->save();
		return TRUE;
	}







//	检测英文
	public function _getFirstCharter($str){
		if(empty($str)){return '';}
		$fchar=ord($str{0});
		if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
		$s1=iconv('UTF-8','gb2312',$str);
		$s2=iconv('gb2312','UTF-8',$s1);
		$s=$s2==$str?$s1:$str;
		$asc=ord($s{0})*256+ord($s{1})-65536;
		if($asc>=-20319&&$asc<=-20284) return 'A';
		if($asc>=-20283&&$asc<=-19776) return 'B';
		if($asc>=-19775&&$asc<=-19219) return 'C';
		if($asc>=-19218&&$asc<=-18711) return 'D';
		if($asc>=-18710&&$asc<=-18527) return 'E';
		if($asc>=-18526&&$asc<=-18240) return 'F';
		if($asc>=-18239&&$asc<=-17923) return 'G';
		if($asc>=-17922&&$asc<=-17418) return 'H';
		if($asc>=-17417&&$asc<=-16475) return 'J';
		if($asc>=-16474&&$asc<=-16213) return 'K';
		if($asc>=-16212&&$asc<=-15641) return 'L';
		if($asc>=-15640&&$asc<=-15166) return 'M';
		if($asc>=-15165&&$asc<=-14923) return 'N';
		if($asc>=-14922&&$asc<=-14915) return 'O';
		if($asc>=-14914&&$asc<=-14631) return 'P';
		if($asc>=-14630&&$asc<=-14150) return 'Q';
		if($asc>=-14149&&$asc<=-14091) return 'R';
		if($asc>=-14090&&$asc<=-13319) return 'S';
		if($asc>=-13318&&$asc<=-12839) return 'T';
		if($asc>=-12838&&$asc<=-12557) return 'W';
		if($asc>=-12556&&$asc<=-11848) return 'X';
		if($asc>=-11847&&$asc<=-11056) return 'Y';
		if($asc>=-11055&&$asc<=-10247) return 'Z';
		return null;
   }

	// 执行查找英文
	public function english($brandData){
		// p($brandData);
		// exit;
		foreach ($brandData as $k => $v) {
			$str = mb_substr(preg_replace('# #', '', $v['bname']), 0,1,'utf-8');
			$brandData[$k]['p'] = $this->_getFirstCharter($str);
		}
		// p($brandData);
		$brandData = $this->sort($brandData);
		return $brandData;
	}

   // 重组数组
   public function sort($brandData){
   		$englishs = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
		$brand = [];

		foreach ($englishs as $k => $v) {
			foreach ($brandData as $key => $value) {
				if($value['p'] == $v){
					$brand[$v][] = $value;
				}
			}
		}
		return $brand;
   }



}