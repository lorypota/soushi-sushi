![logo1](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/logo1.png)
![logo2](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/logo2.png)

"Soushi sushi" website - Restaurant website
I made this website as a project for my last year of highschool, I was relatively new to web programming and this took me about 1 month of development.
I used different programming languages to develop this website: HTML, CSS, JavaScript and PHP.

Index:
  1. Requirements analysis;
    1.1 Introduction;
    1.2 Generalities;
    1.3 Database requirements;
    1.4 Web-page requirements;
  2. Database design and modeling;
    2.1 Logical scheme;
    2.2 Database creation queries;
  3. Website design and modeling;
  4. Brief presentation of the final website looks and usage;
    4.1 Homepage;
    4.2 Menu;
    4.3 Shopping cart;
    4.4 Registration and login;
  5. Developing enviroment.



1. Requirements analysis

1.1 Introduction
In order for the website to cover all of the needed functionalities, it is good to use a template for conceptual design. Conceptual design covers the first phase of software development where the requirements of the final product are established. Subsequent phases involve logical and physical design; logical design consists of translating the conceptual schema into a logical schema, while physical design involves the use of a number of tools, such as HTML, CSS, JS, PHP, and MySQL.
The requirements analysis phase is very important as it allows for the calculation of key costs, time, and scope.

![requirements](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/requirements_triangle.png)

1.2 Generalities
Site virtues:
  • Simple to use;
  • Minimalist and studied graphics;
  • Attention to detail during development;
  • Flexible and customizable.
Flaws:
  • Slow (due to free hosting);
  • Graphics that can be improved;
  • Small problems (easy to fix but time-consuming).
Objectives:
  • Provide the food service company with a fast and effective method of communication with customers, while handling orders in a simple and effective way;
  • Provide customers with:
      - a brief introduction to the catering company;
      - a way to getting in touch with the catering company;
      - a function to order take-out dishes.
Usage scenarios: the website allows the user to register and authenticate, and then have access to the entire menu and being able to select the dishes they most prefer. Once the dishes that one wants to order are selected, the customer is able to place an order and then receive the sushi directly at home.


1.3 Database Requirements
The database system should offer these functionalities: 
  • creation and storage of a new user, with related username, password, first and last name;
  • creating and storage of a shopping cart linked to the relevant user by user name used as a primary and unique key, linked to an order date and a variable that controls whether or not the order has been placed;
  • storage of ingredients that make up the dishes one at a time, storing: the name of the ingredient, the description of the ingredient, the different qualities and characteristics: whether it is gluten-free or not, whether it is spicy or not, and what diet it belongs to (vegan, vegetarian, or none of these).
  • storage of dishes, with their name, price, description and category (sushi, drink or special);
  • must be able to associate infinite ingredients with infinite dishes;
  • must be able to associate infinite carts with infinite dishes, adding to each individual association the number of dishes saved (allowing the user to save multiple dishes of the same type).


1.4 Web-page requirements

All pages must contain:
  • a simple menu with:
      - the restaurant logo;
      - The page categories (with relevant icons and button that allows you to move immediately to the category);
      - Where possible a button that allows login or registration;
      - Where possible a button that allows the user to check the account the user is logged in with;
  • A small header that reminds the user of the restaurant's brand/logo/slogan, then leading back to better customer loyalty;
  • A footer showing:
      - The methods of contacting the restaurant (phone number and email);
      - The restaurant's days and hours of operation and business;
      - A small section devoted to site credits;
  • A small scroll bar that allows the user to move up and down as they move through the page;
  • A virtual assistant that allows the user to get help at any time;
  • An intuitive button that allows the user to return to the top of the page at any time;

All pages that do not require prior authentication by the user must allow the user:
  • registration with relevant username, password (with a check that allows the user to enter the correct password), first and last name;
  • authentication by user name and password;

The main page should show the user several categories grouped in a simple and intuitive way, such as:
  • The menu (also divided into the 3 subcategories);
  • A small and concise presentation of the restaurant;
  • An explanation of the ethics and quality of the ingredients used within the restaurant;
  • An interactive map with corresponding address;
 
The page regarding the menu should show the user:
  • The number of dishes (sushi, specialty or drinks) available;
  • A list with the following characteristics:
      - The list must contain the following categories:
          ■ Name of the dish (sushi, specialty or drink);
          ■ The description of the dish;
          ■ The price of the dish;
          ■ The ingredients of the dish (with their description);
          ■ The properties that all ingredients have in common (through the use of appropriate image and explanation);
      - The list must be editable by the user according to the following criteria:
          ■ Type of dish (sushi, specialty, drink, or all);
          ■ Ascending and descending order with respect to the name of the dish or the price of the dish;
          ■ Number of items per page (the user must be able to choose the number of items arranged, which are then divided into subpages and must then be able to move between them);

The page regarding the shopping cart must show the user:
  • In case no items have been added to the cart: a text reminding the user that the cart is empty and a link to the menu;
  • In case items have been added to the cart, a list with the following characteristics:
      - The list must contain the following categories:
          ■ Name of the dish (sushi, specialty, or drink);
          ■ The description of the dish;
          ■ The ingredients of the dish (with their description);
          ■ The properties that all the ingredients have in common (through the use of appropriate picture and explanation);
          ■ The quantity of dishes of that type added to the cart;
          ■ The total price for that line (e.g. if the user added a dish with a price of $5 the total would be $5, otherwise if he/she had added more dishes of the same type one must multiply $5 by the number of dishes added)
      - The list must be editable by the user according to the number of items per page (the user must be able to choose the number of items arranged, which are then divided into subpages and must then be able to move between them);
      - Below the list we need to show the user the total number of items, the total price, and a button to sort those items;
  • In case items have been ordered in the past, a list with the following characteristics:
      - The list must contain the following categories:
          ■ Order date (year/month/day format);
          ■ Total price;
          ■ Number of items ordered;
      - A different style from the list used to show the menu so that the user is not confused;
  • If the page is opened without prior authentication, the page must link back to the main page of the website.



2. Database design and modeling

2.1 Logical scheme
![database](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/database_modeling.png)
 
 
2.2 Database creation queries
Ordered queries:
  • create table users(username varchar(32),password varchar(32) not null,first_name varchar(16) not null, last_name varchar(16) not null,primary key (username))
  • create table cart(id_cart int Auto_INCREMENT, username varchar(32), is_ordered boolean not null default 0,date_order date, primary key(id_cart), foreign key (username) references users (username) on UPDATE cascade on delete cascade)
  • create table sushi(sushi_name varchar(32), price decimal(11,2) not null, description varchar(128), is_special boolean not null,is_drink boolean not null, primary key (sushi_name))
  • create table ingredients(ingredient varchar(32),description varchar(128),is_glutenfree boolean not null,is_spicy boolean not null,id_diet varchar(32), primary key (ingredient))
  • create table sushi_ingredients(sushi_name varchar(32),ingredient varchar(32), primary key(sushi_name,ingredient), foreign key (sushi_name) references sushi (sushi_name) on update cascade on delete cascade, foreign key (ingredient) references ingredients (ingredient) on update cascade on delete cascade)
  • create table cart_sushi(sushi_name varchar(32),id_cart int,pieces_number int not null default 0, primary key(sushi_name,id_cart), foreign key (sushi_name) references sushi (sushi_name) on update cascade on delete cascade, foreign key (id_cart) references cart (id_cart) on update cascade on delete cascade)
  


3. Website design and modeling
To design my website I used different programming languages, more specifically: HTML, CSS, JavaScript, PHP and MySQL.
I utilized a color palette to design the website in a more pleasant way, with the usage of the website https://coolors.co, this is the palette i used:
![color palette](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/palette.png)



4. Brief presentation of the final website looks and usage

4.1 Homepage
The homepage is divided into 4 sections: "menu," "about us," "soushi quality," and "where are we?".
Through the use of the appropriate buttons, it is possible to move between pages.
![homepage1](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/homepage1.png)
![homepage2](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/homepage2.png)
![homepage3](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/homepage3.png)
![homepage4](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/homepage4.png)


4.2 Menu
The menu allows the user to select "only sushi", "specialty" or "drinks" and order them by name or price. I used a table to show all the dishes and linking attributes.
![menu1](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/menu1.png)
![menu2](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/menu2.png)
![menu3](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/menu3.png)


4.3 Shopping cart
The shopping cart allows the user to check added dishes, calculating the total price and the number of added dishes.
It also allows the user to see past orders.
![shoppingcart1](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/shoppingcart1.png)
![shoppingcart2](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/shoppingcart2.png)

4.4 Registration and login
Through the appropriates form, the user can register and login onto the web-site.
![register](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/register.png)
![login](https://raw.githubusercontent.com/lorypota/soushi-sushi/master/soushi/images/documentation/login.png)



5. Developing enviroment

I developed this project using the Visual Studio Code IDE and through the use of GitHub to save and update data.
The repository on github is: lorypota/soushi-sushi
