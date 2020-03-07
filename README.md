# siteapi
A sample custom module for setting site api key in drupal 8.

#Steps to Use this module :-
1. install the module in drupal and enable it.
2. Login as admin in backend of drupal and go to configuration->site settings 
3. Enter the site api key for your site in the text field provided in the above form.
4. Try to access any page on frontend (site) with proper api key and page id. Ex :-
<Yoursite>/page_json/<api_key>/<pageid>
You will see the title and body of the page if proper inputs are given. Else you will get the error message accordingly.
  
#Resources Used :-
1. https://www.drupal.org/forum/support/post-installation/2019-02-06/add-a-new-custom-field-to-site-infomation-form-in-drupal8
2. https://www.drupal.org/docs/8/creating-custom-modules/add-a-routing-file
3. https://redcrackle.com/blog/say-hello-world-drupal-8-basic-steps-involved-creating-custom-module-drupal-8

#Time taken :- Since Drupal was new for me. So it took around 5-6 hours after the setup.
