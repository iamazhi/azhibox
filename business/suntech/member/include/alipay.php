<?php
defined('IN_PHPJSJ') or exit('Access Denied');

$payment_lang = 'languages/'.LANG.'/payment/alipay.php';
if (file_exists($payment_lang))
{
    global $LANG;
    include_once($payment_lang);
}

/* ģ��Ļ�����Ϣ */
if (isset($set_modules) && $set_modules == TRUE)
{
    $i = isset($modules) ? count($modules) : 0;

    /* ���� */
    $modules[$i]['code']    = basename(__FILE__, '.php');

    /* ������Ӧ�������� */
    $modules[$i]['desc']    = 'alipay_desc';
	//$_LANG['alipay_desc'] = '֧��������֧������˾������Ͻ��׶��ر��Ƴ��İ�ȫ���������������ʵ����' .
        //'��֧����Ϊ�����н飬�����ȷ���յ���Ʒǰ����֧����������˫����ʱ���ܻ����һ����ֵ����' .
        //'����ַ��http://www.alipay.com��';

    /* �Ƿ�֧�ֻ������� */
    $modules[$i]['is_cod']  = '0';

    /* �Ƿ�֧������֧�� */
    $modules[$i]['is_online']  = '1';

    /* ���� */
    $modules[$i]['author']  = 'PHPWEB TEAM';

    /* ��ַ */
    $modules[$i]['website'] = 'http://www.alipay.com';

    /* �汾�� */
    $modules[$i]['version'] = '1.0.0';

    /* ������Ϣ */
    $modules[$i]['config']  = array(
        array('name' => 'alipay_account',           'type' => 'text',   'value' => ''),
        array('name' => 'alipay_key',               'type' => 'text',   'value' => ''),
        array('name' => 'alipay_partner',           'type' => 'text',   'value' => ''),
        array('name' => 'service_type',				'type' => 'select', 'value' => '0'),
    );

    return;
}

/**
 * ��
 */
class alipay
{

    /**
     * ���캯��
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
     * ����֧������
     * @param   array   $order      ������Ϣ
     * @param   array   $payment    ֧����ʽ��Ϣ
     */
    function get_code($order, $payment)
    {
/*
	0 => '���������׽ӿ� create_partner_trade_by_buyer',
    1 => '��׼ʵ��˫�ӿ� trade_create_by_buyer',
    2 => '��ʱ���˽ӿ�	 create_direct_pay_by_user',
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
            /* ҵ����� */
            'subject'           => 'Order SN:'.$order['order_sn'],
            'out_trade_no'      => $order['order_sn'], //
            'price'             => $order['order_amount'],
            'quantity'          => 1,
            'payment_type'      => 1,
            /* �������� */
            'logistics_type'    => 'EXPRESS',
            'logistics_fee'     => 0,
            'logistics_payment' => 'BUYER_PAY_AFTER_RECEIVE',
            /* ����˫����Ϣ */
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

        $button = '<div style="text-align:left"><input type="button" onclick="window.open(\'https://www.alipay.com/cooperate/gateway.do?'.$param. '&sign='.md5($sign).'&sign_type=MD5\')" value="����ʹ��֧����֧��" /></div>';
        return $button;
    }

    /**
     * ��Ӧ����
     */
    function respond()
    {
        $payment  = get_payment($_GET['code']);
        $seller_email = rawurldecode($_GET['seller_email']);
        $order_sn = str_replace($seller_email.'_', '', $_GET['out_trade_no']);
        $order_sn = trim($order_sn);

        /* �������ǩ���Ƿ���ȷ */
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
			$this->err = 'У��ʧ�ܣ�������ȷ�Ѿ������ش������˿���뼰ʱ��ϵ�����������벻Ҫ�ٴε��֧����ť(ԭ�򣺴����ǩ��)';
            return false;
        }
		/*
		WAIT_BUYER_PAY ���״���
		WAIT_SELLER_SEND_GOODS ��Ҹ���ɹ�
		WAIT_BUYER_CONFIRM_GOODS ���ҷ����ɹ�
		TRADE_FINISHED ���׳ɹ�����
		TRADE_CLOSED ���׹ر�
		modify.tradeBase.totalFee �޸Ľ��׼۸�
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
