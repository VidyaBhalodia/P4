Description

This is my credential generator. The goal is to allow clinicians to view hospitals requirements for credentialing and track the hospitals at which they are (or are interested in being) credentialed). Clinicians can register and login to view all hospital requirements,  view their current hospitals, track and change their status, as well as add and remove hospitals from their list. For privacy reasons, no information can be viewed without logging in. 

Validation : 
Users are required to login before viewing or adding / changing any information, and they are restricted to only viewing information on their account. 
Users can only add hospitals from the master hospital list. 
Users can only edit and delete hospitals from their selected list.
Client-side validation includes verifying format for dates.
Server-side validation is performed to ensure that the required hospital and status information is entered when adding and updating fields. 

Planning Document : https://docs.google.com/document/d/14BY_FD1WclgkjiTpII3SXU7q1uclCmEi83IJb5GCxnA/edit?usp=sharing

Demo : 

Details for teaching team :

Authorization and Login / Logout information was created from the scripts provided through laravel.
Layout and formatting based off http://www.w3schools.com/css/css_navbar.asp tutorial
