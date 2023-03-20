# ECF - Restaurant Le Quai Antique

This project aims to promote Arnaud Michant's third restaurant called **Le Quai Antique**. You can find menus that offers the restaurant. 
As a potential guess, you can create a profil on the website. You also have the possibility to book a table and register your preferences (the number of personnes you want to come with and allergies). Once logged in, you can find all your reservations on your profil.
As the adminstrator of the website, you can create, update, and delete informations regarding dishes and menus. 


## Run Locally

Clone the project on your terminal with:

- git clone https://github.com/jgouin/ECF_Restaurant.git

- Start your local server

- Import the Quai_Antique.sql file on your database software
(you can find it on Google Drive https://drive.google.com/drive/folders/1B1XFBtuUJTyVAgVMDq-i6c0rIvjRX6t_?usp=sharing)

- create a file .env at the project root's folder with your informations: 
  DATABASE_DNS=mysql:host=localhost;dbname=Quai_Antique;port=....;
  DATABASE_USER=....
  DATABASE_PASSWORD=....
  
# Log in as a user 

- You can create a new account by clicking on "Créer votre profil"
- Submit the form with your informations
- Log in with your email address and your password
- Once on the main page you can see that you're beeing welcomed. 
- If you click on the welcome message you can access your profil informations.

- Return on the main page by clicking on "Retour"
- If you want to book a table you can click on "Réserver votre table"
- Submit the form and find back your reservation data on the profil. 

- If you want to check the menus, go at the bottom of the page and click on either La Carte or Les Menus

# Log in as the administrator

- You can log in with the following informations:
    + email address: quai_antique@chambery.fr
    + password: $Resto73*
- If you want to update the content of the website, click on any pictures.
- Select the dish you want to update or delete.



