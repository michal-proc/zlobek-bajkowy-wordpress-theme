# Zlobek Bajkowy WordPress Theme

**Zlobek Bajkowy** is a custom WordPress theme designed for child care services, built with modern web technologies including **Sass** for styling. The theme is tailored to be responsive and user-friendly, providing an optimal browsing experience for visitors. 

The live version of the theme is available at: [ABK Centrum Opieki](https://abkcentrumopieki.pl/)

## Features

- **Custom WordPress Theme**: Tailored specifically for child care services.
- **Responsive Design**: The theme is fully responsive, offering an optimal viewing experience on mobile and desktop devices.
- **Sass Integration**: Styles are written in Sass, making them modular and easy to maintain.
- **Customizable Templates**: Includes template files for easy customization (`single.php`, `index.php`, etc.).

## Technologies Used

- **WordPress**: The theme is built for the WordPress content management system.
- **Sass (SCSS)**: For writing clean, maintainable, and reusable styles.
- **Webpack**: Bundles the assets, including compiling Sass and JavaScript files.
- **JavaScript**: For dynamic features and interactivity on the front end.

## Installation

To use this theme on your WordPress site:

1. Download or clone the theme:
   ```bash
   git clone <repository-url>
   ```

2. Upload the theme to your WordPress site:
   - Navigate to the **Appearance** > **Themes** section in the WordPress dashboard.
   - Click **Add New** > **Upload Theme** and upload the theme zip file.
   - Activate the theme.

3. Install and compile dependencies (optional for development):
   - Navigate to the theme directory and install the required packages:
     ```bash
     npm install
     ```

4. To compile the Sass and JavaScript files, run:
   ```bash
   npm run build
   ```

5. Use `npm start` during development for automatic reloading when making changes to assets:
   ```bash
   npm start
   ```

## Folder Structure

- **assets/**: Contains the compiled CSS, JS, and image files.
- **src/**: Contains the source SCSS and JS files for development.
- **templates/**: Contains WordPress template files.
- **style.css**: Main stylesheet required by WordPress.
- **functions.php**: Handles theme setup, including enqueuing styles and scripts.

## Customization

- **Sass (SCSS)**: To customize the styling, modify the `.scss` files in the `src/` directory and recompile using Webpack.
- **Templates**: You can modify template files like `index.php`, `header.php`, and `footer.php` to adjust the structure of the theme.

## Live Site

Check out the live version of the theme at [abkcentrumopieki.pl](https://abkcentrumopieki.pl/).
