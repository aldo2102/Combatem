
function emoticon(text) {
	var txtarea = document.mural.comentario;
	text = ' ' + text + ' ';
	if (txtarea.createTextRange && txtarea.caretPos) {
		var caretPos = txtarea.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? text + ' ' : text;
		txtarea.focus();
	}
	else {
		txtarea.value  += text;
		txtarea.focus();
	}
}

// Continuação
function over(src,clrover) {
    if (!src.contains(event.fromElement)) {	src.style.cursor = 'default'; src.bgColor = clrover; }
}
function out(src,clrIn) {
	if (!src.contains(event.toElement)) { src.style.cursor = 'default';	src.bgColor = clrIn; }
}
