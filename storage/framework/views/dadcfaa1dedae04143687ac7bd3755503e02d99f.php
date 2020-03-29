<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<style type="text/css">
		@media (max-width: 700px){
			.main-tb{
				width: 400px !important;
			}
			.logo{
				width: 119px !important;
			}
			.w-100{
				width: 100% !important; 
			}
			.para-1{
				font-size: 14px !important;
				width: 30% !important;
			}
			.para-2{
				font-size: 14px !important;
				width: 70% !important;
			}
		}
	</style>
	
	        <?php
    $lang1 =Session::get('language');

    ?>
</head>
<body style="background-color: #F0F0F0;">
<table width="650" class="main-tb" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
	<tbody>
		<tr>
			<td>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center" style="padding: 10px 20px; padding-bottom: 0;">
					<tbody>
						<tr>
							<td style="text-align: left;">
								<a href="#"><img class="logo" style="width: 150px;" src="https://imgur.com/dKlR7r6.png" alt="#" /></a>
							</td>
							<td style="text-align: right; padding-top: 115px;">
								<p style="color: #333; font-family: sans-serif; font-size: 18px; margin:0;">
									<a href="#" style="text-decoration: none; color: #333;">Home</a> | 
									<a href="#" style="text-decoration: none; color: #333;">Property</a> | 
									<!--<a href="#" style="text-decoration: none; color: #333;">Impressum</a></p>-->
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center" style="background-image: url(https://imgur.com/SXbvl2Q.png); background-size: 100% 100%;">
					<tbody>
						<tr>
							<td>
								<p style="font-family: sans-serif; font-size: 33px; color: #fff; text-align: center; padding-bottom: 35px; padding-top: 20px; margin:0;">Anfrage</p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding: 0 20px;">
								<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; font-weight: 600; padding-bottom: 5px; padding-top: 5px; margin:0;"><a href="#" style="color: #333; text-decoration: underline;"><?php if(\Lang::has('property.property_title_'.$data['property_id'])): ?>
                               <?php echo e(trans('property.property_title_'.$data['property_id'])); ?>

                           <?php else: ?>
                               <?php echo e($data['property_name']); ?>

                           <?php endif; ?>,  <?php if(\Lang::has('region.region_title_'.$data['region_id'])): ?>
                               <?php echo e(trans('region.region_title_'.$data['region_id'])); ?>

                           <?php else: ?>
                               <?php echo e((new \App\Services\PropertyService)->getRegion($data['region_id'])); ?>

                           <?php endif; ?></a></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding: 0 20px;">
								<table width="50%" class="w-100" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="left">
									<tbody>
										<tr>
											<td style="padding-right:10px; padding-top: 5px;">
												<img style="width: 100%;" src="<?php echo e(asset("/images/cover-images/".$data['cover_image_name'])); ?>" alt="#" />
											</td>
										</tr>
									</tbody>
								</table>
								<table width="50%" class="w-100" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding-left: 10px; padding-top: 5px;">
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;">55045 Capriglia</p>
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;"><b> <?php if(\Lang::has('property_offer.property_offer_title_'.$data['offer_id'])): ?>
                              <?php echo e(trans('property_offer.property_offer_title_'.$data['offer_id'])); ?>

                          <?php else: ?>
                              <?php echo e((new \App\Services\PropertyService)->getOffer($data['offer_id'])); ?>

                          <?php endif; ?>
                          /</b> <?php echo e(number_format($data['price'] , 0, ',', '.')); ?> €
                    </p>
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;">ca. <?php echo e($data['plot_size']); ?> m<sup>2</sup> <?php echo app('translator')->getFromJson('app.area'); ?> </p>
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;">ca.<?php echo e($data['living_area']); ?> m<sup>2</sup></p>
												<!--<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;">12 Zimmer </p>
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 35px; margin:0;">Ref-Nr.: V000288</p>-->
												<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; padding-bottom: 5px; padding-top: 5px; margin:0;">Kauferprovision: <span>+ <?php echo e($data['vat']); ?>% <?php echo app('translator')->getFromJson('app.taxmode'); ?></span></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px; padding-top: 70px; padding-bottom: 15px;">
								<p style="border: 1px solid #F1F1F1; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px; padding-bottom: 6px;">
								<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; font-weight: 600; padding-bottom: 5px; padding-top: 5px; margin:0;">Angaben des Interessenten:</p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">Name:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"><?php echo e(isset($data['name']) ? $data['name'] : 'N/A'); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">Stralle:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;">not</p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">PLZ/Ort:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"><?php echo e(isset($data['address']) ? $data['address'] : ''); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">Telefon:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"><?php echo e(isset($data['phone']) ? $data['phone'] : ''); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">E-Mail:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"><?php echo e(isset($data['email']) ? $data['email'] : ''); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">Nachricht:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"><?php echo e(isset($data['message']) ? $data['message'] : ''); ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<p style="border: 1px solid #ffffff; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px; padding-bottom: 80px; padding-top: 30px;">
								<p style="border: 1px solid #F1F1F1; margin:0;" /></p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px; padding-bottom: 10px;">
								<p style="font-family: sans-serif; font-size: 12px; color: #817E85; text-align: center; font-weight: 600; margin:0;">Italica e.K.</p>
								<p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;">Schomenveg 14 | 94060 Pocking, Germany <i>Tel.:</i> + 49 08538 2659988 <i>Fax:</i> + 49</p>
								<p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;">08538 2659989 | <i>Mail</i> <a href="mailto:info@italicahomes.com" style="color: #817E85; text-decoration: underline;">info@italicahomes.com</a> <i>Home</i> www.italicahomes.com</p>
								<p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;"><i>Raiffeisenbank Rottenburg BLZ 74364689 Kontonummer 1813170 Amtsgericht Passau</i></p>
								<p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;">HRA 12537 Steuernummer 153/218/31327 USt-IdNr DE 130244463 </p>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#F0F0F0" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding:20px; text-align: center;">
								<a href="https://www.facebook.com/italicahomes/"><img style="width: 18px; margin: 0 13px;" src="https://imgur.com/2XTe3fx.png" alt="#" /></a>
								<a href="#"><img style="width: 29px; margin: 0 13px;" src="https://imgur.com/Pcei4v4.png" alt="#" /></a>
								<a href="#"><img style="width: 25px; margin: 0 13px;" src="https://imgur.com/4twkXNv.png" alt="#" /></a>
								<a href="https://twitter.com/livingartIT" target="_blank"><img style="width: 33px; margin: 0 13px;" src="https://imgur.com/9Vuox60.png" alt="#" /></a>
								<a href="#"><img style="width: 36px; margin: 0 13px;" src="https://imgur.com/Ienhc8O.png" alt="#" /></a>
								<a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/" target="_blank"><img style="width: 33px; margin: 0 13px;" src="https://imgur.com/dWXyp13.png" alt="#" /></a>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>