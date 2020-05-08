# FacebookPagePoster
Posts messages to a facebook page using OAuth.   
The Graph SDK is already included therefore in order to deploy this application simply follow the below mentioned guidelines.

## 1. Create a Facebook App
- Goto https://developers.facebook.com/apps and create a facebook application using any facebook account that you currently have.
- After creating an app goto https://developers.facebook.com/apps, select the new app, Goto Settings -> Basic. After that record the App ID and App Secret.

## 2. Install XAMPP
- Goto https://www.apachefriends.org/download.html . Download and install the relevant version. 

## 3. Download and Setup FBPoster
- The video on downloading and setting up FBPoster is provided here: https://www.youtube.com/watch?v=mOen0X5udWY
- If not following the video then simply,  
  1. Download the Github repository       
     ![Download Repository](https://i.imgur.com/9BK7iEN.jpg)
  2. Extract the FBPoster folder from the Zip file  
     ![Extract FBPoster](https://i.imgur.com/uJwjlgE.jpg)
  3. Copy the FBPoster into "{ XAMPP Installation } / htdocs /"
  4. Open the config.php file inside FBPoster using Notepad+ or any editting software.
  5. Paste the app_id and app_secret obtained in Part 1 near the relevant fields. 
  6. Open XAMPP Control panel and turn on Apache server
  7. Proceed to http://localhost/FBPoster/ to in a web browser
