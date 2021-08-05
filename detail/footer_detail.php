<script>
$(document).ready(function(){
	$("#btn-Convert-Html2Image").hide();
var ket = '<?=$ket;?>';

	
var element = $("#html-content-holder"); // global variable

var getCanvas; // global variable
    $("#btn-Preview-Image").on('click', function () {
	$('#previewImage').empty();
         html2canvas(element, {
         onrendered: function (canvas) {
		 $("#btn-Preview-Image").hide();
		 $("#btn-Convert-Html2Image").show();
                $("#previewImage").append(canvas);
                getCanvas = canvas;
		 $("#html-content-holder").hide();
             }
         });
    });

	$("#btn-Convert-Html2Image").on('click', function () {
	$("#btn-Preview-Image").show();
	$("#html-content-holder").show();
	$('#previewImage').empty();
	$("#btn-Convert-Html2Image").hide();
    var imgageData = getCanvas.toDataURL("image/png");
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", ket+".png").attr("href", newData);
	});

});

$("#btnDownload").click(function(){
  var doc = new jsPDF('portrait', 'pt', 'a4', true);
    var elementHandler = {
        '#ignorePDF': function(element, renderer) {
            return true;
        }
    };

    var source = document.getElementById("top-content");
    doc.fromHTML(source, 15, 15, {
        'width': 560,
        'elementHandlers': elementHandler
    });
       setTimeout(function() {
            doc.save('HTML-To-PDF-Dvlpby-Bhavdip.pdf');
        }, 2000);

});
function isIEBrowser() {
    var ieBrowser;
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // Internet Explorer
    {
        ieBrowser = true;
    } else //Other browser
    {
        console.log('Other Browser');
        ieBrowser = false;
    }

    return ieBrowser;
};
</script>