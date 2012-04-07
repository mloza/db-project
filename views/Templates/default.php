<!DOCTYPE html>
<html lang="en">
<head>

	<title>Projekt z baz danych v1.0</title>
	<meta charset="utf-8">
	
	<!-- Global stylesheets -->
	<link href="/css/reset.css" rel="stylesheet" type="text/css">
	<link href="/css/common.css" rel="stylesheet" type="text/css">
	<link href="/css/form.css" rel="stylesheet" type="text/css">
	<link href="/css/standard.css" rel="stylesheet" type="text/css">
	
	<!-- Comment/uncomment one of these files to toggle between fixed and fluid layout -->
	<!--<link href="/css/960.gs.css" rel="stylesheet" type="text/css">-->
	<link href="/css/960.gs.fluid.css" rel="stylesheet" type="text/css">
	
	<!-- Custom styles -->
	<link href="/css/simple-lists.css" rel="stylesheet" type="text/css">
	<link href="/css/block-lists.css" rel="stylesheet" type="text/css">
	<link href="/css/planning.css" rel="stylesheet" type="text/css">
	<link href="/css/table.css" rel="stylesheet" type="text/css">
	<link href="/css/calendars.css" rel="stylesheet" type="text/css">
	<link href="/css/wizard.css" rel="stylesheet" type="text/css">
	<link href="/css/gallery.css" rel="stylesheet" type="text/css">
	
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<link rel="icon" type="image/png" href="/favicon-large.png">
	
	<!-- Generic libs -->
	<script type="text/javascript" src="/js/html5.js"></script>				<!-- this has to be loaded before anything else -->
	<script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/js/old-browsers.js"></script>		<!-- remove if you do not need older browsers detection -->
	
	<!-- Template libs -->
	<script type="text/javascript" src="/js/jquery.accessibleList.js"></script>
	<script type="text/javascript" src="/js/searchField.js"></script>
	<script type="text/javascript" src="/js/common.js"></script>
	<script type="text/javascript" src="/js/standard.js"></script>
	<!--[if lte IE 8]><script type="text/javascript" src="/js/standard.ie.js"></script><![endif]-->
	<script type="text/javascript" src="/js/jquery.tip.js"></script>
	<script type="text/javascript" src="/js/jquery.hashchange.js"></script>
	<script type="text/javascript" src="/js/jquery.contextMenu.js"></script>
	<script type="text/javascript" src="/js/jquery.modal.js"></script>
	
	<!-- Custom styles lib -->
	<script type="text/javascript" src="/js/list.js"></script>
	
	<!-- Plugins -->
	<script  type="text/javascript" src="/js/jquery.dataTables.min.js"></script>
	<script  type="text/javascript" src="/js/jquery.datepick/jquery.datepick.min.js"></script>
	
	<!-- Charts library -->
	<!--Load the AJAX API-->
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
	
		// Load the Visualization API and the piechart package.
		google.load('visualization', '1', {'packages':['corechart']});
		
	</script>
	
	<script type="text/javascript">
		
		$(document).ready(function()
		{
			/*
			 * Example context menu
			 */
			
			// Context menu for all favorites
			$('.favorites li').bind('contextMenu', function(event, list)
			{
				var li = $(this);
				
				// Add links to the menu
				if (li.prev().length > 0)
				{
					list.push({ text: 'Move up', link:'#', icon:'up' });
				}
				if (li.next().length > 0)
				{
					list.push({ text: 'Move down', link:'#', icon:'down' });
				}
				list.push(false);	// Separator
				list.push({ text: 'Delete', link:'#', icon:'delete' });
				list.push({ text: 'Edit', link:'#', icon:'edit' });
			});
			
			// Extra options for the first one
			$('.favorites li:first').bind('contextMenu', function(event, list)
			{
				list.push(false);	// Separator
				list.push({ text: 'Settings', icon:'terminal', link:'#', subs:[
					{ text: 'General settings', link: '#', icon: 'blog' },
					{ text: 'System settings', link: '#', icon: 'server' },
					{ text: 'Website settings', link: '#', icon: 'network' }
				] });
			});
			
			/*
			 * Table sorting
			 */
			
			// A small classes setup...
			$.fn.dataTableExt.oStdClasses.sWrapper = 'no-margin last-child';
			$.fn.dataTableExt.oStdClasses.sInfo = 'message no-margin';
			$.fn.dataTableExt.oStdClasses.sLength = 'float-left';
			$.fn.dataTableExt.oStdClasses.sFilter = 'float-right';
			$.fn.dataTableExt.oStdClasses.sPaging = 'sub-hover paging_';
			$.fn.dataTableExt.oStdClasses.sPagePrevEnabled = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPagePrevDisabled = 'control-prev disabled';
			$.fn.dataTableExt.oStdClasses.sPageNextEnabled = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageNextDisabled = 'control-next disabled';
			$.fn.dataTableExt.oStdClasses.sPageFirst = 'control-first';
			$.fn.dataTableExt.oStdClasses.sPagePrevious = 'control-prev';
			$.fn.dataTableExt.oStdClasses.sPageNext = 'control-next';
			$.fn.dataTableExt.oStdClasses.sPageLast = 'control-last';
			
			// Apply to table
			$('.sortable').each(function(i)
			{
				// DataTable config
				var table = $(this),
					oTable = table.dataTable({
						/*
						 * We set specific options for each columns here. Some columns contain raw data to enable correct sorting, so we convert it for display
						 * @url http://www.datatables.net/usage/columns
						 */
						aoColumns: [
							{ bSortable: false },	// No sorting for this columns, as it only contains checkboxes
							{ sType: 'string' },
							{ bSortable: false },
							{ sType: 'numeric', bUseRendered: false, fnRender: function(obj) // Append unit and add icon
								{
									return '<small><img src="images/icons/fugue/image.png" width="16" height="16" class="picto"> '+obj.aData[obj.iDataColumn]+' Ko</small>';
								}
							},
							{ sType: 'date' },
							{ sType: 'numeric', bUseRendered: false, fnRender: function(obj) // Size is given as float for sorting, convert to format 000 x 000
								{
									return obj.aData[obj.iDataColumn].split('.').join(' x ');
								}
							},
							{ bSortable: false }	// No sorting for actions column
						],
						
						/*
						 * Set DOM structure for table controls
						 * @url http://www.datatables.net/examples/basic_init/dom.html
						 */
						sDom: '<"block-controls"<"controls-buttons"p>>rti<"block-footer clearfix"lf>',
						
						/*
						 * Callback to apply template setup
						 */
						fnDrawCallback: function()
						{
							this.parent().applyTemplateSetup();
						},
						fnInitComplete: function()
						{
							this.parent().applyTemplateSetup();
						}
					});
				
				// Sorting arrows behaviour
				table.find('thead .sort-up').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'asc']]);
					
					// Prevent bubbling
					return false;
				});
				table.find('thead .sort-down').click(function(event)
				{
					// Stop link behaviour
					event.preventDefault();
					
					// Find column index
					var column = $(this).closest('th'),
						columnIndex = column.parent().children().index(column.get(0));
					
					// Send command
					oTable.fnSort([[columnIndex, 'desc']]);
					
					// Prevent bubbling
					return false;
				});
			});
			
			/*
			 * Datepicker
			 * Thanks to sbkyle! http://themeforest.net/user/sbkyle
			 */
			$('.datepicker').datepick({
				alignment: 'bottom',
				showOtherMonths: true,
				selectOtherMonths: true,
				renderer: {
					picker: '<div class="datepick block-border clearfix form"><div class="mini-calendar clearfix">' +
							'{months}</div></div>',
					monthRow: '{months}', 
					month: '<div class="calendar-controls" style="white-space: nowrap">' +
								'{monthHeader:M yyyy}' +
							'</div>' +
							'<table cellspacing="0">' +
								'<thead>{weekHeader}</thead>' +
								'<tbody>{weeks}</tbody></table>', 
					weekHeader: '<tr>{days}</tr>', 
					dayHeader: '<th>{day}</th>', 
					week: '<tr>{days}</tr>', 
					day: '<td>{day}</td>', 
					monthSelector: '.month', 
					daySelector: 'td', 
					rtlClass: 'rtl', 
					multiClass: 'multi', 
					defaultClass: 'default', 
					selectedClass: 'selected', 
					highlightedClass: 'highlight', 
					todayClass: 'today', 
					otherMonthClass: 'other-month', 
					weekendClass: 'week-end', 
					commandClass: 'calendar', 
					commandLinkClass: 'button',
					disabledClass: 'unavailable'
				}
			});
		});
		
		// Demo modal
		function openModal()
		{
			$.modal({
				content: '<p>This is an example of modal window. You can open several at the same time (click button below!), move them and resize them.</p>'+
						  '<p>The plugin provides several other functions to control them, try below:</p>'+
						  '<ul class="simple-list with-icon">'+
						  '    <li><a href="javascript:void(0)" onclick="$(this).getModalWindow().setModalTitle(\'\')">Remove title</a></li>'+
						  '    <li><a href="javascript:void(0)" onclick="$(this).getModalWindow().setModalTitle(\'New title\')">Change title</a></li>'+
						  '    <li><a href="javascript:void(0)" onclick="$(this).getModalWindow().loadModalContent(\'ajax-modal.html\')">Load Ajax content</a></li>'+
						  '</ul>',
				title: 'Example modal window',
				maxWidth: 500,
				buttons: {
					'Open new modal': function(win) { openModal(); },
					'Close': function(win) { win.closeModal(); }
				}
			});
		}
	
	</script>
	
</head>

<body>
<!-- The template uses conditional comments to add wrappers div for ie8 and ie7 - just add .ie or .ie7 prefix to your css selectors when needed -->
<!--[if lt IE 9]><div class="ie"><![endif]-->
<!--[if lt IE 8]><div class="ie7"><![endif]-->
	
	<!-- Header -->
	
	<!-- Server status -->
	<header><div class="container_12">
		<p id="skin-name"><small>Projekt<br> Podstawy baz danych</small> <strong>1.0</strong></p>
		<div class="server-info">Server: <strong><?php $tmp = explode(' ', $_SERVER['SERVER_SOFTWARE']); echo $tmp[0]; ?></strong></div>
		<div class="server-info">Php: <strong><?php echo phpversion(); ?></strong></div>
	</div></header>
	<!-- End server status -->
	
	<!-- Main nav -->
	<nav id="main-nav">
		
		<ul class="container_12">
			<li class="home <?php $current == 'home' and print 'current'; ?>"><a href="/" title="Home">Home</a></li>

			<li class="users <?php $current == 'skoczek' and print 'current'; ?>"><a href="/skoczek/list.html" title="Skoczkowie">Skoczkowie</a>
				<ul>
					<li <?php $subcurrent == 'skoczek-list' and print 'class="current"'; ?>><a href="/skoczek/list.html" title="Przeglądaj">Lista</a></li>
					<li <?php $subcurrent == 'skoczek-add' and print 'class="current"'; ?>><a href="/skoczek/add.html" title="Dodaj nowego">Dodaj skoczka</a></li>
				</ul>
			</li>

			<li class="users <?php $current == 'sezon' and print 'current'; ?>"><a href="/sezon/list.html" title="Sezony">Sezony</a>
				<ul>
					<li <?php $subcurrent == 'sezon-list' and print 'class="current"'; ?>><a href="/sezon/list.html" title="Wybierz sezon i uzyskaj informacje">Informacje o sezonie</a></li>
					<li <?php $subcurrent == 'sezon-add' and print 'class="current"'; ?>><a href="/sezon/add.html" title="Dodaj nowy sezon">Dodaj sezon</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<!-- End main nav -->
	
	<!-- Sub nav -->
	<div id="sub-nav"><div class="container_12">
		
		<a href="#" title="Help" class="nav-button"><b>Help</b></a>
	
		<form id="search-form" name="search-form" method="post" action="search.html">
			<input type="text" name="s" id="s" value="" title="Search admin..." autocomplete="off">
		</form>
	
	</div></div>
	<!-- End sub nav -->
	
	<!-- Status bar -->
	<div id="status-bar"><div class="container_12">
	
		<ul id="status-infos">
			<li class="spaced">Logged as: <strong>Admin</strong></li>
			<li><a href="login.html" class="button red" title="Logout"><span class="smaller">LOGOUT</span></a></li>
		</ul>
		
		<ul id="breadcrumb">
			<?php foreach($breadcrumbs as $a => $name): ?>
				<li><a href="/<?php echo $a; ?>.html" title="Home"><?php echo $name ?></a></li>
			<?php endforeach; ?>
		</ul>
	
	</div></div>
	<!-- End status bar -->
	
	<div id="header-shadow"></div>
	<!-- End header -->
	<div class="clear"></div><br><br>
	<div class="container_12">
	<?php if(!empty($msg)): ?>
		<ul class="message <?php echo $msg['type']; ?> grid_12"><li><?php echo $msg['msg']; ?></li><li class="close-bt"></li></ul>
	<?php endif; ?>
	</div>
	<div class="clear"></div>
	<?php echo $view ?>
	
	<!-- End content -->
	
	<footer>
		
		<div class="float-left">
			<a href="#" class="button">Help</a>
			<a href="#" class="button">About</a>		</div>
		
		<div class="float-right">
			<a href="#top" class="button"><img src="images/icons/fugue/navigation-090.png" width="16" height="16"> Page top</a>		</div>
		
</footer>

<!--[if lt IE 8]></div><![endif]-->
<!--[if lt IE 9]></div><![endif]-->
</body>
</html>
