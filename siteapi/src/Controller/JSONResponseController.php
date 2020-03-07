<?php
/**
 * This controller file handles the page access request.
 * @Author Jogendra
 */
namespace Drupal\siteapi\Controller;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller class to handle the request which extends the base controller class.
 */
class JSONResponseController extends ControllerBase {

  /**
   * This function handles the request and display json data in response.
   *
   * @param $apiKey :- Site API key passed as string
   * @param $id :- id of the page as number
   * @return JSON Response
   */

  public function handleRequest($apiKey, $id) {

    // fetch the api key stored in system configuration.
    $site_api_key = \Drupal::config('siteapi.settings')->get('apikey');
	//compare if provided key is matched with the one with saved in system config.
    if ( $apiKey === $site_api_key ) {
	 // check if the page id is set
      if(isset($id) && $id > 0) {

        //get the node of this given id
        $node = \Drupal::entityTypeManager()->getStorage('node')->load($id);
        // Check if this page exists and not empty
        if( !empty($node) && $node->getType() === 'page' ){
               // get page contents.
                $title = $node->getTitle();
                $body = $node->get('body')->getValue();
                // prepare response
                $response = array(
                  'Node ID' => $id,
                  'title' => $title,
                  'Contents' => $body,
                );
                
        }else {
                $response = array(
                  'Error : Page not found!'
                );       
        }
        // Return the JSON Response.
                return new JsonResponse($response);
      }else {
        
            $response = array(
              'Error : Page Id not provided.Please provide page id in url'
            );
            return new JsonResponse($response);
          }

    }else {
      // means key does not match so send the proper message.
      $response = array(
        'Access Denied',
        'Error : API Key not matched.Provide the correct API key.'
      );
      return new JsonResponse($response);
    }

  }

}
