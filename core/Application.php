<?php
/**
 * User: TheCodeholic
 * Date: 7/7/2020
 * Time: 9:57 AM
 */

namespace app\core;

use app\core\db\Database;
use app\core\Product;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

/**
 * Class Application
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package app
 */
class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    
    public static Application $app;
    public static string $ROOT_DIR;
    public  string $userClass;
    public string $layout = 'err';
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public View $view;
    public ?UserModel $user;
    protected array $eventListeners = [];


    public function __construct($rootDir, $config)
    {
        $this->user = null;
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        $this->view = new View();

        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function login(UserModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        Application::$app->session->set('user', $value);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }

    public function run()
    {
        $this->triggerEvent(self::EVENT_BEFORE_REQUEST);
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {
            echo $this->router->renderView('_error', [
                'exception' => $e,
            ]);
        }
    }

    public function triggerEvent($eventName)
    {
        $callbacks = $this->eventListeners[$eventName] ?? [];
        foreach ($callbacks as $callback) {
            call_user_func($callback);
        }
    }
    
    public function OrderEmail($name, $email,$orderId){
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;
            $mail->Host = 'mail.firstmedtradeafrica.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'admin@firstmedtradeafrica.com';
            $mail->Password = 'Th4%B)+;nFA-';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('admin@firstmedtradeafrica.com','Amina');
            $mail->addAddress($email);
            $mail->Subject = 'Your Order'.$orderId.'Has Being Placed.';

            $message = '
            <html>

            <head>
              <meta charset="UTF-8">
            </head>
            
            <body>
              <table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse">
                <tbody>
                  <tr>
                    <td valign="top" align="center" style="border-collapse:collapse;background-color:#ffffff" bgcolor="#ffffff">
                      <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                        <tbody>
                          <tr>
                            <td align="left" style="border-collapse:collapse;padding:5px 0 0 0">
                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse;background-color:#ffffff" align="center" bgcolor="#ffffff">
                                      <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                        <tbody>
                                          <tr>
                                            <td style="border-collapse:collapse">
                                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                                <tbody>
                                                  <tr>
                                                    <td style="border-collapse:collapse;padding:0px 0 35px 0px" align="left">
            
                                                      <a href="">
                                                        <img src="https://www.firstmedtrade.com/includes/assets/img/logo%202.png" width="147" height="31" style="outline:none;text-decoration:none;display:block;border:none" alt="logo" class="CToWUd">
                                                      </a>
            
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse">
                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                                <tbody>
                                  <tr>
                                    <td align="left" style="border-collapse:collapse;color:#001973;font-family:helvetica,arial,sans-serif;font-size:30px;font-weight:100;line-height:32px;padding:0 0 10px 0">Thanks for Buying From FirstmedTrade Africa</td> 
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse">
                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;table-layout:fixed;word-wrap:break-word" width="600">
                                <tbody>
                                  <tr>
                                    <td style=" border-collapse:collapse; color:#333333; font-family:helvetica,arial,sans-serif; font-size:17px; line-height:24px; font-weight:100; padding:0 30px 38px 0" align="left">
                                        Hello '.$name.' please click the link below to make payment for your Order: <b>'. $orderId .'</b> <br>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse">
                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                <tbody>
                                  <tr>
                                    <td style="border-collapse:collapse;padding:0 0 30px 0" align="left">
                                      <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                        <tbody>
                                          <tr>
                                            <td align="left" style="border-collapse:collapse">
                                              <div>
                                                <a href="" style="
                                                          background-color: #001973;     
                                                          border: 1px solid #001973;
                                                          border-radius: 4px;
                                                          color: #ffffff;
                                                          display: inline-block;
                                                          font-family: Helvetica,Arial,sans-serif;
                                                          font-size: 14px;
                                                          font-weight: bold;
                                                          line-height: 35px;
                                                          text-align: center;
                                                          text-decoration: none;
                                                          padding: 0 25px 0 25px;
                                                          letter-spacing: .5px;
                                                          min-width: 150px; ">Proceed To Payment</a>
                                              </div>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse"></td>
                          </tr>
                          <tr>
                            <td style="border-collapse:collapse">
                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                <tbody>
                                  <tr>
                                    <td align="center" style="border-collapse:collapse">
                                      <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;border-top:#e6e6e6 solid 1px;padding:10px 0 10px 0" width="100%" align="center">
                                        <tbody>
                                          <tr>
                                            <td align="center" style="border-collapse:collapse">
                                              <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%" align="center">
                                                <tbody>
                                                  <tr>
                                                    <td align="center" style="border-collapse:collapse">
                                                      <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                                        <tbody>
                                                          <tr>
                                                            <td align="center" style="border-collapse:collapse;padding:15px 5px 15px 5px;font-family:arial,sans-serif;font-size:12px;font-weight:400">
                                                              <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Home</a>
                                                              <span style="padding:20px 15px;color:#848484">•</span>
                                                              <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Blog</a>
                                                              <span style="padding:20px 15px;color:#848484">•</span>
                                                              <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Support</a>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td width="100%" align="center" style="border-collapse:collapse;padding:10px;font-family:helvetica,arial,sans-serif;font-size:12px;line-height:16px;color:#a6a6a6"> This email has been sent to you by FirstMed Trade Africa <br>
                                      <!-- <a style="color:#a6a6a6" href="" target="_blank" data-saferedirecturl=""> Evernote Corporation, 305 Walnut Street, Redwood City, CA 94063, USA. </a> -->
                                    </td>
                                  </tr>
                                  <tr>
                                    <td height="1" style="border-collapse:collapse;min-width:576px;font-size:0px;line-height:0px">
                                      <img height="1" src="https://ci5.googleusercontent.com/proxy/nYc7GBTBg_vgkhSKTlw-j_4K-E90MMZQnUX_aTAm8YxewSVkHwotLpp7CxsJh5Y-Elnus6XR0JV35QDRE9TQ0NjMBdiHxD1_20m3XWWkePYKkAC8EkGBoYq4=s0-d-e1-ft#https://www.evernote.com/redesign/mail/puck/global/gmail_spacer_576.gif" style="outline:none;min-width:576px;text-decoration:none;border:none" class="CToWUd">
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-collapse:collapse">
                                      <div style="display:none;white-space:nowrap;font:15px courier;color:#ffffff">- - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td style="border-collapse:collapse">
                                      <img src="https://ci6.googleusercontent.com/proxy/DSrLnsDDEDAC9C_xfdAHj9X-FUmsfdJUrEGcdzBdhPH7b9ioHioH-dJcX10XJRsiCh-YeLdu5JEQl066xKGUCkoUymLbmkcQuEULWx_9C8R1_RZnAQ=s0-d-e1-ft#https://www.evernote.com/etpa/d992ce4b-4a06-4e60-8c17-db1277da1980" style="outline:none;text-decoration:none;border:none;height:1px;width:1px" width="1" height="1" class="CToWUd">
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </body>
            
            </html>';

            $mail->isHTML(true);
            $mail->Body = $message;
            $mail->send();
    }
    


    public function regEmail($name, $email,$password){
            $mail = new PHPMailer();
            $mail->isSMTP();
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->Host = 'mail.firstmedtradeafrica.com';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Username = 'admin@firstmedtradeafrica.com';
            $mail->Password = 'Th4%B)+;nFA-';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('admin@firstmedtradeafrica.com','Amina');
            $mail->addAddress($email);
            $mail->Subject = 'Registration Successful!';
            $message = '
            <html>
            <head>
                <meta charset="UTF-8">
            </head>
            <body>
            <table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse">
              <tbody>
                <tr>
                  <td valign="top" align="center" style="border-collapse:collapse;background-color:#ffffff" bgcolor="#ffffff">
                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                      <tbody>
                        <tr>
                          <td align="left" style="border-collapse:collapse;padding:5px 0 0 0">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                              <tbody>
                                <tr>
                                  <td style="border-collapse:collapse;background-color:#ffffff" align="center" bgcolor="#ffffff">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                      <tbody>
                                        <tr>
                                          <td style="border-collapse:collapse">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                              <tbody>
                                                <tr>
                                                  <td style="border-collapse:collapse;padding:0px 0 35px 0px" align="left">
            
                                                    <a href="">
                                                      <img src="https://www.firstmedtrade.com/includes/assets/img/logo%202.png" width="147" height="31" style="outline:none;text-decoration:none;display:block;border:none" alt="logo" class="CToWUd">
                                                    </a>
            
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600" align="center">
                              <tbody>
                                <tr>
                                  <td align="left" style="border-collapse:collapse;color:#001973;font-family:helvetica,arial,sans-serif;font-size:30px;font-weight:100;line-height:32px;padding:0 0 10px 0">Welcome To FirstMedTrade Africa</td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;table-layout:fixed;word-wrap:break-word" width="600">
                              <tbody>
                                <tr>
                                  <td style="
                                    border-collapse:collapse;
                                    color:#333333;
                                    font-family:helvetica,arial,sans-serif;
                                    font-size:17px;
                                    line-height:24px;
                                    font-weight:100;
                                    padding:0 30px 38px 0" 
                                    align="left">
                                    Welcome '.$name.' this account was autogenerated to fufill your order offline, your login details bellow: <br> 
                                    <b style="
                                              background-color: #001973;     
                                              border: 1px solid #001973;
                                              border-radius: 4px;
                                              color: #ffffff;
                                              display: inline-block;
                                              font-family: Helvetica,Arial,sans-serif;
                                              font-size: 14px;
                                              font-weight: bold;
                                              line-height: 25px;
                                              text-align: center;
                                              text-decoration: none;
                                              padding: 0 10px;
                                              letter-spacing: .5px;
                                              min-width: 150px;
                                              margin-bottom: 10px;
                                              margin-right: 20px;
                                              margin-top: 20px;
                                      ">UserName :</b>'.$email.'<br>
                                      <b style="
                                                background-color: #001973;     
                                                border: 1px solid #001973;
                                                border-radius: 4px;
                                                color: #ffffff;
                                                display: inline-block;
                                                font-family: Helvetica,Arial,sans-serif;
                                                font-size: 14px;
                                                font-weight: bold;
                                                line-height: 25px;
                                                text-align: center;
                                                text-decoration: none;
                                                padding: 0 10px;  
                                                letter-spacing: .5px;
                                                min-width: 150px;
                                                margin-right: 20px;
                                      ">Password :</b>'.$password.'<br>
                                    <br>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                              <tbody>
                                <tr>
                                  <td style="border-collapse:collapse;padding:0 0 30px 0" align="left">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="600">
                                      <tbody>
                                        <tr>
                                          <td align="left" style="border-collapse:collapse">
                                            <div>
                                              <a href="" style="
                                              background-color: #001973;     
                                              border: 1px solid #001973;
                                              border-radius: 4px;
                                              color: #ffffff;
                                              display: inline-block;
                                              font-family: Helvetica,Arial,sans-serif;
                                              font-size: 14px;
                                              font-weight: bold;
                                              line-height: 35px;
                                              text-align: center;
                                              text-decoration: none;
                                              padding: 0 25px 0 25px;
                                              letter-spacing: .5px;
                                              min-width: 150px; ">Login to Edit Your Profile</a>
                                            </div>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse"></td>
                        </tr>
                        <tr>
                          <td style="border-collapse:collapse">
                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                              <tbody>
                                <tr>
                                  <td align="center" style="border-collapse:collapse">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse;border-top:#e6e6e6 solid 1px;padding:10px 0 10px 0" width="100%" align="center">
                                      <tbody>
                                        <tr>
                                          <td align="center" style="border-collapse:collapse">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%" align="center">
                                              <tbody>
                                                <tr>
                                                  <td align="center" style="border-collapse:collapse">
                                                    <table border="0" cellpadding="0" cellspacing="0" style="border:none;border-collapse:collapse" width="100%">
                                                      <tbody>
                                                        <tr>
                                                          <td align="center" style="border-collapse:collapse;padding:15px 5px 15px 5px;font-family:arial,sans-serif;font-size:12px;font-weight:400">
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Home</a>
                                                            <span style="padding:20px 15px;color:#848484">•</span>
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Blog</a>
                                                            <span style="padding:20px 15px;color:#848484">•</span>
                                                            <a href="" style="text-decoration:none;color:#00a82d" target="_blank" data-saferedirecturl="">Support</a>
                                                          </td>
                                                        </tr>
                                                      </tbody>
                                                    </table>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </td>
                                </tr>
                                <tr>
                                  <td width="100%" align="center" style="border-collapse:collapse;padding:10px;font-family:helvetica,arial,sans-serif;font-size:12px;line-height:16px;color:#a6a6a6"> This email has been sent to you by FirstMed Trade Africa <br>
                                    <!-- <a style="color:#a6a6a6" href="" target="_blank" data-saferedirecturl=""> Evernote Corporation, 305 Walnut Street, Redwood City, CA 94063, USA. </a> -->
                                  </td>
                                </tr>
                                <tr>
                                  <td height="1" style="border-collapse:collapse;min-width:576px;font-size:0px;line-height:0px">
                                    <img height="1" src="https://ci5.googleusercontent.com/proxy/nYc7GBTBg_vgkhSKTlw-j_4K-E90MMZQnUX_aTAm8YxewSVkHwotLpp7CxsJh5Y-Elnus6XR0JV35QDRE9TQ0NjMBdiHxD1_20m3XWWkePYKkAC8EkGBoYq4=s0-d-e1-ft#https://www.evernote.com/redesign/mail/puck/global/gmail_spacer_576.gif" style="outline:none;min-width:576px;text-decoration:none;border:none" class="CToWUd">
                                  </td>
                                </tr>
                                <tr>
                                  <td style="border-collapse:collapse">
                                    <div style="display:none;white-space:nowrap;font:15px courier;color:#ffffff">- - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="border-collapse:collapse">
                                    <img src="https://ci6.googleusercontent.com/proxy/DSrLnsDDEDAC9C_xfdAHj9X-FUmsfdJUrEGcdzBdhPH7b9ioHioH-dJcX10XJRsiCh-YeLdu5JEQl066xKGUCkoUymLbmkcQuEULWx_9C8R1_RZnAQ=s0-d-e1-ft#https://www.evernote.com/etpa/d992ce4b-4a06-4e60-8c17-db1277da1980" style="outline:none;text-decoration:none;border:none;height:1px;width:1px" width="1" height="1" class="CToWUd">
                                  </td>
                                </tr>
                              </tbody>
                            </table>
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
            ';
            $mail->isHTML(true);
            $mail->Body = $message;
            $mail->send();
        
    }



    public function on($eventName, $callback)
    {
        $this->eventListeners[$eventName][] = $callback;
    }
}