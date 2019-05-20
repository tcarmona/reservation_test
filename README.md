# Reservation Drupal Test
Provides a testing Drupal module for working with an RSVP list.

## Architecture
The solution is structured in two modules, **rsvp_form** and **event**.
- rsvo_form: Provides all the code for the solution. It was done with a Form inside a Block, creating a Content Entity named *reservation*. It can be viewed using a *view* that is available on the side menu only for users with the administration role
- event: Provide an Event content type for testing the rsvo_form. 

## How to run it?

A simple way to test this code is using the default Drupal Docker image. Clone this repository, change the branch to `develop` and run the code below:
`docker run -p 8080:80 -v PATH_TO_CODE:/var/www/html/modules drupal`
After that, the Drupal installation should be available on `localhost:8080`. Install Drupal with the Standard profile and the SQLite database.
After the installation enable the **rsvp_form** via the Drupal interface. The **event** content type should now be available.  
You can generate new reservations using the form on the events pages. You can also view a table with all the reservation data on the side menu.
