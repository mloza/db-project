<!-- Content -->
	<article class="container_12">		
		<section class="grid_12">
			<div class="block-border"><div class="block-content">
				<div class="h1">
					<h1>Zawody</h1>
				</div>			 
				 <div class="no-margin"><table class="table" cellspacing="0" width="100%">
				
					<thead>
						<tr>
							<th class="black-cell"><span class="loading"></span></th>
							<th scope="col">Nazwa</th>
							<th scope="col">Typ</th>
							<th scope="col" class="table-actions">Akcja</th>
						</tr>
					</thead>
					
					<tbody>
					<?php while($contest = $contests->fetchObject()) { ?>
							<tr onclick="document.location.href='/zawody/details.html?nazwa=<?php echo urlencode($contest->nazwa); ?>';" style="cursor:pointer;">
								<th scope="row" class="table-check-cell"><input type="checkbox" name="selected[]" id="table-selected-1" value="1"></th>
								<td> <?php echo $contest->nazwa ?></td>
								<td> <?php echo $contest->typ ?></td>
								<td class="table-actions">
								<a href="/zawody/edit.html?nazwa=<?php echo urlencode($contest->nazwa); ?>" title="Edycja" class="with-tip"><img src="/images/icons/fugue/pencil.png" width="16" height="16"></a>
								<a href="/zawody/delete.html" title="usuń" class="with-tip"><img src="/images/icons/fugue/cross-circle.png" width="16" height="16"></a>
							</td>
							</tr>	
					<?php }?>						
					</tbody>
				
				</table></div>
				 
			</div></div>
		</section>		
		<div class="clear"></div>
		
	</article>