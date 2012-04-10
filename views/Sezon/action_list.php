<!-- Content -->
	<article class="container_12">		
		<section class="grid_12">
			<div class="block-border"><div class="block-content">
				<!-- We could put the menu inside a H1, but to get valid syntax we'll use a wrapper -->
				<div class="h1">
					<h1>Sezony</h1>
				</div>
				
				<form method="post" class="form" action="">
				<?php
				$i = 0; 
				while($s = $seasons->fetchObject()) 
				{ 	
				?>				
					<fieldset class="collapsed">   			
					<legend class="full-width"><a href="#">Sezon <?php echo $s->sezon ?></a></legend>
					<p>
						
						<!-- Element z zawodami w sezonie $s -->
						<div class="col200pxL-left">
		    					<h3>Zawody</h3>
		     				
		    					<!-- Use the class js-tabs to enable JS tabs script -->
		    					<ul class="side-tabs js-tabs same-height">
							<?php while($t = $tournaments[$i]->fetchObject()) { 
								$nazwaZawodow = $t->nazwaZawodow; 	?>
								<li><a href="#<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i; ?>" title="<?php echo $nazwaZawodow; ?>"><?php echo $nazwaZawodow; ?></a></li>
							<?php }
							$tournaments[$i]->closeCursor();
							$tournaments[$i]->execute();
							?>		    					
							</ul>
						</div>
						<div class="col200pxL-right">
		     					<?php while($t = $tournaments[$i]->fetchObject()) { 
								$nazwaZawodow = $t->nazwaZawodow;	?>
		    						<div id="<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i; ?>" class="tabs-content">
									<!-- Use the class js-tabs to enable JS tabs script -->
									<ul class="tabs js-tabs">
									    <li class="current"><a href="#<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i.'klasyfikacja'; ?>">Klasyfikacja Generalna</a></li>
									    <li><a href="#<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i.'skocznie'; ?>">Skocznie na których odbyły się zawody</a></li>
									</ul>
									 
									<div class="tabs-content">
									     
									    <div id="<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i.'klasyfikacja'; ?>">
										<div class="no-margin"><table class="table" cellspacing="0" width="100%">
											<thead>
												<?php if($tournamentTotalResults[$s->sezon][$t->nazwaZawodow][1] == true) { ?>
													<tr>
														<th scope="col">Miejsce</th>													
														<th scope="col">Imię</th>
														<th scope="col">Nazwisko</th>
														<th scope="col">Punkty</th>
													</tr>
												<?php } else { ?>
													<tr>
														<th scope="col">Miejsce</th>													
														<th scope="col">Kraj</th>
														<th scope="col">Punkty</th>
													</tr>
												<?php } ?>	
												
											</thead>
					
											<tbody>
											<?php $miejsce = 1; while($r = $tournamentTotalResults[$s->sezon][$t->nazwaZawodow][0]->fetchObject()) { ?>
												<!-- Dopasuj zawartość w zależności czy to zawody drużynowe czy indywidualne -->												
												<?php if($tournamentTotalResults[$s->sezon][$t->nazwaZawodow][1] == true) { ?>								
													<tr onclick="document.location.href='/skoczek/details/<?php echo $r->idSkoczka ?>.html';" style="cursor:pointer;">												
														<td><?php echo $miejsce ?></td>
														<td><?php echo $r->imie ?></td>
														<td><?php echo $r->nazwisko ?></td>
														<td><?php echo $r->suma ?></td>
													</tr>
												<?php } else { ?>
													<tr style="cursor:pointer;">												
														<td><?php echo $miejsce ?></td>
														<td><?php echo $r->kraj ?></td>
														<td><?php echo $r->suma ?></td>
													</tr>
												<?php } ?>					
											<?php $miejsce++; } ?>
											</tbody>
				
										</table></div>
									    </div>
									     
									    <div id="<?php echo preg_replace('/\s+/', '', $nazwaZawodow).$i.'skocznie'; ?>">
										<div class="no-margin"><table class="table" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th scope="col">Miasto</th>													
												</tr>
											</thead>
					
											<tbody>
											<?php while($to = $tournamentTakeOffs[$s->sezon][$t->nazwaZawodow]->fetchObject()) { ?>
												<tr onclick="document.location.href='/skocznia/details/<?php echo $to->idSkoczni ?>.html';" style="cursor:pointer;">													
													<td><?php echo $to->miasto ?></td>
												</tr>					
											<?php } ?>
											</tbody>
				
										</table></div>
									    </div>
									 
									</div>
		    						</div>
							<?php } ?>
						</div>
						<!-- /Element z zawodami w sezonie $s -->
						
					</p>
	    				</fieldset>
				<?php 
					$i++;	
				} ?>				
				</form>

			</div></div>
		</section>		
		<div class="clear"></div>
		
	</article>
