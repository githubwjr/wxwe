<?php
//dezend by http://www.yunlu99.com/ QQ:270656184
if (!defined('IN_IA')) {
	exit('Access Denied');
}

class Page_EweiShopV2Page extends PluginWebPage
{
	public function main()
	{
		global $_W;
		global $_GPC;
		$pindex = max(1, intval($_GPC['page']));
		$psize = 20;
		$condition = ' uniacid=:uniacid ';
		$params = array(':uniacid' => $_W['uniacid']);
		$keyword = trim($_GPC['keyword']);

		if (!empty($keyword)) {
			$condition .= ' AND name LIKE :keyword ';
			$params[':keyword'] = '%' . $keyword . '%';
		}

		if ($_GPC['type'] != '') {
			$type = intval($_GPC['type']);
			$condition .= ' AND type=:type ';
			$params[':type'] = $type;
		}

		$limit = ' LIMIT ' . (($pindex - 1) * $psize) . ',' . $psize;
		$list = pdo_fetchall('SELECT id, `name`, `type`, createtime, lasttime, status, isdefault FROM ' . tablename('ewei_shop_wxapp_page') . ' WHERE ' . $condition . ' ORDER BY isdefault DESC, id DESC' . $limit, $params);
		$total = pdo_fetchcolumn('SELECT COUNT(*) FROM ' . tablename('ewei_shop_wxapp_page') . ' WHERE ' . $condition, $params);
		$pager = pagination2($total, $pindex, $psize);
		include $this->template();
	}

	public function add()
	{
		$this->post();
	}

	public function edit()
	{
		$this->post();
	}

	protected function post()
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);

		if (!empty($id)) {
			$page = $this->model->getPage($id);
		}

		if ($_W['ispost']) {
			$isdefault = intval($_GPC['isdefault']);
			$data = $_GPC['data'];

			if (empty($data)) {
				show_json(0, '数据错误');
			}
//show_json(0, '数据错误');
			foreach ($data['items'] as $itemid => &$item) {
$number = $item['params']['goodsnum'];
	
	if ($item['id'] == 'goods') {
	if(($item['params']['goodsdata'] == 1) && !empty($item['params']['cateid'])){
		
		$goodssort = $item['params']['goodssort'];
		if($goodsort==3){
			$con = " order by productprice asc ";
		}else{
			$con = " order by productprice desc ";
		}
	$goods = pdo_fetchall("select * from ".tablename('ewei_shop_goods')." where uniacid = :uniacid and pcate = :pcate ".$con." limit ".$number,array('uniacid'=>$_W['uniacid'],':pcate'=>$item['params']['cateid']));
	$i = 0;
	

	if(count($item['data'])>count($goods)){
		$should_delete = count($item['data'])-count($goods);
		array_splice($item['data'],$should_delete,$should_delete);
	}else if(count($item['data'])<count($goods)){
		$should_add = count($goods)-count($item['data']);
		//追加数组
		$arr = array(
		'thumb'=>'../addons/ewei_shopv2/plugin/app/static/images/default/goods-1.jpg',
		"price"=>"20.00",
                    "productprice"=>"99.00",
                    "title"=>"这里是商品标题",
                    "sales"=>"0",
                    "gid"=>"",
                    "ctype"=>"1"
		);
		for($q = 0;$q<$should_add;++$q){
			array_push($item["data"],$arr);
		}
	
	}
	
	foreach($item['data'] as $k => &$val){
		

	if(!empty($goods)){
		
			$val['thumb'] = $goods[$i]['thumb'];
			$val['title'] = $goods[$i]['title'];
			$val['price'] = $goods[$i]['productprice'];
			$val['productprice'] = $goods[$i]['marketprice'];
			$val['sales'] = $goods[$i]['sales'] + intval($goods[$i]['salesreal']);
			$val['ctype'] = $goods[$i]['type'];
			$val['gid'] = $goods[$i]['id'];

		++$i;
		
	}


	}
	
	unset($val);
	}
	}else{
		continue;
	}
	
}
unset($item);
			
			
			$json = json_encode($data);
			$arr = array('name' => trim($data['page']['name']), 'type' => intval($data['page']['type']), 'data' => base64_encode($json), 'lasttime' => time());

			if (!empty($isdefault)) {
				$arr['status'] = 1;
				$arr['isdefault'] = 1;
				pdo_update('ewei_shop_wxapp_page', array('isdefault' => 0), array('uniacid' => $_W['uniacid']));
			}

			if (!empty($id)) {
				pdo_update('ewei_shop_wxapp_page', $arr, array('id' => $id, 'uniacid' => $_W['uniacid']));
			}
			else {
				$arr['uniacid'] = $_W['uniacid'];
				$arr['createtime'] = time();
				pdo_insert('ewei_shop_wxapp_page', $arr);
				$id = pdo_insertid();
			}

			show_json(1, array('id' => $id));
		}

		$json = json_encode(array('attachurl' => $_W['attachurl'], 'id' => $id, 'type' => empty($page) ? 2 : $page['type'], 'data' => empty($page) ? NULL : $page['data']));
		$auth = $this->model->getAuth();
		$is_auth = (!is_error($auth) && is_array($auth) ? $auth['is_auth'] : false);

		if ($is_auth) {
			$release = $this->model->getRelease($auth['id']);
		}

		include $this->template();
	}

	/**
     * 单个/批量设置状态
     */
	public function status()
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);

		if (empty($id)) {
			$id = (is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0);
		}

		$status = intval($_GPC['status']);
		$list = pdo_fetchall('SELECT id, `name`, isdefault FROM ' . tablename('ewei_shop_wxapp_page') . ' WHERE id in( ' . $id . ' ) AND uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));

		if (!empty($list)) {
			foreach ($list as $row) {
				if (!empty($row['isdefault'])) {
					continue;
				}

				pdo_update('ewei_shop_wxapp_page', array('status' => $status), array('id' => $row['id'], 'uniacid' => $_W['uniacid']));
				plog('app.page.edit', ('修改页面状态 ID: ' . $row['id'] . ' 页面名称: ' . $row['name'] . ' 页面状态: ' . $status) == 1 ? '启用' : '禁用');
			}
		}

		show_json(1);
	}

	/**
     * 单个/批量删除
     */
	public function delete()
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);

		if (empty($id)) {
			$id = (is_array($_GPC['ids']) ? implode(',', $_GPC['ids']) : 0);
		}

		$list = pdo_fetchall('SELECT id, `name`, isdefault FROM ' . tablename('ewei_shop_wxapp_page') . ' WHERE id in( ' . $id . ' ) AND uniacid=:uniacid', array(':uniacid' => $_W['uniacid']));

		if (!empty($list)) {
			foreach ($list as $row) {
				if (!empty($row['isdefault'])) {
					continue;
				}

				pdo_delete('ewei_shop_wxapp_page', array('id' => $row['id'], 'uniacid' => $_W['uniacid']));
				plog('app.page.delete', '删除页面 ID: ' . $row['id'] . ' 页面名称: ' . $row['name'] . ' ');
			}
		}

		show_json(1, array('url' => referer()));
	}

	/**
     * 设为默认首页
     */
	public function setdefault()
	{
		global $_W;
		global $_GPC;
		$id = intval($_GPC['id']);

		if (empty($id)) {
			show_json(0, '参数错误');
		}

		$item = pdo_fetch('SELECT id, `name`, `status`, isdefault FROM ' . tablename('ewei_shop_wxapp_page') . ' WHERE id=:id AND uniacid=:uniacid LIMIT 1', array(':id' => $id, ':uniacid' => $_W['uniacid']));

		if (empty($item)) {
			show_json(0, '页面不存在');
		}

		if (empty($item['status'])) {
			show_json(0, '页面未启用');
		}

		if (!empty($item['isdefault'])) {
			show_json(1);
		}

		pdo_update('ewei_shop_wxapp_page', array('isdefault' => 0), array('uniacid' => $_W['uniacid']));
		pdo_update('ewei_shop_wxapp_page', array('isdefault' => 1), array('id' => $id, 'uniacid' => $_W['uniacid']));
		plog('app.page.edit', '设为默认首页 ID: ' . $item['id'] . ' 页面名称: ' . $item['name'] . ' ');
		show_json(1);
	}

	public function goods_query()
	{
		global $_W;
		global $_GPC;
		$kwd = trim($_GPC['keyword']);
		$params = array();
		$params[':uniacid'] = $_W['uniacid'];
		$condition = ' and status=1 and deleted=0 and uniacid=:uniacid';

		if (!empty($kwd)) {
			$condition .= ' AND (`title` LIKE :keywords OR `keywords` LIKE :keywords)';
			$params[':keywords'] = '%' . $kwd . '%';
		}

		$condition .= ' AND `type` != 10 AND `type` != 20 AND `type` !=4 ';
		$ds = pdo_fetchall('SELECT id,title,thumb,marketprice,productprice,share_title,share_icon,description,minprice,costprice,total,sales,islive,liveprice FROM ' . tablename('ewei_shop_goods') . ' WHERE 1 ' . $condition . ' order by createtime desc', $params);
		$ds = set_medias($ds, array('thumb', 'share_icon'));
		include $this->template('goods/query');
	}

	public function selecticon2()
	{
		$list = array('', '首页', '全部分类', '商品列表', '购物车', '个人中心', '促销', '发现', '精选', '优选好货', '关注', '良品', '热卖', '新品', '人气');
		unset($list[0]);
		include $this->template('app/page/tpl/_icon');
	}

	public function selecticon3()
	{
		$csspath = __DIR__ . '/../../static/fonts/iconfont.css';
		$list = array();
		$content = file_get_contents($csspath);

		if (!empty($content)) {
			preg_match_all('/.(.*?):before/', $content, $matchs);
			$list = $matchs[1];
		}

		include $this->template('app/page/tpl/_icon3');
	}
}

?>
