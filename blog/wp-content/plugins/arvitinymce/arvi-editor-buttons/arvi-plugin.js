(function() {
	tinymce.create('tinymce.plugins.arvi', {
		init : function(ed, url) {
			ed.addCommand('InsertCustomBlockQuote', function() {
				showDialog();
			});
			ed.addButton('blockquotearvi', {
				icon: 'blockquote',
				tooltip: 'BlockQuote Twitter',
				cmd: 'InsertCustomBlockQuote'
			});
			ed.addCommand('InsertTryMeButton', function() {
			});
			ed.addButton('TryMeButton', {
				icon: 'blockquote',
				tooltip: 'Chat with Arvi',
				cmd: 'InsertTryMeButton'
			});

			function showDialog() {
				var var1, var2;
				var win = tinymce.ui.Factory.create({
					type: 'window',
					layout: "flex",
					pack: "center",
					align: "center",
					minWidth: "500",
					onClose: function() {
						ed.focus();
					},
					onSubmit: function(e) {
						var x,y,z;

						e.preventDefault();

						// read Field!!!!!
						x = win.find('#twitter_quote_field').value();

									// Do whatever you need here
						ed.execCommand('mceInsertContent', false, '\
							<a class="twitter-quote" href="https://twitter.com/intent/tweet?'+"text="+x+"&url="+document.querySelector("#sample-permalink > a").getAttribute("href")+'">\
								<img class="quotes" src="'+homePageUrl+'/wp-content/themes/twentyseventeen/assets/images/quote-left.svg" alt="_blank">\
								'+x+'\
								<img class="quotes" src="'+homePageUrl+'/wp-content/themes/twentyseventeen/assets/images/quote-right.svg" alt="_blank">\
							</a>\
							<a class="twitter-quote" href="https://twitter.com/intent/tweet?'+"text="+x+"&url="+document.querySelector("#sample-permalink > a").getAttribute("href")+'">\
								<img src="'+homePageUrl+'/wp-content/themes/twentyseventeen/assets/images/twitter.png" alt="_blank" class="tweety">\
							</a>\
						');
						// Dialog schließen
						win.close();
					},
					onPostRender: function(){
						ed.my_control = this;
					},
					buttons: [
						{
									text: "Paste",
									onclick: function() {
							win.submit();
						}},
						{
									text: "Cancel",
									name: 'cancel',
									disabled: false,
									onclick: function() {
							win.close();
									}}
					],
					title: 'Tweet',
					items: {
						type: "form",
						padding: 5,
						labelGap: 30,
						spacing: 5,
						items: [
							{
								type: 'textbox',
								multiline: true,
								name: 'twitter_quote_field',
								value: 'Enter tweet'
							}
						]
					}
				}).renderTo().reflow();
			}


		},
		createControl : function(n, cm) {
			return null;
		},
		getInfo : function() {
			return {
				longname : 'Arvi Buttons',
				author : 'Mandar',
				authorurl : '',
				infourl : '',
				version : "0.1"
			};
		}
		
	});

	tinymce.PluginManager.add( 'arvi', tinymce.plugins.arvi );
})();
