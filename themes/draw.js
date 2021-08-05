function draw(data,tp,lp,lpot,tpot,hasil,myCanvas) {


		var koor = data.toString();
		var koor_pisah = new Array();
		var koor_pisah = koor.split(',');

		var canvas = document.getElementById(myCanvas);
		var ctx = canvas.getContext("2d");
		ctx.fillStyle = "#FFFFF";

		var fLen, i, text, x;
		fLen = koor_pisah.length;
		for (i = 0; i < fLen; i++) {

			var x = new Array();
			var x = koor_pisah[i].split('|');
			
			// rectangle
			ctx.beginPath();
			ctx.lineWidth = "1";
			ctx.strokeStyle = "#5D6258";
			ctx.rect((x[0]/4),(x[1]/4),(x[2]/4),(x[3]/4));  
			ctx.stroke();
		}
		ctx.font='11px Arial';
		ctx.fillText('Bahan : '+tp+' x '+lp,10,30);
		ctx.fillText('Potong : '+lpot+' x '+tpot,10,42);
		ctx.fillText('Hasil : '+hasil,10,56);
		ctx.font='11px Arial';
		ctx.fillStyle = "#FFFFF";
		ctx.fillText("www.kalkulatorcetak.com",10,150);
}