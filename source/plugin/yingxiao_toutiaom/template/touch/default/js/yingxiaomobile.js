// JavaScript Document
function resize(obj, w, h, type) {
    var img = obj || this;
	//var pd = img.parentNode.style.width;
	e = img.parentNode;
	if(w == h)
	{
		e.style.height = "" + e.offsetWidth + "px";
	}
	else
	{
		e.style.height = "" + ((e.offsetWidth - 2) / 1.5 + 2) + "px";
	}
    
	if(img.offsetHeight < (e.offsetHeight - 2)) {
		//img.style.width = "" + (img.style.width - 2) + "px";
		img.style.marginTop = (e.offsetHeight - img.offsetHeight - 2) / 2 + "px";
	}
}
 
