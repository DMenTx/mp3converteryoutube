function download() {
	var link_tb = document.getElementById("link_tb").value;
	if(link_tb.length >= 28){
		var id;
		var p = link_tb.indexOf("youtube");
		var p2 = link_tb.indexOf("youtu.be");
		
		if(p > 0){
			$('#modalDownload').modal('toggle')
			id = link_tb.substring(32, 43);
			var src = "https://www.download-mp3-youtube.com/api/?api_key=MjA1MDYwMjM0&format=mp3&logo=1&video_id="+id+"&button_color=444444&text=Baixar arquivo&small_text= Formato: mp3";
			var d = document.querySelector("iframe");
			d.setAttribute("src", src);	
		}
		else{

			$('#modalDownload').modal('toggle')
			id = link_tb.substring(17, 28);
			var src = "https://www.download-mp3-youtube.com/api/?api_key=MjA1MDYwMjM0&format=mp3&logo=1&button_color=444444&video_id="+id+"&button_color=444444&text=Baixar arquivo&small_text= Formato: mp3";
			var d = document.querySelector("iframe");
			d.setAttribute("src", src);
	}	
	}
	else{
		var x = document.querySelector("input");
		x.setAttribute("class", "form-control border border-danger")
	}
}