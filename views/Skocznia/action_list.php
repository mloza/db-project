<!-- Content -->
	<article class="container_12">		
		<section class="grid_12">
			<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Skocznie</h1>
				</div>			 
				 <div class="no-margin"><table class="table" cellspacing="0" width="100%">
				
					<thead>
						<tr>
							<th class="black-cell"><span class="loading"></span></th>
							<th scope="col">Nazwa</th>
							<th scope="col">Miasto</th>
							<th scope="col">Punkt K</th>
							<th scope="col">Rekord</th>
							<th scope="col" class="table-actions">Akcja</th>
						</tr>
					</thead>
					
					<tbody>
					<?php while($skiJump = $skiJumps->fetchObject()) { ?>
							<tr onclick="document.location.href='/skocznia/details/<?php echo $skiJump->idSkoczni ?>.html';" style="cursor:pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
								<td> <?php echo $skiJump->nazwa ?></td>
								<td> <?php echo $skiJump->miasto ?></td>
								<td> <?php echo $skiJump->punktKonstrukcyjny ?></td>
								<td> <?php echo $skiJump->rekordSkoczni ?></td>
								<td class="table-actions">
								<a href="/Skocznia/edit/<?php echo $skiJump->idSkoczni ?>.html" title="Edycja" class="with-tip"><img src="/images/icons/fugue/pencil.png" width="16" height="16"></a>
								<a href="/Skocznia/delete/<?php echo $skiJump->idSkoczni ?>.html" title="usuń" class="with-tip"><img src="/images/icons/fugue/cross-circle.png" width="16" height="16"></a>
							</td>
							</tr>	
					<?php }?>					
					</tbody>
				
				</table></div>
				 
			</div></div>
		</section>		
		<div class="clear"></div>
		
	</article>