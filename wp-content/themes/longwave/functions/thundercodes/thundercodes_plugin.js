
(function(){

tinymce.PluginManager.add('thundercodes_mce_button', function( editor, url ) {

        editor.addButton( 'thundercodes_mce_button', {

            icon: 'icon thundercodes-icon',
			type: 'menubutton',
			menu: [
					
					{
						text: 'Button',
							onclick: function() {
								editor.windowManager.open( {
									title: 'ThunderCodes - Button',
									body: [
									// Button Link
									{
										type: 'textbox',
										name: 'buttonLink',
										label: 'The link a button sends you when clicking',
										value: '#'
									},
									// Button Link Target
									{
										type: 'listbox',
										name: 'buttonLinkTarget',
										label: 'Where should the link be opened?',
										'values': [
											{text: 'Self', value: 'self'},
											{text: 'Blank', value: 'blank'}
										]
									},

									// Button Color
									{
										type: 'listbox',
										name: 'buttonHoverColor',
										label: 'Hover Color',
										'values': [
											{text: 'Blue', value: 'blue'},
											{text: 'Pink', value: 'pink'},
											{text: 'Purple', value: 'purple'},
											{text: 'Black', value: 'black'},
											{text: 'Green', value: 'green'},
											{text: 'Red', value: 'red'},
											{text: 'Brown', value: 'brown'},
											{text: 'Yellow', value: 'yellow'},
											{text: 'Aqua', value: 'aqua'},
											{text: 'Orange', value: 'orange'}
										]
									},
									
									// Button Text
									{
										type: 'textbox',
										name: 'buttonText',
										label: 'Text on the button',
										value: 'YOUR_BUTTON_TEXT'
									}],
									onsubmit: function( e ) {
										editor.insertContent( '[button link="' + e.data.buttonLink + '" target="' + e.data.buttonLinkTarget + '" hover="' + e.data.buttonHoverColor + '"]' + e.data.buttonText + '[/button]');
									}
								});
							}
					},
					{
						text: 'Intro Text',
						onclick: function() {
							editor.insertContent('[intro]YOUR_TEXT_HERE[/intro]');
						}
					},
					{
						text: 'Divider',
						onclick: function() {
							editor.insertContent('[divider]');
						}
					},
					{
						text: 'Dropcap',
						onclick: function() {
							editor.insertContent('[dropcap]C[/dropcap]');
						}
					},
					{
						text: 'Box',
							onclick: function() {
								editor.windowManager.open( {
									title: 'ThunderCodes - Box',
									body: [
									
									// Box Style
									{
										type: 'listbox',
										name: 'boxStyle',
										label: 'Define the display style of the Box',
										'values': [
											{text: 'Info', value: 'info'},
											{text: 'Download', value: 'download'},
											{text: 'Warning', value: 'warning'},
											{text: 'Note', value: 'note'}
										]
									}],
									
									onsubmit: function( e ) {
										editor.insertContent( '[box style="' + e.data.boxStyle + '"]YOUR_BOX_TEXT[/box]');
									}
								});
							}
					},
					{
						text: 'Highlight',
						onclick: function() {
							editor.insertContent('[highlight]YOUR_HIGHLIGHTED_TEXT[/highlight]');
						}
					},
					{
						text: 'Codebox',
						onclick: function() {
							editor.insertContent('[codebox]YOUR_CODE[/codebox]');
						}
					},
					{
						text: 'Sup Text',
						onclick: function() {
							editor.insertContent('[sup]YOUR_SUP_TEXT[/sup]');
						}
					},
					{
						text: 'Sub Text',
						onclick: function() {
							editor.insertContent('[sub]YOUR_SUB_TEXT[/sub]');
						}
					},
					{
						text: 'Cite Text',
						onclick: function() {
							editor.insertContent('[cite]YOUR_CITE_TEXT[/cite]');
						}
					},
					{
						text: 'Abbr Text',
						onclick: function() {
							editor.insertContent('[abbr title="abbr explanation"]YOUR_ABBR_TEXT[/abbr]');
						}
					},
					{
						text: 'HeadSubline',
						onclick: function() {
							editor.insertContent('[headsubline subline="YOUR_SUBLINE_TEXT"]>YOUR_HEADLINE_TEXT[/headsubline]');
						}
					},
					{
						text: 'Latest Posts',
						onclick: function() {
							editor.insertContent('[latest_posts number="2"]');
						}
					},
					{
						text: 'Latest Projects Slider',
						onclick: function() {
							editor.insertContent('[latest_projects_slider title="YOUR_TITLE" cat_slugs="CATEGORY_SLUGS" number=12]');
						}
					},
					{
						text: 'Latest Projects Carousel',
						onclick: function() {
							editor.insertContent('[latest_projects_carousel title="YOUR_TITLE" cat_slugs="CATEGORY_SLUGS" number=12]');
						}
					},
					{
						text: 'Tabs',
						onclick: function() {
								editor.windowManager.open( {
									title: 'Tabs',
									body: [
									
									// Tabs
									
									{	
										type: 'textbox',
										name: 'number',
										label: 'How many Tabs?',
										value: '3'
									},
									{
										type: 'listbox',
										name: 'align',
										label: 'Display the tabs bound to the left or centered',
										'values': [
											{text: 'Left', value: 'left'},
											{text: 'Center', value: 'center'}
										]
									}
									],
									
									onsubmit: function( e ) {
									editor.insertContent('[tabs align="'+e.data.align +'"]');
									for (i=1; i <= e.data.number; i++ ){
										editor.insertContent('[tab title="Tab Title '+i+'"]Tab Content '+i+'[/tab]');
									}
									editor.insertContent('[/tabs]');
									
									}
								});
								}
					},
					{
						text: 'Toggle',
						onclick: function() {
							editor.insertContent('[toggle title="YOUR_TOGGLE_TITLE"]YOUR_TOGGLE_CONTENT[/toggle]');
						}
					},
					{
						text: 'Social Bar',
						onclick: function() {
						editor.windowManager.open( {
									title: 'Social Bar',
									body: [
									
									{	
										type: 'textbox',
										name: 'dribbbleUrl',
										label: 'Url for Dribbble',
										value: ''
									},
									{	
										type: 'textbox',
										name: 'facebookUrl',
										label: 'Url for Facebook',
										value: ''
									},
									{	
										type: 'textbox',
										name: 'flickrUrl',
										label: 'Url for Flickr',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'forrstUrl',
										label: 'Url for Forrst',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'googleUrl',
										label: 'Url for Google',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'lastfmUrl',
										label: 'Url for LastFM',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'linkedinUrl',
										label: 'Url for LinkedIn',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'pinterestUrl',
										label: 'Url for Pinterest',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'rssUrl',
										label: 'Url for Rss',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'skypeUrl',
										label: 'Url for Skype',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'tumblrUrl',
										label: 'Url for Tumblr',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'twitterUrl',
										label: 'Url for Twitter',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'vimeoUrl',
										label: 'Url for Vimeo',
										value: ''
									},
									
									{	
										type: 'textbox',
										name: 'youtubeUrl',
										label: 'Url for Youtube',
										value: ''
									}
									],
									onsubmit: function( e ) {
									
									
									editor.insertContent('[socialbar ');
									if(e.data.dribbbleUrl != ''){
									editor.insertContent('dribbble="'+e.data.dribbbleUrl+'" ');
									}
									if(e.data.facebookUrl != ''){
									editor.insertContent('facebook="'+e.data.facebookUrl+'" ');
									}
									if(e.data.flickrUrl != ''){
									editor.insertContent('flickr="'+e.data.flickrUrl+'" ');
									}
									if(e.data.forrstUrl != ''){
									editor.insertContent('forrst="'+e.data.forrstUrl+'" ');
									}
									if(e.data.googleUrl != ''){
									editor.insertContent('google="'+e.data.googleUrl+'" ');
									}
									if(e.data.lastfmUrl != ''){
									editor.insertContent('lastfm="'+e.data.lastfmUrl+'" ');
									}
									if(e.data.linkedinUrl != ''){
									editor.insertContent('linkedin="'+e.data.linkedinUrl+'" ');
									}
									if(e.data.pinterestUrl != ''){
									editor.insertContent('pinterest="'+e.data.pinterestUrl+'" ');
									}
									if(e.data.rssUrl != ''){
									editor.insertContent('rss="'+e.data.rssUrl+'" ');
									}
									if(e.data.skypeUrl != ''){
									editor.insertContent('skype="'+e.data.skypeUrl+'" ');
									}
									if(e.data.tumblrUrl != ''){
									editor.insertContent('tumblr="'+e.data.tumblrUrl+'" ');
									}
									if(e.data.twitterUrl != ''){
									editor.insertContent('twitter="'+e.data.twitterUrl+'" ');
									}
									if(e.data.vimeoUrl != ''){
									editor.insertContent('vimeo="'+e.data.vimeoUrl+'" ');
									}
									if(e.data.youtubeUrl != ''){
									editor.insertContent('youtube="'+e.data.youtubeUrl+'" ');
									}
									editor.insertContent(']');
									
									}
							});
						}
					},
					{
						text: 'Testimonials',
						onclick: function() {
							editor.insertContent('[testimonials]<br>[quote author="AUTHOR_NAME"]THE_TEXT[/quote]<br>[quote author="AUTHOR_NAME"]THE_TEXT[/quote][/testimonials]');
						}
					},
					{
						text: 'Twitter',
						onclick: function() {
							editor.insertContent('[twitter user="TWITTER_ACCOUNT" number="3"]');
						}
					},
					{
						text: 'Facebook Page',
						onclick: function() {
							editor.insertContent('[facebook_page url="URL_FACEBOOK_PAGE"]');
						}
					},
					{
						text: 'Dribbble',
						onclick: function() {
							editor.insertContent('[dribbble user="DRIBBBLE_USER" number=20]');
						}
					},
					{
						text: 'Flickr',
						onclick: function() {
							editor.insertContent('[flickr user_id="FLICKRUSER@N00" number=15]');
						}
					},
					{
						text: 'Portfolio Info',
						onclick: function() {
							editor.insertContent('[portfolio_info_set]<br>[portfolio_info title="Date:"]<?php echo date(get_option("date_format")); ?>[/portfolio_info]<br>[portfolio_info title="Categories:"]Category 1, Category 2[/portfolio_info]<br>[portfolio_info title="Client:"]ThunderBuddies[/portfolio_info]<br>[portfolio_info title="Link:"]http://wearethunderbuddies.com[/portfolio_info][/portfolio_info_set]');
						}
					}
				  ]	
        });

    });
})();
		
		