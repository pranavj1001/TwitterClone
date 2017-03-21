# TwitterClone
Based on Core principles of Twitter but different in many ways.

Hey there, 

  This repository contains the clone of Twitter. 
  However, only the core principles of Twitter are same.
  
  The site is visually very different and is basically my approach to build a relatively complex website like Twitter.
  
  I've used **MVC Framework** to build this website.
  
  I've used **Bootstrap** to develop this project. [More about Bootstrap](http://getbootstrap.com/getting-started/)
  
  Update: Added comments so that other users can view and understand my code better.
  
**What is MVC?**

The Model-View-Controller (MVC) is an architectural pattern that separates an application into three main logical components: the model, the view, and the controller. Each of these components are built to handle specific development aspects of an application. MVC is one of the most frequently used industry-standard web development framework to create scalable and extensible projects.

## Features

* **Login/Signup system**

* **Post/View Tweets** - Easily post and view tweets.

* **Follow/Unfollow other users** - Easily follow or unfollow users with one click.

* **Passwords are encrypted with a salt** - For better security passwords are hashed with a salt variable.

* **Feed View** - Users can view tweets of other users who they follow.

* **Real-Time Changes** - When a new tweet is posted user doesn't have to reload the page. It is added automatically in real-time.

* **Responsive Web Design** - With the help of Bootstrap the web can be easily accessed on any device.

* **Search** - A search function to search tweets which contain the user entered string.

* **View Profiles** - Users can simply view profiles of other users and their respective tweets.

* **Delete Tweets** - (New 15th Jan 2017) Now, with a click of a button users can now delete their tweets.

## Languages

* PHP

* JS & jQuery

* CSS

* HTML

## ScreenShot

![Alt text](ScreenshotHomePage.png?raw=true "Home Page")


## Import the database

1. Install Xampp
2. Go to this link: http://localhost/phpmyadmin/
3. Select the import tab button
4. Select the Browse button
5. Search and Open the "twitterdatabase.sql" file

Congratulations! you just created the database.

## Common Questions

Note:You need to have Xampp installed on your machine.

* I'm getting an error in this line: $link = mysqli_connect("localhost", "root", "", "twitterdatabase"); - This error is because you don't have the database on your pc.

* How to view the TwitterClone? - Copy the files of this repo in the "htdocs" folder of the installed "xampp" folder. Then using this link http://localhost/TwitterClone/ you can view the TwitterClone.

## Queries?

email me at pranavj1001@gmail.com

## License

  MIT License
