<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\AjaxPage;

/**
 * 内容
 * */
class ContentController extends Controller{
    
    
    public function sidebar(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $Column = M('Column');
        $columns = $Column->field('id,name,parentid,class,sort')->select();
//         var_dump($columns);
        $this->assign('columns',getTree($columns));
        $this->display();
        
    }
    
    /**
     * 新闻
     * */
    public function news(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $Column = M('Column');
        $column = $Column->where('id='.$id)->find();
        
        $Content = M('Content');
//         $content = $Content->where('columnid='.$id)->select();
        $count = $content = $Content->where('columnid='.$id)->count();
        $limitRows = 5; // 设置每页记录数
         
        $p = new AjaxPage($count, $limitRows,"news"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value = $p->firstRow . "," . $p->listRows;
        
        $data = $Content->where('columnid='.$id)->order('addtime desc')->limit($limit_value)->select(); // 查询数据
        $page = $p->show(); // 产生分页信息，AJAX的连接在此处生成
        
        if(IS_AJAX){
            $this->assign("content",$data);// 赋值数据集
            $this->assign('page',$page);// 赋值分页输出
            $html = $this->display('Content:newsAjax');
            
            
//             var_dump($html);
//             echo "".$html;
//             $this->ajaxReturn("heloo");
//             exit;
            return;
        }
        
        $this->assign("column",$column);
        $this->assign("content",$data);
        $this->assign('page',$page);// 赋值分页输出
        
        $this->display();
    }
    
    /**
     * 新增新闻
     * */
    public function addNews(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
//         echo __ROOT__;
        
        $Column = M('Column');
        $column = $Column->where('id='.$id)->find();
        //         var_dump($column);
        
        $this->assign("column",$column);
        
        $this->display();
    }
    
    public function addNewsPost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_POST['columnid'];
        
        $Content = D('Content');
        var_dump($_POST);
        
        if($Content->create()){
            if($Content->add()){
                $this->success('新增内容成功',U('Content/news?id='.$id));
            }else{
                $this->error('新增内容失败');
            }
        }else{
            $this->error($Content->getError());
        }
        
    }
    
    public function modNews(){
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $Column = M('Column');
        $Content = M('Content');
        $content = $Content->where('id='.$id)->find();
//         var_dump($content);
        $columnid = $content['columnid'];
        $column = $Column->where('id='.$columnid)->find();
        
        $this->assign("column",$column);
        $this->assign("content",$content);
        $this->display();
        
    }
    
    public function modNewsPost(){
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $columnid = $_POST['columnid'];
        $Content = D('Content');
        if($Content->create()){
            if($Content->save()){
                $this->success("修改成功",U('Content/news?id='.$columnid));
            }else{
                $this->error("修改失败");
            }
        }else{
            $this->error($Content->getError());
        }
        
    }
    
    
    public function delNews(){
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $id = $_GET['id'];
        $Content = M('Content');
        if($Content->where('id='.$id)->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
        
    }
    
    
    /**
     * 单页
     * */
    public function page(){
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
//         echo '单页';
        $id = $_GET['id'];
        $Content = M('Content');
        $Column = M('Column');
        
        $column = $Column->where('id='.$id)->find();
        
        $content = $Content->where('columnid='.$id)->find();
//         if(isset($content)){
//             var_dump($content);
            
            
//         }else{
            
            
            
//         }
        
        $this->assign("content", $content);
        $this->assign("column", $column);
        $this->display();
    }
    
    public  function pagePost(){
        header("Content-type:text/html;charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $Content = D('Content');
        $id = $_POST['columnid'];
        $content = $Content->where('columnid='.$id)->find();
        if(isset($content)){
            //更新
            $_POST['id'] = $content['id'];
//             $data['title'] = $_POST['title'];
//             $data['keywords'] = $_POST['keywords'];
//             $data['content'] = $_POST['content'];
//             $data['columnid'] = $_POST['columnid'];
            if($Content->create($_POST)){
                if($Content->save()){
                    $this->success('修改单页成功');
                }else{
                    $this->error('修改单页失败');
                }
            }else{
                $this->error($Content->getError());
            }
        }else{
            //新增
            if($Content->create()){
                if($Content->add()){
                    $this->success('新增单页成功');
                }else{
                    $this->error('新增单页失败');
                }
            }else{
                $this->error($Content->getError());
            }
        }
        
    }
    
    
    
   
    public function ueditup(){
        header("Content-Type: text/html; charset=utf-8");
        if(!access(C('FM_content'))){
            $this->error(C('access_error'));
            return;
        }
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        //dump($editconfig);
        $action = I('get.action');
        //echo $action;
        switch ($action) {
            case 'config':
                $result =  json_encode($editconfig);
                break;
                /* 上传图片 */
            case 'uploadimage':
                $result = $this->editup('img');
                break;
                /* 上传涂鸦 */
            case 'uploadscrawl':
                $result = $this->editup('img');
                break;
            case 'uploadvideo':
                $result = $this->editup('video');
                break;
            case 'uploadfile':
                $result = $this->editup('file');
                //$result = include("action_upload.php");
                break;
                /* 列出图片 */
            case 'listimage':
                $result = $this->editlist('listimg');
                break;
                /* 列出文件 */
            case 'listfile':
                $result = $this->editlist('listfile');
                break;
                /* 抓取远程文件 */
            case 'catchimage':
                //$result = include("action_crawler.php");
                break;
            default:
                $result = json_encode(array(
                'state'=> '请求地址出错'
                    ));
                    break;
        }
        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    
    }
    public function editup($uptype){
//         if($this->islogin==false){
//             $_re_data['state'] = '请登陆';
//             return json_encode($_re_data);
//         }
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        switch ($uptype) {
            case 'img':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['imageMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['imageAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['imagePathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['imageFieldName']]);
                break;
            case 'file':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['fileMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['fileAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['filePathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['fileFieldName']]);
                break;
            case 'video':
                $upload = new \Think\Upload();// 实例化上传类
                $upload->rootPath  =     '.';
                $upload->maxSize   =     $editconfig['videoMaxSize'];
                $upload->exts      =     explode('.', trim(join('',$editconfig['videoAllowFiles']),'.'));
                $upload->savePath  =     $editconfig['videoPathFormat'];
                $upload->saveName  =     time().rand(100000,999999);
                $info   =   $upload->uploadOne($_FILES[$editconfig['videoFieldName']]);
                break;
            default:
                return false;
                break;
        }
        if(!$info) {// 上传错误提示错误信息
            $_re_data['state'] = $upload->getError();
            $_re_data['url'] = '';
            $_re_data['title'] = '';
            $_re_data['original'] = '';
            $_re_data['type'] = '';
            $_re_data['size'] = '';
        }else{// 上传成功 获取上传文件信息
            $_re_data['state'] = 'SUCCESS';
            $_re_data['url'] = $info['savepath'].$info['savename'];
            $_re_data['title'] = $info['savename'];
            $_re_data['original'] = $info['name'];
            $_re_data['type'] = '.'.$info['ext'];
            $_re_data['size'] = $info['size'];
        }
        return json_encode($_re_data);
    }
    public function editlist($listtype){
        $editconfig = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(COMMON_PATH."Conf/ueditconfig.json")), true);
        switch ($listtype) {
            case 'listimg':
                $allowFiles = $editconfig['imageManagerAllowFiles'];
                $listSize = $editconfig['imageManagerListSize'];
                $path = $editconfig['imageManagerListPath'];
                break;
    
            case 'listfile':
                $allowFiles = $editconfig['fileManagerAllowFiles'];
                $listSize = $editconfig['fileManagerListSize'];
                $path = $editconfig['fileManagerListPath'];
                break;
    
            default:
                return false;
                break;
        }
        /* 获取参数 */
        $size = isset($_GET['size']) ? htmlspecialchars($_GET['size']) : $listSize;
        $start = isset($_GET['start']) ? htmlspecialchars($_GET['start']) : 0;
        $end = $start + $size;
        /* 获取文件列表 */
        $path = $_SERVER['DOCUMENT_ROOT'] . (substr($path, 0, 1) == "/" ? "":"/") . $path;
        $files = $this->getfiles($path, $allowFiles);
        if (!count($files)) {
            return json_encode(array(
                "state" => "no match file",
                "list" => array(),
                "start" => $start,
                "total" => count($files)
            ));
        }
        /* 获取指定范围的列表 */
        $len = count($files);
        for ($i = min($end, $len) - 1, $list = array(); $i < $len && $i >= 0 && $i >= $start; $i--){
            $list[] = $files[$i];
        }
        //倒序
        //for ($i = $end, $list = array(); $i < $len && $i < $end; $i++){
        //    $list[] = $files[$i];
        //}
        /* 返回数据 */
        $result = json_encode(array(
            "state" => "SUCCESS",
            "list" => $list,
            "start" => $start,
            "total" => count($files)
        ));
        return $result;
    }
    /**
     * 遍历获取目录下的指定类型的文件
     * @param $path
     * @param array $files
     * @return array
     */
    public function getfiles($path, $allowFiles, &$files = array())
    {
        if (!is_dir($path)) return null;
        if(substr($path, strlen($path) - 1) != '/') $path .= '/';
        $handle = opendir($path);
        while (false !== ($file = readdir($handle))) {
            if ($file != '.' && $file != '..') {
                $path2 = $path . $file;
                if (is_dir($path2)) {
                    $this->getfiles($path2, $allowFiles, $files);
                } else {
                    if(in_array('.'.pathinfo($file, PATHINFO_EXTENSION), $allowFiles)){
                        $files[] = array(
                            'url'=> substr($path2, strlen($_SERVER['DOCUMENT_ROOT'])),
                            'mtime'=> filemtime($path2)
                        );
                    }
                }
            }
        }
        return $files;
    }
    
    
    
}
