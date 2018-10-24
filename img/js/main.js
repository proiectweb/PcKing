function doFirst(){
	mypic = document.getElementById('proc');
	mypic.addEventListener("dragstart", startDrag, false);
	leftbox = document.getElementById('leftbox');
	leftbox.addEventListener("dragenter", function(e){e.preventDefault();}, false);
	leftbox.addEventListener("dragover", function(e){e.preventDefault();}, false);
	leftbox.addEventListener("drop", dropped , false);
}
function startDrag(e){
	var code='<img id="proci" src="../img/build/dragproc3.png" width="745px" height="450px"/>';
	e.dataTransfer.setData('Text', code);
}
function dropped(e){
	e.preventDefault();
	leftbox.innerHTML = e.dataTransfer.getData('Text');
}
window.addEventListener("load", doFirst, false);
