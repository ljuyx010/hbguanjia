<?php
//p格式化打印函数
function p ($array){

	dump($array,1,'<pre>',0);
}
//发布内容表情替换
function replace_phiz($content){
	//preg_match_all 正则表达式匹配
	preg_match_all('/\[.*?\]/is', $content, $arr);

	if ($arr[0]){
		$phiz = F('phiz','','./Data/');
		foreach ($arr[0] as $v) {
			foreach ($phiz as $key => $value) {
				if ($v == '['.$value.']'){
					$content = str_replace($v, '<img src="'.__ROOT__.'/public/images/phiz/'.$key.'.gif"/>', $content);
				break;	
				}
			}
		}
	}
	return $content;
}
//判断多维数组中是否存在某个值
function deep_in_array($value, $array) { 
	foreach($array as $item) { 
		if(!is_array($item)) { 
			if ($item == $value) {
			return true;
		} else {
	continue; 
		}
	} 
if(in_array($value, $item)) {
	return true; 
	} else if(deep_in_array($value, $item)) {
		return true; 
		}
	} 
	return false; 
}

//截取中文字串
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true){
    if(function_exists("mb_substr")){
            if ($suffix && strlen($str)>$length)
                return mb_substr($str, $start, $length, $charset)."...";
        else
                 return mb_substr($str, $start, $length, $charset);
    }
    elseif(function_exists('iconv_substr')) {
            if ($suffix && strlen($str)>$length)
                return iconv_substr($str,$start,$length,$charset)."...";
        else
                return iconv_substr($str,$start,$length,$charset);
    }
    $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    if($suffix) return $slice."…";
    return $slice;
}

/**
 * 字符串截取，支持中文和其他编码
 * @param string  $String  the string to cut. 
 * @param int     $Length  the length of returned string. 
 * @param booble  $Append  whether append "...": false|true 
 * @return string           the cutted string. 
 */
function cutStr($String,$Length,$Append = false) 
{ 
    if (strlen($String) <= $Length ) 
    { 
        return $String; 
    } 
    else 
    { 
        $I = 0; 
        while ($I < $Length) 
        { 
            $StringTMP = substr($String,$I,1); 
            if ( ord($StringTMP) >=224 ) 
            { 
                $StringTMP = substr($String,$I,3); 
                $I = $I + 3; 
            } 
            elseif( ord($StringTMP) >=192 ) 
            { 
                $StringTMP = substr($String,$I,2); 
                $I = $I + 2; 
            } 
            else 
            { 
                $I = $I + 1; 
            } 
            $StringLast[] = $StringTMP; 
        } 
        $StringLast = implode("",$StringLast); 
        if($Append) 
        { 
            $StringLast .= "..."; 
        } 
        return $StringLast; 
    } 
} 
/**
 * 只保留字符串首尾字符，隐藏中间用*代替（两个字符时只显示第一个）
 * @param string $user_name 姓名
 * @return string 格式化后的姓名
 */
function cut_name($user_name){
    $strlen     = mb_strlen($user_name, 'utf-8');
    $firstStr     = mb_substr($user_name, 0, 1, 'utf-8');
    $lastStr     = mb_substr($user_name, -1, 1, 'utf-8');
    return $strlen == 2 ? $firstStr . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
}
/**
 * 功能：邮件发送函数
 * @param string $to 目标邮箱
 * @param string $subject 邮件主题（标题）
 * @param string $to 邮件内容
 * @return bool true
 */
 function sendMail($to, $subject, $content) {
    vendor('PHPMailer.class#smtp'); 
    vendor('PHPMailer.class#phpmailer');    //注意这里的大小写哦，不然会出现找不到类，PHPMailer是文件夹名字，class#phpmailer就代表class.phpmailer.php文件名
    $mail = new PHPMailer();
    // 装配邮件服务器
    if (C('MAIL_SMTP')) {
        $mail->IsSMTP();
    }
    $mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
	$mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
	$mail->Username = C('MAIL_USERNAME'); //你的邮箱名
	$mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
	$mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
	$mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
	$mail->AddAddress($to,"尊敬的客户");
	$mail->WordWrap = 50; //设置每行字符长度
	$mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
	$mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
	$mail->Subject =$subject; //邮件主题
	$mail->Body = $content; //邮件内容
	$mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    // 发送邮件
    return($mail->Send());
 }
 
 	/**
	 * 使用curl获取远程数据
	 * @param  string $url url连接
	 * @return string      获取到的数据
	 */
	function curl_get_contents($url){
		$ch=curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);                //设置访问的url地址
		// curl_setopt($ch,CURLOPT_HEADER,1);               //是否显示头部信息
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);               //设置超时
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);   //用户访问代理 User-Agent
		curl_setopt($ch, CURLOPT_REFERER,$_SERVER['HTTP_HOST']);        //设置 referer
		curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);          //跟踪301
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        //返回结果
		$r=curl_exec($ch);
		curl_close($ch);
		return $r;
	}
	/**
	 * 生成二维码
	 * @param  string  $url  url连接
	 * @param  integer $size 尺寸 纯数字
	 */
	function qrcode($url){
		Vendor('phpqrcode.phpqrcode');
		//二维码URL参数
		$text =  $url;
		//二维码图片保存路径(若不生成文件则设置为false)
		$filename = "./Upload/fxewm/" . time() . ".png";
		$fileurl = "/Upload/fxewm/" . time() . ".png";
		//二维码容错率，默认L
		$level = "L";
		//二维码图片每个黑点的像素，默认4
		$size = '6';
		//二维码边框的间距，默认2
		$padding = 2;
		//保存二维码图片并显示出来，$filename必须传递文件路径
		$saveandprint = true;

		//生成二维码图片
		QRcode::png($text,$filename,$level,$size,$padding,$saveandprint);

		//二维码logo
		$logo = "./Public/images/logo.jpg";
		$QR = imagecreatefromstring(file_get_contents($filename));
		$logo = imagecreatefromstring(file_get_contents($logo));
		$QR_width = imagesx($QR);
		$QR_height = imagesy($QR);
		$logo_width = imagesx($logo);
		$logo_height = imagesy($logo);
		$logo_qr_width = $QR_width / 5;
		$scale = $logo_width / $logo_qr_width;
		$logo_qr_height = $logo_height / $scale;
		$from_width = ($QR_width - $logo_qr_width) / 2;
		imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
		imagepng($QR,$filename);
		return $fileurl;
	}
	
	/** 
	 * 微信分享初始化 
	 * @return array 
	 * @author simon <vsiryxm@qq.com> 
	 */  
	if (!function_exists('wx_share_init')) {  
		function wx_share_init() {  
			$wxconfig = array();  
			vendor('Wxshare.jssdk');  
			$config = APP_DEBUG ? C("_APPID_") : C("_APPSECRET_"); //这里配置了微信公众号的AppId和AppSecret  
			$jssdk = new JSSDK($config['APPID'], $config['APPSECRET']);  
			$wxconfig = $jssdk->GetSignPackage();  
			return $wxconfig;  
		}  
	}  
?>