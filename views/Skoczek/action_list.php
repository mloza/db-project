<!-- Content -->
	<article class="container_12">		
		<section class="grid_12">
			<div class="block-border"><div class="block-content">
				<!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
				<div class="h1">
					<h1>Skoczkowie</h1>
				</div>
				<!--
				<div class="block-controls">
					
					<ul class="controls-tabs js-tabs same-height with-children-tip">
						<li><a href="#tab-stats" title="Charts"><img src="images/icons/web-app/24/Bar-Chart.png" width="24" height="24"></a></li>
						<li><a href="#tab-comments" title="Comments"><img src="images/icons/web-app/24/Comment.png" width="24" height="24"></a></li>
						<li><a href="#tab-medias" title="Medias"><img src="images/icons/web-app/24/Picture.png" width="24" height="24"></a></li>
						<li><a href="#tab-users" title="Users"><img src="images/icons/web-app/24/Profile.png" width="24" height="24"></a></li>
						<li><a href="#tab-infos" title="Informations"><img src="images/icons/web-app/24/Info.png" width="24" height="24"></a></li>
					</ul>
					
				</div>
				 -->
				 <script type="text/javascript">
					$(document).ready(function() {
						$('#tab-stats').submit(function(e) {
							e.preventDefault();
							$('#skoczkowie .black-cell span').addClass('loading');
							$.post('', $(this).serialize(), function(r) { $('#skoczkowie .black-cell span').removeClass('loading'); $('#skoczkowie tbody').html($(r).find('#skoczkowie tbody').html()); });
						});
					});
				 </script>
				<form class="form" id="tab-stats" method="post" action="">
					<fieldset class="grey-bg">
						<legend><a href="#">Opcje wyświetlania</a></legend>
						
						<div class="float-left gutter-right">
							<label for="stats-period">Wyszukaj</label>
							<span class="input-type-text"><input type="text" name="q" id="stats-period" value="<?php !empty($_POST['q']) and print $_POST['q'] ?>" placeholder="Szukana fraza..."></span>
						</div>
						<div class="float-left gutter-right">
							<span class="label">Dodatkowe</span>
							<p class="input-height grey-bg">
								<input type="checkbox" name="additional" id="stats-display-0" value="1" <?php if(!empty($_POST['additional']) AND $_POST['additional'] == '1'):?>checked="checked"<?php endif; ?>>&nbsp;<label for="stats-display-0">Tylko żyjący</label> 
							</p> 
						</div>
						<div class="float-left gutter-right">
							<span class="label">Płeć</span>
							<p class="input-height grey-bg">
								<input type="radio" name="plec" id="stats-sites-0" value="kobieta" <?php if(!empty($_POST['plec']) AND $_POST['plec'] == 'kobieta'):?>checked="checked"<?php endif; ?>>&nbsp;<label for="stats-sites-0">Kobiety</label> 
								<input type="radio" name="plec" id="stats-sites-1" value="mężczyzna" <?php if(!empty($_POST['plec']) AND $_POST['plec'] == 'mężczyzna'):?>checked="checked"<?php endif; ?>>&nbsp;<label for="stats-sites-1">Mężczyźni</label>
							</p>
						</div>
						<div class="float-left gutter-right">
							<span class="label">Sortowanie</span>
							<select name="order" id="stats-sites-0">
								<option value="idSkoczka">Kolejność dodania</option>
								<option value="imie">Imie</option>
								<option value="nazwisko">Nazwisko</option>
								<option value="krajPochodzenia">Kraj</option>
								<option value="dataUrodzenia">Data urodzenia</option>
								<option value="dataSmierci">Data śmierci</option>
								<option value="plec">Płeć</option>
							</select>
						</div>
						<div class="float-left gutter-right">
							<span class="label">Kierunek sortowania</span>
							<select name="dir" id="stats-sites-0">
								<option value="ASC">Niemalejąco</option>
								<option value="DESC">Nierosnąco</option>
							</select>
						</div>
						<div class="float-left">
							<span class="label">&nbsp;</span>
							<button type="submit">Wyszukaj</button>
						</div>
					</fieldset>
					

					
				</form> 
				
				<br><br>
				
				<!-- 
				<div id="tab-comments" class="with-margin">
					<script type="text/javascript">
					
						//$('#tab-comments').onTabShow(function() { $(this).loadWithEffect('ajax-tab.html', function() { notify('Content loaded via ajax'); }); }, true);
					
					</script>
				</div>
				
				<div id="tab-medias" class="with-margin">
					<p>Medias</p>
				</div>
				
				<div id="tab-users" class="with-margin">
					<p>Users</p>
				</div>
				
				<div id="tab-infos" class="with-margin">
					<p>Infos</p>
				</div>
				
				<ul class="message no-margin">
					<li>This is an <strong>information message</strong>, inside a box</li>
				</ul>
				 -->
				 
				 <div class="no-margin"><table class="table" id="skoczkowie" cellspacing="0" width="100%">
				
					<thead>
						<tr>
							<th class="black-cell"><span class=""></span></th>
							<th scope="col">
								Imię
							</th>
							<th scope="col">Nazwisko</th>
							<th scope="col">Kraj</th>
							<th scope="col">
								Data Urodzenia
							</th>
							<th scope="col">
								Data Śmierci
							</th>
							<th scope="col">
								Płeć
							</th>
							<th scope="col" class="table-actions">Actions</th>
						</tr>
					</thead>
					
					<tbody>
					<?php while($jumper = $jumpers->fetchObject()) { ?>
						<tr onclick="document.location.href='/skoczek/details/<?php echo $jumper->idSkoczka ?>.html';" style="cursor:pointer;">
							<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
							<td><?php echo $jumper->imie ?></td>
							<td><?php echo $jumper->nazwisko ?></td>
							<td><?php echo $jumper->krajPochodzenia ?></td>
							<td><?php echo $jumper->dataUrodzenia ?></td>
							<td><?php echo $jumper->dataSmierci ?></td>
							<td><?php echo $jumper->plec ?></td>
							<td class="table-actions">
								<a href="/skoczek/edit/<?php echo $jumper->idSkoczka ?>.html" title="Edit" class="with-tip"><img src="/images/icons/fugue/pencil.png" width="16" height="16"></a>
								<a href="/skoczek/delete/<?php echo $jumper->idSkoczka ?>.html" onclick="return confirm('Jesteś pewny? Tej akcji nie da się cofnąć');" title="Delete" class="with-tip"><img src="/images/icons/fugue/cross-circle.png" width="16" height="16"></a>
							</td>
						</tr>					
					<?php } ?>
					</tbody>
				
				</table></div>
				 
			</div></div>
		</section>		
		<div class="clear"></div>
		
	</article>
