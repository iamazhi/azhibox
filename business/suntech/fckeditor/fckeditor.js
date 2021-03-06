/*
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2008 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * This is the integration file for JavaScript.
 *
 * It defines the FCKeditor class that can be used to create editor
 * instances in a HTML page in the client side. For server side
 * operations, use the specific integration system.
 */

// FCKeditor Class
var FCKeditor = function(instanceName, width, height, toolbarSet, value )
{
	// Properties
	this.InstanceName	= instanceName ;
	this.Width			= width			|| '100%' ;
	this.Height			= height		|| '200' ;
	this.ToolbarSet		= toolbarSet ;
	
	this.Value			= value			|| '' ;
	this.BasePath		= FCKeditor.BasePath ;
	this.CheckBrowser	= true ;
	this.DisplayErrors	= true ;
	this.Config			= new Object() ;
	// Events
	this.OnError		= null ;	// function( source, errorNumber, errorDescription )
}

/**
 * This is the default BasePath used by all editor instances.
 */
FCKeditor.BasePath = '/fckeditor/' ;

/**
 * The minimum height used when replacing textareas.
 */
FCKeditor.MinHeight = 200 ;

/**
 * The minimum width used when replacing textareas.
 */
FCKeditor.MinWidth = 750 ;
FCKeditor.prototype.Version			= '2.6.3' ;
FCKeditor.prototype.VersionBuild	= '19836' ;

FCKeditor.prototype.Create = function()
{
	document.write( this.CreateHtml() ) ;
}

FCKeditor.prototype.CreateHtml = function()
{
	// Check for errors
	if ( !this.InstanceName || this.InstanceName.length == 0 )
	{
		this._ThrowError( 701, 'You must specify an instance name.' ) ;
		return '' ;
	}

	var sHtml = '' ;

	if ( !this.CheckBrowser || this._IsCompatibleBrowser() )
	{
		
		sHtml += '<input type="hidden" id="' + this.InstanceName + '" name="' + this.InstanceName + '" value="' + this._HTMLEncode( this.Value ) + '" style="display:none" />' ;
		sHtml += this._GetConfigHtml() ;
		sHtml += this._GetIFrameHtml() ;
	}
	else
	{
		var sWidth  = this.Width.toString().indexOf('%')  > 0 ? this.Width  : this.Width  + 'px' ;
		var sHeight = this.Height.toString().indexOf('%') > 0 ? this.Height : this.Height + 'px' ;

		sHtml += '<textarea name="' + this.InstanceName +
			'" rows="4" cols="40" style="width:' + sWidth +
			';height:' + sHeight ;

		if ( this.TabIndex )
			sHtml += '" tabindex="' + this.TabIndex ;

		sHtml += '">' +
			this._HTMLEncode( this.Value ) +
			'<\/textarea>' ;
	}
	return sHtml ;
}

FCKeditor.prototype.ReplaceTextarea = function()
{
	if ( !this.CheckBrowser || this._IsCompatibleBrowser() )
	{
		// We must check the elements firstly using the Id and then the name.
		var oTextarea = document.getElementById( this.InstanceName ) ;
		var colElementsByName = document.getElementsByName( this.InstanceName ) ;
		var i = 0;
		while ( oTextarea || i == 0 )
		{
			if ( oTextarea && oTextarea.tagName.toLowerCase() == 'textarea' )
				break ;
			oTextarea = colElementsByName[i++] ;
		}

		if ( !oTextarea )
		{
			alert( 'Error: The TEXTAREA with id or name set to "' + this.InstanceName + '" was not found' ) ;
			return ;
		}

		oTextarea.style.display = 'none' ;

		if ( oTextarea.tabIndex )
			this.TabIndex = oTextarea.tabIndex ;

		this._InsertHtmlBefore( this._GetConfigHtml(), oTextarea ) ;
		this._InsertHtmlBefore( this._GetIFrameHtml(), oTextarea ) ;
	}
}

FCKeditor.prototype._InsertHtmlBefore = function( html, element )
{
	if ( element.insertAdjacentHTML )	// IE
		element.insertAdjacentHTML( 'beforeBegin', html ) ;
	else								// Gecko
	{
		var oRange = document.createRange() ;
		oRange.setStartBefore( element ) ;
		var oFragment = oRange.createContextualFragment( html );
		element.parentNode.insertBefore( oFragment, element ) ;
	}
}

FCKeditor.prototype._GetConfigHtml = function()
{
	var sConfig = '' ;
	for ( var o in this.Config )
	{
		if ( sConfig.length > 0 ) sConfig += '&amp;' ;
		sConfig += encodeURIComponent( o ) + '=' + encodeURIComponent( this.Config[o] ) ;
	}

	return '<input type="hidden" id="' + this.InstanceName + '___Config" value="' + sConfig + '" style="display:none" />' ;
}

FCKeditor.prototype._GetIFrameHtml = function()
{
	var sFile = 'fckeditor.html' ;

	try
	{
		if ( (/fcksource=true/i).test( window.top.location.search ) )
			sFile = 'fckeditor.original.html' ;
	}
	catch (e) { /* Ignore it. Much probably we are inside a FRAME where the "top" is in another domain (security error). */ }
	//alert(this.Module);
	var sLink = this.BasePath + 'editor/' + sFile + '?InstanceName=' + encodeURIComponent( this.InstanceName );
	if (this.ToolbarSet)
		sLink += '&amp;Toolbar=' + this.ToolbarSet ;

	html = '<iframe id="' + this.InstanceName +
		'___Frame" src="' + sLink +
		'" width="' + this.Width +
		'" height="' + this.Height ;

	if ( this.TabIndex )
		html += '" tabindex="' + this.TabIndex ;

	html += '" frameborder="0" scrolling="no"></iframe>' ;

	return html ;
}

FCKeditor.prototype._IsCompatibleBrowser = function()
{
	return FCKeditor_IsCompatibleBrowser() ;
}

FCKeditor.prototype._ThrowError = function( errorNumber, errorDescription )
{
	this.ErrorNumber		= errorNumber ;
	this.ErrorDescription	= errorDescription ;

	if ( this.DisplayErrors )
	{
		document.write( '<div style="COLOR: #ff0000">' ) ;
		document.write( '[ FCKeditor Error ' + this.ErrorNumber + ': ' + this.ErrorDescription + ' ]' ) ;
		document.write( '</div>' ) ;
	}

	if ( typeof( this.OnError ) == 'function' )
		this.OnError( this, errorNumber, errorDescription ) ;
}

FCKeditor.prototype._HTMLEncode = function( text )
{
	if ( typeof( text ) != "string" )
		text = text.toString() ;

	text = text.replace(
		/&/g, "&amp;").replace(
		/"/g, "&quot;").replace(
		/</g, "&lt;").replace(
		/>/g, "&gt;") ;

	return text ;
}

;(function()
{
	var textareaToEditor = function( textarea )
	{
		var editor = new FCKeditor( textarea.name ) ;

		editor.Width = Math.max( textarea.offsetWidth, FCKeditor.MinWidth ) ;
		editor.Height = Math.max( textarea.offsetHeight, FCKeditor.MinHeight ) ;

		return editor ;
	}

	/**
	 * Replace all <textarea> elements available in the document with FCKeditor
	 * instances.
	 *
	 *	// Replace all <textarea> elements in the page.
	 *	FCKeditor.ReplaceAllTextareas() ;
	 *
	 *	// Replace all <textarea class="myClassName"> elements in the page.
	 *	FCKeditor.ReplaceAllTextareas( 'myClassName' ) ;
	 *
	 *	// Selectively replace <textarea> elements, based on custom assertions.
	 *	FCKeditor.ReplaceAllTextareas( function( textarea, editor )
	 *		{
	 *			// Custom code to evaluate the replace, returning false if it
	 *			// must not be done.
	 *			// It also passes the "editor" parameter, so the developer can
	 *			// customize the instance.
	 *		} ) ;
	 */
	FCKeditor.ReplaceAllTextareas = function()
	{
		var textareas = document.getElementsByTagName( 'textarea' ) ;

		for ( var i = 0 ; i < textareas.length ; i++ )
		{
			var editor = null ;
			var textarea = textareas[i] ;
			var name = textarea.name ;

			// The "name" attribute must exist.
			if ( !name || name.length == 0 )
				continue ;

			if ( typeof arguments[0] == 'string' )
			{
				// The textarea class name could be passed as the function
				// parameter.

				var classRegex = new RegExp( '(?:^| )' + arguments[0] + '(?:$| )' ) ;

				if ( !classRegex.test( textarea.className ) )
					continue ;
			}
			else if ( typeof arguments[0] == 'function' )
			{
				// An assertion function could be passed as the function parameter.
				// It must explicitly return "false" to ignore a specific <textarea>.
				editor = textareaToEditor( textarea ) ;
				if ( arguments[0]( textarea, editor ) === false )
					continue ;
			}

			if ( !editor )
				editor = textareaToEditor( textarea ) ;

			editor.ReplaceTextarea() ;
		}
	}
})() ;

function FCKeditor_IsCompatibleBrowser()
{
	var sAgent = navigator.userAgent.toLowerCase() ;

	// Internet Explorer 5.5+
	if ( /*@cc_on!@*/false && sAgent.indexOf("mac") == -1 )
	{
		var sBrowserVersion = navigator.appVersion.match(/MSIE (.\..)/)[1] ;
		return ( sBrowserVersion >= 5.5 ) ;
	}

	// Gecko (Opera 9 tries to behave like Gecko at this point).
	if ( navigator.product == "Gecko" && navigator.productSub >= 20030210 && !( typeof(opera) == 'object' && opera.postError ) )
		return true ;

	// Opera 9.50+
	if ( window.opera && window.opera.version && parseFloat( window.opera.version() ) >= 9.5 )
		return true ;

	// Adobe AIR
	// Checked before Safari because AIR have the WebKit rich text editor
	// features from Safari 3.0.4, but the version reported is 420.
	if ( sAgent.indexOf( ' adobeair/' ) != -1 )
		return ( sAgent.match( / adobeair\/(\d+)/ )[1] >= 1 ) ;	// Build must be at least v1

	// Safari 3+
	if ( sAgent.indexOf( ' applewebkit/' ) != -1 )
		return ( sAgent.match( / applewebkit\/(\d+)/ )[1] >= 522 ) ;	// Build must be at least 522 (v3)

	return false ;
}

var objid=0;

function parent_file_list(obj) {
	$.each(obj,function(i,n){
		objid++;
		var d = n.split(' ');
		var key = d[0];
		var MM_objid = d[1];
		var url = d[2];
		$('#MM_file_list_'+MM_objid).append('<div id="MM_file_list_'+objid+'">'+url+' <a href=\'###\' onMouseOver=\'javascript:FilePreview("'+url+'", 1);\' onMouseout=\'javascript:FilePreview("", 0);\'>查看</a> | <a href="javascript:insertHTMLToEditor(\'<img src='+url+'>\',\''+MM_objid+'\')">插入</A> | <a href="javascript:del_file(\''+key+'\',\''+url+'\','+objid+')">删除</a><br>');
		insertHTMLToEditor("<img src=\""+url+"\">",MM_objid);})
}

function insertHTMLToEditor(codeStr,MM_objid)
{
	oEditor = FCKeditorAPI.GetInstance(MM_objid) ;if ( oEditor.EditMode == FCK_EDITMODE_WYSIWYG ){oEditor.InsertHtml(codeStr) ;}
	delete(oEditor);
}	

function del_file(key,url,id)
{
	$.get(SiteUrl + '?file=attachment&filepath='+url+'&verfiy='+key+'&module=' ,function(data){if(data=='ok'){$('#MM_file_list_'+id).hide();}})
}//$.get(SiteUrl + 'attachment.php?filepath='+url+'&verfiy='+key+'&module='+Module ,function(data){if(data=='ok'){$('#MM_file_list_'+id).hide();}})

function insert_page(editorid)
{
	oEditor = FCKeditorAPI.GetInstance(editorid);
    oEditor.InsertHtml('[page]');
}

function insert_page_title(editorid,insertdata)
{
	if(insertdata)
	{
		oEditor = FCKeditorAPI.GetInstance(editorid);
		var data = oEditor.GetData();
		var page_title_value = $("#page_title_value").val();
		if(page_title_value=='')
		{
			$("#msg_page_title_value").html("<font color='red'>请输入子标题</font>");
			return false;
		}
		page_title_value = '[page]'+page_title_value+'[/page]';
		if(data.indexOf('[page]') === -1) oEditor.SetData(page_title_value+data);
		else oEditor.InsertHtml(page_title_value);
		$("#page_title_value").val('');
		$("#msg_page_title_value").html('');
	}
	else
	{
		$("#page_title_div").slideDown("fast");
	}
}

if(!editor_data_id) var editor_data_id = '';
var dataurl = 'fckeditor/data.php';
var lastdata = Array();

function update_editor_data()
{
	$.each(editor_data_id.split('|'), function(i, n){
		if (n!='')
		{
			oEditor = FCKeditorAPI.GetInstance(n);
			$("#"+n+"_save").html('正在自动保存中...');
			var data = oEditor.GetData();
			if(data !='' && data != '<br />' && data != lastdata[n])
			{
				lastdata[n] = data;
				$.post(SiteUrl+dataurl, {data: data, editorid: n}, function(data){});
			}
			$("#"+n+"_save").html('');
		}
	});
}

function get_editor_data_list(editorid, hour)
{
	if(hour == '') hour = 1;
	$("#"+editorid+'_div').slideDown("fast");
	$.getJSON(SiteUrl+dataurl, {editorid:editorid, action:'get', hour:hour, time:Math.random()},function(data){
		if(data != '')
		{
			var str = '';
			$.each(data, function(i, n){
				if (n.created_time)
				{
					str += '<li style="border-bottom:dashed #cccccc 1px"><a href="javascript:get_editor_data(\''+editorid+'\','+n.id+')">'+n.created_time+'</a></li>';
				}
			});
			$("#"+editorid+'_lists').html(str);
		}
		else
		{
			$("#"+editorid+'_lists').html('<li>暂无数据</li>');
		}
	});
}

function get_editor_data(editorid, ids)
{
	$.get(SiteUrl+dataurl, {id:ids,action:'get_data'},function(data)
	{
		oEditor = FCKeditorAPI.GetInstance(editorid);
		oEditor.SetData(data);
		$("#"+editorid+'_div').slideUp("fast");
	});
}

$(".hour").click(function(){
	$(".hour").css('font-weight','normal');
	$(this).css('font-weight','bold');
});