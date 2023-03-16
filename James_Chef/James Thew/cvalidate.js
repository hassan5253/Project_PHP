
//////////////////////////////////////////////////////////////////
//	- COOL VALIDATE	v2.00 -										//
//////////////////////////////////////////////////////////////////
//	Created By ;												//
// 	SARFRAZ AHMED CHANDIO										//
//	sarfraznawaz2005@gmail.com									//
//																//
//	Create Date: 30 Jan 2009									//
//	Last Update Date: 09 Feb 2009								//
//////////////////////////////////////////////////////////////////
//	Please keep this notice intact if you are using this file.	//
//////////////////////////////////////////////////////////////////

/*
	?? Future Additions ?? (--) & Fixes (-):
	========================================
		-- Extended view dialog customization vars/options
		-- ???
		
	v2.00 What's New
	================
	-- Custom RegEX
	-- Added Extended view option
	-  For Number and Decimal field types, allowed -ve number also.
	
	
	Example Usage:
	================
		<form onsubmit="return validateForm('formid',extendedView)">
		
	'formid' is the id of the form
	'extendedView' can be true or false to show the extended dialog box rather than simple alert
	
	Form Field Example:
		<input type="text" name="user" id="user" size="28" title="User" class="required alpha" />
*/


// cross-browser document.getElementById, should be on top of code.
if(!document.getElementById)
{
  if(document.all)
  document.getElementById=function()
  {
	if(typeof document.all[arguments[0]]!="undefined")
	return document.all[arguments[0]]
	else
	return null
  }
  else if(document.layers)
  document.getElementById=function()
  {
	if(typeof document[arguments[0]]!="undefined")
	return document[arguments[0]]
	else
	return null
  }
}
////////////////////////////////////////////////

function trimAll(sString)
{
	while (sString.substring(0,1) == ' ')
	{
		sString = sString.substring(1, sString.length);
	}
	while (sString.substring(sString.length-1, sString.length) == ' ')
	{
		sString = sString.substring(0,sString.length-1);
	}
return sString;
}

function validateForm(formid, extendedView)
{
	// regex patterns, more can be added
	var pattern_email = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
	var pattern_date = /^\d\d\/\d\d\/\d\d\d\d$/;
	var pattern_number = /^\-?\d+$/;
	var pattern_text = /^[a-zA-Z ]+$/;
	var pattern_alpha = /^\w+$/;
	var pattern_decimal = /^\-?\d+(\.\d+)?$/;
	var pattern_web = /^https?\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?$/;
	////////////////////////////////////////////////
	
	var formobj = document.forms[formid];
	var arr_vtype = new Array();
	var fieldname = "";
	var vtype = "";
	var counter = 0;
	var fieldtype = "";
	var fieldvalue = "";
	var fieldtitle = "";
	var curfield = "";
	var emsg = "";
	
	for (var i=0; i<formobj.elements.length; i++)
	{
		arr_vtype = formobj.elements[i].className.split(" ");

		// If this is the field to be validated
		if (arr_vtype[0] == "required" || arr_vtype[0] == "REQUIRED")
		{
			counter++; // total fields to be validated
			
			// get current field
			curfield = formobj.elements[i];
			// get field type
			fieldtype = formobj.elements[i].type;

			// get field name
			if (formobj.elements[i].getAttribute("name"))
			{
				fieldname = formobj.elements[i].getAttribute("name");
			}

			// get field title
			if (formobj.elements[i].getAttribute("title"))
			{
				fieldtitle = formobj.elements[i].getAttribute("title");
			}

			if (!fieldtitle)
			{
				fieldtitle = fieldname;
			}
			
			// get current filed value
			fieldvalue = formobj.elements[i].value;
			// get validation type
			vtype = arr_vtype[1];
			
			// get validation stuff from class tag irrespective of their order
			for (var z = 0; z < 25; z++)
			{
				if (arr_vtype[z] == "min")
				{
					var cmin = arr_vtype[parseInt(z, 10) + 1];
				}
				else if (arr_vtype[z] == "max")
				{
					var cmax = arr_vtype[parseInt(z, 10) + 1];
				}
				else if (arr_vtype[z] == "match")
				{
					var comparefield = arr_vtype[parseInt(z, 10) + 1];
					var pvalue = fieldvalue;
					var ptitle = fieldtitle;
					var pfield = curfield;
				}
				else if (arr_vtype[z] == "regex")
				{
					var regex = arr_vtype[parseInt(z, 10) + 1];
				}
			}
			
			// for comparing password and confirm passwords
			if (comparefield != "" && fieldname == comparefield)
			{
				var cpvalue = fieldvalue;
				var cptitle = fieldtitle;
				
				if (trimAll(pvalue) != "" && trimAll(cpvalue) != "")
				{
					if (pvalue.length < cmin && cmin > 0 && pfield.className.indexOf("min") != -1)
					{
						pfield.style.borderColor = "#FF0000";
						emsg += "-->  " + ptitle + " - should be at least " + cmin + " characters long\n";
					}
					else if (pvalue.length > cmax && cmax > 0 && pfield.className.indexOf("max") != -1)
					{
						pfield.style.borderColor = "#FF0000";
						emsg += "-->  " + ptitle + " - should be at most " + cmax + " characters long\n";
					}
					else if (pvalue != cpvalue)
					{
						pfield.style.borderColor = "#FF0000";
						emsg += "-->  " + ptitle + " - and " + cptitle + "  must MATCH\n";
					}
					else
					{
						pfield.style.borderColor = "#00FF00";
					}
				}
			}
			////////////////////////////////////////////
			
			// Do the validation stuff now
			switch (vtype)
			{
				case "regex": // custom regular expression by user
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (curfield.className.indexOf("regex") != -1)
					{
						var ret = (new RegExp(regex)).exec(fieldvalue);
						
						if (ret == null)
						{
							curfield.style.borderColor = "#FF0000";
							emsg += "-->  " + fieldtitle + " - should be in correct format\n";
						}
						else
						{
							curfield.style.borderColor = "#00FF00";
						}
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "alpha":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_alpha.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be ALPHA characters\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "text":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_text.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should only contain A-Z characters\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "email":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_email.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be in valid EMAIL format\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "date":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_date.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be in DD/MM/YYYY format\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "number":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_number.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should contain only NUMBERS\n";
					}
					// since this is number, we compare them directly rather than their length
					else if (parseInt(fieldvalue, 10) < parseInt(cmin, 10) && parseInt(cmin, 10) > 0 && curfield.className.indexOf("min") != -1)
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be at least " + cmin + "\n";
					}
					else if (parseInt(fieldvalue, 10) > parseInt(cmax, 10) && parseInt(cmax, 10) > 0 && curfield.className.indexOf("max") != -1)
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be at most " + cmax + "\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "decimal":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_decimal.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should contain only DECIMAL NUMBER\n";
					}
					// since this is number, we compare them directly rather than their length
					else if (parseInt(fieldvalue, 10) < parseInt(cmin, 10) && parseInt(cmin, 10) > 0 && curfield.className.indexOf("min") != -1)
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be at least " + cmin + "\n";
					}
					else if (parseInt(fieldvalue, 10) > parseInt(cmax, 10) && parseInt(cmax, 10) > 0 && curfield.className.indexOf("max") != -1)
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be at most " + cmax + "\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				case "web":
					if (trimAll(fieldvalue) == "")
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - REQUIRED\n";
					}
					else if (!pattern_web.test(fieldvalue))
					{
						curfield.style.borderColor = "#FF0000";
						emsg += "-->  " + fieldtitle + " - should be in URL format\n";
					}
					else
					{
						curfield.style.borderColor = "#00FF00";
					}
				break;
				// for fields containing required keyword only
				default:
					if (fieldtype == "checkbox")
					{
						if (!curfield.checked)
						{
							emsg += "-->  " + fieldtitle + " - REQUIRED\n";
						}
					}
					else
					{
						if (trimAll(fieldvalue) == "")
						{
							curfield.style.borderColor = "#FF0000";
							emsg += "-->  " + fieldtitle + " - REQUIRED\n";
						}
						else
						{
							if (fieldtype != "radio")
							{
								curfield.style.borderColor = "#00FF00";
							}
						}
					}
				break;
			}
			
		}
	}

	// separetely for radio buttons since many radios can have the same name
	var rnames = "";
	var rtitles = "";
	var radiogroup = new Array();
	var arr_titles = new Array();
	var msg = "";
	
	// Get the radio fields to be validated
	for (var j = 0; j < formobj.elements.length; j++)
	{
		arr_vtype2 = formobj.elements[j].className.split(" ");
		if (arr_vtype2[0] == "required")
		{
			if (formobj.elements[j].type == "radio")
			{
				if (!formobj.elements[j].checked)
				{
				  if (msg.indexOf(formobj.elements[j].getAttribute("title")) == -1)
				  {
						formobj.elements[j].style.borderColor = "#FF0000";
						msg += "-->  " + formobj.elements[j].getAttribute("title") + " - REQUIRED\n";
				  }
				}
				else if (formobj.elements[j].checked)
				{
					//msg = msg.replace("-->  " + formobj.elements[j].getAttribute("title") + " - REQUIRED\n", "");
					rtitles += "|" + formobj.elements[j].getAttribute("title");
					rnames += "|" + formobj.elements[j].getAttribute("name");
				}
			}
		}
	}

	radiogroup = rnames.split("|");
	arr_titles = rtitles.split("|");
	
	// remove checked radio from the msg
	for (var p in radiogroup)
	{
		msg = msg.replace("-->  " + arr_titles[p] + " - REQUIRED\n", "");
	}
	
	if (msg) emsg += msg;
	/////////////////////////////////////////	

	if (emsg)
	{
		var dashes = "----------------------------------------------";

		if (extendedView == false || extendedView == null || !extendedView)
		{
			alert ("You failed to correctly fill in your form:\n" + dashes
			+ "\n" + emsg + dashes + "\nPlease re-enter and submit again!");
			return false;
		}
		else
		{
			// Cool DropSheet Code Starts
			var pageDimensions = getPageDimensions();
			var viewportSize = getViewportSize();
			var scrollPos = getScrollingPosition();
			
			if (viewportSize[1] > pageDimensions[1])
			{
				pageDimensions[1] = viewportSize[1];
			}
			
			var dropSheet = document.createElement("div");
			// for transparency
			dropSheet.style.backgroundColor = "#000000";
			dropSheet.style.backgroundImage = "url(dots.gif)";
			dropSheet.style.opacity = "0.7";
			dropSheet.style.filter = "alpha(opacity=70)";
			/////////////////////
			dropSheet.style.position = "absolute";
			dropSheet.style.left = "0px";
			dropSheet.style.top = "0px";
			dropSheet.style.width = pageDimensions[0] + "px";
			dropSheet.style.height = pageDimensions[1] + "px";
			
			var alertbox = document.createElement("div");
			var earray = emsg.split("-->");
			var liParent = document.createElement("ul");

			alertbox.style.position = "absolute";
			alertbox.style.border = "2px dotted #666666";
			alertbox.setAttribute("align", "left");
			alertbox.style.backgroundColor = "#FFFFFF";
			//alertbox.style.width = "auto"
			//alertbox.style.height = "300px"
			
			// To center the div even with scrolling
			alertbox.style.left = ((pageDimensions[0] / 2) - (pageDimensions[0] / 4) + (pageDimensions[0] / 8)) + scrollPos[0] + "px";
			alertbox.style.top = ((pageDimensions[1] / 2) - (pageDimensions[1] / 4) - 100) + scrollPos[1] + "px";
			////////////////////
			
			alertbox.style.padding = "15px";
			
			if (identifyBrowser().indexOf("ie") != -1)
			{
				alertbox.style.paddingLeft = "60px";
			}
			
			var pHeading = document.createElement("span");

			pHeading.style.color = "#ff0000";
			pHeading.style.fontSize = "18px";
			pHeading.style.width = "100%";
			pHeading.style.textDecoration = "underline";
			pHeading.style.fontFamily = "verdana";
			pHeading.style.padding = "40px";
			
			if (identifyBrowser().indexOf("ie") != -1)
			{
				pHeading.style.paddingLeft = "0px";
			}
			
			var pText = document.createTextNode("Form Fill Error");
			
			pHeading.appendChild(pText);
			alertbox.appendChild(pHeading);
			
			var para = document.createElement("p");
			alertbox.appendChild(para);
			
			var counter = 0;		
			for (var z in earray)
			{
				if (earray[z])
				{
					var li = document.createElement("li");
					var liText = document.createTextNode(earray[z]);
					counter++;
					li.appendChild (liText);
					li.style.color = "#000000";
					li.style.listStyleImage = "url(incorrect.gif)";
					//li.style.fontWeight = "bold";
					li.style.fontSize = "13px";
					li.style.fontFamily = "arial";
					li.style.lineHeight = "1.5em";
					liParent.appendChild (li);
					liParent.style.margin = "auto";
					alertbox.appendChild (liParent);
				}
			}

			for (var t = 0; t < 1; t++)
			{
				var br = document.createElement("br");
				liParent.appendChild (br);
			}
			
			var close = document.createElement("div");
			close.align = "right";
			close.style.fontWeight = "bolder";
			close.style.fontSize = "18px";
			close.style.fontFamily = "verdana";
			close.style.color = "#898989";

			var liClose = document.createElement("li");
			liClose.style.listStyle = "none";

			//var closeText = document.createTextNode("Close X");
			//close.appendChild (closeText);
			var closeImg = document.createElement("img");
			close.appendChild (closeImg);
			
			closeImg.src = "closelabel.gif";
			closeImg.border = "0px";
			liClose.appendChild (close);
			liParent.appendChild (liClose);

			closeImg.onmouseover = function()
			{
				closeImg.style.cursor = "pointer";
			}
			
			closeImg.onclick = function()
			{
				doc.removeChild(dropSheet);
				doc.removeChild(alertbox);
			}

			dropSheet.onclick = function()
			{
				doc.removeChild(dropSheet);
				doc.removeChild(alertbox);
			}
			
			var doc = document.getElementsByTagName("body")[0];
			doc.appendChild(dropSheet);
			doc.appendChild(alertbox);
			
			return false;
		}
	}
	else
	{
		return true;
	}
}

// get current winodw size
function getViewportSize()
{
  var size = [0, 0];
  if (typeof window.innerWidth != 'undefined')
  {
    size = [
        window.innerWidth,
        window.innerHeight
    ];
  }
  else if (typeof document.documentElement != 'undefined'
      && typeof document.documentElement.clientWidth !=
      'undefined' && document.documentElement.clientWidth != 0)
	  {
    size = [
        document.documentElement.clientWidth,
        document.documentElement.clientHeight
    ];
  }
  else
  {
    size = [
        document.getElementsByTagName('body')[0].clientWidth,
        document.getElementsByTagName('body')[0].clientHeight
    ];
  }
  return size;
}

function getPageDimensions()
{
  var body = document.getElementsByTagName("body")[0];
  var bodyOffsetWidth = 0;
  var bodyOffsetHeight = 0;
  var bodyScrollWidth = 0;
  var bodyScrollHeight = 0;
  var pageDimensions = [0, 0];
  if (typeof document.documentElement != "undefined" &&
      typeof document.documentElement.scrollWidth != "undefined")
  {
    pageDimensions[0] = document.documentElement.scrollWidth;
    pageDimensions[1] = document.documentElement.scrollHeight;
  }
  bodyOffsetWidth = body.offsetWidth;
  bodyOffsetHeight = body.offsetHeight;
  bodyScrollWidth = body.scrollWidth;
  bodyScrollHeight = body.scrollHeight;
  if (bodyOffsetWidth > pageDimensions[0])
  {
    pageDimensions[0] = bodyOffsetWidth;
  }
  if (bodyOffsetHeight > pageDimensions[1])
  {
    pageDimensions[1] = bodyOffsetHeight;
  }
  if (bodyScrollWidth > pageDimensions[0])
   {
    pageDimensions[0] = bodyScrollWidth;
  }
  if (bodyScrollHeight > pageDimensions[1])
  {
    pageDimensions[1] = bodyScrollHeight;
  }
  return pageDimensions;
}

function getScrollingPosition()
{
  var position = [0, 0];
  if (typeof window.pageYOffset != 'undefined')
  {
    position = [
        window.pageXOffset,
        window.pageYOffset
    ];
  }
  else if (typeof document.documentElement.scrollTop
      != 'undefined' && document.documentElement.scrollTop > 0 ||
    document.documentElement.scrollLeft > 0)
  {
    position = [
        document.documentElement.scrollLeft,
        document.documentElement.scrollTop
    ];
  }
  else if (typeof document.body.scrollTop != 'undefined')
  {
    position = [
        document.body.scrollLeft,
        document.body.scrollTop
    ];
  }
  return position;
}

function identifyBrowser()
{
  var agent = navigator.userAgent.toLowerCase();
  if (typeof navigator.vendor != "undefined" &&
      navigator.vendor == "KDE" &&
      typeof window.sidebar != "undefined")
  {
    return "kde";
  }
  else if (typeof window.opera != "undefined")
  {
    var version = parseFloat(
        agent.replace(/.*opera[\/ ]([^ $]+).*/, "$1"));
    if (version >= 7)
    {
      return "opera7";
    }
	    else if (version >= 5)
    {
      return "opera5";
    }
    return false;
  }
  else if (typeof document.all != "undefined")
  {
    if (typeof document.getElementById != "undefined")
    {
      var browser = agent.replace(/.*ms(ie[\/ ][^ $]+).*/, "$1").
          replace(/ /, "");
      if (typeof document.uniqueID != "undefined")
      {
        if (browser.indexOf("5.5") != -1)
        {
          return browser.replace(/(.*5\.5).*/, "$1");
        }
        else
        {
          return browser.replace(/(.*)\..*/, "$1");
        }
      }
      else
      {
	          return "ie5mac";
      }
    }
    return false;
  }
  else if (typeof document.getElementById != "undefined")
  {
    if (navigator.vendor.indexOf("Apple Computer, Inc.") != -1)
    {
      if (typeof window.XMLHttpRequest != "undefined")
      {
        return "safari1.2";
      }
      return "safari1";
    }
    else if (agent.indexOf("gecko") != -1)
    {
	      return "mozilla";
    }
  }
  return false;
}
