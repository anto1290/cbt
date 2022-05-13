var sl_ap = document.getElementById('sl_ap');



sl_ap.style.opacity = 0;
sl_ap.style.visibility = "hidden";
sl_ap.style.width = "0px";
sl_ap.style.height = "768px";
document.getElementById('main-content').style.width = "1200px";
document.getElementById('main-content').style.height = "768px";

function showAdminProfil() {
	document.getElementById('main-content').style.width = "900px";
	document.getElementById('main-content').style.transition = "all 0.8s";
	sl_ap.style.width = "300px";
	sl_ap.style.opacity = 1;
	sl_ap.style.visibility = "visible";
	sl_ap.style.transition = "all 0.8s";


}

function hideAdminProfil() {
	sl_ap.style.opacity = 0;
	sl_ap.style.visibility = "hidden";
	sl_ap.style.width = "0px";
	sl_ap.style.height = "768px";
	document.getElementById('main-content').style.width = "1200px";
	document.getElementById('main-content').style.height = "768px";
}
