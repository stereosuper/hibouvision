/**

	author : Cédric Dagherir
	Company : DaHive
	Website : http://www.dahive.fr

	Track loaded hidden element exemple : <div class="ga-tracking-load" data-cat="Formulaire" data-action="Validation" data-label="Succes"></div>
*/

jQuery(document).ready(function() {

	var trackEvent = function(cat, action, label){
		ga('send', 'event', cat, action, label); // create a custom event
	}

	if(typeof ga == 'function'){

		jQuery("a.ga-tracking").each(function() {
			var text;

			if(jQuery(this).attr('title'))
				text = jQuery(this).attr('title');
			else if(jQuery(this).attr('data-title'))
				text = jQuery(this).attr('data-title');
			else
			 	text = jQuery(this).text();
			
			jQuery(this).click(function(event) { // when someone clicks these links
				trackEvent('Bouton', 'Clic', text); // create a custom event
			});
		});

		jQuery('.ga-tracking-load').each(function() {
			trackEvent($(this).data('cat'), $(this).data('action'), $(this).data('label'));
		});
	}
});