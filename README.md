# **Assignment Theme**

Hello I am [Janki](https://janki1028.wordpress.com/).
This theme is developed during the WordPress Training Program provided by [rtCamp](https://rtcamp.com). You can also find my WordPress Learning Report [here](). 

The requirements for the theme can be found [here](https://learn.rtcamp.com/topic/task-theme-development-assignment/).

## **Description**
## The main directories and files include:
+ `assets\` : Contains all images used by the site.
+ `inc\` : This contains 
  + `customizer.php` : This file contains code for custom theme description and title.
  + `template-functions.php` : This file contains the admin-specific functionality of the plugin.
  + `template-tags.php` : This file replaces some of the functionalities by core features.
  + `widgets.php` : This file contains custom widgets for the theme.
+ `js\`
    + `main.js` : This file contains theme scripts.
+ `languages\` : Contains pot template for localization.
+ `layout\` : Contains all styles and layouts for the theme
    + `css\` 
        + `main.css` : This file contains all core theme css.
        + `media-queries.css` : This file contains media queries for the theme.
    + `sidebar.css` : This file contains the css for custom sidebar layout.
+ `lib\` : Contains third party libraries for UI display.
    + `bs\`: Bootstrap library.
+ `page-templates\`
    + `blog-template` : Custom template for blogpage.
    + `portfolio-template` : Custom template for portfolio page.
+ `template-parts\` : Contains Content template parts used by the theme.
+ `author.php` : Author archive page.
+ `home.php` : Custom template for homepage. 
+ `portfolio.php` : Contains custom post type `portfolios`.

## **Installation**
This Theme is not available on WordPress marketplace, thus you will have to manually upload this theme to the website directory. 

**Here are the steps how you can download the theme**
  1. Download the zip folder.
  2. Go to WordPress website root directory and navigate to `wp-content\theme` folder.
  3. Extract the zip here.
  4. Login to WordPress admin panel and navigate to `Appearance\Themes`.
  5. A new theme named `Theme Assignment` by [Janki](https://janki1028.wordpress.com/) should be available.
  6. Click on `Activate`.
  
**Here are the steps to set-up the theme**
  1. Go to `Settings> Reading` and select *Your homepage displays **Your latest posts***. This will automatically set up the custom homepage template.
  2. Go to `Pages` and add two new pages **Blog** and **Portfolio**. In the respective page setting menu go to `Document> Page Attributes` and select Template as ***Blogpage*** and ***Portfolio Page*** respectively.
  3.  Go to `Appearance> Menus`. Add **Blog** and **Portfolio** page to Menu. To add Homepage (if you do not have Home in your menu) to menu select `View all` in *Pages* section and add **Home** to menu.
  4. On activation of the theme, a custom post type named `portfolios` is enabled. You can manage all the portfolio from section available in the admin panel titled as `Portfolios`. 
  5. The theme is internationalized.

**Here are the steps to customize the theme.**

Go to `Appearance> Customize` in the admin panel.
  + `Site Identity` : Add Site Title and Tagline.
  + `Widgets`: Add a widget named as `Portfolio` to sidebar.
  + `Header Services` : You can add three services with Image, Title and Description.
  + `Footer Settings` : Fill up the contact details.
  + `About Author` : Introduce yourself by filling the contents. Add your custom Image.( This page will be visible when you click on `Contact Us` in the footer section ) 

## **Screenshots**
### **Activate**

![activate](https://github.com/janki28/assignment-theme/blob/main/assets/theme%20intro.PNG)

### **Home Page**

![homepage](https://github.com/janki28/assignment-theme/blob/main/assets/homepage.png)

### **Blog Page**

![blog](https://github.com/janki28/assignment-theme/blob/main/assets/blogpage.png)

### **Single Post Page**

![single](https://github.com/janki28/assignment-theme/blob/main/assets/single%20post%20page.png)

### **Portfolio Page**

![portfolio](https://github.com/janki28/assignment-theme/blob/main/assets/portfolio%20page.jpg)

### **View Portfolio Image**

![portimage](https://github.com/janki28/assignment-theme/blob/main/assets/portfolio%20view.jpg)

### **Some Hover Effects**

![hover](https://github.com/janki28/assignment-theme/blob/main/assets/hover.jpg)

### **Sidebar**

![sidebar](https://github.com/janki28/assignment-theme/blob/main/assets/sidebar.jpg)

![portsidebar](https://github.com/janki28/assignment-theme/blob/main/assets/portfolio-sidebar.png)
