<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';me
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'home/login';
$route['cadastro_efetuado'] = 'home/cadastro_efetuado';
$route['admin/calendario'] = 'admin/index';
$route['tela/(:any)'] = 'home/tela/$1';
$route['empresas'] = 'page';
$route['empresas/(:any)'] = 'page/index/$1';
$route['q'] = 'home/query';
//$route['admin/login'] = 'home/login';
//require_once( BASEPATH .'database/DB.php');
//$db =& DB();
//$query = $db->get( 'v_url' );
//$result = $query->result();
//foreach( $result as $row )
//{
//    
//    $route[ $row->URL] = 'Page/getEmpresa/'.$row->CODIGO;
//    $route[ $row->URL.'/(:any)'] = "Page/getEmpresa/$row->CODIGO/$1"; 
//}

require_once( BASEPATH . 'helpers/file_helper.php');
//createRoutes();
//
//function createRoutes(){
$string = read_file('./assets/teste.txt');

if (strlen($string) > 0) {
    $linhas = explode(';', $string);
    //print_r($linhas);
    array_pop($linhas);
    
    foreach ($linhas as $linha) {
       // echo $linha."<br>";
        $link = explode(',', $linha);

         $codigo = $link['0'];
         $url = $link['1'];
        
        $route[$url] = 'Page/getEmpresa/' . $codigo;
        $route[$url . '/(:any)'] = "Page/getEmpresa/$codigo/$1";
    }
}
//print_r($route);
//die();
//echo $string;

//}
