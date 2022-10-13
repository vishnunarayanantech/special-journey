( function( api ) {

	// Extends our custom "supermarket" section.
	api.sectionConstructor['supermarket'] = api.Section.extend( {

		// No supermarkets for this type of section.
		attachSupermarkets: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
