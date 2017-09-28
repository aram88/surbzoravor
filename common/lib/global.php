<?php
/**
 * This file contains constants and shortcut functions that are commonly used.
 * Please only include functions are most widely used because this file
 * is included for every request. Functions are less often used are better
 * encapsulated as static methods in helper classes that are loaded on demand.
 */

/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
function wordReduction($word) {
        if (strlen($word)< 20)
            $word = $word;
        else
            $word = substr($word, 0, 15) . "...";
        return $word;
    }

function debug ($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function debugV ($data){
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}
/**
 * This is the shortcut to CHtml::encode
 */
function h($text,$limit=0)
{
	if($limit && strlen($text)>$limit && ($pos=strrpos(substr($text,0,$limit),' '))!==false)
		$text=substr($text,0,$pos).' ...';
	return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}

/**
 * This is the shortcut to nl2br(CHtml::encode())
 * @param string the text to be formatted
 * @param integer the maximum length of the text to be returned. If 0, it means no truncation.
 * @param string the label of the "read more" button if $limit is greater than 0.
 * Set this to be false if the "read more" button should not be displayed.
 * @return string the formatted text
 */
function nh($text,$limit=0,$readMore='read more')
{
	if($limit && strlen($text)>$limit)
	{
		if(($pos=strpos($text,' ',$limit))!==false)
			$limit=$pos;
		$ltext=substr($text,0,$limit);
		if($readMore!==false)
		{
			$rtext=substr($text,$limit);
			return nl2br(htmlspecialchars($ltext,ENT_QUOTES,Yii::app()->charset))
				. ' ' . l(h($readMore),'#',array('class'=>'read-more','onclick'=>'$(this).hide().next().show(); return false;'))
				. '<span style="display:none;">'
				. nl2br(htmlspecialchars($rtext,ENT_QUOTES,Yii::app()->charset))
				. '</span>';
		}
		else
			return nl2br(htmlspecialchars($ltext.' ...',ENT_QUOTES,Yii::app()->charset));
	}
	else
		return nl2br(htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset));
}

/**
 * This is the shortcut to CHtmlPurifier::purify().
 */
function ph($text)
{
	static $purifier;
	if($purifier===null)
		$purifier=new CHtmlPurifier;
	return $purifier->purify($text);
}

/**
 * Converts a markdown text into purified HTML
 */
function mh($text)
{
	static $parser;
	if($parser===null)
		$parser=new MarkdownParser;
	return $parser->safeTransform($text);
}

/**
 * This is the shortcut to CHtml::link()
 */
function l($text,$url='#',$htmlOptions=array())
{
	return CHtml::link($text, $url, $htmlOptions);
}
/**
 * This is used to create a tracking link
 */
function tl($text, $url, $category, $action=null, $label=null, $htmlOptions=array())
{
     if(null!==$action) $htmlOptions['data-track-action']=$action;
     if(null!==$label) $htmlOptions['data-track-label']=$label;
     $htmlOptions['data-track-category']=$category;
     $htmlOptions['class']='global-click-track';
    
     return l($text, $url, $htmlOptions);
}

/**
 * Generates an image tag.
 * @param string the image URL
 * @param string the tool tip for the image. If null, the tooltip will not be displayed.
 * @param integer the width of the image. If null, the width attribute will not be rendered.
 * @param integer the height of the image. If null, the height attribute will not be rendered.
 * @param array additional HTML attributes (see {@link tag}).
 * @return string the generated image tag
 */
function img($url,$title=null,$width=null,$height=null,$htmlOptions=array())
{
	$htmlOptions['src']=$url;
	if($title!==null)
		$htmlOptions['title']=$title;
	if($width!==null && $height!==null)
	{
		$htmlOptions['width']=$width;
		$htmlOptions['height']=$height;
	}
	if(!isset($htmlOptions['alt']))
		$htmlOptions['alt']='';
	return CHtml::tag('img',$htmlOptions);
}

/**
 * This is the shortcut to Yii::t().
 * Note that the category parameter is removed from the function.
 * It defaults to 'application'. If a different category needs to be specified,
 * it should be put as a prefix in the message, separated by '|'.
 * For example, t('backend|this is a test').
 */
function t($message, $params=array(), $source=null, $language=null)
{
	if(($pos=strpos($message,'|'))!==false)
	{
		$category=substr($message,0,$pos);
		$message=substr($message,$pos+1);
	}
	else
		$category='application';
	return Yii::t($category, $message, $params, $source, $language);
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
	return Yii::app()->getUrlManager()->createUrl($route,$params,$ampersand);
}

/**
 * This is the shortcut to Yii::app()->request->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
function bu($url='')
{
    static $baseUrl;
    if ($baseUrl===null)
	    $baseUrl=Yii::app()->request->baseUrl;
    return $baseUrl.'/'.ltrim($url,'/');
}

/**
 * This is the shortcut to creating a url and returning the absolute url for the frontend
 */
function frontendUrl($route,$params=array(),$ampersand='&')
{
	$url = url($route, $params, $ampersand);
	$request=app()->getRequest();
	$host = param('frontend.host.info');
	if($request->getIsSecureConnection())
		$http='https';
	else
		$http='http';
	
	$absoluteUrl=$http.'://'.$host.$url;
	return $absoluteUrl;
}

/**
 * This is the shortcut to getting the base url for css and js and image assets using
 * either Yii::app()->request->baseUrl or Yii::app()->theme->baseUrl
 * If the parameter is given, it will be returned and prefixed with the app baseUrl.
 */
/*
function asset($path)
{
    static $themeBaseUrl;
	if ($themeBaseUrl===null)
	    $themeBaseUrl=Yii::app()->theme->baseUrl;
	
	$themeFile = $themeBaseUrl.'/'.ltrim($path,'/');
    if (file_exists(Yii::getPathOfAlias('site.frontend.www').$themeFile))
			return $themeFile;
	else
		return bu($path);
}

function s3asset($path)
{
	static $themeBaseUrl;
	if ($themeBaseUrl===null)
	    $themeBaseUrl=Yii::app()->theme->baseUrl;
	$themeFilePath = Yii::getPathOfAlias('site.frontend.www').$themeBaseUrl.'/'.ltrim($path,'/');
	if (file_exists($themeFilePath))
		return Yii::app()->assetManager->getPublishedUrl($themeFilePath);
	else
		return Yii::app()->assetManager->getPublishedUrl(Yii::getPathOfAlias('site.frontend.www') . '/'.ltrim($path,'/'));
}
*/

function assetpath($file, $type, $alias=null)
{
	$themePath = null;
	if(empty($alias))
	{
		if (isset(Yii::app()->theme))
			$themePath = Yii::app()->theme->getBasePath();
		
		$path = Yii::getPathOfAlias('application.www');
	}
	else
		$path=Yii::getPathOfAlias($alias);
	
	$path .= '/' . $type . '/' . $file;
	if(!empty($themePath))
	{
		$themePath .= '/' . $type . '/' . $file;
		if (file_exists($themePath))
			$path = $themePath;
	}
		
	return $path;
	/*if (file_exists($themeFilePath))
		return $themeFilePath;
	else
		return Yii::getPathOfAlias('site.frontend.www.'.$type) . '/'.$file;*/
}

/**
 * Returns the named application parameter.
 * This is the shortcut to Yii::app()->params[$name].
 */
function param($name)
{
	return Yii::app()->params[$name];
}

/**
 * This is the shortcut to Yii::app()->user.
 * @return WebUser
 */
function user()
{
	return Yii::app()->user;
}

/**
 * This is the shortcut to Yii::app()
 * @return CWebApplication
 */
function app()
{
	return Yii::app();
}

/**
 * This is the shortcut to Yii::app()->clientScript
 * @return CClientScript
 */
function cs()
{
	return Yii::app()->clientScript;
}

/**
 * This is the shortcut to Yii::app()->adManager
 * @return an ad manager implementation (e.g. DfpAdManager)
 */
function ad()
{
	$adMgr = Yii::app()->adManager;
	if(MOBILE) 
		$adMgr->mobile = true;
	return $adMgr;
}

/**
 * This is the shortcut to Yii::app()->assetManager
 * @return Yii asset manager
 */
function am()
{
	return Yii::app()->assetManager;
}

/**
 * This is the shortcut to Yii::app()->db
 * @return CDbConnection
 */
function db()
{
	return Yii::app()->db;
}

/**
 * This is the shortcut to Yii::app()->request
 * @return CHttpRequest
 */
function rq()
{
	return Yii::app()->request;
}

/**
 * This is the shortcut to Yii::app()->user->checkAccess().
 */
function allow($operation,$params=array(),$allowCaching=true)
{
	return Yii::app()->user->checkAccess($operation,$params,$allowCaching);
}

/**
 * Ensures the current user is allowed to perform the specified operation.
 * An exception will be thrown if not.
 * This is similar to {@link access} except that it does not return value.
 */
function ensureAllow($operation,$params=array(),$allowCaching=true)
{
	if(!Yii::app()->user->checkAccess($operation,$params,$allowCaching))
		throw new CHttpException(403,'You are not allowed to perform this operation.');
	return true;
}

/**
 * Shortcut to Yii::app()->format (utilities for formatting structured text)
 */
function format()
{
    return Yii::app()->format;
}

/**
 * Input button with custom css styling. See frontend/www/css/global.css:a.g-button definitions.
 */
function button($label, $options=array(), $submit=false)
{
    $options=array_merge(array('class'=>'g-button'), $options);
    if($submit)
        $options['class'] .= ' submit-button';
    $attrs='';
    foreach($options as $k=>$v)
        $attrs .= sprintf('%s="%s" ', $k, htmlspecialchars($v));
    $type = $submit ? 'submit' : 'button';
    return sprintf('<span %s><input type="%s" value="%s" /></span>', $attrs, $type, htmlspecialchars($label));
}

/**
 * Submit button with custom css styling.
 */
function submit($label, $options=array())
{
    return button($label, $options, true);
}

/**
 * Call to action styled buttons.
 */
function action_button($label, $url, $cssClass='gray', $htmlOptions=array())
{
    $class = array('g-action-button', 'action', $cssClass);
    if(isset($htmlOptions['class']))
    	$class[]=$htmlOptions['class'];
   	$htmlOptions['class']=implode(' ',$class);
    $text = '<span>'.$label.'</span>';
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * Returns a shortened url, using bit.ly
 * @link http://davidwalsh.name/bitly-api-php
 */
function shortUrl($uri,$cacheKey=null,$cacheSeconds=3600)
{
	// return the cached short url if the cache key is specified and not expired
	if($cacheKey !== null && ($cache = Yii::app()->cache) !== null)
		if(($cacheValue = $cache->get($cacheKey)) !== false)
			return $cacheValue;
	
	return $uri;
	
	/* commenting out until we can figure out the rate limit exceeded issue
	$config=array(
		'apiKey'=>'R_bdc32119279fcc7e3d8377ccc93973bc',
		'login'=>'naturallycurly',
	);
	
	$connectURL = 'http://api.bit.ly/v3/shorten?login='.$config['login'].'&apiKey='.$config['apiKey'].'&uri='.urlencode($uri).'&format=txt';
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$connectURL);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
	$shortUrl = curl_exec($ch);
	curl_close($ch);
	
	// cache the short url if the cache key is specified
	if($cacheKey !== null && ($cache = Yii::app()->cache) !== null)
		$cache->set($cacheKey, $shortUrl,$cacheSeconds);
	
	return trim($shortUrl);
	*/
}

//gives back the number of minutes, hours, days, weeks, months, or years that have passed since the input $seconds
function displayTimePassed($seconds)
{
	$now = time();
	if( $now < $seconds ) 
		return 'moments';
	else
	{
		$secondsPassed = $now - $seconds;
		$tokens = array (
		        31536000 => 'year',
		        2592000 => 'month',
		        604800 => 'week',
		        86400 => 'day',
		        3600 => 'hour',
		        60 => 'minute',
		        1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($secondsPassed < $unit) continue;
		    $numberOfUnits = floor($secondsPassed / $unit);
		    return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}
	}
	return 'moments';
}

/**
 * Helper function that shortens a string and adds a suffix (such as ...) to the end if it exceeds a certain length.
 * 
 * @param object $string
 * @param object $length
 * @param object $suffix [optional]
 * @return 
 */
function limit($string,$length,$suffix='...')
{
	// If the string exceeds the limit
	if(strlen($string)>$length)
	{
		// Chop the remainder off
		$shortString=substr($string,0,$length);
		
		// Determine if we've chopped in the middle of a word
		$choppedString=substr($string,$length);
		if($choppedString[0]!=' ')
		{
			// Create an array of words
			$shortWords=explode(' ',$shortString);
			// Remove the last chopped word
			unset($shortWords[count($shortWords)-1]);
			// And put it back together
			$shortString=implode(' ',$shortWords);
		}
		
		return trim($shortString).$suffix;
	}
	else
		return $string;
}

function slug($string)
{
	return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),$string));
}

/**
 * Format phone number
 */
function formatPhone($t) {
	$t = str_replace(array('(', ')', '-', ' '), '', $t);
	return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/","($1) $2-$3", $t);
}

