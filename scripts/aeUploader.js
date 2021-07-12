// JavaScript Document
// Funciones UPLOADER DE ARCHIVOS
function fileUpload(form, action_url, div_id, img_id) {
	// Create the iframe...
	var iframe = document.createElement("iframe");
	iframe.setAttribute("id", "upload_iframe");
	iframe.setAttribute("name", "upload_iframe");
	iframe.setAttribute("width", "0");
	iframe.setAttribute("height", "0");
	iframe.setAttribute("border", "0");
	iframe.setAttribute("style", "width: 0; height: 0; border: none;");
	
	// Add to document...
	form.parentNode.appendChild(iframe);
	window.frames['upload_iframe'].name = "upload_iframe";
	iframeId = $("upload_iframe");
	
	// Add event...
	var eventHandler = function () {
		if (iframeId.detachEvent) iframeId.detachEvent("onload", eventHandler);
		else iframeId.removeEventListener("load", eventHandler, false);
		// Message from server...
		if (iframeId.contentDocument) {
			content = iframeId.contentDocument.body.innerHTML;
		} else if (iframeId.contentWindow) {
			content = iframeId.contentWindow.document.body.innerHTML;
		} else if (iframeId.document) {
			content = iframeId.document.body.innerHTML;
		}
		//alert (content);
		$(div_id).innerHTML = content;
		form.style.display="none";
		if (img_id=='')	{	
			$(div_id).style.display="";
		} else {
			if (img_id=='reCargar'){
				reCargar();
			} else {
				recargarImagen(img_id,content);
			}
		}
		// Del the iframe...
		setTimeout('removeIframe(iframeId)', 250);
	}
	if (iframeId.addEventListener) iframeId.addEventListener("load", eventHandler, true);
	if (iframeId.attachEvent) iframeId.attachEvent("onload", eventHandler);
	
	// Set properties of form...
	form.setAttribute("target", "upload_iframe");
	form.setAttribute("action", action_url);
	form.setAttribute("method", "post");
	form.setAttribute("enctype", "multipart/form-data");
	form.setAttribute("encoding", "multipart/form-data");
	
	// Submit the form...
	form.submit();
	$(div_id).innerHTML = "Subiendo..."; 
} 
function removeIframe(iframeId){
	if (iframeId.parentNode) iframeId.parentNode.removeChild(iframeId);
}
function recargarImagen(img,rsp){
	$(img).src=rsp;
	$('file').value="";
}
