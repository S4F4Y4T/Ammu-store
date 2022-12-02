<a name="readme-top"></a>

<div align="center">
  <h3 align="center">Ammu Store</h3>
  <p>Ecommerce for your ammunation store</p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

![Screen Shot][product-screenshot-1]

This is a e-commerce platform for ammunation.

The application has two part one of is the frontend store from where you can view products by category,brand and search. You can also view product description and add the product to cart,compare list or wishlist as you want. After adding to cart you can checkout from the application after filling out all your billing and card data.

The second part includes the admin dashboard which let you handle all the products,orders,message and category with visualize dashboard

Here's why:
* Maintainable
* Clean Code
* Advance PHP

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built With

This platform built wih my design pattern and own made php MVC framework from scracth on the backend. Frontend use random template and dashboard use ADMIN LTE free admin dashboard 

* [![php][php]][php-url]
* ![php][mvc]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

By following the instructions you can run the script on your machine

### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/S4F4Y4T/Ammu-store.git
   ```
2. Changin folder and files permissions 
   ```sh
   sudo find "Your project directory" -type f -exec chmod 644 {} \;
   sudo find "Your project directory" -type d -exec chmod 755 {} \;
   ```
3. Give the img folder permission to upload

4. Create and import the safayata_ecommerce.sql into mysql DB

5. Open app/config/config.php and change the db information accordingly,stripe key values and base value to your project url

6. Make sure .htaccess exist

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage

You can use this application to sell your products online.

Here some screenshots of front panel
![Screen Shot][product-screenshot-1]
![Screen Shot][product-screenshot-2]
![Screen Shot][product-screenshot-3]
![Screen Shot][product-screenshot-8]
![Screen Shot][product-screenshot-9]

Here some screeshots of admin dashboard
![Screen Shot][product-screenshot-4]
![Screen Shot][product-screenshot-5]
![Screen Shot][product-screenshot-6]
![Screen Shot][product-screenshot-7]


<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->

[product-screenshot-1]: overview/1.png
[product-screenshot-2]: overview/2.png
[product-screenshot-3]: overview/3.png
[product-screenshot-4]: overview/4.png
[product-screenshot-5]: overview/5.png
[product-screenshot-6]: overview/6.png
[product-screenshot-7]: overview/7.png
[product-screenshot-8]: overview/8.png
[product-screenshot-9]: overview/9.png

[php]: https://img.shields.io/badge/php-php-white
[mvc]: https://img.shields.io/badge/MVC-MVC%20Framework-white
[Php-url]: https://www.php.net/
[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com
[JQuery.com]: https://img.shields.io/badge/jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white
[JQuery-url]: https://jquery.com 
