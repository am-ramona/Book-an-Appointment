<div>
    <center>
        <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
            <tbody><tr>
                <td align="center" valign="top"  bgcolor="#F8F8F8" style="background-color:#F8F8F8;">
                    <span style="color:#ffffff;display:none;font-size:0px;height:0px;width:0px"></span>
                    
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody><tr>
                            <td align="center" bgcolor="#fff" valign="top" style="background-color:#fff;padding-right:30px;padding-left:30px">
                                
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:400px">
                                    <tbody><tr>
                                        <td align="center" valign="top" style="padding-top:40px;padding-bottom:20px">
                                            <img src="{{url('img/white.png')}}" alt="Electro Fitness" width="350" style="color:#ffffff;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;letter-spacing:-1px;padding:0;margin:0;text-align:center">    
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="padding-bottom:40px;padding-top:20px">
                                          <?php if($action=='verify_email' || $action=="reset_password" || $action == "package_subscription" || $action == "session_reminder" || $action == "subscription_reminder" ){?>  
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:left">Dear <strong style="color:#00a551;"><?php echo $nameuser;?></strong>,</p>
                                          <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top" style="padding-bottom:40px">
                                          <?php if($action=='verify_email'){?>  
                                          <p style="color:#00a551;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:center">Thank you for registering a account with Electro Fitness In order to verify the email address you provided and to activate your Dashboard Area Account , please click on the below link:</p>
                                          <?php }elseif($action=="reset_password"){ ?>
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">We’ve received a request to reset the password for this email address.</p>
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:30px;text-align:left">To reset your password please click on the link below (Link expires in 24 hours)</p>
                                           
                                          <?php }elseif($action=="package_subscription"){ ?>
                                          
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">Thank you for subscribing to <strong style="color:#00a551;">{{$package->name}}</strong> Package, kindly find below your subscription details:</p>
                                          <table width="100%" style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:14px;">
                                            <tr><td width="50%">Package Name:<div style="margin-top:10px"><strong>{{$package->name}}</strong></div></td><td>Expiry Date:<div  style="margin-top:10px"><strong>{{ date('d/m/Y',time()+ $package->period * 7 * 24 *60 *60)}}</strong></div></td></tr>
                                            <tr><td  width="50%" style="padding-top:20px;">Period:<div><strong>{{$package->period}} Weeks</strong></div></td><td style="padding-top:20px;">Sessions:<div><strong>24</strong></div></td></tr>
                                            <tr><td  width="50%" style="padding-top:20px;">Freeze:<div><strong>{{$package->freeze}}</strong></div></td><td></td></tr>
                                          </table>
                                          <table width="100%" style="margin-top:20px;color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:14px; border-top:1px solid #e4e4e4;">
                                            <tr><td  width="50%" style="padding-top:20px;">Price:</td><td style="padding-top:20px;"><strong>{{$package->price}}$</strong></td></tr>
                                            <?php if($subscription_data['amount'] < $package->price){?>
                                            <tr><td width="50%" >Discount:</td><td><strong>{{ 100 - (($subscription_data['amount'] *100)/ $package->price) }}%</strong></td></tr>
                                            <?php } ?>
                                          </table>
                                          <table width="100%" style="margin-top:20px;color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:14px; border-top:1px solid #e4e4e4;">
                                            <tr><td  width="50%" style="padding-top:20px;">Payment Type:</td><td style="padding-top:20px;"><strong>{{$subscription_data['payment_method'] == 0 ? 'Cash' : 'Credit Card'}}</strong></td></tr>
                                            <tr><td  width="50%">Total:</td><td><strong>{{$subscription_data['amount'] }}$</strong></td></tr>
                                          </table>
                                          <?php }elseif($action=='session_reminder'){ ?>
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:left">Don't forget your session tomorrow, {{date('d/m/Y',strtotime($date))}} at {{$time}}</p>
                                          <?php }elseif($action=='subscription_reminder'){ ?>
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:left">Kindly note that your subscription is valid until tomorrow, {{$day}}.</p>
                                          <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:left">In order to renew your subscription or choose a new package go to the account area.</p>
                                          <?php } ?>
                                        </td>
                                    </tr>
                                </tbody></table>
                                
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="padding-right:30px;padding-left:30px">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody><tr>
                                        <td align="center" valign="top">
                                            
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:640px">
                                                <tbody><tr>
                                                    <td align="center" valign="top">
                                                        <table align="center" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#ffffff;border-collapse:separate;border-top-left-radius:4px;border-top-right-radius:4px">
                                                            <tbody><tr>
                                                                <td align="center" valign="top" width="100%" style="padding-top:40px;padding-bottom:0">&nbsp;</td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                </tr>
                                            </tbody></table>
                                            
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" valign="top">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody><tr>
                                        <td align="center" valign="top">
                                            
                                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:700px">
                                                <tbody><tr>
                                                  <td align="right" valign="top" width="30">&nbsp;</td>
                                                    <td valign="top" bgcolor="#FFFFFF" style="background-color:#FFF;padding-right:40px;padding-left:40px">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                            <tr>
                                                                <td align="center" style="padding-bottom:60px" valign="top">
                                                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                        <tbody><tr>
                                                                            <td align="center" valign="middle">
                                                                               <?php if($action=="reset_password"){ ?>
                                                                                <a href="{{ url('account/reset',$token)}}" style="background-color:#00a551;border-collapse:separate;border-top:20px solid #00a551;border-right:40px solid #00a551;border-bottom:20px solid #00a551;border-left:40px solid #00a551;border-radius:3px;color:#ffffff;display:inline-block;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:600;letter-spacing:.3px;text-decoration:none" target="_blank">Reset Password</a>
                                                                              <?php }else if($action=="verify_email"){?>
                                                                              <a href="{{ url('account/verify',$token)}}" style="background-color:#00a551;border-collapse:separate;border-top:20px solid #00a551;border-right:40px solid #00a551;border-bottom:20px solid #00a551;border-left:40px solid #00a551;border-radius:3px;color:#ffffff;display:inline-block;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:600;letter-spacing:.3px;text-decoration:none" target="_blank">Verify Your email</a>
                                                                                
                                                                                <?php }?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center" valign="top" style="padding-bottom:60px">
                                                                    <table align="center" bgcolor="#F2F2F2" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f2f2f2;border-collapse:separate;border-radius:4px">
                                                                        <tbody><tr>
                                                                            <td align="center" valign="middle" style="padding:20px">
                                                                                <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:700;line-height:24px;padding-top:0;margin-top:0;text-align:left">Do you have any question?</p>
                                                                                <p style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding-top:0;margin-top:0;text-align:left">Contact our online support team. <span style="color:#737373;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:left">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit..</span></p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody></table>
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                    </td>
                                                    
                                                    <td align="right" valign="top" width="30">&nbsp; </td>
                                                </tr>
                                            </tbody></table>
                                            
                                      </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        <tr>
                        	<td height="25">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="center" valign="top" style="padding-right:30px;padding-left:30px">
                                
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:640px">
                                    <tbody>
                                    <tr>
                                        <td valign="top" style="color:#9ca1ae;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding-bottom:10px;text-align:center">
                                            <p><a href="http://beta.fxbfi.com/wp/" style="color:#9ca1ae;text-decoration:underline" target="_blank">Visit Wesbite</a><span> &nbsp; &bull; &nbsp; </span><a href="http://beta.fxbfi.com/wp/privacy-policy/" style="color:#9ca1ae;text-decoration:underline" target="_blank">Privacy Policy</a><span> &nbsp; &bull; &nbsp; </span><a href="http://beta.fxbfi.com/wp/contact/" style="color:#9ca1ae;text-decoration:underline" target="_blank">Contact Us</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="color:#9ca1ae;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding-bottom:10px;text-align:center">
                                            <p style="color:#9ca1ae;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding:0;margin:0;text-align:center">2017 &copy; FXBFI <a href="https://goo.gl/maps/BJHXgSZ425v" style="text-decoration:none;color:#9ca1ae;border-bottom:1px dashed #9ca1ae;" target="_blank">1 Arch. Kyprianou and Agiou Andreou Corner, Loucaides Building, 2nd floor, Office 21, 3036 Limassol, Cyprus</a></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="color:#9ca1ae;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;line-height:24px;padding-bottom:20px;text-align:center">
                                            <p style="color:#b7b7b7;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:10px;font-weight:400;line-height:12px;padding:0;margin:0;text-align:justify">This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses. Anyone who communicates with us by e-mail is deemed to have accepted these risks. FXBFI is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail. Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
                                        </td>
                                    </tr>
                                </tbody></table>
                                
                            </td>
                        </tr>
                    </tbody></table>
                    
                </td>
            </tr>
        </tbody></table>
    </center>
</div>