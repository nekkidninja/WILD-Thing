var  UNINIT   = 0;
var  LOADING  = 1;
var  LOADED   = 2;
var  INTERACT = 3;
var  COMPLETE = 4;

// Preload and cache the ticker image used for the Ajax wait states
var ticker  = new Image();
ticker.src = '../img/loading-ticker-b.gif';

var outputString = "";
var tickertext = '<img src="/img/icon/loading-ticker-b.gif" style="border: 0; padding-right: 5px; vertical-align: middle;" />retrieving...';
var msgtxt = "";

var idref='msgbox';

function loadcheck()
{
	alert("Yep, I loaded");
}

function getResponses(id)
{
	getContent(idref,'../TEST/Display/fetch.ajax.php?id=' + id);
	document.getElementById('responselist').style.visibilty='visible';
}

/*
function getTimedResponses(id, timelimit)
{
	setTimeOut( timelimit,"getResponses(id)" );
}
*/

function getContent(id,url)
{
	var req = makeRequest(url);

	if ( document.getElementById(id) && req )
	{
		showMessage(id,req);
	}
	
}

function showMessage(id,msgText)
{
	if ( document.getElementById(id) )
	{
		document.getElementById(id).innerHTML = msgText;
	}
}

// Pass the url to retieve and the variable in which to store the returned text
function makeRequest(url)
{
	var ro = null;

	if (window.XMLHttpRequest)
	{ 
		// Mozilla, Safari,...
		ro = new XMLHttpRequest();
	} 
	else if (window.ActiveXObject) 
	{
		try 
		{
			ro = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			try 
			{
				ro = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				return null;
			}
		}
	}

	if (!ro) 
	{
		return null;
	}
	else
	{
		ro.onreadystatechange = function() { handleResponse(ro); };
		ro.open('GET', url, true);
		ro.send(null);
		return ro.responseText;
	}

}

function handleResponse(ro) 
{
    switch (ro.readyState)
    {
	case UNINIT:
		showMessage(idref,'Not initialised');
		break;
	case LOADING:
		showMessage(idref,tickertext);
		break;
	case LOADED:
		showMessage(idref,'Loaded');
		break;
	case INTERACT:
		showMessage(idref,tickertext);
		break;
	case COMPLETE:
	        switch (ro.status)
		{
			case 200 :
				var res = ro.responseText;
				showMessage(idref,res)
				break;
			case 403 : 
				showMessage(idref,"Permission denied")
				break;
			case 404 : 
				showMessage(idref,"No such file")
				break;
			case 500 : 
				showMessage(idref,"Problem at server end")
				break;
			default  :
				showMessage(idref,"Something weird has happened. The HTTP Response code was " + ro.status);
		}
    }
}
