$(document).ready(init);

function init() {
	/* ========== DRAWING THE PATH AND INITIATING THE PLUGIN ============= */

	$.fn.scrollPath("getPath")
		// Move to 'start' element
		.moveTo(400, 150, {name: "start"})
		// Line to 'description' element
		.lineTo(400, 780, {name: "description"})
		// Arc down and line to 'syntax'
		//.arc(200, 1200, 400, -Math.PI/2, Math.PI/2, true)
		.lineTo(600, 1760, {			
			name: "syntax"
		})
		// Continue line to 'scrollbar'
		.lineTo(1750, 2300, {			
			name: "scrollbar"
		})
		// Arc up while rotating
		//.arc(1800, 1000, 600, Math.PI/2, 0, true, {rotate: Math.PI/2 })
		// Line to 'rotations'
		.lineTo(2400, 2950, {
			name: "rotations"
		})
		// Rotate in place
		/*.rotate(3*Math.PI/2, {
			name: "rotations-rotated"
		})*/
		// Continue upwards to 'source'
		.lineTo(2400, 3660, {
			name: "source"
		})
		.arc(2400, 3660, 450, 0, Math.PI/2, false)
	// Small arc downwards
		//.arc(2250, 3100, 150, 0, Math.PI/2, true)

/*			//Line to 'follow'
		.lineTo(1350, -850, {
			name: "follow"
		})

		// Arc and rotate back to the beginning.
		.arc(1300, 50, 900, -Math.PI/2, -Math.PI, true, {source: Math.PI*2, name: "end"});
*/
	// We're done with the path, let's initate the plugin on our wrapper element
	$(".wrapper").scrollPath({drawPath: true, wrapAround: false});

	// Add scrollTo on click on the navigation anchors
	$("nav").find("a").each(function() {
		var target = $(this).attr("href").replace("#", "");
		$(this).click(function(e) {
			e.preventDefault();
			
			// Include the jQuery easing plugin (http://gsgd.co.uk/sandbox/jquery/easing/)
			// for extra easing functions like the one below
			$.fn.scrollPath("scrollTo", target, 1000, "easeInOutSine");
		});
	});

	/* ===================================================================== */

	$(".settings .show-path").click(function(e) {
		e.preventDefault();
		$(".sp-canvas").toggle();
	}).toggle(function() {
		$(this).text("Hide Path");
	}, function() {
		$(this).text("Show Path");
	});

	/*$(".tweet").click(function(e) {
		open(this.href, "", "width=550, height=450");
		e.preventDefault();
	});

	$.getJSON("http://cdn.api.twitter.com/1/urls/count.json?callback=?&url=http%3A%2F%2Fjoelb.me%2Fscrollpath",
			function(data) {
				if(data && data.count !== undefined) {
					$(".source .count").html("the " + ordinal(data.count + 1) + " kind person to");
				}
			});*/
	}


function highlight(element) {
	if(!element.hasClass("highlight")) {
		element.addClass("highlight");
		setTimeout(function() { element.removeClass("highlight"); }, 2000);
	}
}
function ordinal(num) {
	return num + (
		(num % 10 == 1 && num % 100 != 11) ? 'st' :
		(num % 10 == 2 && num % 100 != 12) ? 'nd' :
		(num % 10 == 3 && num % 100 != 13) ? 'rd' : 'th'
	);
}
