
(function(){
	tinymce.PluginManager.add('thundercolumns_mce_button', function( editor, url ) {

        editor.addButton( 'thundercolumns_mce_button', {

            icon: 'icon thundercolumns-icon',
			type: 'menubutton',
			menu: [
					
					{
						text: '1/2',
						onclick: function() {
							editor.insertContent('[one-half]YOUR_TEXT_HERE[/one-half]');
						}
					},
					{
						text: '1/2_last in Row',
						onclick: function() {
							editor.insertContent('[one-half last]YOUR_TEXT_HERE[/one-half]');
						}
					},
					{
						text: '1/3',
						onclick: function() {
							editor.insertContent('[one-third]YOUR_TEXT_HERE[/one-third]');
						}
					},
					{
						text: '1/3_last in Row',
						onclick: function() {
							editor.insertContent('[one-third last]YOUR_TEXT_HERE[/one-third]');
						}
					},
					{
						text: '2/3',
						onclick: function() {
							editor.insertContent('[two-third]YOUR_TEXT_HERE[/two-third]');
						}
					},
					{
						text: '2/3_last in Row',
						onclick: function() {
							editor.insertContent('[two-third last]YOUR_TEXT_HERE[/two-third]');
						}
					},
					{
						text: '1/4',
						onclick: function() {
							editor.insertContent('[one-fourth]YOUR_TEXT_HERE[/one-fourth]');
						}
					},
					{
						text: '1/4_last in Row',
						onclick: function() {
							editor.insertContent('[one-fourth last]YOUR_TEXT_HERE[/one-fourth]');
						}
					},
					{
						text: '3/4',
						onclick: function() {
							editor.insertContent('[three-fourth]YOUR_TEXT_HERE[/three-fourth]');
						}
					},
					{
						text: '3/4_last in Row',
						onclick: function() {
							editor.insertContent('[three-fourth last]YOUR_TEXT_HERE[/three-fourth]');
						}
					},
					{
						text: '1/5',
						onclick: function() {
							editor.insertContent('[one-fifth]YOUR_TEXT_HERE[/one-fifth]');
						}
					},
					{
						text: '1/5_last in Row',
						onclick: function() {
							editor.insertContent('[one-fifth last]YOUR_TEXT_HERE[/one-fifth]');
						}
					},
					{
						text: '2/5',
						onclick: function() {
							editor.insertContent('[two-fifth]YOUR_TEXT_HERE[/two-fifth]');
						}
					},
					{
						text: '2/5_last in Row',
						onclick: function() {
							editor.insertContent('[two-fifth last]YOUR_TEXT_HERE[/two-fifth]');
						}
					},
					{
						text: '3/5',
						onclick: function() {
							editor.insertContent('[three-fifth]YOUR_TEXT_HERE[/three-fifth]');
						}
					},
					{
						text: '3/5_last in Row',
						onclick: function() {
							editor.insertContent('[three-fifth last]YOUR_TEXT_HERE[/three-fifth]');
						}
					},
					{
						text: '4/5',
						onclick: function() {
							editor.insertContent('[four-fifth]YOUR_TEXT_HERE[/four-fifth]');
						}
					},
					{
						text: '4/5_last in Row',
						onclick: function() {
							editor.insertContent('[four-fifth last]YOUR_TEXT_HERE[/four-fifth]');
						}
					},
					{
						text: '1/6',
						onclick: function() {
							editor.insertContent('[one-sixth]YOUR_TEXT_HERE[/one-sixth]');
						}
					},
					{
						text: '1/6_last in Row',
						onclick: function() {
							editor.insertContent('[one-sixth last]YOUR_TEXT_HERE[/one-sixth]');
						}
					},
					{
						text: '5/6',
						onclick: function() {
							editor.insertContent('[five-sixth]YOUR_TEXT_HERE[/five-sixth]');
						}
					},
					{
						text: '5/6_last in Row',
						onclick: function() {
							editor.insertContent('[five-sixth last]YOUR_TEXT_HERE[/five-sixth]');
						}
					}
				  ]	
        });

    });
})();
		
	