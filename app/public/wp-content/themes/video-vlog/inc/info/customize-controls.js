( function( api ) {

	// Extends our custom "video-vlog-pro" section.
	api.sectionConstructor['video-vlog-pro'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
