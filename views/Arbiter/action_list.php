<!-- Content -->
	<article class="container_12">		
		<section class="grid_12">
			<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Arbitrowie</h1>
				</div>			 
				 <div class="no-margin"><table class="table" cellspacing="0" width="100%">
				
					<thead>
						<tr>
							<th class="black-cell"><span class="loading"></span></th>
							<th scope="col">Imię</th>
							<th scope="col">Nazwisko</th>
							<th scope="col">Data Urodzenia</th>
							<th scope="col">Narodowość</th>
							<th scope="col" class="table-actions">Akcja</th>
						</tr>
					</thead>
					
					<tbody>
					<?php while($arbiter = $arbiters->fetchObject()) { ?>
							<tr>
								<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
								<td> <?php echo $arbiter->imie ?></td>
								<td> <?php echo $arbiter->nazwisko ?></td>
								<td> <?php echo $arbiter->dataUrodzenia ?></td>
								<td> <?php echo $arbiter->narodowosc ?></td>
								<td class="table-actions">
								<a href="/arbiter/edit/<?php echo $arbiter->idSedziego ?>.html" title="Edycja" class="with-tip"><img src="/images/icons/fugue/pencil.png" width="16" height="16"></a>
								<a href="/arbiter/delete/<?php echo $arbiter->idSedziego ?>.html" title="usuń" class="with-tip"><img src="/images/icons/fugue/cross-circle.png" width="16" height="16"></a>
							</td>
							</tr>	
					<?php }?>					
					</tbody>
				
				</table></div>
				 
			</div></div>
		</section>		
		<div class="clear"></div>
		
	</article>