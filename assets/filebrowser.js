var funcNum;
var urlNew;

$(function(){
	funcNum = getUrlParam('CKEditorFuncNum');

	$("div.left a").click(function(){
		$("div.left a").removeClass("active");
		$(this).addClass("active");
		loadRightPanel("/symphony/extension/ckeditor/filebrowserajax/?id=" + $(this).attr("id"));
		return false;
	});
	
	if(jitAvailable)
	{
		$(document).mousemove(function(e){
			if(document.getElementById("thumb").style.display != 'none')
			{
				$("#thumb").css({left: e.pageX + 50, top: e.pageY});
			}
		});
	}
});

function loadRightPanel(url)
{
	$("div.right").load(url + " form>*", function(){
		// some magic mumbo jumbo:
		// Hover on the table rows:
		$("div.right tr").hover(function(){
			$(this).addClass("hover");
		}, function(){
			$(this).removeClass("hover");
		}).click(function(){
			// If the row is clicked, the first anchor is selected. This is because an entry could also have multiple files
			$("a:first", this).click();
		});
		// Click on an anchor
		$("a", $("div.right tr")).click(function(){
			// Send URL to CKEditor:
			window.opener.CKEDITOR.tools.callFunction(funcNum, $(this).attr("href"));
			window.close();
			return false;
		});
		// Create new-functionality:
		$("a.create").click(function(){
			urlNew = $(this).attr("href");
			$.get(urlNew, function(data){
				buildForm(data);
			});
			return false;
		});
		// check if there is an image here:
		if(jitAvailable) {
			$("td.image").hover(function(){
				$("#thumb").show();
				var img = $("a", this).attr("href").replace('/workspace/', '');
				$("#thumb").html('<img src="/image/2/80/60/5/' + img + '" width="80" height="60" />');
			}, function(){
				$("#thumb").hide();
			});
		}
	});
}

function buildForm(data)
{
	$("div.right").html('<form method="post" action="' + urlNew + '"></form>');
	$("div.field", data).each(function(){
		$("div.right form").append('<div class="field">' + $(this).html() + '</div>');
	});
	$("div.right form").append('<input type="button" name="cancel" value="Cancel" />');
	$("div.right form").append('<input type="submit" name="action[save]" value="Submit" />');
	$("input[name='cancel']").click(function(){
		loadRightPanel("/symphony/extension/ckeditor/filebrowserajax/?id=" + $("div.left a.active").attr("id"));
	});
	// Ajax form:
	$("div.right form").ajaxForm({
		success: function(responseText, statusText, xhr)
		{
			if($("p.error", responseText).length > 0)
			{
				// Reload the form:
				buildForm(responseText);
			} else {
				// No error found! Content stored!
				loadRightPanel("/symphony/extension/ckeditor/filebrowserajax/?id=" + $("div.left a.active").attr("id"));
			}		
		}
	});
}

// Helper function to get parameters from the query string.
function getUrlParam(paramName)
{
	var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
	var match = window.location.search.match(reParam) ;
	return (match && match.length > 1) ? match[1] : '' ;
}
