// closure to avoid namespace collision
(function () {
	// create the plugin
	tinymce.create("tinymce.plugins.thebigmagShortcodes", {	
		
		// creates control instances based on the control's id.
		// our button's id is "thebigmag_button"
		
		createControl: function ( btn, e ) {
			if ( btn == "thebigmag_button" ) {	
				
				var a = this;
				
				// creates the button
				var btn = e.createSplitButton('thebigmag_button', {
                    title: "Insert Shortcodes", 										// title of the button
					image: thebigmagShortCodes.plugin_folder + "js/images/icon.png", 	// path to the button's image
					icons: false
                });
				
				//Render a DropDown Menu
                btn.onRenderMenu.add(function (c, b) {
                	
					c = b.addMenu({
						title: "<i class='icon-columns'></i> Columns"
					});
					 a.addImmediate( c, "Column Wrapper", "[tbm-row] Content goes here... [/tbm-row]<br /><br />");
					a.addImmediate( c, "1/2 | 1/2", "[tbm-row][tbm-column width='one-half']Column 1[/tbm-column][tbm-column width='one-half' last=true]Column 2[/tbm-column][/tbm-row]");
					a.addImmediate( c, "1/3 | 1/3 | 1/3", "[tbm-row][tbm-column width='one-third']Column 1[/tbm-column][tbm-column width='one-third']Column 2[/tbm-column][tbm-column width='one-third' last=true]Column 3[/tbm-column][/tbm-row]");
					a.addImmediate( c, "1/4 | 1/4 | 1/4 | 1/4", "[tbm-row][tbm-column width='one-fourth']Column 1[/tbm-column][tbm-column width='one-fourth']Column 2[/tbm-column][tbm-column width='one-fourth']Column one-fourth[/tbm-column][tbm-column width='one-fourth' last=true]Column 4[/tbm-column][/tbm-row]");
					a.addImmediate( c, "1/4 | 4/3", "[tbm-row][tbm-column width='tbm-one-fourth']Column 1[/tbm-column][tbm-column width='9' last=true]Column 2[/tbm-column][/tbm-row]");
					a.addImmediate( c, "1/3 | 2/3", "[tbm-row][tbm-column width='4']Column 1[/tbm-column][tbm-column width='8' last=true]Column 2[/tbm-column][/tbm-row]");
					
					c = b.addMenu({
						title: "<i class='icon-minus'></i> Message Boxes"
					});
					a.addImmediate( c, "Doc", "[box style='doc'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Download", "[box style='download'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Error", "[box style='error'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Help", "[box style='help'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Info", "[box style='info'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Media", "[box style='media'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "New", "[box style='new'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Note", "[box style='note'] Content goes here... [/box]<br /><br />");					
					a.addImmediate( c, "Success", "[box style='success'] Content goes here... [/box]<br /><br />");
					a.addImmediate( c, "Warning", "[box style='warning'] Content goes here... [/box]<br /><br />");
					
					c = b.addMenu({
						title: "<i class='icon-font'></i> Typography"
					});
					a.addImmediate( c, "Button", "[button type='flat, shaded' url='#' icon='ok' color='white, red, blue, orange, black, green, magenta' size='small, medium, big' target='_blank'id=''] Button text... [/button]");
					a.addImmediate( c, "Highlight", "[highlight color='yellow'] Content goes here... [/highlight]");
					a.addImmediate( c, "Spoiler", "[spoiler] Content goes here... [/spoiler]");
					a.addImmediate( c, "Dropcap", "[dropcap style='square']A[/dropcap]");
					a.addImmediate( c, "Panel", "[panel style='flat, shaded' color='blue, red, green, orange, magenta, black, white']Content goes here ...[/panel]");
					a.addImmediate( c, "Label", "[label rounded='true' type='flat, shaded' color='default, blue, red, green, orange, magenta, black, white']label[/label]");
					
					c = b.addMenu({
						title: "<i class='icon-list'></i> Lists"
					});
					a.addImmediate( c, "caret-right", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=caret-right]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=caret-right]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "star", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=star]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=star]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "ok", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=ok]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=ok]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "remove", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=remove]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=remove]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "play-circle", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=play-circle]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=play-circle]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "tag", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=tag]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=tag]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
					a.addImmediate( c, "plus", "[list icon_color=normal]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=plus]&nbsp;Item 1...&nbsp;[/list_item]<br />&nbsp;&nbsp;&nbsp;&nbsp;[list_item icon=plus]&nbsp;Item 2...&nbsp;[/list_item]<br />[/list]<br /><br />");
								
					c = b.addMenu({
						title: "<i class='icon-facebook'></i> Social"
					});
					a.addImmediate( c, "Facebook", "[facebook]");
					a.addImmediate( c, "Goole+", "[gplus]");
					a.addImmediate( c, "Twitter", "[twitter]");
					a.addImmediate( c, "LinkedIn", "[linkedin]");
					a.addImmediate( c, "StumbleUpon", "[stumbleupon]");
					a.addImmediate( c, "Digg", "[digg]");
					
					c = b.addMenu({
						title: "<i class='icon-facetime-video'></i> Videos"
					});
					a.addImmediate( c, "Youtube", "[video type='youtube' id='Bag1gUxuU0g' width='500' height='300'  /]");
					a.addImmediate( c, "Vimeo", "[video type='vimeo' id='33716408' width='500' height='300' /]");

					c = b.addMenu({
						title: "<i class='icon-repeat icon-spin'></i> Query"
					});
					a.addImmediate( c, "Recent Posts List", "[recent_posts title='Recent Posts' limit='5' order='ASC' category='0']");
					a.addImmediate( c, "Authors", "[print_authors display_posts=true exclude_admin=false show_fullname=true hide_empty=false]");
					// a.addImmediate( c, "List Pages", "[list_pages]");
					
					c = b.addMenu({
						title: "<i class='icon-list-alt'></i> Elements"
					});
					a.addImmediate( c, "Search Form", "[search button_text='Search']");
					a.addImmediate( c, "Content separator", "[separator type='line, double-line, dotted, shadow-1' height='small, medium, big, huge' ]");
					a.addImmediate( c, "Lightbox Image", "[lightbox_image src='' bigimage='' title='Image']<br>" );					
				});
                
                return btn;
			}
			
			return null;
		},		
		
		//Insert shortcode into content
		addImmediate: function ( ed, title, sc) {
			ed.add({
				title: title,
				onclick: function () {
					tinyMCE.activeEditor.execCommand( "mceInsertContent", false, sc )
				}
			})
		},
		
		// credits
		getInfo: function () {
			return {
				longname : "The Big Magazine Shortcodes",
				author : 'Alex Dimitrov',
				authorurl : 'http://xavortm.com/',
				infourl : 'http://xavortm.com/thebigmag',
				version : "1.0"
			};
		}
	});
	
	// add wellthemes plugin
	tinymce.PluginManager.add("thebigmagShortcodes", tinymce.plugins.thebigmagShortcodes);
})();