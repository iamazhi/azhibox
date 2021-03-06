<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$payment_lang = 'languages/'.LANG.'/payment/alipay.php';
if (file_exists($payment_lang))
{
    global $LANG;
    include_once($payment_lang);
}

/* 模块的基本信息 */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* 代码 */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* 描述对应的语言项 */
    $modules[$i]['desc']    = 'alipay_desc';
	//$_LANG['alipay_desc'] = '支付宝，是支付宝公司针对网上交易而特别推出的安全付款服务，其运作的实质是' .
        //'以支付宝为信用中介，在买家确认收到商品前，由支付宝替买卖双方暂时保管货款的一种增值服务。' .
        //'（网址：http://www.alipay.com）';

    /* 是否支持货到付款 */
    $modules[$i]['is_cod']  = '0';

    /* 是否支持在线支付 */
    $modules[$i]['is_online']  = '1';

    /* 作者 */
    $modules[$i]['author']  = 'PHPWEB TEAM';

    /* 网址 */
    $modules[$i]['website'] = 'http://www.alipay.com';

    /* 版本号 */
    $modules[$i]['version'] = '1.0.0';

    /* 配置信息 */
    $modules[$i]['config']  = array(
        array('name' => 'alipay_account',           'type' => 'text',   'value' => ''),
        array('name' => 'alipay_key',               'type' => 'text',   'value' => ''),
        array('name' => 'alipay_partner',           'type' => 'text',   'value' => ''),
        array('name' => 'service_type',				'type' => 'select', 'value' => '0'),
    );

    return;
}

/**
 * 类
 */
class alipay
{

    /**
     * 构造函数
     *
     * @access  public
     * @param
     *
     * @return void
     */
     var $pay = '';
    function alipay()
    {
    }

    function __construct()
    {
        $this->alipay();
    }

    /**
     * 生成支付代码
     * @param   array   $order      订单信息
     * @param   array   $payment    支付方式信息
     */
    function get_code($order, $payment)
    {
/*
	0 => '纯担保交易接口 create_partner_trade_by_buyer',
    1 => '标准实物双接口 trade_create_by_buyer',
    2 => '即时到账接口	 create_direct_pay_by_user',
*/
        if ($payment['service_type']==1)
        {
            $service = 'trade_create_by_buyer';
        }
		elseif($payment['service_type']==2)
		{
			$service = 'create_direct_pay_by_user';
		}
        else
        {
            $service = 'create_partner_trade_by_buyer';
        }
        $parameter = array(
            'service'           => $service,
            'partner'           => $payment['alipay_partner'],
            '_input_charset'    => 'utf-8',
            'return_url'        => return_url('alipay'),
            'notify_url'        => return_url('alipay',1),
            /* 业务参数 */
            'subject'           => 'Order SN:'.$order['order_sn'],
            'out_trade_no'      => $order['order_sn'], //
            'price'             => $order['order_amount'],
            'quantity'          => 1,
            'payment_type'      => 1,
            /* 物流参数 */
            'logistics_type'    => 'EXPRESS',
            'logistics_fee'     => 0,
            'logistics_payment' => 'BUYER_PAY_AFTER_RECEIVE',
            /* 买卖双方信息 */
            'seller_email'      => $payment['alipay_account']
        );
        kmodel($parameter);
        reset($parameter);
        $param = '';
        $sign  = '';
        foreach ($parameter AS $key => $val)
        {
            $param .= "$key=$val&";
            $sign  .= "$key=$val&";
        }

        $param = substr($param, 0, -1);
        $sign  = substr($sign, 0, -1). $payment['alipay_key'];

        $button = '<div style="text-align:left"><input type="button" onclick="window.open(\'https://www.alipay.com/cooperate/gateway.do?'.$param. '&sign='.md5($sign).'&sign_type=MD5\')" value="立即使用支付宝支付" /></div>';
        return $button;
    }

    /**
     * 响应操作
     */
    function respond()
    {
        $payment  = get_payment($_GET['code']);
        $seller_email = rawurldecode($_GET['seller_email']);
        $order_sn = str_replace($seller_email.'_', '', $_GET['out_trade_no']);
        $order_sn = trim($order_sn);

        /* 检查数字签名是否正确 */
        kmodel($_GET);
        reset($_GET);

        $sign = '';
        foreach ($_GET AS $key=>$val)
        {
            if ($key != 'sign' && $key != 'sign_type' && $key != 'code')
            {
                $sign .= "$key=$val&";
            }
        }

        $sign = substr($sign, 0, -1) . $payment['alipay_key'];
		if (md5($sign) != $_GET['sign'])
        {
			$this->err = '校验失败，若您的确已经在网关处被扣了款项，请及时联系店主，并且请不要再次点击支付按钮(原因：错误的签名)';
            return false;
        }
		/*
		WAIT_BUYER_PAY 交易创建
		WAIT_SELLER_SEND_GOODS 买家付款成功
		WAIT_BUYER_CONFIRM_GOODS 卖家发货成功
		TRADE_FINISHED 交易成功结束
		TRADE_CLOSED 交易关闭
		modify.tradeBase.totalFee 修改交易价格
		*/
        if ( $_GET['trade_status'] == "WAIT_SELLER_SEND_GOODS" || $_GET['trade_status'] == "TRADE_FINISHED" )
        {
            $orderid = $_GET['out_trade_no'];
            $orderid = trim($orderid);
            if(changeorder($orderid))
            {
                return true;
            }
        }
    }
}

?>
