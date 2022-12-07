<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
  /**
   * Instance of the main Request object.
   *
   * @var CLIRequest|IncomingRequest
   */
  protected $request;

  /**
   * An array of helpers to be loaded automatically upon
   * class instantiation. These helpers will be available
   * to all other controllers that extend BaseController.
   *
   * @var array
   */
  protected $helpers = [];

  /**
   * Constructor.
   */
  public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
  {
    // Do Not Edit This Line
    parent::initController($request, $response, $logger);
    helper('array');

    // Preload any models, libraries, etc, here.

    // E.g.: $this->session = \Config\Services::session();
  }

  public function defineAnonimusUser($completeUserName)
  {
    if ($completeUserName == "0" || $completeUserName == "") {
      return "Usuario ánonimo";
    } else {
      return $completeUserName;
    }
  }
  public function validarParamUrl($param)
  {
    $param_val = '';

    if (isset($_GET[$param])) {
      $param_val = $_GET[$param];

    }
    return $param_val;
  }
  public function rescatarParamUrl($param)
  {
    $param_val = '';
    if (isset($_POST[$param])) {
      $param_val = $_POST[$param];
    }
    return $param_val;

  }
  public function loginxz($id_user)
  {
    if ($id_user > 0) {
      return "Salir";
    } else {
      return "Login";
    }
  }

}