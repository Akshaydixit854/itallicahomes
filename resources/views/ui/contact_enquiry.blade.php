<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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
								<a href="#"><img class="logo" style="width: 150px;" src="{{asset('images/contact_enquiry/logo.png')}}" alt="italicahomes" /></a>
							</td>
							<td style="text-align: right; padding-top: 115px;">
								<p style="color: #333; font-family: sans-serif; font-size: 18px; margin:0;">
									<a href="https://www.italicahomes.com/" style="text-decoration: none; color: #333;">Home</a> | 
									<a href="https://www.italicahomes.com/contact" style="text-decoration: none; color: #333;">@lang('app.contact')</a>
							</td>
						</tr>
					</tbody>
				</table>
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center" style="background-image: url(https://imgur.com/SXbvl2Q.png); background-size: 100% 100%;">
					<tbody>
						<tr>
							<td>
								<p style="font-family: sans-serif; font-size: 33px; color: #fff; text-align: center; padding-bottom: 35px; padding-top: 20px; margin:0;">@lang('app.Enquiry')&nbsp;</p>
							</td>
						</tr>
					</tbody>
				</table>
	
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px; padding-bottom: 6px;">
								<p style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; font-weight: 600; padding-bottom: 5px; padding-top: 5px; margin:0;">@lang('app.interested_party')&nbsp;:</p>
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
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">@lang('app.name')&nbsp;:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"> {{isset($data['name']) ? ucfirst($data['name']) : ''}}</p>
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
				<!-- <table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
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
				</table> -->
			<!--	<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">@lang('app.phone')&nbsp;:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"> {{isset($data['phone']) ? $data['phone'] : ''}}</p>
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
				</table>-->
				<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
					<tbody>
						<tr>
							<td style="padding-left: 20px; padding-right: 20px;">
								<table width="100%" cellpadding="0" bgcolor="#ffffff" cellspacing="0" border="0" align="center">
									<tbody>
										<tr>
											<td style="padding: 7px 10px;background-color: #F0F0F0;">
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">@lang('app.email')&nbsp;:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;"> {{isset($data['email']) ? $data['email'] : ''}}</p>
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
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">@lang('app.subject')&nbsp;:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;">{{isset($data['subject']) ? ucwords($data['subject']) : ''}}</p>
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
												<p class="para-1" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; padding-top: 5px; margin:0; width: 35%;">@lang('app.message')&nbsp;:</p>
												<p class="para-2" style="font-family: sans-serif; font-size: 16px; color: #333; text-align: left; float: left; padding-bottom: 5px; width: 65%; padding-top: 5px; margin:0;">@if(\Lang::has('propertyMessage.property_message_'.$data['id']))
                                {!! trans('propertyMessage.property_message_'.$data['id']) !!}
                            @else
                                {!! $data['message'] !!}
                            @endif</p>
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
                        <p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;">Schömerweg 14 I 94060 Pocking Germany <i>Tel.:</i> + 49 08538 2659988 <i>Fax:</i> + 49</p>
                        <p style="font-family: sans-serif; font-size: 11px; color: #817E85; text-align: center; font-weight: 400; margin:0;">08538 2659989 | <i>Mail</i> <a href="mailto:info@italicahomes.com" style="color: #817E85; text-decoration: underline;">info@italicahomes.com</a> <i> | Home</i> www.italicarentals.com</p>
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
								<a href="javascript:void(0);"><img style="width: 29px; margin: 0 13px;" src="https://imgur.com/Pcei4v4.png" alt="instagram" /></a>
								<a href="javascript:void(0);"><img style="width: 25px; margin: 0 13px;" src="https://imgur.com/4twkXNv.png" alt="#" /></a>
								<a href="https://twitter.com/livingartIT"><img style="width: 33px; margin: 0 13px;" src="https://imgur.com/9Vuox60.png" alt="#" /></a>
								<a href="javascript:void(0);"><img style="width: 36px; margin: 0 13px;" src="https://imgur.com/Ienhc8O.png" alt="#" /></a>
								<a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/"><img style="width: 33px; margin: 0 13px;" src="https://imgur.com/dWXyp13.png" alt="#" /></a>
							</td>
						</tr>
					<!--	<tr>
							<td style="padding:20px; text-align: center;">
								<a href="https://www.facebook.com/italicahomes/"><img style="width: 18px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img1.png')}}" alt="facebook" /></a>
								<a href="javascript:void(0);"><img style="width: 29px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img2.png')}}" alt="instagram" /></a>
								<a href="javascript:void(0);"><img style="width: 25px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img3.png')}}" alt="#" /></a>
								<a href="https://twitter.com/livingartIT"><img style="width: 33px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img4.png')}}" alt="twitter" /></a>
								<a href="javascript:void(0);"><img style="width: 36px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img5.png')}}" alt="" /></a>
								<a href="https://www.linkedin.com/in/lenka-fridrich-447b9318/"><img style="width: 33px; margin: 0 13px;" src="{{asset('images/contact_enquiry/img6.png')}}" alt="linkedIn" /></a>
							</td>
						</tr>-->
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>