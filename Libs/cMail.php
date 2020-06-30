<?php  
    
    // Email 

        include 'phpmailer.php';

        function send_mailSMTPHTML( $sDestinatarios, $sAsunto, $sMensaje ){

        $_aConfigMail   = array('host'     => 'email-smtp.us-west-2.amazonaws.com',
      
                            'smptauth' => true,
      
                            'username' => "AKIA3XCEQ4EAWH5I62Y2",
      
                            'password' => "BMsq1h2iHsf9wW7ozUid/BT/hN55fKGnyhhG4rauEltz",

                            'from' => 'no-reply@retemex.mx');
          /*
          $_aConfigMail   = array('host'     => 'smtp.gmail.com',
                              
                              'smptauth' => true,
                              
                              'username' => "clientes@retemex.mx",
                              
                              'password' => "PFM96/yvLNmG",

                              'from' => 'clientes@retemex.mx');*/
    
          $cMail  = new PHPMailer();
    
          $cMail->IsSMTP();
          
          $cMail->CharSet = "utf-8";
    
          $cMail->Host      = $_aConfigMail['host']; // specify main and backup server
    
          $cMail->Port      = 587;
    
          $cMail->SMTPSecure= 'tls';
    
          $cMail->SMTPAuth  = true;
    
          $cMail->Username  = $_aConfigMail['username']; // SMTP username
    
          $cMail->Password  = $_aConfigMail['password']; // SMTP password
    
          $cMail->SMTPDebug  = 0;
    
          $cMail->From      = $_aConfigMail['from'];//$sFromMail;
    
          $cMail->FromName  = 'Retemex';
    
          $cMail->Subject   = $sAsunto;
    
          $cMail->Body      = $sMensaje;
    
          $cMail->IsHTML(true);

          $cMail->ClearAllRecipients(); 
    
          $aDestinatarios  = explode(',',$sDestinatarios);
    
          $n = count($aDestinatarios);
    
          for ($i=0; $i<$n; $i++){
    
              $cMail->AddAddress($aDestinatarios[$i],$aDestinatarios[$i]);
    
          }
      

          $bExito = $cMail->Send();
    
          $iIntentos=1;
    
          while ((!$bExito) && ($iIntentos < 2)) {
    
              sleep(5);
    
              $bExito = $cMail->Send();
    
              if(!$bExito){
    
                  echo 'Mailer error: ' . $cMail->ErrorInfo;
    
              }
    
              $iIntentos++;
    
          }
    
          return $bExito;
    
        }

        function send_mailSMTPHTML_amazon( $sDestinatarios, $sAsunto, $sMensaje ){

          $_aConfigMail   = array('host'     => 'email-smtp.us-west-2.amazonaws.com',
      
                            'smptauth' => true,
      
                            'username' => "AKIA3XCEQ4EAWH5I62Y2",
      
                            'password' => "BMsq1h2iHsf9wW7ozUid/BT/hN55fKGnyhhG4rauEltz",

                            'from' => 'no-reply@retemex.mx');

          /*$_aConfigMail   = array('host'     => 'smtp.gmail.com',
                              
                              'smptauth' => true,
                              
                              'username' => "clientes@retemex.mx",
                              
                              'password' => "PFM96/yvLNmG",

                              'from' => 'clientes@retemex.mx');*/
    
          $cMail  = new PHPMailer();
    
          $cMail->IsSMTP();
          
          $cMail->CharSet = "utf-8";
    
          $cMail->Host      = $_aConfigMail['host']; // specify main and backup server
    
          $cMail->Port      = 587;
    
          $cMail->SMTPSecure= 'tls';
    
          $cMail->SMTPAuth  = true;
    
          $cMail->Username  = $_aConfigMail['username']; // SMTP username
    
          $cMail->Password  = $_aConfigMail['password']; // SMTP password
    
          $cMail->SMTPDebug  = 0;
    
          $cMail->From      = $_aConfigMail['from'];//$sFromMail;
    
          $cMail->FromName  = 'Retemex';
    
          $cMail->Subject   = $sAsunto;
    
          $cMail->Body      = $sMensaje;
    
          $cMail->IsHTML(true);

          $cMail->ClearAllRecipients(); 
    
          $aDestinatarios  = explode(',',$sDestinatarios);
    
          $n = count($aDestinatarios);
    
          for ($i=0; $i<$n; $i++){
    
              $cMail->AddAddress($aDestinatarios[$i],$aDestinatarios[$i]);
    
          }
      

          $bExito = $cMail->Send();
    
          $iIntentos=1;
    
          while ((!$bExito) && ($iIntentos < 2)) {
    
              sleep(5);
    
              $bExito = $cMail->Send();
    
              if(!$bExito){
    
                  echo 'Mailer error: ' . $cMail->ErrorInfo;
    
              }
    
              $iIntentos++;
    
          }
    
          return $bExito;
    
        }

        function getHtmlMailBody( $sBody='' ){

             ob_start();

             include( 'mailbody.html');

             $sContent = ob_get_clean();

             $sContent = str_ireplace('@_content_@',  $sBody , $sContent);

             return $sContent;

        } 

        function getHtmlMailBody_Notificacion( $sBody='' ){

             ob_start();

             include( 'mailbodynotification.html');

             $sContent = ob_get_clean();

             $sContent = str_ireplace('@_content_@',  $sBody , $sContent);

             return $sContent;

        } 

        function fnGetHtmlErrorMsj( $sJsonError ){

            $sContent = '<br>

                      <table style="max-width: 100%; margin: 0 auto;">

                        <tbody>

                          <tr>

                            <td colspan="2" style="text-align: center; padding:20px;">

                              <h3>Error en Portal Activación Movilidad</h3>

                            </td>

                          </tr>

                          <tr>

                            <td colspan="2" style="text-align: center; padding:20px;">

                              ' . $sJsonError . '
                              
                            </td>

                          </tr>
                          
                        </tbody>
                                
                      </table>';

            return getHtmlMailBody_Notificacion( $sContent );

        }


    // Email 
        
?>