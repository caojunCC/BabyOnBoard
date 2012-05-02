<?php
/**
 * @copyright (c) 2011 jooyea.net
 * @file tools.php
 * @brief 工具类
 * @author chendeshan
 * @date 2010-12-16
 * @version 0.6
 */

class Tools extends IController
{
	public $layout='admin';
	protected $checkRight = 'all';

	function init()
	{
		$checkObj = new CheckRights($this);
		$checkObj->checkAdminRights();
	}

	public function seo_sitemaps()
	{
		$siteMaps =  new SiteMaps();
		$url = IUrl::getHost().IUrl::creatUrl("");
		$date = date('Y-m-d').'T'.date('H:i:s').'+00:00';
		$maps = array(
			array('loc'=>$url.'sitemap_goods.xml','lastmod'=>$date),
			array('loc'=>$url.'sitemap_article.xml','lastmod'=>$date)
			);
		$siteMaps->create($maps,$url.'sitemaps.xsl');
		$this->seo_items('goods');
		$this->seo_items('article');
		$this->redirect('seo_sitemaps');
	}
	public function seo_items($item)
	{
		$weburl = IUrl::getHost().IUrl::creatUrl("");
		switch($item)
		{
			case 'goods':
			{
				$query = new IQuery('goods');
				$url = IUrl::getHost().IUrl::creatUrl('/site/products/id/');
				$query->fields="concat('$url',id) as loc,create_time as lastmod";
				$items = $query->find();
				SiteMaps::create_map($items,'sitemap_goods.xml',$weburl.'sitemaps.xsl');
				break;
			}
			case 'article':
			{
				$query = new IQuery('article');
				$url = IUrl::getHost().IUrl::creatUrl('/site/article_detail/id/');
				$query->fields="concat('$url',id) as loc,create_time as lastmod";
				$items = $query->find();
				SiteMaps::create_map($items,'sitemap_article.xml',$weburl.'sitemaps.xsl');
			}
		}

	}
	//[备份还原]数据库备份展示页面
	function db_bak()
	{
		$renderData = $this->get_table();
		$this->setRenderData($renderData);
		$this->redirect('db_bak');
	}

	//[备份还原]获取表结构
	function get_table()
	{
		//数据表信息
		$dbObj     = IDBFactory::getDB();
		$tableInfo = $dbObj->query('show table status');

		//要渲染的数据
		$renderData = array(
			'tableInfo' => $tableInfo,
		);
		return $renderData;
	}

	//[备份还原]数据备份动作(ajax操作)
	function db_act_bak()
	{
		//要备份的数据表
		$tableName = IReq::get('name','post');
		$tableName = IFilter::act($tableName,"string");

		//分卷大小限制(KB)
		$partSize = 4000;

		if(is_array($tableName) && isset($tableName[0]) && $tableName[0]!='')
		{
			$backupObj = new DBBackup($tableName);
			$backupObj->setPartSize($partSize);   //设置分卷大小
			$backupObj->runBak();                 //开始执行
			$result = array(
				'isError' => false,
				'redirect'=> IUrl::creatUrl('/tools/db_res'),
			);
		}
		else
		{
			$result = array(
				'isError' => true,
				'message' => '请选择要备份的数据表',
			);
		}
		echo JSON::encode($result);
	}

	//[备份还原]数据库恢复
	function db_res()
	{
		$backupObj = new DBBackup;
		$resList = $backupObj->getList();
		$this->setRenderData($resList);
		$this->redirect('db_res',false);
	}

	//[备份还原]下载数据库
	function download()
	{
		$file = IReq::get('file');
		$backupObj = new DBBackup;
		$backupObj->download($file);
	}

	//[备份还原]删除备份
	function backup_del()
	{
		$name = IReq::get('name');
		$name = IFilter::act($name,'string');
		if(!empty($name) && !is_array($name))
			$name = array($name);

		if(is_array($name) && isset($name[0]) && $name[0]!='')
		{
			$backupObj = new DBBackup($name);
			$backupObj->del();
			$this->redirect('db_res');
		}
		else
		{
			$backupObj = new DBBackup;
			$resList = $backupObj->getList();
			$this->setRenderData($resList);
			$this->redirect('db_res',false);
			Util::showMessage('请选择要删除的备份文件');
		}
	}

	//[备份还原]导入数据(ajax)
	function res_act()
	{
		$name = IFilter::act(IReq::get('name'));
		if(is_array($name) && isset($name[0]) && $name[0]!='')
		{
			$backupObj = new DBBackup($name);
			$backupObj->runRes();
			$result = array(
				'isError' => false,
				'redirect'=> IUrl::creatUrl('/tools/db_bak'),
			);
		}
		else
		{
			$result = array(
				'isError' => true,
				'message' => '请选择要导入的SQL文件',
			);
		}
		echo JSON::encode($result);
	}

	//本地上传sql文件导入
	public function localUpload()
	{
		if(isset($_FILES['attach']['tmp_name']) && file_exists($_FILES['attach']['tmp_name']))
		{
			$fileName  = $_FILES['attach']['tmp_name'];
			$backupObj = new DBBackup();
			$backupObj->parseSQL($fileName);
			$this->redirect('db_bak');
		}
		else
		{
			$this->redirect('db_res');
		}
	}

	//[备份还原]打包下载
	function download_pack()
	{
		$name = IFilter::act(IReq::get('name'));

		if($name)
		{
			$backupObj = new DBBackup($name);
			$fileName  = $backupObj->packDownload();
			if($fileName === false)
			{
				$this->redirect('db_res',false);
				Util::showMessage('环境不支持zip扩展');
				exit;
			}
			$db_fileName = $backupObj->download($fileName);
			@unlink($db_fileName);
		}
		else
		{
			$this->redirect('db_res',false);
			Util::showMessage('请选择要打包的文件');
			exit;
		}
	}

}